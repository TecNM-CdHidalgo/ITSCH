@extends('layouts.app')
@section('carousel')
	{{--Carrusel--}}
	<div id="carr" class="carousel slide" data-ride="carousel">
		<ul class="carousel-indicators">
			@php 
				$ban=true;
			@endphp
			@foreach($noticias as $not)
				@if($not->resaltar==1)
					@if($ban)
				    	<li data-target="#carr" data-slide-to="{{$not->id}}" class="active"></li>
				    	@php 
				    		$ban=false;
				    	@endphp	
				    @else
						<li data-target="#carr" data-slide-to="{{$not->id}}"></li>

				    @endif 
				@endif   
			@endforeach
		</ul>
		<div class="carousel-inner">
			@php 
				$ban=true;
			@endphp
			@foreach($noticias as $not)
				@if($not->resaltar==1)
					@if($ban)
						<div class="carousel-item active">
							<a href="{{route('ver',$not->id)}}">
							    <img src="{{ asset( '/storage/noticias/imagenes/'.$not->imagen) }}" alt="{{$not->titulo}}" width="100%" height="400px">
							    <div class="carousel-caption">
							        <h3>{{$not->titulo}}</h3>
							        <p>{{$not->sintesis}}</p>
							    </div>  
						    </a> 
						</div>
						@php 
				    		$ban=false;
				    	@endphp	
					@else
						<div class="carousel-item">
						     <a href="{{route('ver',$not->id)}}">
							    <img src="{{ asset( '/storage/noticias/imagenes/'.$not->imagen) }}" alt="{{$not->titulo}}" width="100%" height="400px">
							    <div class="carousel-caption">
							        <h3>{{$not->titulo}}</h3>
							        <p>{{$not->sintesis}}</p>
							    </div>  
						    </a>  
						</div>
					@endif  
				@endif 
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#carr" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#carr" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		</a>
	</div>	
@endsection


@section('content')
	{{--Contenido de noticias--}}
	<h3>Noticias</h3>
    <hr>
    @foreach($noticias2 as $not)
	    <div class="noticias">  
	    	<h5><b>{{$not->titulo}}</b></h5>
	    	<h6>{{$not->sintesis}}</h6>
		    <div class="row" >	    	
		    	<div class="col-xl-6">
		    		<a href="{{route('ver',$not->id)}}">
						<img loading='lazy'  src="{{ asset( '/storage/noticias/imagenes/'.$not->imagen) }}" alt='notice 1' title='{{$not->titulo}}' class='img-fluid rounded imgNotices'/>
					</a>
		    	</div>
		    	{{--Descripcion de la noticia--}}
		    	<div class="col-xl-6">
		    		@php
		                echo $not->contenido;
		            @endphp		    		
		    	</div>
		    </div>  
		    <div class="row">
		    	<div class="col-sm-3">
		    		@if($not->arch_adj)
			    		<a href="{{route('ver',$not->id)}}">
			    			Archivos adjuntos.....
			    		</a>
		    		@endif
		    	</div>
		    	<div class="col-sm-3 blockquote-footer">
		    		<p>Inicio: {{$not->fecha_pub}}</p>
		    	</div>
		    	<div class="col-sm-3 blockquote-footer">
		    		<p>Fin: {{$not->fecha_fin}}</p>
		    	</div>
		    	<div class="col-sm-3 blockquote-footer">
		    		<p>Autor: {{$not->autor}}</p>
		    	</div>
		    </div>
	    </div>
	@endforeach
    


	{{--Redes sociales--}}
	<div class="info">
		<h1>Redes sociales</h1>	
		<div class="row">
			<div class="col-xl-4">Twiter</div>
			<div class="col-xl-4">Youtube</div>
			<div class="col-xl-4">Facebook</div>
		</div>
	</div>
    
	<div class="info">
		<h1>Sitios de Interés</h1> 	
	    <div class="row" >
			<div class="col-xl-2 mx-auto">
				<a href='https://www.conacyt.gob.mx/' target='_blank'>
					<img loading='lazy'  src="{{ asset('images/interes/CONACYT.png') }}" alt='CONACYT' title='CONACYT' class='img-fluid' />
				</a>
			</div>
			
			<div class="col-xl-2 mx-auto">
				<a href='https://www.conricyt.mx/' target='_blank'>
					<img loading='lazy' src="{{ asset('images/interes/CONRICYT.png') }}" alt='CONRICYT' title='CONRICYT' class='img-fluid' />
				</a>
			</div>
			
			<div class="col-xl-2 mx-auto">
				<a href='http://www.ifai.org.mx/' target='_blank'>
					<img loading='lazy' src="{{ asset('images/interes/INAI.png') }}" alt='INAI' title='INAI' class='img-fluid' />
				</a>
			</div>
			
			<div class="col-xl-2 mx-auto">
				<a href='http://consultapublicamx.inai.org.mx:8080/vut-web/?idSujetoObigadoParametro=10009&amp;idEntidadParametro=33&amp;idSectorParametro=21' target='_blank'>
					<img loading='lazy' src="{{ asset('images/interes/PNT.png') }}" alt='PNT' title='PNT' class='img-fluid' />
				</a>
			</div>
			
			<div class="col-xl-2 mx-auto">
				<a href='?vista=Dir_Posgrado'>
					<img loading='lazy' src="{{ asset('images/interes/contraloria.png') }}" alt='Dir_Posgrado' title='Dir_Posgrado' class='img-fluid' />
				</a>
			</div>
		</div>
	</div>
@endsection
