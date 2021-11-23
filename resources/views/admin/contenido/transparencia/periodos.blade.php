@extends('layouts.plant_admin')

@section('contenido')
    <h5> <a href="{{ route('periodos.inicio') }}">Transparencia</a>/Periodos</h5>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-5">
            <form action="{{ route('periodos.agregar') }}" method="get">
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
                            <button type="button" class="btn btn-warning btn-sm" title="Modificar periodo" data-toggle="modal" data-target="#myModalModificar" onclick="datModificar({{ $p }})"><i class='far fa-edit' style='font-size:14px'></i></button>
                            <button type="button" class="btn btn-danger btn-sm" title="Borrar periodo" data-toggle="modal" data-target="#myModalEliminar" onclick="datEliminar({{ $p }})"><i class='far fa-trash-alt' style='font-size:14px'></i></button>
                            <a href="{{ route('transparencia.archivos.agregar',$p->id) }}" type="button" class="btn btn-success btn-sm" title="Ver archivos"><i class='far fa-eye' style='font-size:14px'></i></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- The Modal Eliminar-->
    <div class="modal" id="myModalEliminar">
        <form action="{{ route('periodo.eliminar') }}" method="get">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Eliminar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h6 id="nom_elim"></h6>
                        <input type="hidden" name="id" id="id_elim" readonly>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submmit" class="btn btn-success">Eliminar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- The Modal Modificar-->
    <div class="modal" id="myModalModificar">
        <div class="modal-dialog">
            <form action="{{ route('periodo.update') }}" method="get">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Modificar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Periodo</span>
                            </div>
                            <input type="text" name="nombre" id="nom_mod" value="" class="form-control" required placeholder="FECHA DE CORTE, Ej: 02 DE SEPTIEMBRE 2021">
                            <input type="hidden" name="id" id="id_mod" readonly>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submmit" class="btn btn-success">Modificar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @section('js')
        <script>
            function datModificar(per)
            {
                $('#nom_mod').val(per['nombre']);
                $('#id_mod').val(per['id']);
            }

            function datEliminar(per)
            {
                $('#nom_elim').text('¿Esta seguro de eliminar el periodo '+per['nombre']+'?, recuerde que esto eliminara los archivos correspondientes al periodo..');
                $('#id_elim').val(per['id']);
            }
        </script>
    @endsection

@endsection
