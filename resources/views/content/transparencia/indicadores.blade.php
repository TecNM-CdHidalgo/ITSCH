@extends('layouts.app')
@section('content')
<img src="{{ asset('images/content/transparencia/indicadores.png') }}" alt="Indicadores">
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <a href="{{ asset('documents/content/transparencia/indicadores/06_Indicadores_de_resultados_2do_trimestre_2025_itsch.pdf)') }}" target="_blanck">
                        <i class='fas fa-download' style='font-size:20px'></i>
                    </a>
                Indicadores de Resultados 2do Trimestre 2025
            </div>
            <div class="col-sm-4">
                <a href="{{ asset('documents/content/transparencia/indicadores/eval_fis_fin_resumen_2025.pdf)') }}" target="_blanck">
                        <i class='fas fa-download' style='font-size:20px'></i>
                    </a>
                Evaluación Fiscal y Financiera Resumen 2025
            </div>
        </div>
        <br>
        <br>
    </div>
    <div class="col-sm-2"></div>
</div>

@endsection