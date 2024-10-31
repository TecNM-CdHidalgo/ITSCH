@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases
@endsection

@section('contenido')
    @section('ruta', 'Institución | Organigrama | Agregar puesto')
    <div class="container">
        <a href="{{ route('organigrama.index') }}" class="btn btn-success" title="Regresar a Organigrama"><i class="fas fa-sitemap"></i></a>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Agregar puesto</h4>

@endsection
