@extends('layouts.app')

@section('content')

    <!-- Article main content -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <img src="{{asset('images/content/servicios escolares/titulacion1.jpg')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Titulación">
            <hr>
            <h1 class="page-title">Titulos y Cédulas:</h1>
            <hr class="red">
            <p>
                Cualquier duda o aclaración de forma individual les atenderemos en
                servicios escolares o vía telefónica al 786 154 9000 ext. 125 o 167,
                también pueden enviarnos sus dudas y seguimiento de trámites a través del siguiente link:
                <a href=”https://web.facebook.com/Becas-de-Manutenci%C3%B3n-ITSCH-883383695106559/”>
                    https://web.facebook.com/Becas-de-Manutenci%C3%B3n-ITSCH-883383695106559/</a>
            </p>
            <hr class="red">
            <h2>Documentos para descarga</h2>
            <p>Los procedimientos y requisitos están ya disponibles, para los alumnos interesados en realizar su titulación, estos documentos siempre estarán vigentes, cualquier cambio se les notificará en la página principal, los documentos y procedimientos los pueden
                descargar los siguientes enlaces:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Documento</th>
                        <th>Descarga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Requisitos y procedimiento de titulación hibrida</td>
                        <td>
                            <a type="button" class="btn btn-primary"
                                href="{{asset('documents/content/servicios escolares/proceso titulacion hibrida.pdf ')}}" data-toogle="tooltip" title="Requisitos y Procedimiento de Titulación." download  target="_blank">
                            <i class='fas fa-download' style='font-size:20px'></i>
                        </a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Catálogo de opciones de titulación y estructuras</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/catalogo de estructuras pl2015 act 2021.pdf ')}}" data-toogle="tooltip" title="Titulación por tesis." download  target="_blank">
                                <i class='fas fa-download' style='font-size:20px'></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th><h3>Formatos</h3></th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>Documento</th>
                        <th>Descarga</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Solicitud del estudiante</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/solicitud.docx ')}}" data-toogle="tooltip" title="Formato de solicitud de titulación." download  target="_blank">
                                <i class='fas fa-download' style='font-size:20px'></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Formato de registro de proyecto</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/registro.docx ')}}" data-toogle="tooltip" title="Formato de registro de proyecto." download  target="_blank">
                                <i class='fas fa-download' style='font-size:20px'></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Formato de liberación del proyecto para la Titulación integral</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/liberacion.docx ')}}" data-toogle="tooltip" title="Formato de liberación." download  target="_blank">
                                <i class='fas fa-download' style='font-size:20px'></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Portada para empastado y documento de Titulación</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/portada_empastado.doc')}}" data-toogle="tooltip" title="Portadas de discos." download  target="_blank">
                                <i class='fas fa-download' style='font-size:20px'></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Portada para discos de Titulación</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/portada_discos_titulacion.docx')}}" data-toogle="tooltip" title="Portadas de discos." download  target="_blank">
                                <i class='fas fa-download' style='font-size:20px'></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Constancia de no Adeudo para alumnos próximos a Titularse</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/for_no_adeudo_tit_v3.docx ')}}" data-toogle="tooltip" title="Constancia de no Adeudo para alumnos próximos a Titularse." download  target="_blank">
                                <i class='fas fa-download' style='font-size:20px'></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr class="red">
            <div class="text-center"> <h3>¿Por qué titularse?</h3></div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Descarga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Descarga la presentación</td>
                            <td>   <a type="button" class="btn btn-primary" href="{{asset('documents/content/servicios escolares/motiv1.pptx')}}" data-toogle="tooltip" title="presentacion" download  target="_blank">
                                    <i class='fas fa-download' style='font-size:20px'></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-1"></div>
   </div>

@endsection
