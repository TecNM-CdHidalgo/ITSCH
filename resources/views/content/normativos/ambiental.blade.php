
@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <header class="page-header" style="text-align: center;">
            <h1 class="page-title">Calidad Ambiental:</h1>
        </header>
        <hr class="red">
        <!-- contenido bruto dinamico-->
        <span class="thumbnail"><img src="{{asset('images/content/normativos/ambiental/calidad-ambiental.png')}}"></span>
        <br><br>

        <h5><strong>POLÍTICA DEL SISTEMA DE GESTIÓN AMBIENTAL</strong></h5>
        <p>El Grupo 2 multisitios del TNM establece el compromiso de brindar un servicio educativo de calidad mejorando continuamente sus procesos en armonía con el medio ambiente, orientándolos hacia el uso eficiente de los recursos naturales y el control de los aspectos ambientales tales como consumo y descarga de agua, generación de Residuos Peligrosos, Residuos Sólidos Urbanos, Residuos de Manejo Especial, así como el consumo de papel y energía eléctrica, cumpliendo los requisitos legales aplicables y otros requisitos, mediante la implementación y difusión de objetivos, metas y programas para prevenir y reducir la contaminación conforme a la Norma ISO 14001:2004.</p>
        <hr class="red">
        <p align="center"><img style="border-top:thin #000 solid;border-bottom:thin #000 solid;" width="80%" src="{{asset('images/content/normativos/ambiental/ambientalitsch.jpg')}}"></p>



        <hr class="red">
        <h5><strong>Nueva separación de los residuos sólidos urbanos.</strong></h5>
        <p>Ayúdanos a separar correctamente los residuos sólidos ya que para nosotros es importante generar una cultura para cuidar el medio ambiente.
        </p>
        <hr class="red">
        <p align="center"><img style="border-top:thin #000 solid;border-bottom:thin #000 solid;" width="80%" src="{{asset('images/content/normativos/ambiental/botes.jpg')}}"></p>


         <p align="center"><a href="{{asset('documents/content/normativos/ambiental/NUEVA SEPARACIÓN DE LOS RESIDUOS SÓLIDOS URBANOS.pptx')}}"target="_blank"><i style="font-size:2em; padding:2px;" class="fa fa-cloud-download"></i>&nbsp;<strong>Descarga la presentación </strong></a></p>

    </div>
    <div class="col-sm-1"></div>
@endsection

