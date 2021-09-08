@extends('layouts.app')

@section('content')
    <br>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="width:60%; height:100%">
                <img class="card-img-top" src="{{ asset('storage/carreras_imagenes/'.$carreras[0]->nom_img_carr) }}" alt="Card image" style="width:100%">
                <div class="card-body text-center">
                  <h4 class="card-title text-center">{{ $carreras[0]->nombre }}</h4>
                  <p class="card-text text-center">{{ $carreras[0]->plan_estudios }}</p>
                  <a href="#" class="btn btn-primary ">Ver mas...</a>
                </div>
              </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width:60%; height:100%">
                <img class="card-img-top" src="{{ asset('storage/carreras_imagenes/'.$carreras[1]->nom_img_carr) }}" alt="Card image" style="width:100%">
                <div class="card-body text-center">
                  <h4 class="card-title text-center">{{ $carreras[1]->nombre }}</h4>
                  <p class="card-text text-center">{{ $carreras[1]->plan_estudios }}</p>
                  <a href="#" class="btn btn-primary ">Ver mas...</a>
                </div>
              </div>
        </div>
    </div>
    <br>
    <br>
@endsection
