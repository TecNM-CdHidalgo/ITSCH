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
							    <img src="{{ asset( '/storage/noticias/imagenes/'.$not->imagen) }}" alt="{{$not->titulo}}" width="100%"height="400px">
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
							    <img src="{{ asset( '/storage/noticias/imagenes/'.$not->imagen) }}" alt="{{$not->titulo}}" width="100%"height="400px">
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
	<h3>Noticias</h3>
    <hr>
    @foreach($noticias2 as $not)
	    <div class="noticias">
	    	<h5><b>{{$not->titulo}}</b></h5>
	    	<h6>{{$not->sintesis}}</h6>
		    <div class="row">
		    	<div class="col-xl-5">
		    		<a href="{{route('ver',$not->id)}}">
						<img loading='lazy' width="100%" style="max-height: 200px; min-height: 180px;"  src="{{ asset( '/storage/noticias/imagenes/'.$not->imagen) }}" alt='notice 1' title='{{$not->titulo}}' class='img-fluid rounded imgNotices'/>
					</a>
		    	</div>
		    	{{--Descripcion de la noticia--}}
		    	<div class="col-xl-7 regContent">
		    		
		    		@php
		    			
		    			$tam=strlen($not->contenido);		    			
		    			if($tam<3000)
		    			{
		    				echo $not->contenido;
		    			}
		    			else
		    			{
		    				$ncar=$tam*.6;

		    				for($x=0; $x<=$ncar; $x++)
		    				{
		    					echo $not->contenido[$x];
		    				}
		    				echo "...";

		    				echo "<h5><b><a href='Noticias/Ver/$not->id'>(Leer mas...)</a></b></h5>";

		    				//Buscar div para cerrarlos al final
		    				$divs=substr_count($not->contenido,"<div",0,$ncar);
		    				$divsFin=substr_count($not->contenido,"</div>",0,$ncar);
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
