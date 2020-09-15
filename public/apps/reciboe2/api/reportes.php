<?php
require_once 'libs/database.php';
require_once 'libs/jwt.php';

 $headers = apache_request_headers();
 $auth = trim($headers["Authorization"]);

 if (JWT::verify($auth, Config::SECRET_KEY_JWT)==0) {
     $db = new DataBase('recibos');
     $data = JWT::get_data($auth, Config::SECRET_KEY_JWT);
    $tipo = trim($data['tipo']);
    
    if($tipo=='admin'){
     if ($_SERVER['REQUEST_METHOD']=='GET') {
         if (isset($_GET['ID'])) {
             $FI = $_GET['FI'];
             $FF = $_GET['FF'];
            switch ($_GET['ID']) {
                case 1:
                    $sql = "SELECT
                    recibos.id_recibo AS Folio,
                    recibos.fecha AS Fecha,
                    recibos.control AS Control,
                    recibos.nombre AS Nombre,
                    GROUP_CONCAT(recibos_detalle.concepto SEPARATOR '\n') AS Conceptos,
                    Sum(recibos_detalle.importe) AS Totalotal,
                    GROUP_CONCAT(vouchers.referencia SEPARATOR '\n') AS Vouchers,
                    GROUP_CONCAT(vouchers.fecha SEPARATOR '\n') AS 'Fecha voucher'
                    FROM
                    recibos
                    LEFT JOIN recibos_detalle ON recibos_detalle.id_recibo = recibos.id_recibo
                    INNER JOIN referencias ON referencias.id_recibo = recibos.id_recibo
                    INNER JOIN vouchers ON referencias.id_voucher = vouchers.id_voucher
                    WHERE
                    recibos.fecha BETWEEN '$FI' AND '$FF' AND recibos.status='G'
                    GROUP BY
                    recibos.id_recibo";
                    $result = $db->sql_query($sql);
                    break;
                case 2:
                    $sql = "SELECT
                    vouchers.control AS Control,
                    vouchers.referencia AS Folio,
                    vouchers.fecha AS Fecha,
                    vouchers.hora AS Hora,
                    vouchers.monto AS Monto,
                    CASE vouchers.`status` WHEN 'U' THEN 'Utilizado' WHEN 'P' THEN 'Pendiente' WHEN 'V' THEN 'Validado' END AS Status
                    FROM
                    vouchers                    
                    WHERE
                    vouchers.fecha BETWEEN '$FI' AND '$FF'";
                    $result = $db->sql_query($sql);
                    break;
                case 3:
                    $sql = "SELECT
                    recibos_detalle.clave AS Clave,
                    Max(recibos_detalle.concepto) AS Concepto,
                    Sum(recibos_detalle.importe) AS Total
                    FROM
                    recibos_detalle
                    INNER JOIN recibos ON recibos_detalle.id_recibo = recibos.id_recibo
                    WHERE
                    recibos.fecha BETWEEN '$FI' AND '$FF' AND recibos.status='G'
                    GROUP BY
                    recibos_detalle.clave";
                    $result = $db->sql_query($sql);
                    break;
                case 4:
                    $sql = "SELECT
                    recibos.id_recibo AS Folio,
                    recibos.fecha AS Fecha,
                    recibos.control AS Control,
                    recibos.nombre AS Nombre,
                    recibos_detalle.concepto AS Concepto,
                    recibos_detalle.importe AS Importe,
                    vouchers.referencia AS Voucher,
                    vouchers.fecha AS 'Fecha voucher'
                    FROM
                    recibos
                    LEFT JOIN recibos_detalle ON recibos_detalle.id_recibo = recibos.id_recibo
                    INNER JOIN referencias ON referencias.id_recibo = recibos.id_recibo
                    INNER JOIN vouchers ON referencias.id_voucher = vouchers.id_voucher
                    WHERE
                    recibos.fecha BETWEEN '$FI' AND '$FF' AND recibos.status='G'
                    ORDER BY
                    recibos_detalle.clave,
                    recibos.fecha";
                    $result = $db->sql_query($sql);
                    break;
                default:
                    $result = "";
            }

         } else {
            header("HTTP/1.1 204 No Content");
         }
         header("HTTP/1.1 200 OK");
         echo json_encode($result);
     } else {
         header("HTTP/1.1 400 Bad Request");
     }
    }else{
        header("HTTP/1.1 401 Unauthorized");
    }
 } else {
     header("HTTP/1.1 401 Unauthorized");
 }
