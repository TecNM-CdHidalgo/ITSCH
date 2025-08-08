@extends('layouts.app')

@section('title', 'Directorio')

@section('css')
<style>
	.directorio {
		display: flex;
		flex-direction: column;
		width: 100%;
		max-width: 1000px;
		margin: auto;
		gap: 10px;
	}

	.persona {
		display: flex;
		align-items: center;
		border: 1px solid #ccc;
		padding: 10px;
		border-radius: 8px;
		background-color: #f9f9f9;
	}

	.persona img {
		width: 90px;
		height: 90px;
		border-radius: 50%;
		object-fit: cover;
		margin-right: 15px;
	}

	.info {
		display: flex;
		flex-direction: column;
		text-align: left;
	}

	.nombre-puesto {
		font-weight: bold;
		font-size: 20px;
		margin-bottom: 5px;
	}

	.contacto {
		font-size: 16px;
		color: #555;
	}

	/* Estilos para hacerlo responsive */
	@media (max-width: 768px) {
		.persona {
			flex-direction: column;
			align-items: flex-start;
		}

		.persona img {
			margin-right: 0;
			margin-bottom: 10px;
		}

		.nombre-puesto {
			font-size: 17px;
		}

		.contacto {
			font-size: 13px;
		}

		#organigrama {
			max-width: 100%;
			height: auto;
		}
	}
</style>
@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>Directorio</h1>
			<p>En esta sección se muestra el directorio del Instituto Tecnológico Superior de Ciudad Hidalgo.</p>
			<p>Para mayor información, favor de comunicarse al teléfono (786) 1549000</p>
			<div class="directorio">
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Mtro. José Trinidad Lara López - Dirección General</div>
						<div class="contacto">Correo: <a href="direccion_general@cdhidalgo.tecnm.mx">direccion_general@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 101</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Mtro. Juan José Maldonado García - Dirección Académica</div>
						<div class="contacto">Correo: <a href="direccion_academica@cdhidalgo.tecnm.mx">direccion_academica@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 202</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Mtra. Verónica Durán Martínez - Dirección de Planeación y Vinculación</div>
						<div class="contacto">Correo: <a href="direccion_planeacion@cdhidalgo.tecnm.mx">direccion_planeacion@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 203</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Isc. Oscar Delgado Camacho - Subdirección Académica</div>
						<div class="contacto">Correo: <a href="subdireccion_academica@cdhidalgo.tecnm.mx">subdireccion_academica@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 204</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Dr. Mauricio Nahuam Chávez Avilés - Subdirección de Investigación y Posgrado</div>
						<div class="contacto">Correo: <a href="investigacion_posgrado@cdhidalgo.tecnm.mx">investigacion_posgrado@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 205</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Ing. Ricardo Antonio Moreno Ruiz - Subdirección de Planeación</div>
						<div class="contacto">Correo: <a href="subdireccion_planeacion@cdhidalgo.tecnm.mx">subdireccion_planeacion@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 206</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Mtra. Emma Yesenia Rivera Ruiz - Subdirección de Gestión Tecnológica y Vinculación</div>
						<div class="contacto">Correo: <a href="subdireccion_vinculacion@cdhidalgo.tecnm.mx">subdireccion_vinculacion@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 207</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">C.P. Vianeth Camacho García - Subdirección de Administración y Finanzas</div>
						<div class="contacto">Correo: <a href="subdireccion_administracion@cdhidalgo.tecnm.mx">subdireccion_administracion@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 208</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Ing. Natanael Vargas Pimentel - División de Ingeniería Industrial</div>
						<div class="contacto">Correo: <a href="industrial@cdhidalgo.tecnm.mx">industrial@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 209</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Isc. José Iraic Alcántar Alcántar - División de Ingeniería en Sistemas Computacionales</div>
						<div class="contacto">Correo: <a href="sistemas@cdhidalgo.tecnm.mx">sistemas@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 210</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">MTRO. Gabriel Casarrubias Guerrero - División de Ingeniería Mecatrónica</div>
						<div class="contacto">Correo: <a href="mecatronica@cdhidalgo.tecnm.mx">mecatronica@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 211</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">MTRO. Salvador Orozco Montes - División de Ingeniería Bioquímica</div>
						<div class="contacto">Correo: <a href="bioquimica@cdhidalgo.tecnm.mx">bioquimica@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 212</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">MTI. Armando López Hernández - División de Ingeniería en Tecnologías de la Información y Comunicaciones</div>
						<div class="contacto">Correo: <a href="tics@cdhidalgo.tecnm.mx">tics@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 213</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">C.P. Nancy Pérez Reyes - División de Ingeniería en Gestión Empresarial</div>
						<div class="contacto">Correo: <a href="gestion_empresarial@cdhidalgo.tecnm.mx">gestion_empresarial@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 214</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Dr. Ernesto Rodríguez Andrade - División de Ingeniería en Nanotecnología</div>
						<div class="contacto">Correo: <a href="nanotecnologia@cdhidalgo.tecnm.mx">nanotecnologia@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 215</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">IQ. Walter Iván Cortés Cruz - Departamento de Investigación y Ciencias Básicas</div>
						<div class="contacto">Correo: <a href="invest_ciencias_basicas@cdhidalgo.tecnm.mx">invest_ciencias_basicas@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 216</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">C. Brenda Nohemí Sánchez Alanis - Departamento de Desarrollo Académico y Educación Continua</div>
						<div class="contacto">Correo: <a href="desarrollo_academico@cdhidalgo.tecnm.mx">desarrollo_academico@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 217</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">LPE. María de Lourdes Sánchez Mora - Departamento de Tutorías y Servicios Psicopedagógicos</div>
						<div class="contacto">Correo: <a href="tutorias@cdhidalgo.tecnm.mx">tutorias@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 218</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">C. Alejandra Gutiérrez Bolaños - Departamento de Planeación, Programación y Presupuesto</div>
						<div class="contacto">Correo: <a href="programacion_presupuesto@cdhidalgo.tecnm.mx">programacion_presupuesto@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 219</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Arq. Luis Emmanuel Garfias Tello - Departamento de Estadística, Evaluación y Calidad</div>
						<div class="contacto">Correo: <a href="estadistica_evaluacion@cdhidalgo.tecnm.mx">estadistica_evaluacion@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 220</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Ing. Miguel Alejandro Correa Becerril - Departamento de Servicios Escolares</div>
						<div class="contacto">Correo: <a href="servicios_escolares@cdhidalgo.tecnm.mx">servicios_escolares@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 221</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">ME. Jaime Alberto Gómez Barrón - Departamento de Comunicación y Vinculación</div>
						<div class="contacto">Correo: <a href="com_vinculacion@cdhidalgo.tecnm.mx">com_vinculacion@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 222</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">ISC. David Aguilar Espino - Departamento de Extensión Educativa</div>
						<div class="contacto">Correo: <a href="ext_educativa@cdhidalgo.tecnm.mx">ext_educativa@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 223</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Ing. Isrrael Gutiérrez Granados - Departamento de Centro de Negocios</div>
						<div class="contacto">Correo: <a href="centro_negocios@cdhidalgo.tecnm.mx">centro_negocios@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 224</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">LCF. María Elena Patiño Martínez - Departamento de Contabilidad y Recursos Financieros</div>
						<div class="contacto">Correo: <a href="contabilidad_recursos@cdhidalgo.tecnm.mx">contabilidad_recursos@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 225</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">Ing. Alejandro Romero Estrada - Departamento de Recursos Materiales y Servicios</div>
						<div class="contacto">Correo: <a href="recursos_materiales@cdhidalgo.tecnm.mx">recursos_materiales@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 226</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">C. Claudia Leyva Altamirano - Departamento de Recursos Humanos</div>
						<div class="contacto">Correo: <a href="recursos_humanos@cdhidalgo.tecnm.mx">recursos_humanos@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 227</div>
					</div>
				</div>
				<div class="persona">
					<img src="{{asset('images/userh.png')}}" alt="Foto de persona">
					<div class="info">
						<div class="nombre-puesto">C. Albino Herrera García - Centro de Lenguas Extranjeras</div>
						<div class="contacto">Correo: <a href="idiomas@cdhidalgo.tecnm.mx">idiomas@cdhidalgo.tecnm.mx</a> | (786) 1549000 ext. 228</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="row text-center">
	<div class="col-md-12">
		<h1>Organigrama</h1>
		<img src="{{asset('images/content/instituto/directorio/organigrama.jpeg')}}" id="organigrama" alt="Organigrama del Instituto Tecnológico Superior de Ciudad Hidalgo">
	</div>
</div>
<br>
<br>
@endsection