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
		<div class="carousel-inner" style="background-color: black;">
			@php
				$ban=true;
			@endphp
			@foreach($noticias as $not)
				@if($not->resaltar==1)
					@if($ban)
						<div class="carousel-item active text-center" style="background-color: black;">
							<a href="{{route('ver',$not->id)}}">
							    <img src="{{ route('carousel',[$not->imagen]) }}" alt="{{$not->titulo}}" style="max-width: 100%;">
						    </a>
						</div>
						@php
				    		$ban=false;
				    	@endphp
					@else
						<div class="carousel-item text-center" style="background-color: black;">
						     <a href="{{route('ver',$not->id)}}">
							    <img src="{{ route('carousel',[$not->imagen]) }}" alt="{{$not->titulo}}" style="max-width: 100%;">
						    </a>
						</div>
					@endif
				@endif
			@endforeach
		</div>
		<a class="carousel-control-prev"href="#carr" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next"href="#carr" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		</a>
	</div>
@endsection

@section('content')
	{{--Contenido de noticias--}}
	<h1>Noticias</h1>
    <hr class="red">
		<div class="row">
			<div class="col-sm-12">
				<img src="{{ asset('images/Fichas2021.jpg') }}" alt="Fichas" style="width: 100%">
			</div>
		</div>
		<br>
		<div style="text-align: right">
			<a href="{{ asset('/vinculacion/fichas2021') }}" class="btn btn-success btn-sm" type="button">Obtén tu ficha aquí</a>
		</div>
		<br>
		<br>
	<hr class="red">
    @foreach($noticias2 as $not2)
	    <div class="noticias">
	    	<h3><b>{{$not2->titulo}}</b></h3>
	    	<h5>{{$not2->sintesis}}</h5>
		    <div class="row">
		    	<div class="col-xl-5">
		    		<a href="{{route('ver',$not2->id)}}">
						<img  height="30%" src="{{ route('carousel',[$not2->imagen]) }}" alt="{{$not2->titulo}} title="{{$not2->titulo}}" class='rounded imgNotices'/>
					</a>
		    	</div>
		    	{{--Descripcion de la noticia--}}
		    	<div class="col-xl-7 regContent">
		    		@php

		    			$tam=strlen($not2->contenido);
		    			if($tam<2800)
		    			{
		    				echo $not2->contenido;
		    			}
		    			else
		    			{
		    				$ncar=$tam*.5;

		    				for($x=0; $x<=$ncar; $x++)
		    				{
		    					echo $not2->contenido[$x];
		    				}
		    				echo "...";

		    				//Buscar parrafor abiertos para cerrarlos
		    				$p=substr_count($not2->contenido,"<p",0,$ncar);
		    				$pfin=substr_count($not2->contenido,"</p>",0,$ncar);
		    				$totP=$p-$pfin;
		    				for($y=0;$y<$totP;$y++) //Ponemos los p que faltan por cerrar
		    				{
		    					echo "</p>";
		    				}

		    				//Buscar comillas abiertos para cerrarlos
		    				$com=substr_count($not2->contenido,'"',0,$ncar);
		    				$totCom=$com%2;
		    				for($y=0;$y<$totCom;$y++) //Ponemos los "" que faltan por cerrar
		    				{
		    					echo '"';
		    				}

		    				echo "<br>";

		    				echo "<h5><b><a href='Noticias/Ver/$not2->id'>(Leer mas...)</a></b></h5>";

		    				//Buscar div para cerrarlos al final
		    				$divs=substr_count($not2->contenido,"<div",0,$ncar);
		    				$divsFin=substr_count($not2->contenido,"</div>",0,$ncar);
		    				$totDiv=$divs-$divsFin;
		    				for($y=0;$y<$totDiv;$y++) //Ponemos los divs que faltan por cerrar
		    				{
		    					echo "</div>";
		    				}
		    			}
		            @endphp

		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-sm-3">
		    		@if($not2->arch_adj)
			    		<a href="{{route('ver',$not2->id)}}">
			    			Archivos adjuntos.....
			    		</a>
		    		@endif
		    	</div>
		    	<div class="col-sm-3 blockquote-footer">
		    		<p>Inicio: {{$not2->fecha_pub}}</p>
		    	</div>
		    	<div class="col-sm-3 blockquote-footer">
		    		<p>Fin: {{$not2->fecha_fin}}</p>
		    	</div>
		    	<div class="col-sm-3 blockquote-footer">
		    		<p>Autor: {{$not2->autor}}</p>
		    	</div>
		    </div>
	    </div>
	@endforeach

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
				<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
			{{--Youtube--}}
			<div class="col-sm-4">
				<h4>Youtube</h4>
				<iframe src="https://www.youtube.com/embed/videoseries?list=PLZX0SINrPE8xoidtLXhoMREo_1nGWgf_d" width="350" height="530" src="" frameborder="0" allow="autoplay"></iframe>
			</div>
			{{--Facebook--}}
			<div class="col-sm-4">
				<h4>Facebook</h4>
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTecNM.campus.Ciudad.Hidalgo%2F&tabs=timeline%2Cevents%2Cmessages&width=350&height=530&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="350" height="530" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
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
					<img loading='lazy' src="{{ asset('images/interes/contraloria.png') }}" alt='Dir_Posgrado' title='Dir_Posgrado' class='img-fluid' />
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
                <p><small><b>Última actualización: 23/09/2020</b></small></p>
                <br>
	        </div>
	    </div>
    </div>
@endsection
