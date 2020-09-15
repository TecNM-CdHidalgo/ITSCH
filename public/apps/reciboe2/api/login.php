<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';

if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['user']) && isset($_GET['pass'])) {
        $nombre = "";
        $alumnos = new DataBase('alumnos');
        $externos = new DataBase('externos');

        $hash = $alumnos->encrypt($_GET['pass']);

        $res = $alumnos->read(array('no_control'=>$_GET['user'], 'pass'=>$hash));

        $res2 = $externos->read(array('curp'=>$_GET['user'], 'pass'=>$hash));

        if ($res || $res2) {
            if ($res) {
                $nombre = $res['nombre'].' '.$res['a_paterno'].' '.$res['a_materno'];
                $datos = array('control'=>$res['no_control'], 'nombre'=> $nombre, 'tipo'=>'alumno');
            } else {
                $nombre = $res2['nombre'].' '.$res2['a_paterno'].' '.$res2['a_materno'];
                $datos = array('control'=>$res2['curp'], 'nombre'=> $nombre, 'tipo'=>'externo');
            }
            
            $token = JWT::create($datos, Config::SECRET_KEY_JWT);
            $auth = "true";
        } else {
            $token = "Error de usuario o password";
            $auth = "false";
        }
        
        $result = array('auth'=>$auth, 'token'=>$token, 'nombre'=>$nombre);
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
    } elseif (isset($_GET['admin']) && isset($_GET['pass'])) {
        $usuarios = new DataBase('usuarios');
        $hash = sha1($_GET['pass']);
        $where = array('user'=>$_GET['admin'], 'pass'=>$hash);
   
        $res = $usuarios->read($where);
        if ($res) {
            $datos = array('user'=>$res['user'], 'nombre'=>$res['nombre'], 'tipo'=>'admin');

            $token = JWT::create($datos, Config::SECRET_KEY_JWT);
            $auth = "true";
        } else {
            $token = "Error de usuario o password";
            $auth = "false";
        }
        $result = array('auth'=>$auth, 'token'=>$token, 'nombre'=>$res['nombre']);
        header("HTTP/1.1 200 OK");
        echo json_encode($result);
    } else {
        header("HTTP/1.1 401 Bad Request");
    }
} elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    $alumnos = new DataBase('alumnos');
    $externos = new DataBase('externos');

    $r1 = $alumnos->read(array('no_control'=>$_POST['curp']));
    $r2 = $externos->read(array('curp'=>$_POST['curp']));

    if ($r1 || $r2) {
        $result = array('ID'=>'existe');
    } else {
        $data = array(
            'curp'=>$_POST['curp'],
            'pass'=>$hash = $externos->encrypt($_POST['pass']),
            'nombre'=>$_POST['nombre'],
            'a_paterno'=>$_POST['apaterno'],
            'a_materno'=>$_POST['amaterno']
        );
        //print_r($data);
        $id = $externos->create($data);

        $result = array('ID'=>$id);
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($result);
} else {
    header("HTTP/1.1 400 Bad Request");
}
