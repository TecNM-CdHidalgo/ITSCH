@extends('layouts.plant_admin')

@section('contenido')
    <h5> <a href="{{ route('periodos.inicio') }}">Periodos</a>/Agregar documentos/{{ $periodo->nombre }}</h5>

    <form action="{{ route('transparencia.archivos.guardar') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
                <div class="input-group mb-3">
                    <input type="file" name="arch[]" id="arch" required multiple class="form-control">
                    <input type="hidden" name="id" readonly value="{{ $periodo->id }}">
                    <div class="input-group-append">
                        <button type="submit" title="Cargar archivo" class="btn btn-success btn-sm"><i class='fas fa-cloud-upload-alt' style='font-size:14px'></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    @if ($arch->count())
        <form action="{{ route('transparencia.archivos.eliminarTodos',$periodo->id) }}" method="post" class="text-right mb-3" onsubmit="return confirm('¿Eliminar todos los archivos de este periodo?');">
            @csrf
            <button type="submit" title="Eliminar todos los archivos" class="btn btn-danger btn-sm"><i class='far fa-trash-alt' style='font-size:14px'></i> Eliminar todos</button>
        </form>
    @endif
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
                @foreach ($arch as $ar)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ar->nombre }}</td>
                        <td>
                            <a href="{{ route('transparencia.archivos.descargar',$ar->id) }}" title="Descargar" class="btn btn-primary btn-sm"><i class='fas fa-cloud-download-alt' style='font-size:14px'></i></a>
                            <a href="{{ route('transparencia.archivos.eliminar',$ar->id) }}" type="button" title="Eliminar" class="btn btn-sm btn-danger"><i class='far fa-trash-alt' style='font-size:14px'></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
