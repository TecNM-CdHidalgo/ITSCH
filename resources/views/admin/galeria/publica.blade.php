<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ciudad del ni&ntilde;o</title>
    <meta charset="utf-8">
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
    <link rel="stylesheet"href="{{ asset('css/aos.css') }}"">
    <link rel="stylesheet"href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"href="{{ asset('SmartPhoto-master/css/smartphoto.min.css') }}">
    <link rel="shortcut icon"href="{{ asset('images/icons/donation.png') }}" style="filter:invert(1)">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    @php
      $informacion = App\Information::all()[0];
    @endphp
  <div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center position-relative">

            <div class="site-logo">
              <a href="/" class="text-black"><span class="text-primary">Ciudad del Ni&ntilde;o</a>
            </div>

              <nav class="site-navigation text-center ml-auto" role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="{{ route('inicio') }}#home-section" class="nav-link">Inicio</a></li>
                  <li><a href="{{ route('inicio') }}#about-section" class="nav-link">Acerca de</a></li>
                  @if ($articles)
                    <li><a href="{{ route('inicio') }}#blog-section" class="nav-link">Publicaciones</a></li>
                  @endif
                  <li><a href="{{ route('inicio') }}#gallery-section" class="nav-link"><p style="margin:0;" id="section-gallery">Galeria</p></a></li>
                  <li><a href="{{ route('inicio') }}#help-section" class="nav-link">¿Deseas ayudar?</a></li>
                  @if ($testimonials)
                    <li><a href="{{ route('inicio') }}#testimonials-section" class="nav-link">Testimonios</a></li>
                  @endif
                  <li><a href="{{ route('inicio') }}#contact-section" class="nav-link">Contacto</a></li>
                  @if (Auth::Guard('web')->check())
                    <li class="dropdown">
                      <a href="#" class="nav-link " id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <p id="section-username" class="no-margins">{{ explode(" ",Auth::User()->name)[0] }}</p>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <h6 class="dropdown-header">Admin</h6>
                        <a href="{{ route('admin.usuarios.mi_perfil') }}" class="dropdown-item">Mi perfil</a>
                        @if (Auth::User()->tipo == "Administrador")
                            <a href="{{ route('admin.usuarios.inicio') }}" class="dropdown-item">Usuarios</a>
                        @endif
                        <a href="{{ route('admin.articulos.inicio') }}" class="dropdown-item">Publicaciones</a>
                        <a href="{{ route('admin.galeria.inicio') }}" class="dropdown-item">Galeria</a>
                        <a href="{{ route('admin.carousel.inicio') }}" class="dropdown-item">Carousel</a>
                        <a href="{{ route('admin.testimonios.inicio') }}" class="dropdown-item">Testimonios</a>
                        <a href="{{ route('admin.informacion.inicio') }}" class="dropdown-item">Información</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout')}}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </div>
                    </li>
                  @else
                    <li><a href="{{ route('login')}}" class="nav-link">Admin</a></li>
                  @endif
                </ul>
              </nav>
          <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>

    </header>

    <div style="width:{{ ((new \Jenssegers\Agent\Agent())->isMobile() ? "90%": "80%") }}; margin-left:auto; margin-right:auto; margin-top: 50px;"  id="gallery-section">
        <style>
            .gallery-image{
                width: 100%;
                height: auto;
            }
        </style>
        <div>
            <h2>{{ $gallery->titulo }}</h2>
            <p style="font-size:large;">{{ $gallery->descripcion }}</p>
        </div>
        <div class="gallery row">
            @php
                $max_width = "300px";
                if((new Jenssegers\Agent\Agent())->isMobile()){
                    $max_width = "600px";
                }
            @endphp
            @foreach ($images as $image)
                <div class="col-md-3 mb-3 col-sm-4 d-flex align-items-stretch" style="max-height: {{ $max_width }}; overflow:hidden;">
                    <a href="{{ asset('storage/gallery/'.$gallery->id.'/'.$image->nombre) }}" data-gallery="manual" class="js-img-viwer" data-caption="" data-id="id-{{ $image->id }}">
                        <img src="{{ asset('storage/gallery/'.$gallery->id.'/'.$image->nombre) }}" alt="mds-images" class="gallery-image" data-number="{{ $image->id }}" id="img-{{ $image->id }}" data-group="group">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="break-floats"></div>
    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8">
                <h2 class="footer-heading mb-4">Somos</h2>
                <p>Una Institución de asistencia privada sin fines de lucro, que se unen con la intención de sumarse como parte de la sociedad al esfuerzo de la tarea asistencial que realiza el país en apoyo de los mexicanos que menos tienen.</p>
              </div>
              <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Secciones</h2>
                <ul class="list-unstyled">
                  <li><a href="#about-section">Acerca de</a></li>
                  <li><a href="#blog-section">Publicaciones</a></li>
                  <li><a href="#gallery-section">Galeria</a></li>
                  <li><a href="#testimonials-section">Testimonios</a></li>
                  <li><a href="#contact-section">Contactanos</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto">
            <h2 class="footer-heading mb-4">Contacto</h2>
            <p >Teléfono: {{ $informacion->telefono }}</p>
            <p >Correo: {{ $informacion->correo_electronico }}</p>
            <a href="https://www.facebook.com/Ciudad-del-ni%C3%B1o-Ciudad-Hidalgo-1776406765814528/" class="smoothscroll pl-0 pr-3">Facebook</a>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> {{ $informacion->direccion }} #{{ $informacion->numero}} | Col. {{ $informacion->colonia}} | C.P. {{ $informacion->codigo_postal }} | Ciudad Hidalgo Michoacán</i>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/jquery.sticky.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('SmartPhoto-master/js/smartphoto.min.js') }}"></script>
  <script>
        document.addEventListener('DOMContentLoaded',function(){
            var photo = new SmartPhoto(".js-img-viwer");
            photo.on('close',function(){
                $('.mds-header').css('visibility','visible');
            });
            photo.on('open',function(){
                $('.mds-header').css('visibility','hidden');
            });
        });
        document.getElementById('section-gallery').style.color = "#fd5f00";
    </script>
  </body>
</html>
