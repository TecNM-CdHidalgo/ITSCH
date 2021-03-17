@extends('layouts.app')

@section('content')
    <h4>Solicitud de documentos oficiales</h4>
    <hr class="red">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card" style="width:400px;">
                <img class="card-img-top" src="{{ asset('images/content/servicios escolares/escolares_constancias.jpg') }}" alt="Card image" style="width:100%">
                <div class="card-body">
                  <h4 class="card-title">AHORA ES MAS FACIL!!! </h4>
                  <p class="card-text">¿Necesitas una constancia o kárdex de calificaciones? entra al siguiente formulario y has tu solicitud más fácil y rápido.</p>
                  <p class="card-text">Recuerda que dichos documentos se entregarán en un plazo de 1 a 5 días hábiles.</p>
                  <a href="https://forms.gle/NYCUiLYr9Cok6ary9" class="btn btn-primary">Solicitar</a>
                </div>
              </div>
              <br>
        </div>
        <div class="col-sm-4"></div>
    </div>

@endsection
