<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';
require_once 'libs/excel/PHPExcel.php';

 $headers = apache_request_headers();
 $auth = trim($headers["Authorization"]);

 if (JWT::verify($auth, Config::SECRET_KEY_JWT)==0) {
     $db = new DataBase('estado_cuenta');

     if ($_SERVER['REQUEST_METHOD']=='GET') {
         $movs = $db->readAll();
         $cont=0;
         foreach ($movs as $mov) {
             $id = $mov['id'];
             $ref = $mov['referencia'];
             $fecha = $mov['fecha'];
             $abono = $mov['abono'];
             
             $d = array('status'=>'V');
             //if ($hora=="") {
             $w = array('referencia'=>$ref,
                                'fecha'=>$fecha,
                                'monto'=>$abono,
                                'status'=>'P');
             //  } else {
             //      $w = array('referencia'=>$ref,
             //             'fecha'=>$fecha,
             //             'hora'=>$hora,
             //             'monto'=>$abono,
             //             'status'=>'P');
             //  }
             $res = $db->sql_update("vouchers", $d, $w);
             if ($res>0) {
                 $d = array('status'=>'U');
                 $w = array('id'=>$id);
                 $res=$db->update($d, $w);
                 $cont++;
             }
         }
         echo "se validaron $cont";
     } elseif ($_SERVER['REQUEST_METHOD']=='POST') {
         $log="";
         $archivo = "../uploads/" . basename($_FILES['archivo']['name']);
         //  //$extension = pathinfo($archivo,PATHINFO_EXTENSION);
         move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
         //  $db->sql_execute("delete from edo_tmp");
         //  $result = $db->sql_execute("load data local infile '$archivo' into table edo_tmp fields terminated by ',' lines terminated by '\n' (DATE(fecha),concepto,cargo,abono,saldo)");
         // //  echo "load data local infile '$archivo' into table edo_tmp fields terminated by ',' lines terminated by '\n' (fecha,concepto,cargo,abono,saldo)";
         // //  $result = array('resultado'=>'hecho');
         // $db->sql_execute("insert into estado_cuenta(fecha,concepto,cargo,abono,saldo) select fecha,concepto,cargo,abono,saldo from edo_tmp");

         //  header("HTTP/1.1 200 OK");
         //  echo json_encode($result);

         //  $fp = fopen($archivo, "r");
         //  while (!feof($fp)) {
         //      $linea = fgets($fp);
         //      $campos=explode("\t",$linea);

         //      echo "$campos[0]<br>";
         //  }
         //  fclose($fp);
         
         $ext= (explode(".", $archivo));
         $ext= $ext[count($ext)-1];
        if($ext=="txt"){
            $lineas = file($archivo);
            $log="texto";
        }elseif($ext=="xlsx"){
            //$excel = new PHPExcel_Reader_Excel2007();
            $libro = PHPExcel_IOFactory::load($archivo);
            $libro->setActiveSheetIndex(0);
            $row=4;
            
            while($libro->getActiveSheet()->getCell("A".$row)->getValue()!=""){
                $linea="";

                $linea = $libro->getActiveSheet()->getCell("A".$row)->getValue();
                $linea .= "\t" . $libro->getActiveSheet()->getCell("B".$row)->getValue();
                $importe = floatval($libro->getActiveSheet()->getCell("C".$row)->getValue());
                if($importe<0){
                    $importe *= -1;
                    $linea .= "\t" . $importe;
                    $linea .= "\t" . "0";
                }else{
                    $linea .= "\t" . "0";
                    $linea .= "\t" . $importe;
                }

                $linea .= "\t" . $libro->getActiveSheet()->getCell("D".$row)->getValue();
                // echo $linea."\n";
                $lineas[] = $linea;
                $row++;
            }
            // echo "lineas:".count($lineas)."\n";

            //$result = array('total'=>'0','agregados'=>'Abierto');
            // header("HTTP/1.1 200 OK");
            // echo json_encode($result);
            //return;
        }else{

        }
        
         $cont=0;
         $total=0;
         $row=0;
         
         foreach ($lineas as $num_linea => $linea) {
            // echo "linea $row :".$linea."\n";
            // $row++;
            $campos=explode("\t", $linea);
            
             $time = strtotime($campos[0]);
             if ($time) {
                 $fecha = date('Y-m-d', $time);
                 $hora="00:00";
                 $concepto = trim($campos[1]);
                 $cargo = floatval(str_replace(",", "", $campos[2]));
                 $abono = floatval(str_replace(",", "", $campos[3]));
                 $saldo = floatval(str_replace(",", "", $campos[4]));

                 $pos = strpos($concepto, ":");
                 if ($pos>0 && $pos < (strlen($concepto)-2)) {
                     if ($concepto[$pos+3]==' ') {
                         $hora = substr($concepto, $pos-2, 5);
                     }
                 }
           
                 $ref=0;
                 // $pos = strpos($concepto,"FOLIO")+6;
                 // if ($pos>6 && $pos < (strlen($concepto))) {
                 //     $ref = substr($concepto, $pos, 4);
                 // }else{
                 //     $pos = strpos($concepto,"BMOV")-12;
                 //     if($pos>12 && $pos < (strlen($concepto))){
                 //         $ref = substr($concepto, $pos, 12);
                 //     }
                 // }
                 if ($abono>0) {
                     $folio=explode("/", $concepto);
                     $nuevo_folio=trim(end($folio));
                     if (substr($nuevo_folio, 0, 1)=='*') {
                         $tmp=explode(":", $nuevo_folio);
                         $ref=trim(end($tmp));
                     } else {
                         $tmp=explode(" ", $nuevo_folio);
                         $ref=trim($tmp[0]);
                     }

                     if (!is_numeric($ref)) {
                         $ref=0;
                     }
                 }
                 //echo "$ref<br>";
                 //  echo "<tr><td>$fecha $hora</td><td>$concepto</td><td>$cargo</td><td>$abono</td><td>$saldo</td></td>";
                 
                 $data = array('fecha'=>$fecha,
                    'hora'=>$hora,
                    'concepto'=>$concepto,
                    'cargo'=>$cargo,
                    'abono'=>$abono,
                    'saldo'=>$saldo,
                    'referencia'=>$ref,
                    'status'=>'L');
                    
                 try {
                     $id = $db->create($data);
                     if ($id) {
                         $cont++;
                         $d = array('status'=>'V');
                         //if ($hora=="") {
                         $w = array('referencia'=>$ref,
                                'fecha'=>$fecha,
                                'monto'=>$abono,
                                'status'=>'P');
                         //  } else {
                         //      $w = array('referencia'=>$ref,
                         //             'fecha'=>$fecha,
                         //             'hora'=>$hora,
                         //             'monto'=>$abono,
                         //             'status'=>'P');
                         //  }
                         $voucher =  $db->sql_first("vouchers",$w);
                         if($voucher){
                             $res = $db->sql_update("vouchers", $d, array('id_voucher'=>$voucher['id_voucher']));
                            if ($res>0) {
                                $d = array('status'=>'U');
                                $w = array('id'=>$id);
                                $res=$db->update($d, $w);
                            }
                         }
                         
                     }
                 } catch (PDOException $e) {
                    //  echo "$e<br><br>";
                 }
                 $total++;
             }
         }
         $result = array('total'=>$total,'agregados'=>$cont, 'log'=>$log);
         header("HTTP/1.1 200 OK");
         echo json_encode($result);
     } else {
         header("HTTP/1.1 400 Bad Request");
     }
 } else {
     header("HTTP/1.1 401 Unauthorized");
 }
