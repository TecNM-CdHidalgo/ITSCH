<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';
date_default_timezone_set ( 'America/Mexico_City' );
 $headers = apache_request_headers();
 $auth = trim($headers["Authorization"]);

 if (JWT::verify($auth, Config::SECRET_KEY_JWT)==0) {
     $db = new DataBase('recibos');
     $data = JWT::get_data($auth, Config::SECRET_KEY_JWT);
     $tipo = trim($data['tipo']);
    
     if ($tipo!='admin') {
         $control = trim($data['control']);
     }

     if ($_SERVER['REQUEST_METHOD']=='GET') {
         if (isset($_GET['ID'])) {
             $where = array('id_recibo'=>$_GET['ID'], 'control'=>$control);
             $result = $db->read($where);
         } elseif (isset($_GET['voucher'])) {
             $sql = "SELECT
                    recibos.id_recibo,
                    recibos.fecha,
                    recibos_detalle.concepto,
                    recibos_detalle.importe
                    FROM
                    recibos
                    INNER JOIN recibos_detalle ON recibos_detalle.id_recibo = recibos.id_recibo
                    INNER JOIN referencias ON referencias.id_recibo = recibos.id_recibo
                    WHERE
                    referencias.id_voucher = ".$_GET['voucher'].
                    " AND recibos.control = '".$control."'";
             $result = $db->sql_query($sql);
         } elseif (isset($_GET['recibov'])) {
             $sql = "SELECT
                    vouchers.referencia,
                    vouchers.fecha,
                    vouchers.monto
                    FROM
                    vouchers
                    INNER JOIN referencias ON referencias.id_voucher = vouchers.id_voucher
                    WHERE
                    referencias.id_recibo = ".$_GET['recibov'];
             if ($tipo!='admin') {
                 $sql=$sql." AND vouchers.control = '$control'";
             }
             $result = $db->sql_query($sql);
         } elseif (isset($_GET['reciboc'])) {
             $sql = "SELECT
                    recibos_detalle.*
                    FROM
                    recibos
                    INNER JOIN recibos_detalle ON recibos_detalle.id_recibo = recibos.id_recibo
                    WHERE
                    recibos.id_recibo = ".$_GET['reciboc'];
             if ($tipo!='admin') {
                 $sql=$sql." AND recibos.control = '$control'";
             }
             $result = $db->sql_query($sql);
         } else {
             $sql = "SELECT
                    recibos.id_recibo,
                    recibos.fecha,
                    GROUP_CONCAT(recibos_detalle.concepto) as conceptos,
                    Sum(recibos_detalle.importe) as total,
                    recibos.status,
                    recibos.control,
                    recibos.nombre
                    FROM
                    recibos
                    LEFT JOIN recibos_detalle ON recibos_detalle.id_recibo = recibos.id_recibo";
             if ($tipo!='admin') {
                 $sql=$sql." WHERE recibos.control = '$control' AND recibos.status <> 'C'";
             } else {
                 $folio="";
                 if (isset($_GET['folio'])) {
                     $folio=$_GET['folio'];
                 }
                 $sql=$sql." WHERE CONVERT(recibos.id_recibo,char) like '%$folio%'";
             }
             $sql=$sql." GROUP BY
                    recibos.id_recibo ORDER BY 1 DESC";
               //echo $sql;
            //    try{
                    $result = $db->sql_query($sql);
            //         print_r($result);
            //    }catch(Exception $e){
            //        print_r($e);
            //     }
         }
         header("HTTP/1.1 200 OK");
         echo json_encode($result);
     } elseif ($_SERVER['REQUEST_METHOD']=='POST') {
         //$_POST = json_decode(file_get_contents('php://input'), true);
         $nombre = trim($data['nombre']);
         $fecha = $_POST['fecha'];
         $hora = $_POST['hora'];
         $vouchers = json_decode($_POST['vouchers'], true);
         $conceptos = json_decode($_POST['conceptos'], true);

         $total = $_POST['total'];

         //falta validar transaccion, montos, agregar partida de donacion, uso parcial
         $totalConceptos = count($conceptos);
         if (count($vouchers) < 1 || $totalConceptos<1) {
             header("HTTP/1.1 400 Bad Request");
             return;
         }
    
         $recibo = array(
        'control'=>$control,
        'nombre'=>$nombre,
        'fecha'=>date("Y-m-d"),
        'hora'=>date("H:i:s"),
        'total'=>$total,
        'status'=>'G',
        'usuario'=>$control,
        'origen'=>'W'
    );
         $trans = true;
         $db->transaction();

         $idrecibo = $db->create($recibo);
    
         foreach ($vouchers as $voucher) {
             $w = array(
            'id_voucher'=>$voucher['id_voucher'],
            'status'=>'V');

             $res = $db->sql_first("vouchers", $w);

             if ($res) {
                 $ref = array(
                'id_recibo'=>$idrecibo,
                'id_voucher'=>$voucher['id_voucher']
            );
                 $db->sql_insert("referencias", $ref);

                 $db->sql_update("vouchers", array('status'=>'U'), array('id_voucher'=>$voucher['id_voucher']));
             } else {
                 $trans=false;
             }
         }
         $rowsAdd=0;
         foreach ($conceptos as $concepto) {
             $tag=$concepto['tag'];
             if ($concepto['status']=='M') {
                 $tag="MAT_ACT";
             }
             for ($i=18;$i<30;$i++) {
                 if (stristr($concepto['concepto'], "CONGRESO") && stristr($concepto['concepto'], "20$i")) {
                     $tag="CONGRESO20$i";
                 }
             }
             $detalle = array(
            'id_recibo'=>$idrecibo,
            'clave'=>$concepto['clave'],
            'concepto'=>$concepto['concepto'],
            'importe'=>$concepto['importe'],
            'obs'=>$concepto['obs'],
            'tag'=>$tag
            );
            if($db->sql_insert("recibos_detalle", $detalle)){
                $rowsAdd++;
            }
         }

        if($rowsAdd != $totalConceptos){
            $trans=false;
        }
         if ($trans) {
             $result = array('ID'=>$idrecibo);
             $db->commit();
         } else {
             $result = array('ID'=>'0');
             $db->rollback();
         }
    
    
         header("HTTP/1.1 200 OK");
         echo json_encode($result);
     } elseif ($_SERVER['REQUEST_METHOD']=='PUT') {
        if ($tipo=='admin'){
            if(isset($_GET['status'])){
                $where = array('id_recibo'=>$_GET['id_recibo']);
                $data = array('status'=>$_GET['status']);
                $rows = $db->update($data, $where);
            }else{
                $db = new DataBase('recibos_detalle');
                $where = array('id_recibo'=>$_GET['id_recibo']);
                $data =array();
                $conceptos=json_decode($_GET['conceptos'], true);
                $rows=0;
                foreach ($conceptos as $concepto) {
                    if ($concepto['tag']=='MAT_ACT') {
                        $where = array('id_conceptos'=>$concepto['id_conceptos']);
                        $data = array('obs'=>$concepto['obs']);
                        $id = $db->update($data, $where);
                        if ($id) {
                            $rows=$rows+1;
                        }
                    }
                }
            }
            $result = array('rows'=>$rows);
            header("HTTP/1.1 200 OK");
            echo json_encode($result);
        }else{
            header("HTTP/1.1 400 Bad Request");
        }
     } elseif ($_SERVER['REQUEST_METHOD']=='DELETE') {
        $trans = true;
        $db->transaction();

        $where = array('id_recibo'=>$_GET['id_recibo']);
        $vs = $db->sql_select("referencias",$where);

        $r1 = $db->delete($where);
        $r2 = $db->sql_delete("recibos_detalle",$where);
        
        foreach($vs as $v){
            $w = array('id_voucher'=>$v['id_voucher']);
            $d = array('status'=>'V');
            $r3 = $db->sql_update("vouchers", $d, $w);
        }

        $r4 = $db->sql_delete("referencias",$where);

        if ($trans) {
            $result = array('rows'=>'1');
            $db->commit();
        } else {
            $result = array('rows'=>'0');
            $db->rollback();
        }

         header("HTTP/1.1 200 OK");
         echo json_encode($result);
     } else {
         header("HTTP/1.1 400 Bad Request");
     }
 } else {
     header("HTTP/1.1 401 Unauthorized");
 }
