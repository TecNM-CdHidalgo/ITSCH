<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet"href="{{ asset('css/font_style.css') }}">
        <link rel="stylesheet"href="{{ asset('bootstrap/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet"href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet"href="{{ asset('css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet"href="{{ asset('css/style.css') }}">
        <link rel="shortcut icon"href="{{ asset('images/itsch.jpg') }}" style="filter:invert(1)">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
        <!-- Incluye Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Incluye chartjs-plugin-datalabels -->
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


        {{-- Linea para agregar el editor CKeditor a la pagina para editar texto --}}
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

        {{-- Links datatables --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/cr-1.5.5/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sl-1.3.3/datatables.min.css"/>

        {{-- Uso de multiselect jquery --}}
        <link href="{{ asset('css/msel/multi-select.css') }}" media="screen" rel="stylesheet" type="text/css">

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
        @yield('css')
        @yield('head')
        <title>
        @yield('titulo')
        </title>
    </head>

    <body>
        <header class="site-navbar js-sticky-header">
            <div class="container">
                <div class="row align-items-center ">
                    <a href="{{ route('inicio') }}">
                        <img src="{{ asset('images/itsch.jpg') }}" class="rounded" alt="Logo" width="40"> &nbsp &nbsp
                    </a>
                    <div class="site-logo">
                        <a href="{{ route('inicio') }}" class="text-black"><span class="text-primary">ITSCH</span></a>
                    </div>
                    <nav class="navbar navbar-expand-lg  ml-auto" >
                        <button class="navbar-toggler ml-auto" style="position:initial" type="button" data-toggle="collapse" data-target="#navbarNav">
                            <i class='fas fa-align-justify'></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a href="{{ route('home') }}" class="nav-link">
                                        <i class='fas fa-home'></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home') }}#home-section" class="nav-link">Inicio</a>
                                </li>
                                @if (Auth::User()->tipo == "administrador" || Auth::User()->tipo == "editor"|| Auth::User()->tipo == "vinculacion")
                                    <li class="nav-item">
                                        <a href="{{route('admin.noticias.inicio')}}" class="nav-link"><p id="section-articulos" class="no-margins">Noticias</p></a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ route('institucion.indexPases') }}" class="nav-link" ><p id="section-galeria" class="no-margins">Institución</p></a>
                                </li>
                                @if (Auth::User()->tipo != "editor")
                                    <li class="nav-item dropdown">
                                        <a  href="#" class="nav-link dropdown-toggle" id="dropdownMenu3" data-toggle="dropdown"  aria-expanded="false">Administración</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                            @if (Auth::User()->tipo == "administrador" || Auth::User()->tipo == "academica"|| Auth::User()->tipo == "vinculacion")
                                                <p style="color:orange;">&nbsp Vinculación</p>
                                                <hr>
                                                <a class="dropdown-item" href="{{route('admin.contenido.banco.index')}}">Banco de proyectos</a>
                                                <a class="dropdown-item" href="{{ route('convenios.inicio') }}">Convenios</a>
                                            @endif
                                            @if (Auth::User()->tipo == "administrador" || Auth::User()->tipo == "academica")
                                                <p style="color:orange;">&nbsp Académica</p>
                                                <hr>
                                                <a class="dropdown-item" href="{{ route('carreras.index') }}">Contenido carreras</a>
                                            @endif
                                            @if (Auth::User()->tipo == "administrador" || Auth::User()->tipo == "planeacion")
                                                <p style="color:orange;">&nbsp Administración</p>
                                                <hr>
                                                <a class="dropdown-item" href="{{ route('periodos.inicio') }}">Transparencia</a>
                                            @endif
                                            @if (Auth::User()->tipo == "administrador")
                                                <a href="{{route('admin.usuarios.inicio')}}" class="dropdown-item">Usuarios</a>
                                                <a href="https://analytics.google.com/analytics/web/?authuser=2#/p307020062/realtime/overview?params=_u..nav%3Dmaui" class="dropdown-item" title="Estadisticos"><i class='far fa-chart-bar' style='font-size:14px'></i> Analitics</a>
                                            @endif
                                            @if (Auth::User()->tipo == "administrador" || Auth::User()->tipo == "biblioteca"|| Auth::User()->tipo == "planeacion")
                                                <p style="color:orange;">&nbsp Biblioteca</p>
                                                <hr>
                                                <a class="dropdown-item" href="{{ route('biblioteca.estadisticos') }}">Estadisticos</a>
                                            @endif
                                        </div>
                                    </li>
                                    @if (Auth::User()->tipo == "administrador" || Auth::User()->tipo == "academica" || Auth::User()->tipo == "planeacion")
                                        <li>
                                            <a href="{{ route('buzon.show') }}" class="nav-link" title="Buzón"><i class='far fa-envelope-open'></i>&nbsp Buzón</a>
                                        </li>
                                    @endif

                                @endif
                                <li>
                                    <a class="nav-link">| Usuario:</a>
                                </li>
                                <li class="av-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown"  aria-expanded="false">
                                        {{ explode(" ",Auth::User()->name)[0] }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a href="{{route('admin.usuarios.mi_perfil')}}" class="dropdown-item">Mi perfil</a>
                                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        {{--Sirve para que se vea bien en dispositivos moviles--}}
        @if ((new \Jenssegers\Agent\Agent())->isMobile())
            <div style="width: 100%;" >
                <div id="app">
                    @include('sweetalert::alert')
                </div>
                <br><br>
                <h4><b>Panel de administración | @yield('ruta','Default')</b></h4>
                <hr>
                @yield('contenido','Default')
            </div>
        @else
            <div style="width: 80%; margin:0 auto 0 auto;" >
                <div id="app">
                    @include('sweetalert::alert')
                </div>
                <br><br>
                <h4><b>Panel de administración | @yield('ruta','Default')</b></h4>
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
                Copyright &copy; <b id="anio"></b> Avenida Ingeníero Carlos Rojas Gutierrez #2120| Ciudad Hidalgo Michoacán</i>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                </div>
                </div>

            </div>
            </div>
        </footer>

        <!--Incluir jQuery  -->
        <script src="{{ asset('jQuery/jquery-3.6.0.min.js') }}"></script>

        {{-- Scripts para dataTable --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script  src="https://cdn.datatables.net/v/ju/dt-1.11.3/af-2.3.7/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/cr-1.5.5/fc-4.0.1/fh-3.2.0/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/datatables.min.js" defer></script>

        {{-- Uso de multiselect jquery --}}
        <script src="{{ asset('js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/aos.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js" integrity="sha512-C1zvdb9R55RAkl6xCLTPt+Wmcz6s+ccOvcr6G57lbm8M2fbgn2SUjUJbQ13fEyjuLViwe97uJvwa1EUf4F1Akw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/owl.carousel.js') }}"></script>
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function(event){
            $('.mdshide').delay(2000).fadeOut(300);
            })

            $(document).ready(function(){
                var anio = new Date().getFullYear();
                $("#anio").text(anio);
            });
        </script>
        @yield('js')
    </body>
</html>
