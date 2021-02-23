@extends('layouts.plant_admin')

@section('titulo')
    Noticias | Vista Previa
@endsection
@section('contenido')
    <div style="max-width: 100%; margin:auto;">
        @php
            function convertDate($date){
                $days = ['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                $current_date = explode(' ',$date);
                $tk_date = explode('-',$current_date[0]);
                $year = (int)$tk_date[0];
                $month =(int)$tk_date[1];
                $day = (int)$tk_date[2];
                return $day." ".$days[$month]." del ".$year;
            }
            if((new \Jenssegers\Agent\Agent())->isMobile()){
                $max_height = "400px";
            }else{
                $max_height = "600px";
            }
        @endphp
        @if ((new \Jenssegers\Agent\Agent())->isMobile())
            <h2 style="margin: 0px 0px 0px; font-family: avenir-light, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 3.2rem; text-align: center; color: black; font-size:xx-large;" >{{ $articulo->titulo }}<br></h2>
        @else
            <h2 style="margin: 0px 0px 0px; font-family: avenir-light, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 3.2rem; text-align: center; color: black;" >{{ $articulo->titulo }}<br></h2>
        @endif
        <br>
        <div style=" max-height:{{ $max_height }}; max-width:100%;">
            <img src="{{ asset( '/storage/noticias/imagenes/'.$articulo->imagen) }}" alt="" style="display:block; max-width:100%; max-height:{{ $max_height }}">
        </div>
        <br>
        <div>
            <p>{{ convertDate($articulo->created_at) }}</p>
            @php
                echo $articulo->contenido;
            @endphp
        </div>
        <div class="row">
            <div class="col">
                @foreach($archivos as $ar)
                    <a target="_blank" data-toggle="tooltip" title="{{$ar->nom_archivo}}" download href="{{ asset( '/storage/noticias/archivos/'.$ar->nom_archivo) }}"><img width="150px"height="170px" src="{{ asset( '/images/file.png') }}" alt="Archivos"> </a>
                @endforeach
            </div>
        </div>
        <div style="padding: 100px;"></div>
    </div>
    @section('js')
        <script>
            document.getElementById('section-articulos').className += " default-text-color"
        </script>
    @endsection
@endsection
