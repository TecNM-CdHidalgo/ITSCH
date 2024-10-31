@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases
@endsection

@section('contenido')
    @section('ruta', 'Institución | Organigrama')
    <div class="container">
        <a href="{{ route('organigrama.create') }}" class="btn btn-success" title="Agregar puesto"><i class="fas fa-sitemap"></i></a>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Organigrama</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre del puesto</th>
                                    <th>Tipo de puesto</th>
                                    <th>Nivel del puesto</th>
                                    <th>Titular</th>
                                </tr>
                                <tbody>

                                </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
