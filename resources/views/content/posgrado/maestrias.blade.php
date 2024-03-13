@extends('layouts.app')

@section('descripcion')
    <meta name="description" content="En esta sección encontraremos la documentación necesaria para los alumnos de posgrado">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="{{asset('images/content/posgrados/posgrados.png')}}" alt="Imagen de posgrados">
                <h1>Maestrías</h1>
                <p>En esta sección encontraremos la documentación necesaria para los alumnos de posgrado</p>
                <hr>
                <h2>Documentos para descarga</h2>
                <a href="{{asset('documents/content/posgrados/Formato_Carta compromiso_MAI.docx')}}" download>Carta compromiso</a> <br>
                <a href="{{asset('documents/content/posgrados/PR-01-R02 solicitud inscripción_feb2024.docx')}}" download>Solicitud de inscripción</a>
                <br>
                <br>

            </div>
        </div>
    </div>
@endsection
