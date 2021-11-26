
@extends('layouts.app')


@section('content')

    <div class="container">
        <!-- Article main content -->
        <h2 class="page-title text-center">Transparencia</h2>
        <h5 class="text-center"> Estados Financieros </h5>
        <h5 class="text-center"> Periodo({{ $per_sel[0]->nombre }}) </h5>
        <hr>


        {{-- Tabla de estados financieros --}}
        <div class="row">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
                <form action="{{ route('periodo.consultar') }}" method="get">
                    <div class="input-group mb-3">
                        <select name="periodo" id="periodo" class="form-control" required>
                            <option value="" selected>Selecciona un periodo</option>
                            @foreach ($periodos as $per )
                                <option value="{{ $per->id }}">{{ $per->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fas fa-search' style='font-size:14px'></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre del archivo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arch as $ar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ar->nombre }}</td>
                            <td>
                                <a href="{{ asset('storage/transparencia/'.$periodos[0]->nombre.'/'.$ar->nom_arch) }}" download type="button" title="Descargar" class="btn btn-primary btn-sm"><i class='fas fa-cloud-download-alt' style='font-size:14px'></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <hr class="red">
    <h6>Ultima actualización: {{ $u_reg->updated_at }}</h6>
@endsection
