@extends('layouts.app')

@section('content')

    <!-- Article main content -->
   <div class="row">
       <div class="col-sm-1"></div>
       <div class="col-sm-10">
            <header class="page-header" style="text-align: center;">
                <h1 class="page-title">Titulación y Cédulas:</h1>
            </header>
            <hr class="red">

            <!-- contenido bruto dinamico-->
            <span class="media thumbnail"><img src="{{asset('images/content/servicios escolares/titulacion.png')}}"></span>


            <br><br>
            Cualquier duda o aclaración de forma individual les atenderemos en servicios escolares o vía telefónica al 786 154 9000 ext. 125 o 167, también pueden enviarnos sus dudas y seguimiento de trámites a través del siguiente link:
            <a href=”https://web.facebook.com/Becas-de-Manutenci%C3%B3n-ITSCH-883383695106559/”>https://web.facebook.com/Becas-de-Manutenci%C3%B3n-ITSCH-883383695106559/</a>

            <br><br>
           
            <hr class="red">
           

            <p>Los procedimientos y requisitos están ya disponibles, para los alumnos interesados en realizar su titulación, estos documentos siempre estaran vigentes,
                cualquier cambio se les notificará en la página principal, los documentos y procedimientos los pueden
                descargar los siguientes enlaces:</p>
            <br><br>

            <div class="row">   
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/procedimiento_tit_v12.pdf ')}}" data-toogle="tooltip" title="Requisitos y Procedimiento de Titulación." download  target="_blank">
                        <i class='fas fa-download' style='font-size:20px'></i>
                    </a>
                </div>
                <div class="col-sm-2">
                    <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/for_no_adeudo_tit_v3.docx ')}}" data-toogle="tooltip" title="Constancia de no Adeudo para alumnos próximos a Titularse." download  target="_blank">
                        <i class='fas fa-download' style='font-size:20px'></i>
                    </a>
                </div>
                <div class="col-sm-2">
                   <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/tit_tesv0.pdf ')}}" data-toogle="tooltip" title="Titulación por tesis." download  target="_blank">
                        <i class='fas fa-download' style='font-size:20px'></i>
                    </a>
                </div>
                <div class="col-sm-2">
                    <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/tit_tesv0.pdf ')}}" data-toogle="tooltip" title="Proyecto de investigación." download  target="_blank">
                        <i class='fas fa-download' style='font-size:20px'></i>
                    </a>
                </div>
                <div class="col-sm-2">
                    <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/tit_inf_tec_resv0.pdf ')}}" data-toogle="tooltip" title="Titulación por informe Técnico de Residencias profesionales." download  target="_blank">
                        <i class='fas fa-download' style='font-size:20px'></i>
                    </a>
                </div>
                <div class="col-sm-1"></div>
            </div> 
            <br>            

            <hr class="red">

            <p> En esta sección podras encontraras todos los documentos y formatos necesarios para tramitar tu titulaciòn</p>

            <p>                
                1.- <strong>Formato de registro de proyecto.</strong>
            </p>

            <br>

            <p align="center">
                <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/registro_titulacionv14.docx ')}}" data-toogle="tooltip" title="Formato de registro de proyecto." download  target="_blank">
                    <i class='fas fa-download' style='font-size:20px'></i>
                </a>
            </p>
            <br>

            <hr class="red">

            <p>                
                2.- <strong>Solicitud del estudiante.</strong>
            </p>

            <br>


            <p align="center">

                <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/solicitud_titulacionv14.docx ')}}" data-toogle="tooltip" title="Formato de solicitud de titulación." download  target="_blank">
                    <i class='fas fa-download' style='font-size:20px'></i>
                </a>
               
            </p>           
            <br>

            <hr class="red">

            <p>                
                3.- <strong>Formato de liberación del proyecto para la Titulación integral.</strong>
            </p>

            <br>


            <p align="center">
                 <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/liberacion_proyectov14.docx ')}}" data-toogle="tooltip" title="Formato de liberación." download  target="_blank">
                    <i class='fas fa-download' style='font-size:20px'></i>
                </a>
            </p>
            <br>

            <hr class="red">


            <p>                
                4.- <strong>Portada para discos de Titulación.</strong>
            </p>

            <br>


            <p align="center">
                 <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/portada_discos_titulacionv1.docx ')}}" data-toogle="tooltip" title="Portadas de discos." download  target="_blank">
                    <i class='fas fa-download' style='font-size:20px'></i>
                </a>
            </p>
            <br>

            <hr class="red">

            <p>                
                5.- <strong>Portada para empastado de Titulación.</strong>
            </p>

            <br>


            <p align="center">
                <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/portada_empastado.doc ')}}" data-toogle="tooltip" title="Portadas del empastado." download  target="_blank">
                    <i class='fas fa-download' style='font-size:20px'></i>
                </a>
            </p>
            <br>

            <hr class="red">
            <p align="center">
                 <img src="{{asset('images/content/servicios escolares/titulate.png')}}" width="50%" height="300">
            </p>
           
            <hr class="red">

            <p align="center">
                <a download href="{{asset('documents/content/servicios escolares/motiv1.pptx')}}"target="_blank"><i style="font-size:2em; padding:2px;" class="fa fa-cloud-download"></i>&nbsp;<strong>Descarga la presentación.</strong>
                </a>
            </p>
       </div>
       <div class="col-sm-1"></div>
   </div>
@endsection