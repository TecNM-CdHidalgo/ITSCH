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



        <p>El Instituto Tecnológico Superior de Ciudad Hidalgo no maneja efectivo por lo que los pagos para cualquier tramite se realiza por medio de deposito a la cuenta bancaria:</p>
        <h3 class="text-center">0115142997</h3><p align="center"><strong>A nombre del Instituto Tecnológico Superior de Ciudad Hidalgo en BBVA BANCOMER</strong></p><hr class="red">
        <h3 class="text-center">012470001151429979</h3> <p align="center"><strong>CLABE INTERBANCARIA DE BBVA BANCOMER A NOMBRE DEL INSTITUO TECNOLÓGICO SUPERIOR DE CIUDAD HIDALGO</strong></p>
        <p>Las tarifas actualizadas al año en curso las puedes descargar desde el link:</p>

        <p align="center">
        	<a href="{{asset('documents/content/departamentos/caja/Tarifas_Caja_2021.pdf')}}"target="_blank"><i style="font-size:2em; padding:2px;" class="fa fa-cloud-download"></i>&nbsp;<strong>Tarifas de Servicios de Caja</strong>
        	</a>
        </p>

        <p>Esta información tambien esta disponible desde
        	<a class="contenido" target="_blank" download href="{{asset('documents/content/departamentos/caja/tarifas-cajav7.pdf')}}"> Documentos para Descargar</a> en el apartado de Servicios de caja y lo puedes buscar como <strong>tarifas de servicio de caja</strong>.
        </p><hr class="red">

        <p>Para poder brindarte un mejor servicio de CAJA en el cambio de tu recibo (ficha o vaucher) sigue los siguientes TIPS, de esta manera se agilizara el trámite:</p>

      	<li>1.-Llenar  la ficha de depósito con los siguientes datos:
	        <ul>
	          <li> NOMBRE COMPLETO DEL ALUMNO </li>
	          <li> NO. DE CONTROL (Pueden pedir en el banco se anote como referencia de pago)</li>
	          <li> CONCEPTO DE PAGO (de acuerdo a la tarifa de servicios) </li>
	        </ul>
        </li>
        <br>

        <li>2.-El  depósito que  se realice por cualquier concepto ( de acuerdo a la tarifa de servicios), se puede  cambiar de manera inmediata a caja del ITSCH independientemente de las fechas que manejen otras áreas.
        Se recomienda hacer dicho canje  con anticipación para evitar filas.
        </li>
        <br>
        <li>3.-En caso de tener prorrogas de pago, conservar  copia de las mismas para entregarlas  con la ficha de depósito al momento del cambio en caja para su respaldo.
        </li>
        <br>
        <li>4.-Es importante  conservar  los recibos blancos por lo menos un año y/o de preferencia durante toda la carrera, para cualquier aclaración.
        </li>
        <br>
        <li>5.-Por motivos de seguridad no es posible recibir dinero en efectivo en el área de caja.
        </li>
        <br>
        <li>6.-Es de suma importancia que si se realiza algun depósito a la cuenta del ITSCH durante el año se cambie la ficha por un recibo oficial, de ser posible de inmediato o en el mismo mes, esto con la finalidad de que al término del año no se queden sin cambiar. Puesto que es imposible identificar los depósitos y para el próximo ejercicio por motivos de cierre contable ya no se recibirá  la ficha;  ni es posible rermbolsar el pago.
        </li>
        <br>
        <li>7.-En caso de realizar pagos erróneos,  tramitar devoluciones y  cambios donde se requiera cancelar algún  recibo únicamente se deberá de realizar dentro del mismo mes, (como mínimo 5 días antes de que termine el mes).
        </li>
        <br>
        <li>8.-En caso de necesitar comprobante fiscal CFDI (Factura). Se debe solicitar en el área de caja al momento del canje de la ficha, proporcionando los datos de facturación.
        </li>
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
