@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h5>Nombre del proyecto: {{ $proyecto->proyecto }}</h5>
            <h6>Carrera: {{ $proyecto->carrera }}</h6>
            <h6>Empresa o onstitución: {{ $proyecto->empresa }}</h6>
            <h6>Dirección de la empresa: {{ $proyecto->direccion }}</h6>
            <h6>Tipo de proyecto: {{ $proyecto->tipo }}</h6>
            <h6>Vacantes totales: {{ $proyecto->vacantes }}</h6>
            <h6>Telefono de contacto: {{ $proyecto->telefono }}</h6>
            <h6>Correo: {{ $proyecto->correo }}</h6>
            <h6>Responsable: {{ $proyecto->docente }}</h6>
            <h6>Área de registro: {{ $proyecto->area }}</h6>
            {{-- Si convenio no esta bacio ponemos el convenio al que pertenece --}}
            @if ($convenio != null)
                <h6>Convenio: {{ $convenio->institucion }}</h6>
            @else
                <h6>Convenio: Este proyecto no deriva de ningún convenio</h6>
            @endif
            <h6>Fecha de inicio: {{ $proyecto->inicio }}</h6>
            <h6>Observaciones: {{ $proyecto->observaciones }}</h6>
            <div class="row">
                <div class="col-sm-1">
                    <h6>Status:</h6>
                </div>
                <div class="col-sm-4">
                    @if ($proyecto->status==1)
                        <p class="bg-success text-white">Inicio</p>
                    @elseif ($proyecto->status==2)
                        <p class="bg-warning text-white">En proceso</p>
                    @elseif ($proyecto->status==3)
                        <p class="bg-danger text-white">Terminado</p>
                    @endif
                </div>
            </div>
            <hr>
            <h5>Colaboradores:</h5>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colaboradores as $col)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $col->nombre }}</td>
                            <td>{{ $col->sexo }}</td>
                            <td>{{ $col->tipo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
        </div>
        <div class="col-sm-2"></div>
    </div>
@endsection
