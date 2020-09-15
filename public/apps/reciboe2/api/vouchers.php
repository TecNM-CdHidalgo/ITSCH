<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';

 $headers = apache_request_headers();
 $auth = trim($headers["Authorization"]);

 if(JWT::verify($auth, Config::SECRET_KEY_JWT)==0){

    $db = new DataBase('vouchers');
    $data = JWT::get_data($auth, Config::SECRET_KEY_JWT);
    $tipo = trim($data['tipo']);
        
        if($tipo!='admin')
            $control = trim($data['control']);
        
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $page=0;
        $rows=0;
        if(isset($_GET['page']) && isset($_GET['rows'])){
            $page=$_GET['page'];
            $rows=$_GET['rows'];
        }
        if($tipo!='admin'){
            if(isset($_GET['ID'])){
                $where = array('id_voucher'=>$_GET['ID'], 'control'=>$control);
                $result = $db->read($where);
            }elseif(isset($_GET['status'])){
                $where = array('status'=>$_GET['status'], 'control'=>$control);
                $result = $db->readAll($where);
            }else{
                $where = array('control'=>$control);
                $result = $db->readAll($where);
            }
        }else{
            if(isset($_GET['control'])){
                $where = array('control'=>$_GET['control']);
                $result = $db->readPage($where,$page,$rows);
            }else{
                $result = $db->readPage();
            }
        }
        header("HTTP/1.1 200 OK");
        echo json_encode($result);

    }elseif($_SERVER['REQUEST_METHOD']=='POST'){
        //$_POST = json_decode(file_get_contents('php://input'), true);
        //falta validar refresh
        
        $data = array('control'=>$control, 
            'referencia'=>$_POST['referencia'],
            'fecha'=>$_POST['fecha'],
            'hora'=>$_POST['hora'],
            'monto'=>$_POST['monto'],
            'status'=>'P');
            //print_r($data);
            try{
                $id = $db->create($data);

                $w = array( 
                    'referencia'=>$_POST['referencia'],
                    'fecha'=>$_POST['fecha'],
                    'abono'=>$_POST['monto'],
                    'status'=>'L');
                $mov = $db->sql_first("estado_cuenta",$w);
                if($mov){
                    $d = array('status'=>'V');
                    $w = array('id_voucher'=>$id);
                    $res=$db->update($d, $w);
                    $d = array('status'=>'U');
                    $w = array('id'=>$mov['id']);
                    $res=$db->sql_update("estado_cuenta",$d, $w);
                }
                $result = array('ID'=>$id);
                header("HTTP/1.1 200 OK");
                echo json_encode($result);
            }catch(PDOException $e){
                header("HTTP/1.1 400 Bad Request");
            }

    }elseif($_SERVER['REQUEST_METHOD']=='PUT'){
        if ($tipo!='admin') {$where = array('ID'=>$_GET['ID'], 'status'=>'P', 'control'=>$control);
            //para alumnos aun no funcional
            // $data = array('referencia'=>$_GET['referencia'],
            // 'fecha'=>$_GET['fecha'],
            // 'hora'=>$_GET['hora'],
            // 'monto'=>$_GET['monto']);
            // $id = $db->update($data, $where);

            // $result = array('ID'=>$id);
            // header("HTTP/1.1 200 OK");
            // echo json_encode($result);
        }else{

            $w = array('id_voucher'=>$_GET['id_voucher']);
            $mov = $db->read($w);

            $w = array( 
                'referencia'=>$_GET['referencia'],
                'fecha'=>$_GET['fecha'],
                'abono'=>$_GET['monto'],
                'status'=>'L');
            $mov = $db->sql_first("estado_cuenta",$w);
            if($mov){
                $d = array('status'=>'U');
                $w = array('id'=>$mov['id']);
                $res=$db->sql_update("estado_cuenta",$d, $w);
            }else{
                $data = array('referencia'=>$_GET['referencia'],
                'id_voucher'=>$_GET['id_voucher'],
                'fecha'=>$_GET['fecha'],
                'hora'=>$_GET['hora'],
                'monto'=>$_GET['monto'],
                'status'=>'N');
                $db->sql_insert("validacion_manual", $data);
            }
            
            $where = array('id_voucher'=>$_GET['id_voucher']);
            $data = array('referencia'=>$_GET['referencia'],
            'fecha'=>$_GET['fecha'],
            'hora'=>$_GET['hora'],
            'monto'=>$_GET['monto'],
            'status'=>$_GET['status']);
            $id = $db->update($data, $where);

            $result = array('rows'=>$id);
            header("HTTP/1.1 200 OK");
            echo json_encode($result);
        }
    }elseif($_SERVER['REQUEST_METHOD']=='DELETE'){
        $where = array('id_voucher'=>$_GET['ID']);
        $reg = $db->read($where);
        $rows=0;
        if($reg){
            if($reg['status']=='P'){
                $where = array('id_voucher'=>$_GET['ID'], 'control'=>$control);
                $rows = $db->delete($where);
            }elseif($reg['status']=='V'){
                $w = array( 
                    'referencia'=>$reg['referencia'],
                    'fecha'=>$reg['fecha'],
                    'abono'=>$reg['monto'],
                    'status'=>'U');
                $mov = $db->sql_first("estado_cuenta",$w);
                if($mov){
                    $d = array('status'=>'L');
                    $w = array('id'=>$mov['id']);
                    $res=$db->sql_update("estado_cuenta",$d, $w);
                }
                $where = array('id_voucher'=>$_GET['ID'], 'control'=>$control);
                $rows = $db->delete($where);
            }
        }
        $result = array('ID'=>$rows);
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
    }else{
            header("HTTP/1.1 400 Bad Request");
    } 
}else {
    header("HTTP/1.1 401 Unauthorized");
}
?>