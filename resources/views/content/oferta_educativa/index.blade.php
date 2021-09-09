@extends('layouts.app')

@section('content')
    <br>
    <br>
        <div class="row">
            @foreach ($carreras as $car)
                <div class="col-sm-4">
                    <div class="card" style="width:60%; height:100%">
                        <img class="card-img-top" src="{{ asset('storage/carreras_imagenes/'.$car->nom_img_carr) }}" alt="Card image" style="width:100%">
                        <div class="card-body text-center">
                            <h4 class="card-title text-center">{{ $car->nombre }}</h4>
                            <p class="card-text text-center">{{ $car->plan_estudios }}</p>
                            <a href="{{ route('oferta.showCarrera',$car->id_pro) }}" class="btn btn-primary ">Ver mas...</a>
                        </div>
                    </div>
                </div>
                @if($loop->index==2)
                    <br>
                    <br>
                    <br>
                @endif
            @endforeach
        </div>

    <br>
    <br>
@endsection
