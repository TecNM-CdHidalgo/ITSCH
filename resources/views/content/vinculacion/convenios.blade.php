@extends('layouts.app')


@section('content')
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="../index">Inicio</a></li>
            <li class="active">Vinculación</li>
			<li class="active">Convenios</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-md-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">Convenios:</h1>
				</header>
				
                <!-- contenido bruto dinamico-->
                <?php include_once '../dibujaMantenimiento.php'; dibujarCuadro('../'); ?>
                
            </article>
			<!-- /Article -->
			
		

		</div>
	</div>	<!-- /container -->


@endsection