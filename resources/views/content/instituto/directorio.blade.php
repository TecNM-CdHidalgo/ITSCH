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
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Mtro. José Trinidad Lara López - Director General</div>
							<div class="contacto">Correo: <a href="direccion_general@cdhidalgo.tecnm.mx">direccion_general@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 102</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Mtra. Veronica Durán Martinez - Directora de planeación y Vinvulación</div>
							<div class="contacto">Correo: <a href="direccion_planeacion@cdhidalgo.tecnm.mx">direccion_planeacion@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 121</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto"> Mtro. Juan José Maldonado García - Director Académico</div>
							<div class="contacto">Correo: <a href="direccion_academica@cdhidalgo.tecnm.mx">direccion_academica@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 106</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Isc. Oscar Delgado Camacho - Subdirector academico.</div>
							<div class="contacto">Correo: <a href="subdireccion_academica@cdhidalgo.tecnm.mx">subdireccion_academica@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 128</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">ING. Ricardo Antonio Moreno Ruiz - Subdirector de planeación</div>
							<div class="contacto">Correo: <a href="subdireccion_planeacion@cdhidalgo.tecnm.mx">subdireccion_planeacion@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 119</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">CP. Vianeth Camacho García - (Encargada) Subdirección de Administración y Finanzas</div>
							<div class="contacto">Correo: <a href="subdireccion_administracion@cdhidalgo.tecnm.mx">subdireccion_administracion@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 112</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">MTRA. Emma Yesenia Rivera Ruiz - (Encargada) Subdirección de Gestión Tecnológica y Vinculación</div>
							<div class="contacto">Correo: <a href="subdireccion_vinculacion@cdhidalgo.tecnm.mx">subdireccion_vinculacion@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 174</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Dr. Mauricio Nahuam Chavez Aviles - Subdirector de Investigación y Posgrado</div>
							<div class="contacto">Correo: <a href="investigacion_posgrado@cdhidalgo.tecnm.mx">investigacion_posgrado@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 105</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Ing. Natanael Vargas Pimentel - Jefe de la División de Ingeniería Industrial</div>
							<div class="contacto">Correo: <a href="industrial@cdhidalgo.tecnm.mx">industrial@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 133</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Isc. José Iraic Alcántar Alcántar - Jefe de la División de Ingeniería en Sistemas Computacionales</div>
							<div class="contacto">Correo: <a href="sistemas@cdhidalgo.tecnm.mx">sistemas@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 129</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">MC. Guillermo Capistrano Zúñiga Neria - Jefe de la División de Ingeniería Mecatrónica</div>
							<div class="contacto">Correo: <a href="mecatronica@cdhidalgo.tecnm.mx">mecatronica@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 134</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">MC. Lizeth Yazmin Soria Leal - Jefa de la División de Ingeniería Bioquímica</div>
							<div class="contacto">Correo: <a href="bioquimica@cdhidalgo.tecnm.mx">bioquimica@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 108</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">MTI.Armando López Hernández - Jefe de la División de Ingeniería en Tecnologías de la Información y Comunicaciones</div>
							<div class="contacto">Correo: <a href="tics@cdhidalgo.tecnm.mx">tics@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 109</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">C.P. Nancy Pérez Reyes - Jefa de la División de Ingeniería en Gestión Empresarial</div>
							<div class="contacto">Correo: <a href="gestion_empresarial@cdhidalgo.tecnm.mx">gestion_empresarial@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 130</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Dr. Ernesto Rodríguez Andrade - Jefe de la División de Ingeniería en Nanotecnología</div>
							<div class="contacto">Correo: <a href="nanotecnologia@cdhidalgo.tecnm.mx">nanotecnologia@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 150</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">C. Alejandra Gutiérrez Bolaños - (Encargada) Departamento de Planeación, Programación y Presupuesto</div>
							<div class="contacto">Correo: <a href="programacion_presupuesto@cdhidalgo.tecnm.mx">programacion_presupuesto@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 120</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Arq. Luis Emmanuel Garfias Tello - Jefe del departamento de Estadística, Evaluación y Calidad</div>
							<div class="contacto">Correo: <a href="estadistica_evaluacion@cdhidalgo.tecnm.mx">estadistica_evaluacion@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 118</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Ing. Daniel Aguilar Espino - Departamento de Servicios Escolares</div>
							<div class="contacto">Correo: <a href="servicios_escolares@cdhidalgo.tecnm.mx">estservicios_escolares@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 153</div>
						</div>
					</div>					
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">LCF. Maria Elena Patiño Martinez - Departamento de Contabilidad y Recursos Financieros</div>
							<div class="contacto">Correo: <a href="contabilidad_recursos@cdhidalgo.tecnm.mx">contabilidad_recursos@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 114</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">C. Claudia Leyva Altamirano - Departamento de Recursos Humanos</div>
							<div class="contacto">Correo: <a href="recursos_humanos@cdhidalgo.tecnm.mx">recursos_humanos@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 115</div>
						</div>
					</div>	
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto"> Ing. Alejandro Romero Estrada - Departamento de Recursos Materiales y Servicios</div>
							<div class="contacto">Correo: <a href="recursos_materiales@cdhidalgo.tecnm.mx">recursos_materiales@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 116</div>
						</div>
					</div>					
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto"> IQ. Walter Ivan Cortéz Cruz - Departamento de Investigación y Ciencias Básicas</div>
							<div class="contacto">Correo: <a href="invest_ciencias_basicas@cdhidalgo.tecnm.mx">invest_ciencias_basicas@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 159</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">MTRA. Gabriela Medina Peña - Departamento de Desarrollo Académico y Educación Continua</div>
							<div class="contacto">Correo: <a href="desarrollo_academico@cdhidalgo.tecnm.mx">desarrollo_academico@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 110</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/userf.jpg')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">LPE. Maria de Lourdes Sánchez Mora - Departamento de Tutorías y Servicios Psicopedagógicos</div>
							<div class="contacto">Correo: <a href="tutorias@cdhidalgo.tecnm.mx">tutorias@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 156</div>
						</div>
					</div>					
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">LMV. Leopoldo Maldonado Sandoval - Departamento de Comunicación y Vinculación</div>
							<div class="contacto">Correo: <a href="com_vinculacion@cdhidalgo.tecnm.mx">com_vinculacion@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 175</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">Tec. David Aguilar Espino - Departamento de Extensión Educativa</div>
							<div class="contacto">Correo: <a href="ext_educativa@cdhidalgo.tecnm.mx">ext_educativa@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 179</div>
						</div>
					</div>
					<div class="persona">
						<img src="{{asset('images/user.png')}}" alt="Foto de persona">
						<div class="info">
							<div class="nombre-puesto">C. Héctor Edmundo Isidro García - Departamento de Centro de Negocios</div>
							<div class="contacto">Correo: <a href="centro_negocios@cdhidalgo.tecnm.mx">centro_negocios@cdhidalgo.tecnm.mx</a>  | (786) 1549000 ext. 180</div>
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
