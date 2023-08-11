@extends('layouts.app')

@section('descripcion','Instituto Tecnológico Superior de Ciudad Hidalgo, somos tu mejor opción para que estudies una ingeniería en toda la región oriente del estado de Michoacán. “Somos Jaguares')

@section('titulo','WELCOME ITSCH')

@section('css')
    <style type="text/css">
        .imgFormCarousel {
            width: 100%;
			max-height: 600px;
            overflow: hidden;
            position: relative;
        }

        .imgFormCard {
            width: 100%;
            height: 200px;
            overflow: hidden;
            position: relative;
            box-shadow: 4px 3px 5px #999;
        }

        .imgZoom{
            transform: scale(var(--escala, 1));
            transition: transform 0.25s;
            }

        .imgZoom:hover{
            --escala: 2.9;
            cursor:pointer;
            }
    </style>
@endsection
@section('carousel')
	{{--Carrusel--}}
	<div id="carr" class="carousel slide carousel-fade" data-ride="carousel">
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
                        <div class="carousel-item active text-center">
                            <a href="{{route('ver',$not->id)}}">
                                <img src="{{ asset('storage/noticias/imagenes/'.$not->imagen) }}" alt="{{$not->titulo}}" class="d-block w-100 img-fluid rounded imgFormCarousel">
                            </a>
                        </div>
                        @php
                            $ban=false;
                        @endphp
                    @else
                        <div class="carousel-item text-center">
                            <a href="{{route('ver',$not->id)}}">
                                <img src="{{ asset('storage/noticias/imagenes/'.$not->imagen) }}" alt="{{$not->titulo}}" class="d-block w-100 img-fluid rounded imgFormCarousel">
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
    {{--Contenido de la pagina--}}

	{{--Contenido de noticias--}}
	<div class="row">
		<div class="col-sm-3">
			<h3>Noticias</h3>
		</div>
		<div class="col-sm-8"></div>
		<div class="col-sm-1">
			<div id="occ-widget"></div>
		</div>
	</div>

    <br>

	<hr class="red">

    <div class="row row-cols-1 row-cols-md-3">
        @foreach($noticias2 as $not2)
            <div class="col mb-4">
                <div class="card h-100">
                    <!--Card image-->
                    <div class="view overlay">
                        <a href="{{route('ver',$not2->id)}}">
                            <img  src="{{ asset('storage/noticias/imagenes/'.$not2->imagen) }}" alt="{{$not2->titulo}} title="{{$not2->titulo}}" class="img-fluid rounded imgFormCard"/>
                        </a>

                    </div>

                    <!--Card content-->
                    <div class="card-body">

                    <!--Title-->
                    <h4 class="card-title">{{$not2->titulo}}</h4>
                    <!--Text-->
                    <p class="card-text">{{$not2->sintesis}}</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <a href="{{route('ver',$not2->id)}}" class="btn btn-light-blue btn-md">Leer más</a>

                    </div>
                    <!-- Card footer -->
                    <div class="card-footer text-muted text-center mt-4">
                        <div class="row">
                            <div class="col-sm-4"><p style="font-size: x-small">Inicio: {{$not2->fecha_pub}}</p> </div>
                            <div class="col-sm-4"><p style="font-size: x-small">Fin: {{$not2->fecha_fin}}</p></div>
                            <div class="col-sm-4"><p style="font-size: x-small">Autor: {{$not2->autor}}</p></div>
                        </div>
                    </div>
                </div>
                <!-- Card -->
            </div>
        @endforeach

    </div>


	{{--Redes sociales--}}
	<div class="info">
		<h2>Redes sociales</h2>
		<div class="row">
			{{--Twiter--}}
			<div class="col-sm-4">
				<h4>Twitter</h4>
				<a class="twitter-timeline"
				style="margin-top:15px;"
				data-lang="es"
				data-width="350"
				data-height="525"
				data-dnt="true"
				data-link-color="#504099"
				href="https://twitter.com/TecNM_cdhidalgo?ref_src=twsrc%5Etfw">Tweets by ITSCH</a>
				<script defer async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
			{{--Youtube--}}
			<div class="col-sm-4">
				<h4>Youtube</h4>
				<iframe defer src="https://www.youtube.com/embed/videoseries?list=PLZX0SINrPE8xoidtLXhoMREo_1nGWgf_d" width="350" height="530" src="" frameborder="0" allow="autoplay"></iframe>
			</div>
			{{--Facebook--}}
			<div class="col-sm-4">
				<h4>Facebook</h4>
				<iframe defer src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTecNM.campus.Ciudad.Hidalgo%2F&tabs=timeline%2Cevents%2Cmessages&width=350&height=530&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="350" height="530" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
			</div>
		</div>
    </div>

	<div class="info">
		<h2>Sitios de Interés</h2>
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
					<img loading='lazy' src="{{ asset('images/interes/contraloria.png') }}" alt='Contraloria' title='Contraloria' class='img-fluid' />
				</a>
			</div>

            <div class="col-xl-2 mx-auto">
                <a href="https://intra.secoem.michoacan.gob.mx/denuncias" target="_blanck">
                    <img loading="lazy" src="{{ asset('images/buzon_naranja.jpg') }}" alt="buzón naranja" title="buzón naranja" style="width: 120px" class="imgZoom" >
                </a>
            </div>
		</div>



	    <div>
	        <div>
	            <div>
	                <p>
	                    <strong>Dirección</strong>
	                    <br>
	                    <br>Av. Ing. Carlos Rojas Gutiérrez 2120 | Fraccionamiento Valle de la Herradura | Ciudad Hidalgo Michoacán <br>
	                    <br>
	                    <br><strong>Contacto</strong>&nbsp;<br>
	                    <br>Email: contacto@tecnm.mx&nbsp;<br>Tel. (786) 154-90-00 <br>
	                </p>
	            </div>
	            <div style="width: 100%" style="text-align: center;">
	               <img src="{{asset('images/tec.jpg')}}" alt="Nuestro Tec" width="50%" height="90%">
	            </div>
	        </div>
	        <div>
                <hr>
                <p>© Copyright 2019 TecNM - Campus Ciudad Hidalgo - Todos los Derechos Reservados</p>
                <br>
                <p><small><b>Última actualización: 26/04/2023</b></small></p>
                <br>
	        </div>
	    </div>
    </div>


@endsection


