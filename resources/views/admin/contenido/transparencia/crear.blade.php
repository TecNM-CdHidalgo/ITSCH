@extends('layouts.plant_admin')

@section('contenido')
    <h5> <a href="{{ route('transparencia.index') }}">Transparencia</a>/Agregar documentos</h5>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="{{ route('periodo.update') }}" method="get">
                <input type="hidden" name="id" readonly value="{{ $periodo->id }}">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Periodo</span>
                    </div>
                    <input type="text" name="nombre" id="nombre" value="{{ $periodo->nombre }}" class="form-control" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-warning" title="Modificar"><i class='fas fa-edit' style='font-size:20px'></i></button>
                        <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#myModalEliminar"><i class='fas fa-trash-alt' style='font-size:20px'></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr>
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

    <!-- The Modal Eliminar-->
<div class="modal" id="myModalEliminar">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Eliminar</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          ¿Esta seguro de eliminar el periodo xxx?, recuerde que esto eliminara los archivos correspondientes al periodo..
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success">Eliminar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

@endsection
