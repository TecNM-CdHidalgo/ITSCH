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
        <div class="col-xl-4"><a class='twitter-timeline' data-lang='es' data-width='350' data-height='525' data-dnt='true' data-theme='light' href='https://twitter.com/TecNM_cdhidalgo'>TecNM</a>

        </div>
        <div class="col-xl-4">	<iframe style='margin-top:15px;' width='350' height='525' src='https://www.youtube.com/embed/s58wL5reK3I' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>
        <div class="col-xl-4"><iframe style='margin-top:15px;' src='https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/TecNM.campus.Ciudad.Hidalgo/&tabs=timeline&width=350&height=525&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId' width='350' height='525' style='border:none;overflow:hidden' scrolling='no' frameborder='0' allowTransparency='true' allow='encrypted-media'></iframe></div>
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


        <section  >
            <div class="">
                <div >
                    <div  >
                        <p>
                            <strong>Dirección</strong>
                            <br>
                            <br>Av. Ing. Carlos Rojas Gutiérrez 2120 | Fraccionamiento Valle de la Herradura | Ciudad Hidalgo Michoacán <br>
                            <br>
                            <br><strong>Contacto</strong>&nbsp;<br>
                            <br>Email: contacto@tecnm.mx&nbsp;<br>Tel. (786) 154-90-00 <br>
                        </p>
                    </div>

                    <div class="container">
                        <a href='#' title='Ver Ubicación'>
                            <img src="http://www.cdhidalgo.tecnm.mx/images/footer/Foto_Ubi.JPG" alt="Ubicación" style='width:95%;' />
                        </a>
                    </div>
                </div>
                <div >
                    <div >
                        <div class="col-sm-12">
                            <hr>
                        </div>
                    </div>
                    <div >
                        <div>
                            <p>© Copyright 2019 TecNM - Campus Ciudad Hidalgo - Todos los Derechos Reservados</p>
                                <br />
                                <p>Última actualización: 11/09/2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
