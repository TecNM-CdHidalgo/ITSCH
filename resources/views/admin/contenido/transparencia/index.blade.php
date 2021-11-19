@extends('layouts.plant_admin')

@section('contenido')
    <div class="row">
        <div class="col-sm-2">
            <h4>Transparencia</h4>
        </div>
        <div class="col-sm-5">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Periodo</span>
                </div>
                <select name="periodo" id="periodo" class="form-control">
                    <option value="">Selecciona un periodo</option>
                </select>
                <div class="input-group-append">
                    <a href="" class="btn btn-primary">Buscar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-5" style="text-align: right">
            <form action="{{ route('transparencia.create') }}" method="get">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Agregar periodo</span>
                    </div>
                    <input type="text" class="form-control" name="periodo" required placeholder="FECHA DE CORTE, Ej: 02 DE SEPTIEMBRE 2021">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre del documento</th>
                    <th>Descargar</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
