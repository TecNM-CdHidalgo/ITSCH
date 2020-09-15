<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';

 $headers = apache_request_headers();
 $auth = trim($headers["Authorization"]);

 if (JWT::verify($auth, Config::SECRET_KEY_JWT)==0) {
     $db = new DataBase('comentarios');
     $data = JWT::get_data($auth, Config::SECRET_KEY_JWT);
     $tipo = trim($data['tipo']);
     if ($tipo=='admin') {
         $control = $tipo;
     } else {
         $control = trim($data['control']);
     }

     if ($_SERVER['REQUEST_METHOD']=='GET') {
         if (isset($_GET['ID'])) {
             $where = array('id_coment'=>$_GET['ID'], 'de'=>$control);
             $result = $db->read($where);
         } elseif(isset($_GET['para'])) {
             $page=0;
             $rows=10;
             if (isset($_GET['page']) && isset($_GET['rows'])) {
                 $page=$_GET['page'];
                 $rows=$_GET['rows'];
                 $page=($page*$rows-$rows);
             }
             $usuarios = $db->sql_query("SELECT DISTINCT comentarios.de FROM comentarios WHERE comentarios.de = 'admin' OR comentarios.para = 'admin'
             UNION SELECT DISTINCT comentarios.para FROM comentarios WHERE comentarios.de = 'admin' OR comentarios.para = 'admin'");
             
             $table = $db->sql_query("SELECT * FROM comentarios WHERE de='$control' OR para='$control' ORDER BY fecha DESC LIMIT $page,$rows");
             $rows = $db->sql_query("SELECT COUNT(*) total FROM comentarios WHERE de='$control' OR para='$control'");
             $result = array("table"=>$table,"rows"=>$rows[0]['total']);
         }
         header("HTTP/1.1 200 OK");
         echo json_encode($result);
     } elseif ($_SERVER['REQUEST_METHOD']=='POST') {
         $fecha = date("Y-m-d H:i:s");

         $data = array('de'=>$control,
        'para'=>$_POST['para'],
        'comentario'=>$_POST['comentario'],
        'fecha'=>$fecha,
        'status'=>'N');
         try {
             $id = $db->create($data);
             $result = array('ID'=>$id);
             header("HTTP/1.1 200 OK");
             echo json_encode($result);
         } catch (PDOException $e) {
             header("HTTP/1.1 400 Bad Request");
         }
     } elseif ($_SERVER['REQUEST_METHOD']=='PUT') {
         $where = array('id_coment'=>$_GET['ID'], 'status'=>'N', 'para'=>$control);
         $data = array('status'=>'V');
         $num = $db->update($data, $where);

         $result = array('afectados'=>$num);
         header("HTTP/1.1 200 OK");
         echo json_encode($result);
     } elseif ($_SERVER['REQUEST_METHOD']=='DELETE') {
         $where = array('id_coment'=>$_GET['ID'], 'status'=>'N', 'de'=>$control);
         $res = $db->delete($where);

         $result = array('eliminado'=>$res);
         header("HTTP/1.1 200 OK");
         echo json_encode($result);
     } else {
         header("HTTP/1.1 400 Bad Request");
     }
 } else {
     header("HTTP/1.1 401 Unauthorized");
 }
