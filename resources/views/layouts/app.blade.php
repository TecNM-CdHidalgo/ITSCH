<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Metas plantilla administracion-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/font_style.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/itsch.jpg') }}" style="filter:invert(1)">


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="TecNM">
        <meta name="description" content="Página del Tecnológico Nacional de México/Campus Ciudad Hidalgo Michoacán">

        <title>TECNM/CDHIDALGO</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <!-- Styles -->
        {{--CSS Propios--}}
        <link href="{{asset('cssPropios/estilos.css')}}" rel="stylesheet">

        {{--Script para modificar el tamaño de la letra de la pagina--}}
        <script>
            var fontSize = 1;

            // funcion para aumentar la fuente
            function zoomIn() {
                fontSize += 0.1;
                document.body.style.fontSize = fontSize + "em";
            }

            // funcion para disminuir la fuente
            function zoomOut() {
                fontSize -= 0.1;
                document.body.style.fontSize = fontSize + "em";
            }

            //funcion que resetea la fuente de la pagina
            function zoomReset()
            {
                document.body.style.fontSize = ".9em";
            }

            //funcion de contraste de la pagina
            function contraste()
            {   var x = document.getElementsByTagName("a");
                var i;
                var col= document.body.style.backgroundColor;
                col=col.toString(16);
                if(col=="")
                {
                    document.body.style.backgroundColor='#000';
                    for (i = 0; i < x.length; i++) {
                      x[i].style.color = "red";
                    }
                }
                else
                {
                    document.body.style.backgroundColor='';
                    for (i = 0; i < x.length; i++) {
                      x[i].style.color = "";
                    }
                }
            }
        </script>

        {{--Icono de la pagina--}}

    </head>
    {{--<body style="height:2000px">--}}
    <body style="overflow-x: hidden;">

        {{--Menu de gobierno--}}
        @include('layouts.menu_gob')

        {{--Plantilla--}}
        @include('layouts.plantilla')

        {{-- Seccion para los js --}}
        @yield('js')



        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v8.0" nonce="aHshxGf4"></script>

        <!--Incluir jQuery  -->
        <script src="{{ asset('jQuery/jquery-3.4.1.js') }}"></script>

        {{-- OCC Mundial --}}
        <script id = "bolsa-widget"
          type = "text/javascript"
          charset = "UTF-8"
          src = "https://jobdiscovery-widget-occ.occ.com.mx/button-bundle.js"
          key = "1b8v79xAa8DKqYCoM8k5ADxVrrs">
        </script>

        <script>
            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
            });

            // Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function (e) {
              e.stopPropagation();
            });

            // make it as accordion for smaller screens
            $('.menu-padre').on('click', function(e){
              if ($(window).width() > 599) return;
              e.preventDefault();
              e.stopPropagation();

              if($(this).next('.submenu').length){
                  $(this).next('.submenu').toggle();
              }

              $('.dropdown').on('hide.bs.dropdown', function () {
                $(this).find('.submenu').hide();
              });
            });

            //Cierra los mensajes emergentes
            $(document).ready(function(event){
            $('.mdshide').delay(2000).fadeOut(300);
            })
        </script>

    </body>

</html>
