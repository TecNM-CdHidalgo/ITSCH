@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<header class="page-header" style="text-align: center;">
			<h1 class="page-title">Servicio de Caja:</h1>
		</header>
		<hr class="red">
        <!-- contenido bruto dinamico-->
        <p style="text-align: center;"><embed class="img-fluid" src="{{asset('images/content/departamentos/servicio-caja.jpg')}}" alt="Caja" width="80%"> </p>


        <h3 class="text-center">Importante</h3>
        <p>El Instituto Tecnológico Superior de Ciudad Hidalgo no maneja efectivo por lo que los pagos para cualquier tramite se realiza a traves del Sistema de <a href="https://recibos.cdhidalgo.tecnm.mx/login">Recibos electrónicos</a></p>
        <h3 class="text-center">Importante Aviso</h3><p align="center"><strong>Evita realizar depositos</strong></p>
        <p align="center"><strong>A partir del 1 de septiembre de 2024, primero se debe generar la orden de pago, la cual tiene una linea de captura o numero de referencia,
           para posteriormente, ir a pagar al banco o pagar en linea con tarjeta de debito</strong></p>
           <hr class="red">
           <p>Las tarifas actualizadas al año en curso las puedes descargar desde el link:</p>

        <p align="center">
        	<a href="{{asset('documents/content/departamentos/caja/Tabulador2026.pdf')}}"target="_blank"><i style="font-size:2em; padding:2px;" class="fa fa-cloud-download"></i>&nbsp;<strong>Tarifas de Servicios de Caja</strong>
        	</a>
        </p>

        <hr>

        <h6>También podras solicitar la orden de pago en CAJA</h6>

        <br>
        <ol>
        <li>En caso de tener prorrogas de pago, conservar  copia de las mismas para entregarlas  con la ficha de depósito al momento del cambio en caja para su respaldo.
        </li>
        <br>
        <li>Es importante  conservar  los recibos blancos por lo menos un año y/o de preferencia durante toda la carrera, para cualquier aclaración.
        </li>
        <br>
        <li>Por motivos de seguridad no es posible recibir dinero en efectivo en el área de caja.
        </li>
        <br>
        <li>Es de suma importancia que no se realicen depositos bancarios directos.
        </li>
        <br>
        <li>En caso de realizar pagos erróneos,  tramitar devoluciones y  cambios donde se requiera cancelar algún  recibo únicamente se deberá de realizar dentro del mismo mes, (como mínimo 5 días antes de que termine el mes).
        </li>
        <br>
        <li>En caso de necesitar comprobante fiscal CFDI (Factura). Se debe solicitar en el área de caja al momento de pago del recibo, proporcionando los datos de facturación.
        </li>
        </ol>
        <br>



       <ul>
            <li> <strong>“No se elaborarán facturas de meses anteriores.”</strong></li> <br>
	        <li>Dudas al correo <strong><a href="mailto:caja@itsch.edu.mx">caja@itsch.edu.mx</a></strong></li> <br>
	        <li>Tambien al correo <strong><a href="mailto:contabilidad_recursos@itsch.edu.mx">contabilidad_recursos@itsch.edu.mx</a></strong></li>
    	</ul>

	</div>
	<div class="col-sm-1"></div>
</div>

@endsection
