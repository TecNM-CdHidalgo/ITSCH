<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';

 $headers = apache_request_headers();
 $auth = trim($headers["Authorization"]);

 if(JWT::verify($auth, Config::SECRET_KEY_JWT)==0){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            if(isset($_GET['tabla'])){
                switch($_GET['tabla']){
                    case 'materias':
                    $db = new DataBase('materias');
                    break;
                    default:
                    header("HTTP/1.1 204 No Content");
                }
                $result = $db->readAll();
                header("HTTP/1.1 200 OK");
                echo json_encode($result);
            } else {
                header("HTTP/1.1 204 No Content");
             }
        }else{
            header("HTTP/1.1 400 Bad Request");
        }

}else{
    header("HTTP/1.1 401 Unauthorized");
}

?>