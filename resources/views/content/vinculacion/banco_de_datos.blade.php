@extends('layouts.app')


@section('content')
	<div class="container">
			



		<header class="page-header">


			<h2 align="justify">Banco de proyectos</h2>

			<hr class="red">
		</header>

		<div class="container">
			<h2>Vacantes Descargar el archivo</h2>
			<hr class="red">

<p align="center">
			<a href="{{ asset('documents/content/vinculacion/banco de proyectos/VACANTES.pdf') }}">
				<button class="btn btn-primary"  type="button">
					<i class='fas fa-download' style='font-size:20px'></i>
				</button>
			</a>
</p>
		</div>


		<hr class="red">
		<div class="container">
			<div class="text-center">
				<picture>
					<img src="{{ asset('images/content/vinculacion/banco de proyectos/1.jpg')}}" alt="imageitsch">
					<img src="{{ asset('images/content/vinculacion/banco de proyectos/2.jpg')}}" alt="imgitsch">
					<img src="{{ asset('images/content/vinculacion/banco de proyectos/3.jpg')}}" alt="imgitsch">

				</picture>
			</div>


                


</div>
@endsection

