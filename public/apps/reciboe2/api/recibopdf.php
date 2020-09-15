<?php
include_once('libs/PDF.php');
include_once('libs/utils.php');
require_once 'libs/database.php';
require_once 'libs/jwt.php';

//$headers = apache_request_headers();
 //$auth = trim($headers["Authorization"]);
 $auth = $_GET['auth'];
 if (JWT::verify($auth, Config::SECRET_KEY_JWT)==0) {
     $db = new DataBase('recibos');
     $data = JWT::get_data($auth, Config::SECRET_KEY_JWT);
     $control = trim($data['control']);
     $recibo = $_GET['recibo'];
    $modo = 'D';
     if(isset($_GET['modo'])) $modo = $_GET['modo'];


     $res = $db->read(array('id_recibo'=>$recibo,'control'=>$control));
     if ($res) {
         $total=$res['total'];
         $obs=$res['observaciones'];
         $num_control=$control;
         $nombre_completo=$res['nombre'];
         $f = explode("-", $res['fecha']);
         $fecha="$f[2]-$f[1]-$f[0]";
         $fol=$recibo;
         $ref="";

         $sql = "SELECT
        vouchers.referencia,
        vouchers.fecha,
        vouchers.monto
        FROM
        vouchers
        INNER JOIN referencias ON referencias.id_voucher = vouchers.id_voucher
        WHERE
        referencias.id_recibo = ".$recibo." AND
        vouchers.control = '$control'";
         $r = $db->sql_query($sql);

         if ($r) {
             $ref=$r[0]['referencia'];
         }


         $datosReporte =[array('clave'=>'','concepto'=>'','importe'=>'','tag'=>'')];

         $datosReporte = $db->sql_select("recibos_detalle", array('id_recibo'=>$recibo));

         $totalet=numtoletras($total);
         $pdf = new PDF();
         $pdf->AddPage();
         /*
         $pdf->Line(4, 5 , 207, 5);
         $pdf->Line(4, 5, 4, 140);
         $pdf->Line(207, 5, 207, 140);
         $pdf->Line(4, 140 , 207, 140);
         */

         $miCabecera = array('CLAVE');
         //$miCabecera1 = array('CANTIDAD');
         $miCabecera2 = array('CONCEPTO');
         $miCabecera3 = array('IMPORTE');

         $pdf->cabeceraConceptos($miCabecera);
         //$pdf->cabeceraConceptos1($miCabecera1);
         $pdf->cabeceraConceptos2($miCabecera2);
         $pdf->cabeceraConceptos3($miCabecera3);
         $pdf->datosConceptos($datosReporte);

         $Nombre = array( 'NOMBRE(APELLIDO PATERNO,MATERNO,NOMBRE(S),DENOMINACION O RAZON SOCIAL)');
         $datosNombre = array($nombre_completo);
         $pdf->cabeceranombre($Nombre);
         $pdf->datosnombre($datosNombre);

         $Observ = array( 'OBSERVACIONES');
         $datosobserv = array($obs);
         $pdf->cabeceraobserv($Observ);
         $pdf->datosobserv($datosobserv);

         $Matricula = array( 'MATRICULA O R.F.C');
         $datosMatricula = array($num_control);
         $pdf->cabeceraMatricula($Matricula);
         $pdf->datosMatricula($datosMatricula);

         $fechacab = array('FECHA', 'FOLIO','NO. MOVIMIENTO');
         $datosfecha = array($fecha,$fol,$ref);
         $pdf->cabeceraFecha($fechacab);
         $pdf->datosFecha($datosfecha);

         $cabtotal = array('TOTAL');
         $dattotal = array($total);
         //$pdf->cabeceratotalletra($cabtotal);
         //$pdf->datostotalletra($dattotal);

         $cabletra = array('CANTIDAD EN LETRA');
         $datletra = array($totalet);
         //$pdf->cabeceraletra($cabletra);
         //$pdf->datosletra($datletra);

         $gobierno = array('GOBIERNO DEL ESTADO DE MICHOACAN');
         $pdf->cabecerarecibo($gobierno);
         $itsch = array('INSTITUTO TECNOLOGICO SUPERIOR');
         $pdf->cabecerarecibo1($itsch);
         $itsch1 = array('DE CIUDAD HIDALGO');
         $pdf->cabecerarecibo11($itsch1);
         $oficial = array('RECIBO OFICIAL DE COBRO');
         $pdf->cabecerarecibo2($oficial);
         $direccion1= array('AV. ING. CARLOS ROJAS GUTIERREZ NO.2120 FRACC. VALLE DE LA HERRADURA
');
         $pdf->cabecerarecibo3($direccion1);
         $direccion2= array('CIUDAD HIDALGO, MICH., C.P. 61100');
         $pdf->cabecerarecibo4($direccion2);
         $direccion3= array('TEL. Y FAX: (786) 154-90-00 R.F.C. ITS000712HI4');
         $pdf->cabecerarecibo5($direccion3);

         //************************************************************************************COPIA
         /*
         $pdf->Line(4, 150 , 207, 150);
         $pdf->Line(4, 285, 4, 150);
         $pdf->Line(207, 150, 207, 285);
         $pdf->Line(4, 285 , 207, 285);
         $pdf->SetFont('Arial','',8);
         
         $pdf->cabecerarecibo6($gobierno);
         $pdf->cabecerarecibo16($itsch);
         $pdf->cabecerarecibo116($itsch1);
         $pdf->cabecerarecibo26($oficial);
         $pdf->cabecerarecibo36($direccion1);
         $pdf->cabecerarecibo46($direccion2);
         $pdf->cabecerarecibo56($direccion3);
         
         $pdf->cabeceraFecha1($fechacab);
         $pdf->datosFecha1($datosfecha);
         
         $pdf->cabeceranombre1($Nombre);
         $pdf->datosnombre1($datosNombre);
         
         
         $pdf->cabeceraobserv1($Observ);
         $pdf->datosobserv1($datosobserv);
         
         $pdf->cabeceraMatricula1($Matricula);
         $pdf->datosMatricula1($datosMatricula);
         
         $pdf->cabeceraConceptos4($miCabecera);
         //$pdf->cabeceraConceptos14($miCabecera1);
         $pdf->cabeceraConceptos24($miCabecera2);
         $pdf->cabeceraConceptos34($miCabecera3);
         $pdf->datosConceptos4($datosReporte);
         */
         $pdf->cabeceratotalletra1($cabtotal);
         $pdf->datostotalletra1($dattotal);

         $pdf->cabeceraletra1($cabletra);
         $pdf->datosletra1($datletra);

         $pdf->Output($modo, "Recibo$recibo.pdf");
     } else {
         header("HTTP/1.1 400 Bad Request");
     }
 } else {
     header("HTTP/1.1 401 Unauthorized");
 }
