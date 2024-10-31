@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases
@endsection

@section('contenido')
    @section('ruta', 'Institución | Pases')
    <a href="{{ route('pases.create') }}" class="btn btn-success" title="Agregar pase"><i class="fas fa-id-badge"></i></a>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <select name="area" id="area" class="form-control">
                    <option value="0">Seleccione un área</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>)
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <select name="departamento" id="departamento" class="form-control">
                    <option value="0">Seleccione un departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>)
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <a href="#" class="btn btn-primary">Buscar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Pases</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title
                        ">Pases</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>

                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection
