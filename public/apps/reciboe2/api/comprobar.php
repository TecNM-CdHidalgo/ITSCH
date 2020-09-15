<?php
require_once 'libs/database.php';

// $headers = apache_request_headers();
// $auth = $headers["Authorization"];

// if(JWT::verify($auth, Config::SECRET_KEY_JWT)==0){


$rec = new DataBase('recibos');
if($_SERVER['REQUEST_METHOD']=='GET'){
    
    if(isset($_GET['folio']) && isset($_GET['concepto'])){
        $f = $_GET['folio'];
        $c = $_GET['concepto'];
        
        $res1 = $rec->sql_first("recibos_detalle",array('id_recibo'=>$f,'tag'=>$c),['id_recibo','concepto','importe']);
        $res2 = $rec->sql_first("recibos",array('id_recibo'=>$f,'status'=>'G'),['control','nombre','fecha']);
        
        //print_r($res1);
        if($res1 && $res2){

            $res3 = $rec->sql_first("externos",array('curp'=>$res2['control']));
            
            if($res3){
                $ext="si";
            }else{
                $ext = "no";
            }
            $result = array('valido'=>'si',
                'externo'=>$ext,
                'folio'=>$res1['id_recibo'],
                'control'=>$res2['control'],
                'nombre'=>$res2['nombre'],
                'fecha'=>$res2['fecha'],
                'concepto'=>$res1['concepto'],
                'importe'=>$res1['importe'],
            );
        }else{
            $result = array('valido'=>'no');
        }
        
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
    }elseif(isset($_GET['folio'])){
        $f = $_GET['folio'];
        $res1 = $rec->sql_select("recibos_detalle",array('id_recibo'=>$f),0,0,['id_recibo','concepto','obs','tag','importe']);
        $res2 = $rec->sql_first("recibos",array('id_recibo'=>$f,'status'=>'G'),['id_recibo','control','nombre','fecha']);
        if($res1 && $res2){

            $result = array('valido'=>'si',
                'folio'=>$res2['id_recibo'],
                'control'=>$res2['control'],
                'nombre'=>$res2['nombre'],
                'fecha'=>$res2['fecha'],
                'conceptos'=>$res1
            );
        }else{
            $result = array('valido'=>'no');
        }
        
        header("HTTP/1.1 200 OK");
        echo json_encode($result);

    }else{
        header("HTTP/1.1 400 Bad Request");
    }
    

}else{
        header("HTTP/1.1 400 Bad Request");
} 
?>