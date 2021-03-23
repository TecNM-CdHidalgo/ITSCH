@extends('layouts.plant_admin')

@section('contenido')
    <div class="row">
        <div class="col-sm-3">
            <h5>Carreras</h5>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-5">
            <form id="formMostrar">
                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Carrera</span>
                    </div>
                    <select class="form-control form-control-sm" id="carrera" required>
                        @foreach($programas as $pro)
                            <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                        @endforeach                              
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success" onclick="datosEnviar()">Mostrar</button>
                    </div>
                </div>  
            </form>
            <div class="collapse demo" style="text-align: right;">                

                <a href="{{ route('carreras.editCarrera') }}" type="button" class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar Carreras</a>
            </div>
        </div>
        <div class="col-sm-2" style="text-align: right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target=".demo" onclick="ocultar()" id="btn_editar">Editar</button>
            <div  class="collapse demo">
                <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target=".demo" onclick="mostrar()">Cancelar</button>
            </div>
        </div>

    </div>   
    <hr> 
    <form action="{{ route('carreras.updateCarreraCom',$pro_act->id) }}">
        <input type="hidden" id="idCarrSel" name="idCarrSel" readonly  value="{{ $pro_act->id  }}">
        <div class="row">
            <div class="col-sm-8">
                <h4 id="n_carrera">{{ $pro_act->nombre }}</h4>
                <div  class="collapse demo">
                    <input type="text" value="{{ $pro_act->nombre }}" class="form-control">
                </div>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
        </div>

        <hr>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8" style="text-align: center">
                <img src="{{ asset('images/content/oferta educativa/sistemas/lgsititsch.png') }}" alt="img_carrera" style="max-width: 400px; max-heigth:400px;">
                <div  class="collapse demo">
                    <h5>Seleccona una imagen para el logo de la carrera</h5>
                    <input type="file" class="form-control-file border" name="logo">
                </div>
                <br>
                <br>
                <h5 id="clave"> <b>{{ $pro_act->clave }}</b>   </h5>
                <div  class="collapse demo">                    
                    <input type="text" class="form-control" name="clave" value="{{ $pro_act->clave }}">
                </div>
                <h4> <b>ESPECIALIDAD(ES)</b> </h4>
                <div class="collapse demo" style="text-align: right;">
                    <a href="{{ route('carreras.editEspecialidad',1) }}" class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar</a>
                </div>
                <table class="table">
                    <thead>
                        <th>Nombre</th>
                        <th>Clave</th>
                        <th>Objetivo</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Ingenieria de Software</td>
                        <td>ISIE-ISO-2020-02</td>
                    </tr>
                    <tr>
                        <td>Marketing Digital</td>
                        <td>ISIE-MKT-2020-01</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>

        <h3>¿QUE ES UN INGENIERO EN SISTEMAS COMPUTACIONALES?</h3>
        <hr>
        <p id="p_definicion">El ingeniero en Sistemas computacionales es una persona profesional, comprometida
        con la generación de tecnología para el progreso de México. Es capaz de realizar programas
        específicos, como aplicaciones de oficina, juegos, películas animadas, software administrativo
        y científico, aplica y crea nuevas tecnologías y sistemas de administración y redes para
        intercambio de información, como la internet.</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="definicion" name="definicion">
                El ingeniero en Sistemas computacionales es una persona profesional, comprometida con la generación de tecnología para el progreso de México. Es capaz de realizar programas específicos, como aplicaciones de oficina, juegos, películas animadas, software administrativo y científico, aplica y crea nuevas tecnologías y sistemas de administración y redes para intercambio de información, como la internet.
            </textarea>
        </div>
        <br>

        <h3>MISIÓN DE INGENIERÍA EN SISTEMAS COMPUTACIONALES</h3>
        <hr>
        <p id="p_mision">“Formar profesionistas capaces de integrar y administrar sistemas computacionales, que contribuyan a la productividad y el logro de los objetivos estratégicos de las organizaciones; caracterizándose por ser líderes, críticos, competentes, éticos y con visión empresarial, comprometidos con el desarrollo sustentable”.
            Con esta misión el Programa Educativo busca formar profesionales capaces de influir en su medio ambiente, transformarlo y aplicar tecnología que contribuya al desarrollo regional.</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="mision" name="mision">
                “Formar profesionistas capaces de integrar y administrar sistemas computacionales, que contribuyan a la productividad y el logro de los objetivos estratégicos de las organizaciones; caracterizándose por ser líderes, críticos, competentes, éticos y con visión empresarial, comprometidos con el desarrollo sustentable”. Con esta misión el Programa Educativo busca formar profesionales capaces de influir en su medio ambiente, transformarlo y aplicar tecnología que contribuya al desarrollo regional.
            </textarea>
        </div>
        <br>

        <h3>VISIÓN DE INGENIERÍA EN SISTEMAS COMPUTACIONALES</h3>
        <hr>
        <p id="p_vision">“Ser un programa educativo de vanguardia, acreditado y reconocido por su alta calidad académica en la formación de profesionistas en tecnologías de la información y comunicaciones, que sean capaces de desarrollar el sector tecnológico de su entorno de manera sustentable”.

            Con esta visión el Programa Educativo busca contribuir a la transformación de la región, y particularmente de la Educación Superior Tecnológica en México, orientando sus esfuerzos hacia el desarrollo humano sustentable y la competitividad.</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="vision" name="vision">
                “Ser un programa educativo de vanguardia, acreditado y reconocido por su alta calidad académica en la formación de profesionistas en tecnologías de la información y comunicaciones, que sean capaces de desarrollar el sector tecnológico de su entorno de manera sustentable”. Con esta visión el Programa Educativo busca contribuir a la transformación de la región, y particularmente de la Educación Superior Tecnológica en México, orientando sus esfuerzos hacia el desarrollo humano sustentable y la competitividad.
            </textarea>
        </div>
        <br>

        <h3>POLITICA DE INGENIERÍA EN SISTEMAS COMPUTACIONALES</h3>
        <hr>
        <p id="p_politica">La carrera de Ingeniería en Sistemas Computacionales forma profesionales líderes en el área Químico – Biológica que generan soluciones prácticas a problemáticas reales en el sector productivo, educativo y científico.</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="politica" name="politica">
                La carrera de Ingeniería en Sistemas Computacionales forma profesionales líderes en el área Químico – Biológica que generan soluciones prácticas a problemáticas reales en el sector productivo, educativo y científico.
            </textarea>
        </div>
        <br>

        <h3>OBJETIVO DE INGENIERÍA EN SISTEMAS COMPUTACIONALES</h3>
        <hr>
        <p id="p_objetivo">Formar profesionales íntegros de la Ingeniería en Sistemas Computacionales competentes para trabajar en equipos multidisciplinarios y multiculturales que, con sentido ético, crítico, creativo, emprendedor y actitud de liderazgo, diseñe, construya, controle, y optimice sistemas, y tecnologías sustentables para la producción de bienes y servicios que contribuyan a elevar el nivel de vida de la sociedad.</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="objetivo" name="objetivo">
                Formar profesionales íntegros de la Ingeniería en Sistemas Computacionales competentes para trabajar en equipos multidisciplinarios y multiculturales que, con sentido ético, crítico, creativo, emprendedor y actitud de liderazgo, diseñe, construya, controle, y optimice sistemas, y tecnologías sustentables para la producción de bienes y servicios que contribuyan a elevar el nivel de vida de la sociedad.
            </textarea>
        </div>
        <br>

        <h3>PERFIL DE INGRESO</h3>
        <hr>
        <p id="p_ingreso">Formar profesionales íntegros de la Ingeniería en Sistemas Computacionales competentes para trabajar en equipos multidisciplinarios y multiculturales que, con sentido ético, crítico, creativo, emprendedor y actitud de liderazgo, diseñe, construya, controle, y optimice sistemas, y tecnologías sustentables para la producción de bienes y servicios que contribuyan a elevar el nivel de vida de la sociedad.</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="ingreso" name="ingreso">
                Formar profesionales íntegros de la Ingeniería en Sistemas Computacionales competentes para trabajar en equipos multidisciplinarios y multiculturales que, con sentido ético, crítico, creativo, emprendedor y actitud de liderazgo, diseñe, construya, controle, y optimice sistemas, y tecnologías sustentables para la producción de bienes y servicios que contribuyan a elevar el nivel de vida de la sociedad.
            </textarea>
        </div>
        <br>

        <h3>PERFIL DE EGRESO</h3>
        <hr>
        <p id="p_egreso">Formar profesionales íntegros de la Ingeniería en Sistemas Computacionales competentes para trabajar en equipos multidisciplinarios y multiculturales que, con sentido ético, crítico, creativo, emprendedor y actitud de liderazgo, diseñe, construya, controle, y optimice sistemas, y tecnologías sustentables para la producción de bienes y servicios que contribuyan a elevar el nivel de vida de la sociedad.</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="egreso" name="egreso">
                Formar profesionales íntegros de la Ingeniería en Sistemas Computacionales competentes para trabajar en equipos multidisciplinarios y multiculturales que, con sentido ético, crítico, creativo, emprendedor y actitud de liderazgo, diseñe, construya, controle, y optimice sistemas, y tecnologías sustentables para la producción de bienes y servicios que contribuyan a elevar el nivel de vida de la sociedad.
            </textarea>
        </div>
        <br>

        <h3>CAMPO LABORAL</h3>
        <hr>
        <p id="p_campo">Es uno de los más amplios de las carreras que se ofrecen en el país, ya que los sistemas computacionales se están ampliando en todos los ámbitos, por poner ejemplos mencionaremos la medicina, la educación, la investigación, la industria y el desarrollo. Los cargos que el Ingeniero en Sistemas Computacionales podrá tener son: Gerente de sistemas, director de área de una amplia gama de procesos y proyectos tecnológicos, administrador de centros de cómputo, administrador de bases de datos, administrador de servidores multiplataforma, creador y administrador de proyectos de data warehouse, programador de aplicaciones en los niveles junior, sénior, master, arquitecto de software, consultor de empresas públicas y privadas así como de gobierno, administrador de redes de comunicaciones, creador y verificador de certificados digitales CFDI, web master, etc. Además formar sus propias empresas de creación e instalación de redes, desarrollo de software, administración de bases de datos, diseño, creación y montaje de sitios web, creador de proyectos de comercio electrónico, creación de aplicaciones para dispositivos móviles, mantenimiento preventivo y correctivo de equipo de cómputo.</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="egreso" name="egreso">
                Es uno de los más amplios de las carreras que se ofrecen en el país, ya que los sistemas computacionales se están ampliando en todos los ámbitos, por poner ejemplos mencionaremos la medicina, la educación, la investigación, la industria y el desarrollo. Los cargos que el Ingeniero en Sistemas Computacionales podrá tener son: Gerente de sistemas, director de área de una amplia gama de procesos y proyectos tecnológicos, administrador de centros de cómputo, administrador de bases de datos, administrador de servidores multiplataforma, creador y administrador de proyectos de data warehouse, programador de aplicaciones en los niveles junior, sénior, master, arquitecto de software, consultor de empresas públicas y privadas así como de gobierno, administrador de redes de comunicaciones, creador y verificador de certificados digitales CFDI, web master, etc. Además formar sus propias empresas de creación e instalación de redes, desarrollo de software, administración de bases de datos, diseño, creación y montaje de sitios web, creador de proyectos de comercio electrónico, creación de aplicaciones para dispositivos móviles, mantenimiento preventivo y correctivo de equipo de cómputo.
            </textarea>
        </div>
        <br>


        <h3>OBJETIVOS EDUCACIONALES</h3>
        <div class="collapse demo" style="text-align: right;">
            <button class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar</button>
        </div>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Criterio</th>
                    <th>Indicador</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                </tr>
                </tbody>
            </table>
        </div>
        <br>

        <h3>ATRIBUTOS DE EGRESO</h3>
        <div class="collapse demo" style="text-align: right;">
            <button class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar</button>
        </div>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th>No. Atributo</th>
                    <th>Descripción</th>
                    <th>Criterio de desempeño</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                </tr>
                </tbody>
            </table>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <img src="{{ asset('images/content/oferta educativa/sistemas/cacei-sistemas.png') }}" alt="acreditacion" style="max-width: 100%; max-height:100%;">
                <div  class="collapse demo">
                    <h6>Seleccona una imagen para el certificado de acreditación</h6>
                    <input type="file" class="form-control-file border" name="acreditacion">
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <br>

        <h3>PIID DEL PROGRAMA EDUCATIVO</h3>
        <hr>
        <div  class="collapse demo">
            <h6>Seleccona el archipo del PIID</h6>
            <input type="file" class="form-control-file border" name="acreditacion">
        </div>
        <br>

        <h3>RETICULA DEL PROGRAMA EDUCATIVO</h3>
        <hr>
        <div  class="collapse demo">
            <h6>Seleccona el archipo de la reticula</h6>
            <input type="file" class="form-control-file border" name="acreditacion">
        </div>
        <br>

        <h3>PLAN DE ESTUDIO</h3>
        <hr>

        <div id="accordion">
            <div class="card">
                <div class="card-header" style="text-align: right">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        <i class="fa fa-plus-circle" style="font-size:36px"></i>
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="collapse demo" style="text-align: right;">
                            <button class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Clave</th>
                                    <th>Archivo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Doe</td>
                                    <td>002</td>
                                    <td>xx</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Doe</td>
                                    <td>002</td>
                                    <td>xx</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Doe</td>
                                    <td>002</td>
                                    <td>xx</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <h3>ESTRUCTURA ACADÉMICA</h3>
        <hr>

        <div class="collapse demo" style="text-align: right;">
            <button class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar</button>
        </div>

        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Area</th>
                    <th>Detallles</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>
                        <i class='far fa-eye' style='font-size:18px' data-toggle="modal" data-target="#myModal"></i>
                    </td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>
                        <i class='far fa-eye' style='font-size:18px' data-toggle="modal" data-target="#myModal"></i>
                    </td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>
                        <i class='far fa-eye' style='font-size:18px' data-toggle="modal" data-target="#myModal"></i>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <br>

        {{-- Botones de guardar y cancelar --}}
        <div class="row collapse demo">
            <div class="col-sm-8"></div>
            <div class="col-sm-2">
                <button class="btn btn-sm btn-info" data-toggle="collapse" data-target=".demo" onclick="mostrar()">Cancelar</button>
            </div>
            <div class="col-sm-2">
                <button  type="submit" class="btn btn-sm btn-success">Guardar</button>
            </div>
        </div>
    </form>
    <br>

    <h2> Contacto    </h2>
    <hr>

    <li> Oscar Delgado Camacho</li>
    <li>Tel. (786) 154900 ext. 129 </li>
    <li>sistemas@itsch.edu.mx </li>
    <li>División de Ing. En Sistemas Computacionales, edificio “A” segundo piso.</li>
    <li>Página de Facebook: Ing. Sistemas -Itsch</li>
    <hr class="red">
    <form role="form">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label class="control-label" for="email-01">Nombre:</label>
                    <input class="form-control" id="email-01" placeholder="Nombre" type="text">
                </div>

                <div class="form-group">
                    <label class="control-label" for="email-01">Correo electrónico:</label>
                    <input class="form-control" id="email-01" placeholder="Correo electrónico" type="text">
                </div>

                <div class="form-group">
                    <label class="control-label" for="password-01">Teléfono</label>
                    <input class="form-control" id="password-01" placeholder="telefono" type="text">
                </div>

                <div class="form-group">
                    <label class="control-label" for="password-01">Carrera de preferencia</label>
                    <select class="form-control form-control-sm" name="nom_carr" id="carrera" required>
                        <option value="Sistemas">Ingeniería en Sistemas Computacionales</option>
                        <option value="Industrial">Ingeniería Industrial</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="email-01">Pregunta(s) y/ó comentario(s):</label>
                    <textarea class="form-control" name="comentario" id="comentario" cols="30" rows="6"></textarea>
                </div>

                <div style="text-align: right">
                    <button type="submit" class="btn btn-primary btn-sm">
                        ENVIAR
                    </button>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </form>
    <br>

    {{-- Sección de modals --}}
    <!-- Modal detalles de profesores -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Nombre de profesor</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
        </div>
    </div>
    {{-- Fin de sección --}}

    @section('js')
        <script>
            //Ocultar elementos
            function ocultar()
            {
                document.getElementById('p_definicion').style.display = 'none';
                document.getElementById('n_carrera').style.display = 'none';
                document.getElementById('btn_editar').style.display = 'none';
                document.getElementById('p_mision').style.display = 'none';
                document.getElementById('p_vision').style.display = 'none';
                document.getElementById('p_politica').style.display = 'none';
                document.getElementById('clave').style.display = 'none';
                document.getElementById('p_objetivo').style.display = 'none';
                document.getElementById('p_ingreso').style.display = 'none';
                document.getElementById('p_egreso').style.display = 'none';
                document.getElementById('p_campo').style.display = 'none';
            }

            //Mostrar elementos
            function mostrar()
            {
                document.getElementById('p_definicion').style.display = 'block';
                document.getElementById('n_carrera').style.display = 'block';
                document.getElementById('btn_editar').style.display = 'block';
                document.getElementById('p_mision').style.display = 'block';
                document.getElementById('p_vision').style.display = 'block';
                document.getElementById('p_politica').style.display = 'block';
                document.getElementById('clave').style.display = 'block';
                document.getElementById('p_objetivo').style.display = 'block';
                document.getElementById('p_ingreso').style.display = 'block';
                document.getElementById('p_egreso').style.display = 'block';
                document.getElementById('p_campo').style.display = 'block';
            }


            //Obtiene datos de la carrera a mostrar
            function datosEnviar()
            {
                var idCarr=$( "#carrera" ).val();   
                $('#idCarrSel').val(idCarr);            
                $('#formMostrar').attr('action','{{url('contenido/carreras')}}/showCarrera/'+idCarr);
            }

            //Seleccionamos la opcion del select elegida por el usuario, cada ves que se carga la pagina
            $(document).ready(function()
            {
                $("#carrera").val({{ $pro_act->id }});
            });
            
            //Obtener ID del option seleccionado
            function obtId()
            {
                id=$("#carrera").val();
                alert(id);
            }
        </script>
    @endsection
@endsection
