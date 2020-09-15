<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';
date_default_timezone_set ( 'America/Mexico_City' );
/*
 $headers = apache_request_headers();
 $auth = trim($headers["Authorization"]);

if(JWT::verify($auth, Config::SECRET_KEY_JWT)==0){

$db = new DataBase('conceptos');
$data = JWT::get_data($auth, Config::SECRET_KEY_JWT);
*/
if($_SERVER['REQUEST_METHOD']=='GET'){
    $fecha = date("Y-m-d");
    $hora = date("h:i:s");
    $result = array('fecha'=>$fecha,'hora'=>$hora);
    header("HTTP/1.1 200 OK");
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
} else{
        header("HTTP/1.1 400 Bad Request");
}
/*
}else {
    header("HTTP/1.1 401 Unauthorized");
}*/
?>