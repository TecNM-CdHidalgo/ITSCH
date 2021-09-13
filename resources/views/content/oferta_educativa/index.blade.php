@extends('layouts.app')

@section('content')
        
        <div class="row">
            @foreach ($carreras as $car)
                <div class="col-sm-4 mt-4">                    
                    <div class="card" style="width:60%; height:100%; margin-left: 20%;">
                        <a href="{{ route('oferta.showCarrera',$car->id_pro) }}">
                            <img class="card-img-top ml-4" src="{{ asset('storage/carreras_imagenes/'.$car->nom_img_carr) }}" alt="Card image" style="width:80%">
                        </a>
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $car->nombre }}</h4>
                            <p class="card-text">{{ $car->plan_estudios }}</p>                  
                        </div>
                        <div class="card-footer text-center">                            
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
