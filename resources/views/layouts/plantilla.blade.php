{{--Encabezado principal--}}
<br><br><br>
<div class="row encab">
  {{--Imagenes de gobierno--}}
  <div class="col-sm-7">
    <div class="row encab">
      <div class="col-sm-1">

      </div>
      <div class="col-sm-4">
        <a href="https://www.gob.mx" target="_blank" id="placa_1">
          <img class="imgGobi" src="{{ asset('images/placa_gob1.png') }}" alt="Gobierno de México">
        </a>
      </div>
      <div class="col-sm-4">
        <a href="https://www.gob.mx/sep" target="_blank" id="placa_2">
          <img class="imgGobi" src="{{ asset('images/placa_edu.png') }}" alt="Educación">
        </a>
      </div>
      <div class="col-sm-3">
        <a href="https://www.tecnm.mx"  id="placa_3">
          <img class="imgGobi2" src="{{ asset('images/placa_tecnm.jpg') }}" alt="TecNM">
        </a>
      </div>
    </div>
  </div>

  {{--Banderas--}}
  <div class="col-sm-5">
    <a href="https://globalpage-prod.webex.com/join?surl=https%3A%2F%2Fsignin.webex.com%2Fcollabs%2F%23%2Fmeetings%2Fjoinbynumber%3FTrackID%3D%26hbxref%3D%26goid%3Dattend-meeting" title="Microsoft Teams" target="_blank">
      <img class="imgBand" src="{{ asset('images/banderas/microsoft_teams.png') }}" alt="MT">
    </a>
    <a href="https://login.microsoftonline.com/?whr=tecnm.mx" title="Correo Institucional" target="_blank">
      <img class="imgBand" src="{{ asset('images/banderas/correo_icono.png') }}" alt="Buzón">
    </a>
    <a href="{{ asset('documents/content/documentos_apoyo/calendario.pdf') }}" title="Calendario Académico" target="_blank">
      <img class="imgBand" src="{{ asset('images/banderas/calendario_icono.png') }}" alt="Calendario Académico">
    </a>
    <a href="{{ asset('documents/content/documentos_apoyo/horarios.pdf') }}" title="Horarios de Grupos" target="_blank">
      <img class="imgBand" src="{{ asset('images/banderas/horario.png') }}" alt="Horarios">
    </a>
    <a href='?vista=&a#googtrans(es|zh-CN)'>
      <img class="imgBand" src="{{ asset('images/banderas/china_icono.png') }}" title='Mandarín'
        alt='Idioma Mandarín'>
    </a>
    <a href='?vista=&b#googtrans(es|en)'>
      <img class="imgBand" src="{{ asset('images/banderas/usa_icono.png') }}" title='Inglés'
        alt='Idioma Inglés'>
    </a>
    <a href='?vista=&c#googtrans(es|fr)'>
      <img class="imgBand" src="{{ asset('images/banderas/francia_icono.png') }}" title='Francés'
        alt='Idioma Francés'>
    </a>
    <a href='?vista=&d#googtrans(es|es)' class='mr-3'>
      <img class="imgBand" src="{{ asset('images/banderas/mexico_icono.png') }}" title='Español'
        alt='Idioma Español'>
    </a>

    <img class="imgBand" title="Accesibilidad" src="{{ asset('images/banderas/ojo_icono.png') }}" alt="Débil Visual" />
    {{--Elementos de accesibilidad--}}
    <a title="Contraste" onclick="contraste()" style="color:#1B396A"><i class='fas fa-adjust' style='font-size:20px'></i></a>
    <a title="Aumentar letra" style="color:#1B396A" onclick="zoomIn()">A+</a>
    <a title="Disminuir letra"  style="color:#1B396A" onclick="zoomOut()">A-</a>
    <a title="Restablecer tamaño"  style="color:#1B396A" onclick="zoomReset()">A </a>
  </div>

</div>




{{--Menu blanco--}}
<nav class="navbar navbar-expand-sm navbar-light bg-white" id="menuBlan">
 {{--Logo--}}
  <a class="navbar-brand" href="{{route('inicio')}}" id="logo">
    <img src="{{ asset('images/itsch.jpg') }}" alt='Logo' title='ITSCH' class='img-fluid rounded' style="width:30px; height: 35px;" />
  </a>

  <button class="navbar-toggler  ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavBlanco" >

    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="collapsibleNavBlanco">
    <ul class="navbar-nav  ml-auto bg-white">
      <li class="nav-item dropdown  ml-auto">

        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Alumnos
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item dropdown-toggle menu-padre" href="#"> Servicios Escolares</a>
            <ul class="submenu dropdown-menu">
              <li>
                <a class="text-black dropdown-item" href="{{route('servicios_escolares.servicios')}}">Servicios</a>
              </li>

              <li>
                <a class="text-black dropdown-item" href="{{route('servicios_escolares.titulos_cedulas')}}">Títulos y Cédulas</a>
              </li>
              <li>
                <a class="text-black dropdown-item" href="{{route('servicios_escolares.alumnos-traslados')}}">Alumnos de traslado</a>
              </li>
              <li>
                <a class="text-black dropdown-item" href="{{route('servicios_escolares.constancias')}}">Solicitud de documentos oficiales</a>
              </li>

           </ul>
          </li>
          <a class="dropdown-item" href="https://elibro.net/es/lc/biblioitsch/inicio">Biblioteca Virtual</a>
          <a class="dropdown-item" href="http://www.itsch.edu.mx:8080/sicenet/">Calificaciones SICENET</a>
          <a class="dropdown-item"  href="https://cdhidalgo.tecnm.mx:8081/">Créditos</a>
          <a class="dropdown-item"  href="https://cdhidalgo.tecnm.mx:8082/#!/constancia">Constancias ITSCH</a>
          <a class="dropdown-item"  href="https://www.cdhidalgo.tecnm.mx:8087/">Evaluación al tutor</a>
          <a class="dropdown-item"  href="{{ route('alumnos.encuestasservicio') }}">Encuestas de servicios</a>
          <a class="dropdown-item"  href="http://cdhidalgo.tecnm.mx:8089/sed/">Evaluacion Docente</a>
          <a class="dropdown-item"  href="https://www.cdhidalgo.tecnm.mx:8084">Recibos electrónicos</a>
          <a class="dropdown-item"  href="{{route('vinculacion.servcio-social')}}">Servicio Social</a>
          <a class="dropdown-item"  href="{{ route('alumnos.prorrogas') }}">Solicitud de prorroga</a>

        </ul>
      </li>

        <li class="nav-item dropdown  ml-auto">
            <a class="nav-link active dropdown-toggle" href="#" id="navbardffrtyuirop" data-toggle="dropdown">
                Institución
            </a>

            <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://www.itsch.edu.mx:8080/sgcv3">Sistema Digital de información (SIDI)</a>
                    <a class="dropdown-item" href="https://bit.ly/3b04YFD">Sistema de control escolar (SICE)</a>
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx:8086/Usuario.php">Encuesta de clima laboral</a>
            </div>
        </li>


      <li class="nav-item dropdown  ml-auto">
          <a class="nav-link active dropdown-toggle"href="#" id="navbarfgdgdrop" data-toggle="dropdown">
          Normativos y Lineamientos
          </a>
          <ul class="dropdown-menu">
            <a class="dropdown-item"  href="{{route('normativos.calidad')}}">Calidad</a>
            <a class="dropdown-item"  href="{{route('normativos.etica')}}">Subcomité de ética</a>
            <a class="dropdown-item"  href="{{route('normativos.igualdad')}}">Igualdad</a>


            <li>
              <a class="dropdown-item dropdown-toggle menu-padre" href="#">Lineamientos</a>
              <ul class="submenu dropdown-menu">
                <li>
                  <a class="dropdown-item"href="{{route('normativos.ambiental')}}">Lineamientos Ambientales</a>
                </li>
                <li>
                  <a class="dropdown-item"href="{{route('normativos.plan2004')}}">Lineamientos plan 2004 </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{route('normativos.plan2010')}}">Lineamientos plan 2010 </a>
                </li>
                <li>
                   <a class="dropdown-item" href="{{route('normativos.plan2015')}}">Lineamiento Plan 2015 </a>
                </li>

              </ul>
            </li>


            <a class="dropdown-item" href="{{route('normativos.rippa')}}">RIPPA</a>
            <a class="dropdown-item" href="{{route('investigacion.investigacion')}}">Investigación </a>
            <a class="dropdown-item" href="{{route('calidad.reglamento')}}">Reglamento Alumnos</a>
            <a class="dropdown-item" href="{{route('calidad.reglamento_int')}}">Reglamento Interno</a>
            <a class="dropdown-item" href="{{route('calidad.resultados_evaluacion')}}">Evaluacion Docente</a>
            <a class="dropdown-item" href="{{route('calidad.proceso_seleccion')}}">Proceso de selección de Alumnos</a>
            <a class="dropdown-item" href="{{route('calidad.organizacional')}}">Manual de organización</a>
            <a class="dropdown-item" href="{{route('calidad.procedimientos')}}">Manual de procedimientos</a>
            <a class="dropdown-item" href="{{route('normativos.piid')}}">PIID 2013-2018</a>
          </ul>
      </li>


       <li class="nav-item dropdown  ml-auto">
        <a class="nav-link active dropdown-toggle"href="#" id="navbardro567p" data-toggle="dropdown">
          Egresados/Empleadores
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('seguimiento.egresados') }}">Seguimiento a egresados</a>
            <a class="dropdown-item" href="{{route('seguimiento.empleadores')}}">Encuesta de Empleadores</a>
        </div>
      </li>


      <li class="nav-item dropdown  ml-auto">
        <a class="nav-link active dropdown-toggle" href="#" id="navbasdasdasardrop" data-toggle="dropdown">
          Transparecia
        </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="https://bit.ly/3dgQbYx">INAI </a>
            <a class="dropdown-item" href="https://bit.ly/2W2zhap">Transparencia y acceso a la información pública</a>
            <a class="dropdown-item" href="{{route('transparencia.aviso_privacidad')}}">Aviso de privacidad </a>
            <a class="dropdown-item"href="{{ route('periodo.index') }}">Estados Financieros </a>
          </div>
      </li>
      <a href="https://cdhidalgo.tecnm.mx:8083/" class="mood"><img src="{{ asset('images/moodle.png') }}" alt='Moodle' title='Clases en linea ITSCH' class='img-fluid rounded'/></a>
    </ul>
  </div>
</nav>



{{--Menu azul--}}
<nav class="navbar navbar-expand-sm navbar-dark" style='background-color: #1B396A;' id="menuAzul">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mx-auto">
      <li>
        <a href="{{route('inicio')}}" class="nav-link active">
          <i class='fas fa-home' style='font-size:20px'></i>
        </a>
      </li>
      <li class="nav-item dropdown" >
        <a class="nav-link active dropdown-toggle" href="#" id="navbddsardrop" data-toggle="dropdown">
          Instituto
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('instituto.nuestro_tec')}}">Nuestro Tec </a>
            <a class="dropdown-item" href="{{route('instituto.directorio')}}">Directorio</a>
            <a class="dropdown-item" href="{{route('instituto.ubicacion')}}">Ubicación</a>
            <a class="dropdown-item" href="{{asset('documents/content/programa_capacitacion/programacapacitacion2020.pdf')}}">Programa de capacitación</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle"  href="#" id="navbdadasdardrop" data-toggle="dropdown">
          Oferta educativa
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item"  href="{{ route('oferta.index',1) }}">Ingenierías</a>
            <a class="dropdown-item"  href="{{ route('oferta.index',2) }}">Posgrados</a>
        </div>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbadasdadrdrop" data-toggle="dropdown">
              Otros Departamentos
          </a>
          <ul class="dropdown-menu" style='background-color: #1B396A;'>
              <a class="dropdown-item" href="{{route('departamentos.caja')}}">Servicio de Caja</a>
              <a class="dropdown-item" href="{{route('servicio_medico.medico')}}">Servicio Médico</a>

              <li><a class="dropdown-item dropdown-toggle menu-padre" href="#"> Lenguas Extranjeras</a>
                <ul class="submenu dropdown-menu" style='background-color: #1B396A;'>
                  <li>
                    <a class="dropdown-item" href="{{route('cle.informacion')}}">Información General</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('cle.ingles-para-secundaria')}}">Ingles para Secundaria</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('cle.ingles-para-adultos')}}">Ingles para Adultos</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('cle.cursoConversacion')}}">Curso de conversación</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('cle.cursoToefl')}}">Curso de preparación para la certificación (TOEFL)</a>
                  </li>
                  <li>

                    <a class="dropdown-item" href="{{route('cle.traduccionDocumentos')}}">Traducción de documentos</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="{{route('cle.acreditacion2013')}}">Alumnos inscritos plan 2013 y anteriores</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('cle.acreditacion2014')}}">Alumnos inscritos plan 2014 en adelante</a>
                  </li>
               </ul>
          </li>
          </ul>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarddsadrop" data-toggle="dropdown">
              Vinculación
          </a>
          <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('vinculacion.informacion')}}">Información</a>
              <a class="dropdown-item" href="{{route('vinculacion.servcio-social')}}">Servicio Social</a>
              <a class="dropdown-item" href="{{route('vinculacion.residencias')}}">Residencias Profesionales</a>
              <a class="dropdown-item" href="{{route('vinculacion.banco_de_datos')}}">Banco de Proyectos</a>
              <a class="dropdown-item" href="{{route('vinculacion.convenios')}}">  Convenios</a>
              <a class="dropdown-item" href="{{route('vinculacion.cultura_deporte')}}">Cultura y deportes</a>
          </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbadasdadrdrop" data-toggle="dropdown">
            Investigación
        </a>
        <div class="dropdown-menu">
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/bio.pdf') }}"> Bioquímica</a>
            <a class="text-black dropdown-item"  href="{{route('investigacion.pitsc')}}"> Contraloría Social</a>
            <a class="text-black dropdown-item"  href="{{route('tutorias.tutorias')}}"> Tutorias</a>
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/geste.pdf') }}"> Gestión Empresarial</a>
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/ind.pdf') }}"> Industrial</a>
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/mec.pdf') }}"> Mecatrónica</a>
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/nan.pdf') }}"> Nanotecnología</a>
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/siscom.pdf') }}"> Sistemas Computacionales</a>
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/lineas_de_inv_19.php') }}">  Lineas de investigación ISC </a>
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/tics.pdf') }}">  Tecnologías de la Información y Comunicaciones </a>
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/lies_18.pdf') }}">  Investigación Educativa </a>
            <a class="text-black dropdown-item" href="https://bit.ly/2SLwiRx"> Convocatorias CONACYT</a>
            <a class="text-black dropdown-item" href="https://bit.ly/2xLy8e2"> Convocatorias externas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('contenido.buzon.index') }}" >Buzón</a>
      </li>
    </ul>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{ route('login') }}" class="dropdown-item">
                      Panel de administración
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons" style="font-size:15px"></i>
                        {{ __('Salir') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
  </div>
</nav>


{{--Contenido de la pagina--}}
<div class="row">
  <div class="col-sm-12">
    @yield('carousel')
  </div>
</div>
<div id="app"></div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <section>
            {{-- Incluye menus emergentes --}}
            @include('layouts.flash-message')
            {{-- Contenido --}}
            @yield('content')
        </section>
    </div>
    <div class="col-sm-1"></div>
</div>


{{--Footer--}}
<footer class="main-footer">
    <div class="list-info">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{ asset('images/logoheader.svg') }}" style="max-width: 90%;" alt="">
          </div>
          <div class="col-sm-3">
            <h5>Enlaces</h5>
            <ul>
              <li>
                <a href="https://participa.gob.mx" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Participa</a>
              </li>
              <li>
                <a href="https://www.gob.mx/publicaciones" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Publicaciones Oficiales</a>
              </li>
              <li>
                <a href="http://www.ordenjuridico.gob.mx" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Marco Jurídico</a>
              </li>
              <li>
                <a href="https://consultapublicamx.inai.org.mx/vut-web/" target="_blank" rel="noopener" title="Enlace abre en ventana nueva">Plataforma Nacional de Transparencia</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h5>¿Qué es gob.mx?</h5>
            <p>Es el portal único de trámites, información y participación ciudadana. <a href="https://www.gob.mx/que-es-gobmx">Leer más</a></p>
            <ul>
              <li>
                <a href="https://datos.gob.mx">Portal de datos abiertos</a>
              </li>
              <li>
                <a href="https://www.gob.mx/accesibilidad">Declaración de accesibilidad</a>
              </li>
              <li>
                <a href="https://www.gob.mx/privacidadintegral">Aviso de privacidad integral</a>
              </li>
              <li>
                <a href="https://www.gob.mx/privacidadsimplificado">Aviso de privacidad simplificado</a>
              </li>
              <li>
                <a href="https://www.gob.mx/terminos">Términos y Condiciones</a>
              </li>
              <li>
                <a href="https://www.gob.mx/terminos#medidas-seguridad-informacion">Política de seguridad</a>
              </li>
              <li>
                <a href="https://www.gob.mx/sitemap">Mapa de sitio</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h5>
              <a href="https://www.gob.mx/tramites/ficha/presentacion-de-quejas-y-denuncias-en-la-sfp/SFP54">Denuncia contra servidores públicos</a>
            </h5>
            <h5>Síguenos en</h5>
            <ul class="list-inline">
              <li class="list-inline-item">
                <a class="fab fa-facebook-f" target="_blank" rel="noopener" title="Enlace abre en ventana nueva" href="https://www.facebook.com/gobmexico" aria-label="Facebook de presidencia"></a>
              </li>
              <li class="list-inline-item">
                <a class="fab fa-twitter" target="_blank" rel="noopener" title="Enlace abre en ventana nueva" aria-label="Twitter de presidencia"></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid footer-pleca">
      <div class="row">
        <div class="col">
          <br>
          <br>
        </div>
      </div>
    </div>

</footer>
