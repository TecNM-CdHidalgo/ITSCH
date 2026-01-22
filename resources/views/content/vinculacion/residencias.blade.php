@extends('layouts.app')

@section('content')
{{--Imagen--}}
<div class="container-fluid">
    <img src="{{asset('images/content/vinculacion/residencias/residencias.png')}}" alt="Imagen de residencias" width="100%" height="50%">
</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        {{--Inicio de acordeon--}}
        <div class="container-fluid">
            <div class="panel-group ficha-collapse" id="accordion0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-parent="#accordion0" data-toggle="collapse" href="#panel-01" aria-expanded="true" aria-controls="panel-01">
                            <p style='font-size: 2.5em; '><h3 style="color: #9D2449;">¿QUE ES LA RESIDENCIA PROFESIONAL?</h3></p>
                            </a>
                        </h4>
                        <button type="button" class="collpase-button collapsed" data-parent="#accordion0" data-toggle="collapse" href="#panel-01"></button>
                    </div>
                    <div class="panel-collapse collapse in" id="panel-01">
                        <div class="panel-body">
                            Se considera residencia profesional a aquella actividad, realizada durante el desarrollo de un proyecto o en la aplicación práctica de un modelo, en cualquiera de las áreas de desarrollo establecidas, que definan una problemática y propongan una solución viable, a través de la participación directa del alumno en desempeños propios de su futura profesión.<br> Las <strong>Residencias Profesionales</strong> se plantean como un proceso de aprendizaje que implica la aplicación del conocimiento teórico adquirido en las aulas con diversas experiencias prácticas a las cuales propondrá respuesta dentro del ámbito laboral.
                            </p>
                            <hr>                           
                            <h5>Lineamientos para la operación y acreditación de la residencia profesional</h5>
                            <a target="_blank" data-toogle="tooltip"  title="Lineamientos" download href='{{asset('documents/content/vinculacion/residencias/lineamiento_para_la_operacion_y_acreditacion_de_la_residencia_profesional.pdf')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a> </p>
                            <br>
                            <hr>
                            <h5>Marco legal</h5>
                            <a target="_blank" data-toogle="tooltip"  title="Marco legal" download href='{{asset('documents/content/vinculacion/residencias/marco_legal_v8.pdf')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a> </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="red">
            <div class="panel-group ficha-collapse" id="accordion1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-parent="#accordion1" data-toggle="collapse" href="#panel-02" aria-expanded="true" aria-controls="panel-02">
                            <p style='font-size: 2.5em;'><h3 style="color: #9D2449;">DURACIÓN</h3></p>
                            </a>
                        </h4>
                        <button type="button" class="collpase-button collapsed" data-parent="#accordion1" data-toggle="collapse" href="#panel-02"></button>
                    </div>
                    <div class="panel-collapse collapse in" id="panel-02">
                        <div class="panel-body">
                            Su duración queda determinada por un período de 4 meses como tiempo mínimo y 6 meses como tiempo máximo, debiendo acumularse un mínimo de 500 horas. La asignación de proyectos de residencia profesional, se debe realizar en periodos previos a la elección de la carga académica del inicio al periodo escolar
                        </div>
                    </div>
                </div>
            </div>

            <hr class="red">
            <div class="panel-group ficha-collapse" id="accordion2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-parent="#accordion2" data-toggle="collapse" href="#panel-03" aria-expanded="true" aria-controls="panel-03">
                            <p style='font-size: 2.5em;'><h3 style="color: #9D2449;">REQUISITOS:</h3></p>
                            </a>
                        </h4>
                        <button type="button" class="collpase-button collapsed" data-parent="#accordion2" data-toggle="collapse" href="#panel-03"></button>
                    </div>
                    <div class="panel-collapse collapse in" id="panel-03">
                        <div class="panel-body">
                            Los alumnos(as) que soliciten la asignación oficial de su proyecto de residencia profesional, por cualquiera de las opciones antes mencionadas, deberán presentarse en la División de estudios profesionales o área correspondiente, donde entregarán:  <br>
                            a) Tener aprobado al menos el 80% de créditos de su plan de estudio.<br>
                            b) Tener acreditadas las actividades complementarias.<br>
                            c) Tener acreditado el servicio social.<br>
                            d) No contar con ninguna asignatura en condiciones de “Curso Especial”
                        </div>
                    </div>
                </div>
            </div>
            <hr class="red">
            <div class="panel-group ficha-collapse" id="accordion4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-parent="#accordion4" data-toggle="collapse" href="#panel-04" aria-expanded="true" aria-controls="panel-04">
                            <p style='font-size: 2.5em;'><h3 style="color: #9D2449;">DOCUMENTOS A ENTREGAR AL INICIO DE RESIDENCIAS PROFESIONALES:</h3></p>
                            </a>
                        </h4>
                        <button type="button" class="collpase-button collapsed" data-parent="#accordion4" data-toggle="collapse" href="#panel-04"></button>
                    </div>
                    <div class="panel-collapse collapse in" id="panel-04">
                        <div class="panel-body">
                            <p align="justify">
                            1. Anteproyecto.
                            (Firmado de aceptación por el revisor. Entregarlo a la encargada de residencias al inicio de su residencia.)
                            <hr>
                            2. Solicitud de residencias.
                            (Periodo bien establecido fecha inicio y fecha final de residencias) entregarlo a la encargada de residencias al inicio de su residencia.<br>
                            <hr>                            
                            3. Cardex con calificaciones.
                            (Tener aprobado al menos 80% de créditos de su plan de estudio).
                            <hr>
                            4. Carta de aceptación.
                            (Hoja membretada y dirigida al jefe de carrera, debe incluir nombre del alumno, nombre de proyecto, asesor por parte de la empresa, fecha de inicio y fecha final de residencias).
                            <hr>
                            5. Carta de presentación.
                            (La emite vinculación y se debe de entregar una copia a la encargada de residencias firmada y sellada por la empresa).
                            <hr>
                            6. Constancia de Acreditación de servicio social.
                            (Entregarlo a la encargada de residencias al inicio de su residencia).
                            <hr>
                            7. Acreditación de actividades complementarias.
                            (La emite el jefe de carrera).
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="red">
            <div class="panel-group ficha-collapse" id="accordion5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-parent="#accordion5" data-toggle="collapse" href="#panel-05" aria-expanded="true" aria-controls="panel-05">
                            <p style='font-size: 2.5em;'>   <h3 style="color: #9D2449;"> DOCUMENTOS A ENTREGAR DURANTE LAS RESIDENCIAS PROFESIONALES </h3>
                            </p>
                            </a>
                        </h4>
                        <button type="button" class="collpase-button collapsed" data-parent="#accordion5" data-toggle="collapse" href="#panel-05"></button>
                    </div>
                    <div class="panel-collapse collapse in" id="panel-05">
                        <div class="panel-body">
                            {{--Contenido de la tarjeta--}}
                            1. Formatos de asesoría.
                            (Anexo V formato de registro de asesoría (esta la llenan junto con su asesor interno en cada revisión de residencias, entregar a la encargada de residencias profesionales un formato por cada revisión de residencias, 4 en total).
                            <hr>
                            2. Formato de evaluación
                            (Debe tener sello y firma de la empresa),  NOTA: El Anexo  XXIX se entrega en la segunda y cuarta revision y el formato XXX se entrega en la cuarta revision. En caso de que la empresa no cuenta con sello debe hacer un oficio en hoja membretada donde hace constar que no tiene sello y el alumno lo  entrega a la encargada de residencias profesionales.
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="red">
            <div class="panel-group ficha-collapse" id="accordion6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-parent="#accordion6" data-toggle="collapse" href="#panel-06" aria-expanded="true" aria-controls="panel-06">
                            <p style='font-size: 2.5em;'>   <h3 style="color: #9D2449;">DOCUMENTOS A ENTREGAR AL FINAL DE LAS RESIDENCIAS PROFESIONALES
                                </h3>
                            </p>
                            </a>
                        </h4>
                        <button type="button" class="collpase-button collapsed" data-parent="#accordion6" data-toggle="collapse" href="#panel-06"></button>
                    </div>
                    <div class="panel-collapse collapse in" id="panel-06">
                        <div class="panel-body">
                            <strong>TODOS LOS OFICIOS DE LA EMPRESA SON FIRMADOS Y SELLADOS.</strong>
                            <br><br>
                            <strong><u>IMPORTANTE:</u></strong>
                            <br><br>
                            TU EXPEDIENTE COMPLETO DEBE DE CONTENER LA SIGUIENTE DOCUMENTACIÓN:
                            <br>                           
                            <br>1.- Solicitud de residencias
                            <br>2.- Kardex
                            <br>3.- Anteproyecto con firma de aceptación
                            <br>4.- Carta de presentación firmada y sellada de recibido por la empresa
                            <br>5.- Carta de aceptación (en hoja membretada de la empresa, con periodo de residencia, firma y sello de la empresa)
                            <br>6.- Constancia de acreditación del servicio social
                            <br>7.- NOTA: ACTIVIDADES COMPLEMENTARIAS (SI YA ESTA EN EL KARDEX , YA NO ES NECESARIA).
                            <br>8.- Cronograma (Si faltan firmas de la división, se colocarán una vez que entregues el expediente en físico)
                            <br>9.- 4 Formatos de asesoría (con firmas del alumno y asesor interno)
                            <br>10.- Carta de terminación de la empresa (en hoja membretada de la empresa, con periodo de residencia, firma y sello de la empresa).
                            <br>11.- 3 Formatos de evaluación ( dos se generaban en la 2 y 4 revisión y en el que se evalua la estructura del proyecto  en la 4 revisión).
                            <br>12.- Carta de liberación de residencias por parte del asesor interno.
                            <br>13.- Encuesta del asesor externo
                            <br>14.- No. De folio de encuesta de residencias profesionales de la pagina del campus <a href="https://www.cdhidalgo.tecnm.mx/alumnos/encuestasservicio"> https://www.cdhidalgo.tecnm.mx/alumnos/encuestasservicio</a>
                            <br>15.- Memoria con su proyecto final, en anexos o después de la portada adjuntar la carta de terminación de la empresa y carta de liberación del asesor interno
                            <br><br>
                            <strong> SIGUIENTES DOCUMENTOS SOLO SI:</strong>
                            <br>
                            <br>16.- * La empresa no cuenta con sello u hoja membretada , se debe entregar oficio de la empresa dirigido al jefe de división.
                            <br>17.- * Cambio de asesor. Entregar oficio por parte de la empresa por cambio de asesor.
                            <br>18.-* Cambio de nombre de proyecto. Entregar oficio por cambio del nombre del proyecto.
                            <br>19.-* Solicitud ante comité académico. Si solicitaste extensión, cambios de fecha, cambio de título, cambio de objetivos ante comité académico añadirlo.
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <hr class="red">
            <div class="panel-group ficha-collapse" id="accordion3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-parent="#accordion3" data-toggle="collapse" href="#panel-00" aria-expanded="true" aria-controls="panel-00">
                            <p style='font-size: 2.5em;'>   <h3 style="color: #9D2449;"> FORMATOS </h3></p>
                            </a>
                        </h4>
                        <button type="button" class="collpase-button collapsed" data-parent="#accordion3" data-toggle="collapse" href="#panel-00"></button>
                    </div>
                    <div class="panel-collapse collapse in" id="panel-00">
                        <div class="panel-body">
                            {{--Contenido de la tarjeta--}}
                            ANTEPROYECTO
                            <br>
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Escructura del reporte preliminar de residencia" download href='{{asset('documents/content/vinculacion/residencias/estruc.docx')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            LIBERACIÓN DE PROYECTO
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Autorizacion del proyecto " download href='{{asset('documents/content/vinculacion/residencias/carta_autorizacion.doc')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            CRONOGRAMA DE ACTIVIDADES
                            <p align="center">
                                <a target="_blank" data-toogle="tooltip"  title="Seguimiento de residencias " download href='{{asset('documents/content/vinculacion/residencias/cronograma2023.docx')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            PORTADA.
                            (Portada para el trabajo final de residencias profesionales) Portada oficial autorizada, tu trabajo debera de llevar esta portada.<br>
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Portada de residencias" download href='{{asset('documents/content/vinculacion/residencias/portada_residencia_itschv4.doc')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            SOLICITUD DE RESIDENCIAS.
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Solicitud de residencias " download href='{{asset('documents/content/vinculacion/residencias/solicitud_residencias.docx')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            CARTA DE PRESENTACIÓN.
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Solicitud de residencias " download href='{{asset('documents/content/vinculacion/residencias/carta presentacion.docx')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>                           
                            CARTA DE ACEPTACIÓN.
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Carta de aceptacion  de residencias " download href='{{asset('documents/content/vinculacion/residencias/carta_aceptacionv1.docx')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            FORMATO DE ASESORIA.
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Formatos de asesorias  de residencias " download href='{{asset('documents/content/vinculacion/residencias/asesoria.doc')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            FORMATO DE EVALUACIÓN XXIX.
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Formato de evaluación residencias " download href='{{asset('documents/content/vinculacion/residencias/evaluacion_xxix.docx')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            FORMATO DE EVALUACIÓN XXX.
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Formato de evaluación residencias " download href='{{asset('documents/content/vinculacion/residencias/evaluacion_xxx.docx')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            ENCUESTA DEL ASESOR EXTERNO.
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Encuesta del asesor externo " download href='{{asset('documents/content/vinculacion/residencias/encuesta_ases_extad19.docx')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                            CARTA DE TERMINACIÓN.
                            <p align="center">
                            <a target="_blank" data-toogle="tooltip"  title="Carta de terminacion  de residencias " download href='{{asset('documents/content/vinculacion/residencias/carta_terminacion_ver2.docx')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Directorios de empresas-->
            <hr class="red">
            <h5>Directorio de empresas en Michoacán</h5>
            <a target="_blank" data-toogle="tooltip"  title="Directorio" download href='{{asset('documents/content/vinculacion/residencias/dir_emp_michoacan_res.pdf')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
            <br>
            <h5>Directorio de empresas en Celaya</h5>
            <hr>
            <a target="_blank" data-toogle="tooltip"  title="Directorio" download href='{{asset('documents/content/vinculacion/residencias/dir_emp_celaya_res.pdf')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
            <br>
            <h5>Directorio de empresas en Querétaro</h5>
            <hr>
            <a target="_blank" data-toogle="tooltip"  title="Directorio" download href='{{asset('documents/content/vinculacion/residencias/dir_emp_queretaro_res.pdf')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
            <br>
            <h5>Directorio de empresas en Toluca</h5>
            <hr>
            <a target="_blank" data-toogle="tooltip"  title="Directorio" download href='{{asset('documents/content/vinculacion/residencias/dir_emp_toluca_res.pdf')}}' type="button" download  class="btn btn-primary">     <i class='fas fa-download' style='font-size:20px'></i></a>
            <br>
            <br>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
@endsection
