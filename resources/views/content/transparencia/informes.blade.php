@extends('layouts.app')
@section('content')
    <img src="{{ asset('images/content/transparencia/informes.png') }}" alt="Informes">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <a href="{{ asset('documents/content/transparencia/informes/informe_2022.pdf') }}" target="_blanck">
                        <img src="{{ asset('images/content/transparencia/card.png') }}" class="card-img-top" alt="Tarjeta de informe" style="width: 450px"/>
                    </a>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <a href="{{ asset('documents/content/transparencia/informes/informe_2023.pdf') }}" target="_blanck">
                        <img src="{{ asset('images/content/transparencia/Informe 2023.png') }}" class="card-img-top" alt="Tarjeta de informe" style="width: 450px"/>
                    </a>
                </div>
            </div>
            <br>
            <br>
        </div>
        <div class="col-sm-2"></div>
    </div>

@endsection
