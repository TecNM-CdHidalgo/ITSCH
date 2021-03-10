<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"href="{{ asset('css/font_style.css') }}">
    <link rel="stylesheet"href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet"href="{{ asset('bootstrap/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet"href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet"href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet"href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet"href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet"href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet"href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet"href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet"href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon"href="{{ asset('images/itsch.jpg') }}" style="filter:invert(1)">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <style>
      .no-margins{
        margin:0;
      }
      .default-text-color{
        color: #fd5f00 !important;
      }
      .float-break{
        clear: both;
      }
      .btn-mds-primary{
        background-color: #0275d8;
      }
    </style>
      @yield('head')
    <title>
      @yield('titulo')
    </title>
</head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap"  id="home-section">

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>


  <header class="site-navbar js-sticky-header site-navbar-target mds-header" role="banner">

    <div class="container">
      <div class="row align-items-center position-relative">
          <img src="{{ asset('images/itsch.jpg') }}" class="rounded" alt="Logo" width="40"height="50"> &nbsp &nbsp
          <div class="site-logo">
            <a href="#" class="text-black"><span class="text-primary">ITSCH</a>
          </div>
            <nav class="site-navigation text-center ml-auto" role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li>
                  <a href="{{ route('inicio') }}" class="nav-link">
                    <i class='fas fa-home' style='font-size:16px'></i>
                  </a>
                </li>
                <li>
                  <a href="{{ route('home') }}#home-section" class="nav-link">Inicio</a>
                </li>
                @if (Auth::User()->tipo == "Administrador")
                  <li>
                    <a href="{{route('admin.usuarios.inicio')}}" class="nav-link"><p id="section-usuarios" class="no-margins">Usuarios</p></a>
                  </li>
                @endif
                <li>
                  <a href="{{route('admin.noticias.inicio')}}" class="nav-link"><p id="section-articulos" class="no-margins">Noticias</p></a>
                </li>
                <li>
                  <a href="#" class="nav-link" ><p id="section-galeria" class="no-margins">Galeria</p></a>
                </li>                
                <li class="dropdown">
                  <a  href="#" class="nav-link" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administración</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                    <a class="dropdown-item" href="{{route('admin.contenido.banco.index')}}">Banco de proyectos</a>
                    <a class="dropdown-item" href="{{ route('admin.contenido.carreras.index') }}">Contenido carreras</a>
                  </div>
                </li>
                <li class="dropdown">
                  <a href="#" class="nav-link" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <p id="section-username" class="no-margins">{{ explode(" ",Auth::User()->name)[0] }}</p>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="{{route('admin.usuarios.mi_perfil')}}" class="dropdown-item">Mi perfil</a>
                    <a href="{{ route('logout')}}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </nav>
        <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
      </div>
    </div>
  </header>

  {{--Sirve para que se vea bien en dispositivos moviles--}}
  @if ((new \Jenssegers\Agent\Agent())->isMobile())
      <div style="width: 100%;" >
        <div id="app">
          @include('layouts.flash-message')
        </div>
          <h4><b>Panel de administración</b></h4>
          <hr>
          @yield('contenido','Default')
      </div>
    @else
      <div style="width: 80%; margin:0 auto 0 auto;" >
        <div id="app">
          @include('layouts.flash-message')
        </div>
          <h4><b>Panel de administración</b></h4>
          <hr>
          @yield('contenido','Default')
      </div>
  @endif

  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-8">
              <h2 class="footer-heading mb-4">Somos</h2>
              <p>Una Institución de educacion publica gratiuta de nivel licenciatura y pertenecemos al Tecnologico Nacional de México.</p>
            </div>
            <div class="col-md-4 ml-auto">
              <h2 class="footer-heading mb-4">Secciones</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('inicio') }}#about-section">Acerca de</a></li>
                <li><a href="{{ route('inicio') }}#blog-section">Publicaciones</a></li>
                <li><a href="{{ route('inicio') }}#gallery-section">Galeria</a></li>               
                <li><a href="{{ route('inicio') }}#contact-section">Contactanos</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 ml-auto">
          <h2 class="footer-heading mb-4">Contacto</h2>
          <p >Teléfono: 7861549000 ext. 129</p>
          <p >Correo: sistemas@cdhidalgo.tecnm.mx</p>
          <a href="https://www.facebook.com/ITSCH-Ingenier%C3%ADa-en-Sistemas-792403974304028" class="smoothscroll pl-0 pr-3">Facebook</a>
        </div>

      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <div class="border-top pt-5">
          <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> Avenida x| Ciudad Hidalgo Michoacán</i>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          </div>
        </div>

      </div>
    </div>
  </footer>
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script>
    $(document).ready(function(event){
      $('.mdshide').delay(2000).fadeOut(300);
    })
  </script>
  @yield('js')

</body>
</html>
