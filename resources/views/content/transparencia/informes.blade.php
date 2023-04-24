@extends('layouts.app')
@section('content')
    <img src="{{ asset('images/content/transparencia/informes.png') }}" alt="Informes">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3>TecNM Campus Ciudad Hidalgo</h3>
            <a href="{{ asset('documents/content/transparencia/informes/informe_2022.pdf') }}" target="_blanck">
                <img src="{{ asset('images/content/transparencia/card.png') }}" class="card-img-top" alt="Tarjeta de informe" style="width: 450px"/>
            </a>

            <br>
            <br>
        </div>
        <div class="col-sm-2"></div>
    </div>

@endsection
