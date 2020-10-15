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
    <a href="#" title="Calendario Académico" target="_blank">
      <img class="imgBand" src="{{ asset('images/banderas/calendario_icono.png') }}" alt="Calendario Académico">
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
  <a class="navbar-brand" href="{{route('inicio')}}">
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
                <a class="text-black dropdown-item" href="https://www.cdhidalgo.tecnm.mx/servicios-escolares/servicios.php">Servicios</a>
              </li>
              <li>
                 <a class="text-black dropdown-item" href="https://www.cdhidalgo.tecnm.mx/servicios-escolares/inscripcion-reinscripcion.php">Inscripción/Reinscripción</a>
              </li>
              <li>
                <a class="text-black dropdown-item" href="https://www.cdhidalgo.tecnm.mx/servicios-escolares/proximos-egresar.php">Próximos a Egresar</a>
              </li>
              <li>
                <a class="text-black dropdown-item" href="{{route('servicios_escolares.titulos_cedulas')}}">Títulos y Cédulas</a>
              </li>
              <li>
                <a class="text-black dropdown-item" href="https://www.cdhidalgo.tecnm.mx/servicios-escolares/alumnos-traslados.php">Alumnos de traslado</a>
              </li>
              <li>
                <a class="text-black dropdown-item" href="https://www.cdhidalgo.tecnm.mx/becas/becas.php">Becas</a>
              </li>
           </ul>
          </li>
          <a class="   dropdown-item" href="https://elibro.net/es/lc/biblioitsch/inicio">Biblioteca Virtual</a>
          <a class="   dropdown-item" href="http://www.itsch.edu.mx:8080/sicenet/">Calificaciones SICENET</a>
          <a class="   dropdown-item" href="http://www.cdhidalgo.tecnm.mx/alumnos/prorrogas">Prorrogas</a>
          <a class="   dropdown-item" href="http://www.cdhidalgo.tecnm.mx/Caracterizacion/alumno/index.php">Encuestas Aspirantes</a>
          <a class="   dropdown-item" href="http://www.cdhidalgo.tecnm.mx/apps/evalua_tutor/index.php">Evaluación al tutor</a>
          <a class="   dropdown-item" href="http://www.cdhidalgo.tecnm.mx:8081/">Créditos</a>
          <a class="   dropdown-item"  href="http://www.cdhidalgo.tecnm.mx/encuestasitsch/index.php">Encuesta de servicio</a>
          <a class="   dropdown-item" href="http://www.cdhidalgo.tecnm.mx:8082/ServicioSocial/ServicioSocialAlumnos/index.php">Servicio Social</a>
          <a class="   dropdown-item"  href="http://www.cdhidalgo.tecnm.mx:8082/Constans9_1/inicio.php">Sistema de eventos</a>
          <a class="   dropdown-item" href="http://www.cdhidalgo.tecnm.mx/apps/reciboe2/index.html">Recibos electrónicos</a>
        </ul>
      </li>

      <li class="nav-item dropdown  ml-auto">
          <a class="nav-link active dropdown-toggle" href="#" id="navbardffrtyuirop" data-toggle="dropdown">
              Académicos
          </a>

        <div class="dropdown-menu">

                <a class="dropdown-item" href="http://www.itsch.edu.mx:8080/sgcv3">Sistema Digital de información (SIDI)</a>
                <a class="dropdown-item" href="https://bit.ly/3b04YFD">Sistema de control escolar (SICE)</a>
        </div>

      </li>


      <li class="nav-item dropdown  ml-auto">
        <a class="nav-link active dropdown-toggle"href="#" id="navbardro567p" data-toggle="dropdown">
          Egresados/Empleadores
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="https://docs.google.com/forms/d/e/1FAIpQLSf6vB2zpwjLKVX4GdQnrpHLiLQWzcKo3u6J0v_DOYEgryZMig/viewform">Seguimiento a egresados</a>
            <a class="dropdown-item" href="">Encuesta de Empleadores</a>
        </div>
      </li>


      <li class="nav-item dropdown  ml-auto">
          <a class="nav-link active dropdown-toggle"href="#" id="navbarfgdgdrop" data-toggle="dropdown">
          Normativos y Lineamientos
          </a>
          <ul class="dropdown-menu">
            <a class="dropdown-item"  href="{{route('normativos.calidad')}}">Calidad</a>
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
                  <a class="dropdown-item"href="{{route('normativos.plan2010')}}">Lineamientos plan 2010 </a>
                </li>
                <li>
                   <a class="dropdown-item"href="{{route('normativos.plan2015')}}">Lineamiento Plan 2015 </a>
                </li>

              </ul>
            </li>


            <a class="dropdown-item"href="{{route('normativos.rippa')}}">RIPPA</a>
            <a class="dropdown-item"href="https://cdhidalgo.tecnm.mx/instituto/investigacion/investigacion1">Investigación </a>
            <a class="dropdown-item"href="https://cdhidalgo.tecnm.mx/calidad/reglamento">Reglamento Alumnos</a>
            <a class="dropdown-item"href="https://cdhidalgo.tecnm.mx/calidad/reglamento_int">Reglamento Interno</a>
            <a class="dropdown-item"href="https://cdhidalgo.tecnm.mx/calidad/evaluacion_docente">Evaluacion Docente</a>
            <a class="dropdown-item"href="https://cdhidalgo.tecnm.mx/calidad/proceso_seleccion">Proceso de selección de Alumnos</a>
            <a class="dropdown-item"href="https://cdhidalgo.tecnm.mx/calidad/organizacional">Manual de organización</a>
            <a class="dropdown-item"href="https://cdhidalgo.tecnm.mx/calidad/procedimientos">Manual de procedimientos</a>
            <a class="dropdown-item"href="{{route('normativos.piid')}}">PIID 2013-2018</a>
            <a class="dropdown-item"href="https://cdhidalgo.tecnm.mx/planeacion/proexoe">ProExOE</a>
            <a class="dropdown-item" href="https://cdhidalgo.tecnm.mx/indicadores.php"> Indicadores  </a>
          </ul>
      </li>


      <li class="nav-item dropdown  ml-auto">
        <a class="nav-link active dropdown-toggle" href="#" id="navbasdasdasardrop" data-toggle="dropdown">
          Transparecia
        </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="https://bit.ly/3dgQbYx">INAI </a>
            <a class="dropdown-item" href="https://bit.ly/2W2zhap">Transparencia y acceso a la información pública</a>
            <a class="dropdown-item" href="https://bit.ly/2KVOXps">Aviso de privacidad </a>
            <a class="dropdown-item"href="https://cdhidalgo.tecnm.mx/transparencia/acceso_transparencia">Estados Financieros </a>
          </div>
      </li>
      <a href="https://moodle.cdhidalgo.tecnm.mx/" class="mood"><img src="{{ asset('images/moodle.png') }}" alt='Moodle' title='Clases en linea ITSCH' class='img-fluid rounded'/></a>
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
          <a class="dropdown-item"  href="{{route('oferta.sistemas')}}">Ingeniería en Sistemas Computacionales</a>
            <a class="dropdown-item"  href="{{route('oferta.tics')}}">Ingeniería en  Tecnologías de la Información</a>
            <a class="dropdown-item"  href="{{route('oferta.industrial')}}">Ingeniería  Industrial</a>
          <a class="dropdown-item"  href="{{route('oferta.mecatronica')}}">Ingeniería en  Mecatrónica</a>
            <a class="dropdown-item"  href="{{route('oferta.gestion')}}">Ingeniería en  Gestión Empresarial</a>
          <a class="dropdown-item"  href="{{route('oferta.bioquimica')}}">Ingeniería en  Bioquímica</a>
            <a class="dropdown-item"  href="{{route('oferta.nano')}}">Ingeniería en Nanotecnologia</a>
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
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/ingles-para-secundaria.php">Ingles para Secundaria</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/ingles-para-adultos.php">Ingles para Adultos</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/cursoConversacion.php">Curso de conversación</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/cursoToefl.php">Curso de preparación para la certificación (TOEFL)</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/traduccionDocumentos.php">Traducción de documentos</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/acreditacion-de-ingles.php">Examen de acreditación</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/acreditacion2013.php">Alumnos inscritos plan 2013 y anteriores</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/acreditacion2014.php">Alumnos inscritos plan 2014 en adelante</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/becasingles.php">Becas de Idiomas</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/informacion.php">Información General</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="https://www.cdhidalgo.tecnm.mx/idiomas/Avisos.php">Avisos</a>
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
              <a class="dropdown-item" href="{{route('vinculacion.servcio-social')}}">Servicio Social</a>
              <a class="dropdown-item" href="{{route('vinculacion.residencias')}}">Residencias Profesionales</a>
              <a class="dropdown-item" href="{{route('vinculacion.banco_de_datos')}}">Banco de Proyectos</a>
              <a class="dropdown-item" href="{{route('vinculacion.convenio_colaboracion')}}">Convenio de colaboración</a>
              <a class="dropdown-item" href="{{route('vinculacion.convenios')}}">  Convenios</a>

              <a class="dropdown-item" href="{{route('vinculacion.cultura_deporte')}}">Cultura y deportes</a>

              <a class="dropdown-item" href="{{route('vinculacion.informacion')}}">Información</a>

          </div>
      </li>




      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbadasdadrdrop" data-toggle="dropdown">
            Investigación
        </a>
        <div class="dropdown-menu">
            <a class="text-black dropdown-item" href="{{ asset('documents/content/investigacion/bio.pdf') }}"> Bioquímica</a>
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
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <section>
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
