@extends('layouts.plant_admin')

@section('contenido')
    <h3>Buzón</h3>
    <p>Panel de administracion del buzón de felicitaciones, quejas y sugerencias</p>
    <a href="{{ route('buzon.show') }}" class="btn btn-success btn-sm" title="Ir a bandeja de entrada"><i class='fas fa-backspace' style='font-size:14px'></i></a>
    <hr>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <p><b>Nombre:</b>{{ $msj->nombre }}</p>
            <p><b>Correo:</b>{{ $msj->correo }}</p>
            <p><b>Fecha:</b>{{ $msj->created_at }}</p>
            <p><b>Tipo:</b>{{ $msj->tipo }}</p>
            <h4>Mensaje</h4>
            <p>{{ $msj->mensaje }}</p>
        </div>
        <div class="col-sm-2"></div>
    </div>

@endsection
