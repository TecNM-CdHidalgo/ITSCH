@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases | Estadisticos
@endsection

@section('contenido')
    @section('ruta', 'Institución | Pases | Estadisticos')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label for="area">Filtro por área</label>
                <select name="area" id="area" class="form-control">
                    <option value="">Seleccione un área</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">

            </div>
        </div>
    </div>
@endsection