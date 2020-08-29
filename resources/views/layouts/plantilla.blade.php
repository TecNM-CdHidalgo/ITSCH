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
          <img loading='lazy' class="imgGobi" src="{{ asset('images/placa_gob1.png') }}" alt="Gobierno de México">
        </a>
      </div>
      <div class="col-sm-4">
        <a href="https://www.gob.mx/sep" target="_blank" id="placa_2">
          <img loading='lazy' class="imgGobi" src="{{ asset('images/placa_edu.png') }}" alt="Educación">
        </a>
      </div>
      <div class="col-sm-3">
        <a href="https://www.tecnm.mx"  id="placa_3">
          <img loading='lazy' class="imgGobi2" src="{{ asset('images/placa_tecnm.jpg') }}" alt="TecNM">
        </a>
      </div>
    </div>    
  </div>

  {{--Banderas--}}
  <div class="col-sm-5">
    <a href="https://globalpage-prod.webex.com/join?surl=https%3A%2F%2Fsignin.webex.com%2Fcollabs%2F%23%2Fmeetings%2Fjoinbynumber%3FTrackID%3D%26hbxref%3D%26goid%3Dattend-meeting" title="Microsoft Teams" target="_blank">
      <img loading='lazy' class="imgBand" src="{{ asset('images/banderas/microsoft_teams.png') }}" alt="MT">
    </a>
    <a href="https://login.microsoftonline.com/?whr=tecnm.mx" title="Correo Institucional" target="_blank">
      <img loading='lazy' class="imgBand" src="{{ asset('images/banderas/correo_icono.png') }}" alt="Buzón">
    </a>
    <a href="#" title="Calendario Académico" target="_blank">
      <img loading='lazy' class="imgBand" src="{{ asset('images/banderas/calendario_icono.png') }}" alt="Calendario Académico">
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

    <img loading='lazy' class="imgBand" title="Accesibilidad" src="{{ asset('images/banderas/ojo_icono.png') }}" alt="Débil Visual" />
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
    <img loading='lazy'  src="{{ asset('images/itsch.jpg') }}" alt='Logo' title='ITSCH' class='img-fluid rounded' style="width:25px; height: 30px;" />
  </a>
         
  <button class="navbar-toggler  ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavBlanco">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavBlanco">
    <ul class="navbar-nav  ml-auto">
      <li class="nav-item dropdown  ml-auto">
        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Alumnos
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>
      <li class="nav-item dropdown  ml-auto">
        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Academicos
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>
      <li class="nav-item dropdown  ml-auto">
        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Egresados
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>  
      <li class="nav-item dropdown  ml-auto">
        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Transparecia
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>
      <li class="nav-item ml-auto">
        <a href="https://cdhidalgo.tecnm.mx:8081/moodle/" class="nav-link active">Moodle</a>
      </li>  
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
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Conócenos
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Oferta educativa
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route('oferta.sistemas')}}">Sistemas Computacionales</a>
          <a class="dropdown-item" href="{{route('oferta.industrial')}}">Ingenieria Industrial</a>
          <a class="dropdown-item" href="#">Ingenieria Mecatrónica</a>
          <a class="dropdown-item" href="{{route('oferta.bioquimica')}}">Ingenieria Bioquímica</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Investigación
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>  
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Vinculación
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
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
            <img src="{{ asset('images/logoheader.svg') }}" style="max-width: 90%;">
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
                <a class="fab fa-twitter" target="_blank" rel="noopener" title="Enlace abre en ventana nueva" href="https://twitter.com/GobiernoMX" aria-label="Twitter de presidencia"></a>
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



