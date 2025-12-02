@extends('layouts.app')
@section('content')
<img src="{{ asset('images/content/transparencia/indicadores.png') }}" alt="Indicadores">
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <a type="button" class="btn btn-primary" href="{{asset('documents/content/transparencia/06_Indicadores_de_resultados_2do_trimestre_2025_itsch.pdf)}}" data-toogle="tooltip" title="documento para descargar" download target="_blank">
                    <i class='fas fa-download' style='font-size:20px'></i>
                </a>
            </div>
            <div class="col-sm-4">
                <a type="button" class="btn btn-primary" href="{{asset('documents/content/transparencia/eval_fis_fin_resumen_2025.pdf)}}" data-toogle="tooltip" title="documento para descargar" download target="_blank">
                    <i class='fas fa-download' style='font-size:20px'></i>
                </a>
            </div>
        </div>
        <br>
        <br>
    </div>
    <div class="col-sm-2"></div>
</div>

@endsection