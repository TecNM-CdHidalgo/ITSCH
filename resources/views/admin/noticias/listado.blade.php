@extends('template')

@section('titulo')
    Articulos | Vista Previa
@endsection
@section('head')
    <style>

        img {
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
        }
    </style>    
@endsection
@section('contenido')
    @foreach ($articles as $articulo)    
        <h2 style="font-size: 35px; text-align: center;">{{ $articulo->titulo }}</h2>
        <br>
        <div style="background-color: black;">
            <img src="{{ asset( '/storage/articulos_imagenes/'.$articulo->imagen) }}" alt="">
        </div>
        <br>
        <div style="height: 300px !important; overflow:hidden;">
            @php
                echo $articulo->contenido;
            @endphp
        </div>
        <hr>
        <div style="padding: 50px;"></div>
    @endforeach
    <div style="padding: 100px;"></div>
    {{ $articles->links() }}
@endsection