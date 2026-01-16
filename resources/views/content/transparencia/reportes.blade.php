@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col text-center">
        <img src="{{ asset('images/content/transparencia/rf.png') }}" alt="Reportes" class="img-fluid mx-auto d-block mb-3" style="width:1000px height:800px;">
        <p>Informes</p>
        <hr>
        <div class="row justify-content-center">

            <div class="col-auto text-center mb-2">
                <a href="{{ asset('documents/content/transparencia/reportes/Oficio-DG_0758_2025-1er-Informe U079.pdf') }}" class="btn btn-outline-primary" target="_blank">
                   <i class="bi bi-download"  style="font-size:1.2em"></i>
                    &nbsp;<strong>1er Informe</strong>
                </a>
            </div>

            <div class="col-auto text-center mb-2">
                <a href="{{ asset('documents/content/transparencia/reportes/SEGUNDO-INFORME-U079.pdf') }}" class="btn btn-outline-primary" target="_blank">
                    <i class="bi bi-download"  style="font-size:1.2em"></i>
                    &nbsp;<strong>2do Informe</strong>
                </a>
            </div>

            <div class="col-auto text-center mb-2">
                <a href="{{ asset('documents/content/transparencia/reportes/Acta-Entrega-Recepcion-UO79.pdf') }}" class="btn btn-outline-primary" target="_blank">
                    <i class="bi bi-download"  style="font-size:1.2em"></i>
                    &nbsp;<strong>3er Informe</strong>
                </a>
            </div>

            <div class="col-auto text-center mb-2">
                <a href="{{ asset('documents/content/transparencia/reportes/Presupuesto-de-Egresos-Federacion-Articulo-37.pdf') }}" class="btn btn-link" target="_blank">
                    <i class="bi bi-download"  style="font-size:1.2em"></i>
                    &nbsp;<strong>3er Informe</strong>
                </a>
            </div>

        </div>
    </div>
    <div class="col"></div>
</div>

@endsection
