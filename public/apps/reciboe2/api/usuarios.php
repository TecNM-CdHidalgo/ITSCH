<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';

 $headers = apache_request_headers();
 $auth = trim($headers["Authorization"]);

 if(JWT::verify($auth, Config::SECRET_KEY_JWT)==0){


$data = JWT::get_data($auth, Config::SECRET_KEY_JWT);
$tipo = trim($data['tipo']);
    
    if($tipo!='admin')
        $control = trim($data['control']);
    
if($_SERVER['REQUEST_METHOD']=='GET'){
    if($tipo!='admin'){
        // if(isset($_GET['ID'])){
        //     $where = array('id_voucher'=>$_GET['ID'], 'control'=>$control);
        //     $result = $db->read($where);
        // }else if(isset($_GET['status'])){
        //     $where = array('status'=>$_GET['status'], 'control'=>$control);
        //     $result = $db->readAll($where);
        // }else{
        //     $where = array('control'=>$control);
        //     $result = $db->readAll($where);
        // }
    }else{
        if(isset($_GET['control'])){
            $db = new DataBase('alumnos');
            $where = array('%no_control'=>$_GET['control']);
            
        }else{
            $db = new DataBase('externos');
            $where = array('%curp'=>$_GET['curp']);
        }
        
        $result = $db->readAll($where);
        for ($i=0; $i < count($result); $i++) {
            $result[$i]['no']=($i+1);
            $result[$i]['passd']=$db->decrypt($result[$i]['pass']);
        }
        
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($result);

}else if($_SERVER['REQUEST_METHOD']=='POST'){
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

}else if($_SERVER['REQUEST_METHOD']=='PUT'){
    if ($tipo!='admin') {
        //para alumnos aun no funcional
        // $where = array('ID'=>$_GET['ID'], 'status'=>'P', 'control'=>$control);
        // $data = array('referencia'=>$_GET['referencia'],
        // 'fecha'=>$_GET['fecha'],
        // 'hora'=>$_GET['hora'],
        // 'monto'=>$_GET['monto']);
        // $id = $db->update($data, $where);

        // $result = array('ID'=>$id);
        // header("HTTP/1.1 200 OK");
        // echo json_encode($result);
    }else{
        if (isset($_GET['control'])) {
            
        }else{
            $db = new DataBase('externos');
            $where = array('id_externo'=>$_GET['id_externo']);
            $data = array(
            'curp'=>$_GET['curp'],
            'nombre'=>$_GET['nombre'],
            'a_paterno'=>$_GET['a_paterno'],
            'a_materno'=>$_GET['a_materno'],
            'pass'=>$db->encrypt($_GET['pass']));
        }
        
        $id = $db->update($data, $where);

        $result = array('rows'=>$id);
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
    }
}else if($_SERVER['REQUEST_METHOD']=='DELETE'){

    $where = array('id_voucher'=>$_GET['ID'], 'control'=>$control);
    $id = $db->delete($where);

    $result = array('ID'=>$id);
    header("HTTP/1.1 200 OK");
    echo json_encode($result);
}else{
        header("HTTP/1.1 400 Bad Request");
} 

}else {
    header("HTTP/1.1 401 Unauthorized");
}
?>