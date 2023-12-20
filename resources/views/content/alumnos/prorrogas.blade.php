@extends('layouts.app')

@section('titulo','ITSCH/ALUMNOS/PRORROGAS')


@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h3>Instrucciones</h3>
        <hr>
        <a href="{{ asset('/documents/content/alumnos/GUIA PARA SOLICITAR PRORROGA 2024.pdf') }}"target="blanck" title="Formato" class="btn btn-success"><i class='fas fa-download' style='font-size:14px'></i></a>
        <br>
        <h3>Solicitud de prorrogas</h3>
        <hr>
        <a href="{{ asset('/documents/content/alumnos/solicitud de prorrogas.pdf') }}" target="blanck" title="Formato" class="btn btn-success"><i class='fas fa-download' style='font-size:14px'></i></a>
        <br>
        <br>
        <br>
    </div>
    <div class="col-sm-3"></div>
</div>


@endsection
