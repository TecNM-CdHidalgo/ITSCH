@extends('layouts.app')


@section('content')
	<div class="container">

		<header class="page-header">
			<h2>Convenios de colaboración</h2>
			<hr class="red">

		</header>

		<p align="center">
			<a href="{{ asset('documents/content/vinculacion/convenios/dw1.pdf') }}">
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
				<img src="{{ asset('images/content/vinculacion/convenios/1.jpg')}}" alt="imageitsch">
				<img src="{{ asset('images/content/vinculacion/convenios/2.jpg')}}" alt="imgitsch">
				<img src="{{ asset('images/content/vinculacion/convenios/3.jpg')}}" alt="imgitsch">
				<img src="{{ asset('images/content/vinculacion/convenios/4.jpg')}}" alt="imageitsch">
				<img src="{{ asset('images/content/vinculacion/convenios/5.jpg')}}" alt="imgitsch">
				<img src="{{ asset('images/content/vinculacion/convenios/6.jpg')}}" alt="imgitsch">

			</picture>
		</div>




	</div>

@endsection