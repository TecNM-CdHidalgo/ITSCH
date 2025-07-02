@extends('layouts.app')


@section('content')
    <header class="page-header">
        <h2 align="justify"> Programa Institucional de Trabajo de Contraloría Social (PITCS)</h2>
        <hr class="red">
    </header>
    <div class="container">
        <div class="text-center">
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card">
                    <div class="card-header">
                        PRODEP
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">¿ Qué es ?</h5>
                        <p class="card-text">Es el Programa para el Desarrollo Profesional Docente (PRODEP), que tiene como objetivo contribuir para que el personal docente y personal con funciones de dirección, de supervisión, de asesoría técnico-pedagógica y cuerpos académicos accedan y/o concluyan programas de formación, actualización académica, capacitación y/o proyectos de investigación para fortalecer el perfil necesario para el desempeño de sus funciones.</p>
                        <a target="_blank" href="{{ asset('/documents/content/investigacion/pitsc/1-QUE ES EL S247 2025.pdf') }}" class="btn btn-primary"> Más información</a>
                    </div>
                </div>
                <br><br>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card">
                    <div class="card-header">
                        CONTRALORÍA SOCIAL
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">¿Qué es la Contraloría Social?</h5>
                        <p class="card-text">
                            La Contraloría Social es un grupo de beneficiarios, que, de manera organizada, verificaran el cumplimiento de las metas y la correcta aplicación de los recursos públicos asignados a Programas Presupuestales con recursos federales.
                        </p>
                        <a target="_blank" href="{{ asset('documents/content/investigacion/pitsc/2-QUE ES LA CONTRALORIA SOCIAL 2025.pdf') }}" class="btn btn-primary"> Más información</a>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card">
                    <div class="card-header">
                        Documentos Normativos
                    </div>
                    <div class="card-body">
                        <div class="panel-group ficha-collapse" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="tarColaps" data-parent="#accordion" data-toggle="collapse"href="#panel-01" aria-expanded="false" aria-controls="panel-01">
                                            Sección de documentos Normativos
                                        </a>
                                    </h4>
                                    <button type="button" class="collpase-button collapsed" data-parent="#accordion" data-toggle="collapse"href="#panel-01"></button>
                                </div>
                                <div class="panel-collapse collapse in" id="panel-01">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Documento</th>
                                                        <th>Descargar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">
                                                            <i class='fas fa-file-download' style='font-size:20px'></i>
                                                        </td>
                                                        <td>Lineamientos
                                                            </td>
                                                        <td class="text-center">
                                                            <a target="_blank" href="{{ asset('documents/content/investigacion/pitsc/3-normativos/1-Lineamientos 2024 S247.pdf') }}">
                                                                <button class="btn btn-primary"  type="button">
                                                                    <i class='fas fa-download' style='font-size:20px'></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <i class='fas fa-file-download' style='font-size:20px'></i>
                                                        </td>
                                                        <td>Esquema de Contraloría Social
                                                            </td>
                                                        <td class="text-center">
                                                        <a target="_blank"  href="{{ asset('documents/content/investigacion/pitsc/3-normativos/2-Esquema S247.pdf') }}">
                                                                <button class="btn btn-primary"  type="button">
                                                                    <i class='fas fa-download' style='font-size:20px'></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <i class='fas fa-file-download' style='font-size:20px'></i>
                                                        </td>
                                                        <td>Guia Operativa </td>
                                                        <td class="text-center">
                                                            <a target="_blank"  href="{{ asset('documents/content/investigacion/pitsc/3-normativos/3-S247  Modelo 3 Guia O.pdf') }}">

                                                            <button class="btn btn-primary"  type="button">
                                                                <i class='fas fa-download' style='font-size:20px'></i>
                                                            </button></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <i class='fas fa-file-download' style='font-size:20px'></i>
                                                        </td>
                                                        <td>Modelo 4 PATCS</td>
                                                        <td class="text-center">
                                                            <a target="_blank"  href="{{ asset('documents/content/investigacion/pitsc/3-normativos/4-S247 2025 Modelo 4 PATCS.pdf') }}">

                                                                <button class="btn btn-primary"  type="button">
                                                                    <i class='fas fa-download' style='font-size:20px'></i>
                                                                </button></a>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <i class='fas fa-file-download' style='font-size:20px'></i>
                                                        </td>
                                                        <td>Oficio de validación</td>
                                                        <td class="text-center">
                                                            <a target="_blank"  href="{{ asset('documents/content/investigacion/pitsc/3-normativos/5-OF DE VALIDA S247.pdf') }}">
                                                                <button class="btn btn-primary"  type="button">
                                                                    <i class='fas fa-download' style='font-size:20px'></i>
                                                                </button></a>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card">
                    <div class="card-header">
                        FORMATOS DE LA GUÍA OPERATIVA
                    </div>
                    <div class="card-body">
                        <div class="panel-group ficha-collapse" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="tarColaps" data-parent="#accordion" data-toggle="collapse"href="#panel-02" aria-expanded="false" aria-controls="panel-02">
                                            Sección de Formatos de la Guía Operativa
                                        </a>
                                    </h4>
                                    <button type="button" class="collpase-button collapsed" data-parent="#accordion2" data-toggle="collapse"href="#panel-02"></button>
                                </div>
                                <div class="panel-collapse collapse in" id="panel-02">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Documento</th>
                                                        <th>Descargar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">
                                                            <i class='fas fa-file-download' style='font-size:20px'></i>
                                                        </td>
                                                        <td>
                                                            Anexo I. ACTA DE CONSTITUCIÓN DEL COMITÉ DE CONTRALORÍA SOCIAL
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ asset('documents/content/investigacion/pitsc/3-normativos/5-S247 Anexo 1 Acta consti.pdf') }}" download>
                                                                <button class="btn btn-primary"  type="button">
                                                                    <i class='fas fa-download' style='font-size:20px'></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <i class='fas fa-file-download' style='font-size:20px'></i>
                                                        </td>
                                                        <td>
                                                            Anexo II. ACTA DE SUSTITUCIÓN DE INTEGRANTE(S) DEL COMITÉ
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ asset('documents/content/investigacion/pitsc/3-normativos/6-S247 Anexo 2 Acta Sust.pdf') }}" download>
                                                                <button class="btn btn-primary"  type="button">
                                                                    <i class='fas fa-download' style='font-size:20px'></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <i class='fas fa-file-download' style='font-size:20px'></i>
                                                        </td>
                                                        <td>
                                                            Anexo III. MINUTA DE REUNIÓN DEL COMITÉ DE CONTRALORÍA SOCIAL
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ asset('documents/content/investigacion/pitsc/3-normativos/7-S247  2025 Anexo 3 Minuta.pdf') }}" download>
                                                                <button class="btn btn-primary"  type="button">
                                                                    <i class='fas fa-download' style='font-size:20px'></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <i class='fas fa-file-download' style='font-size:20px'></i>
                                                        </td>
                                                        <td>
                                                            Anexo IV. INFORME DEL COMITÉ DE CONTRALORÍA SOCIAL
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ asset('documents/content/investigacion/pitsc/3-normativos/8-S247 2025 Anexo 4 Inf.pdf') }}" download>
                                                                <button class="btn btn-primary"  type="button">
                                                                    <i class='fas fa-download' style='font-size:20px'></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <!-- <div class="card">
                    <h5 class="card-header">   INFORMES TRIMESTRALES   </h5>
                    <div class="card-body">
                        <h5 class="card-title">Información de las actividades de Contraloría Social</h5>
                        <p class="card-text">Año 2022</p>
                        <a href="{{ asset('documents/content/investigacion/pitsc/1.- S247 INFORME F PRODEP-TecNM-2022.pdf') }}" target="_blank" class="btn btn-primary">Descargar</a>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
            <div class="card">
                <div class="card-header">
                    <h5>Quejas Denuncias, Peticiones o Irregularidades   </h5>
                </div>
                <div class="card-body text-center">
                    Los mecanismos para la captación de quejas y denuncias, así como los medios institucionales para la atención e investigación de aquéllas relacionadas con la ejecución y aplicación de los programas federales
                    Procedente de las acciones de vigilancia y en caso de encontrarse irregularidades podrán presentarse quejas o denuncias a través de los siguientes mecanismos:
                    <br>
                    <p>Conoce más</p>
                    <a href="{{ asset('documents/content/investigacion/pitsc/4-MECANISMOS DE QUEJAS Y DENUNCIAS S247 2025.pdf') }}" target="_blank">
                        <button class="btn btn-primary"  type="button">
                            Descargar
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="shadow-lg p-3 mb-5 bg-body rounded">
            <div class="card">
                <div class="card-header">
                     <h5>Sistema informático de contraloría social (Manual SICS)</h5>
                </div>
                <div class="card-body text-center">
                    Este sistema ha sido diseñado para mejorar el proceso de captura de las acciones
                    de contraloría social, así como para facilitar la generación de los informes trimestrales
                    y anuales de contraloría social.
                    <br>
                    <p>Ver manual</p>
                    <a href="{{ asset('documents/content/investigacion/pitsc/Manual Ejecutora SICS-2023.pdf') }}" target="_blank">
                        <button class="btn btn-primary"  type="button">
                            Ver mas..
                        </button>
                    </a>
                </div>
            </div>
        </div> -->
    </div>
    <br><br>
@endsection
