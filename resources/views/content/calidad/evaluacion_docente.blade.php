<?php
$conexion = new mysqli("localhost", "root", "W3b_L1nux", "tecnm");
$consulta = "SELECT   * FROM profesores ORDER BY nombre_empleado ASC";
$resultado = $conexion->query($consulta);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> TecNM - Campus Ciudad Hidalgo </title>


    <!-- CSS -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">

    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Contenido -->
    <main class="page">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h2> Procedimeinto de evaluacion docente </h2>
                </div>
                <div class="card-body">
                    <a type="button" class="btn btn-primary"
                        href="{{asset('documents/content/calidad/Procedimiento_evaluacion_docente.pdf')}}" data-toogle="tooltip" title="documento para descargar" download target="_blank">
                        <i class='fas fa-download' style='font-size:20px'></i>
                    </a>
                </div>
            </div>
            <div class="media">
                <img src="downloads20/slide.jpg"> <img class="img-fluid" alt="Responsive image">
            </div>

            <div class="panel-group ficha-collapse" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-parent="#accordion" data-toggle="collapse" href="#panel-01" aria-expanded="true" aria-controls="panel-01">
                                Resultados Febrero-Agosto 2020
                            </a>
                        </h4>
                        <button type="button" class="collpase-button collapsed" data-parent="#accordion" data-toggle="collapse" href="#panel-01"></button>
                    </div>
                    <div class="panel-collapse collapse in" id="panel-01">
                        <div class="panel-body">




                            <table class="table" cellspacing="10" cellpadding="10">


                                <tr>

                                    <td>ID</td>
                                    <td>Nombre del Docente</td>
                                    <td>Resultados</td>

                                </tr>
                                <?php while ($fila = $resultado->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $fila["rfc"]  ?></td>
                                        <td><?php echo $fila["nombre_empleado"];
                                            echo " ";
                                            echo  $fila["apellidos_empleado"] ?></td>
                                        <td> <a href="<?php echo $fila["downloadlink"] ?>"> <button class="btn btn-primary" type="button">
                                                    <span class="glyphicon glyphicon-download"></span>

                                                </button></a></td>
                                    <?php } ?>
                                    </tr>


                            </table>


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>

    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

</body>

</html>