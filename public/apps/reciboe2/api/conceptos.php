<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';

 $headers = apache_request_headers();
 $auth = trim($headers["Authorization"]);

 if(JWT::verify($auth, Config::SECRET_KEY_JWT)==0){

$db = new DataBase('conceptos');
$data = JWT::get_data($auth, Config::SECRET_KEY_JWT);
$control = trim($data['control']);
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['ID'])){
        $where = array('clave'=>$_GET['ID']);
        $result = $db->read($where);
    }else{
        
        $where = array('!status'=>'C');
        $result = $db->readAll($where,['concepto']);
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    //print_r($result);
}else if($_SERVER['REQUEST_METHOD']=='POST'){
    //$_POST = json_decode(file_get_contents('php://input'), true);

    $data = array('control'=>$control, 
        'referencia'=>$_POST['referencia'],
        'fecha'=>$_POST['fecha'],
        'hora'=>$_POST['hora'],
        'monto'=>$_POST['monto'],
        'status'=>'P');
        //print_r($data);
    $id = $db->create($data);

    $result = array('ID'=>$id);
    header("HTTP/1.1 200 OK");
    echo json_encode($result);

}else if($_SERVER['REQUEST_METHOD']=='PUT'){

    $where = array('ID'=>$_GET['ID'], 'status'=>'P', 'control'=>$control);
    $data = array('referencia'=>$_GET['referencia'],
        'fecha'=>$_GET['fecha'],
        'hora'=>$_GET['hora'],
        'monto'=>$_GET['monto']);
    $id = $db->update($data, $where);

    $result = array('ID'=>$id);
    header("HTTP/1.1 200 OK");
    echo json_encode($result);
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