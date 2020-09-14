<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplo de nueva página para GOB.mx</title>


    <!-- CSS -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <link href="encabezado_menu.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>


</head>

<body>


	<div class="container">

		<ol class="breadcrumb">
			<li><a href="../index">Inicio</a></li>
            <li class="active">Vinculación</li>
			<li class="active">Bolsa de Trabajo</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-md-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">Bolsa de Trabajo:</h1>
				</header>
				
                <!-- contenido bruto dinamico-->
           <p><span class="thumbnail pull-left col-md-5" style="margin: 5px 30px 20px 0"><a target="_blank" href="http://itsch.trabajando.com.mx​"><img src="bolsa_trabajo.jpg"></a></span><strong>BOLSA DE TRABAJO</strong><br>Si estás buscando empleo y te gustaría formar parte de nuestro equipo de trabajo esta es tu oportunidad. En esta sección también podrás encontrar trabajo en otras empresas lo cual te permitirá seleccionar entre un gran número de opciones que tenemos para ti.<br>  
					<a class=" contenido pull-right" target="_blank" href="http:///itsch.trabajando.com.mx">Leer más</a>
                    <div class="clearfix"></div>
					<hr>
                </p>
                
            </article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<?php include_once '../dibujaSide.php'; dibujarSide('../'); ?>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->


    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

</body>
</html>