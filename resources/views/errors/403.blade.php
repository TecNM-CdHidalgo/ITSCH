@extends('layouts.plant_admin')
@section('titulo','Error 403')
@section('contenido')
    @section('ruta','Acceso Denegado')
<div class="container text-center">
    <h1 class="text-danger">403</h1>
    <h3>Acceso Denegado</h3>
    <p>No tienes permisos para acceder a esta sección.</p>
    <p>Para acceder solicita permisos al administrador del sistema.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">Regresar al Inicio</a>
</div>
<br>
<br>
@endsection
