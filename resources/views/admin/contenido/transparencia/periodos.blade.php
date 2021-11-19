@extends('layouts.plant_admin')

@section('contenido')
    <h5> <a href="{{ route('transparencia.index') }}">Transparencia</a>/Periodos</h5>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-5">
            <form action="{{ route('transparencia.create.periodos') }}" method="get">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Periodo</span>
                    </div>
                    <input type="text" name="nombre" id="nombre" value="" class="form-control" required placeholder="FECHA DE CORTE, Ej: 02 DE SEPTIEMBRE 2021">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success" title="Agregar">Crear</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre Periodo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($per as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nombre }}</td>
                        <td>
                            <a href="" type="button" class="btn btn-warning btn-sm" title="Modificar periodo"><i class='far fa-edit' style='font-size:14px'></i></a>
                            <button type="button" class="btn btn-danger btn-sm" title="Borrar periodo"><i class='far fa-trash-alt' style='font-size:14px'></i></button>
                            <a href="" type="button" class="btn btn-success btn-sm" title="Ver archivos"><i class='far fa-eye' style='font-size:14px'></i></i></a>
                        </td>
                    </tr>
                @endforeach
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
