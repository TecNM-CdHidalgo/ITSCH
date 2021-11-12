@extends('layouts.plant_admin')

@section('contenido')
    <h5> <a href="{{ route('transparencia.index') }}">Transparencia</a>/Agregar documentos</h5>
    <h6>Periodo: {{ $periodo }}</h6>
    <form action="{{ route('transparencia.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="file" name="arch" id="arch" required class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </form>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre del documento</th>
                    <th>Descargar</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>

@endsection
