@extends('layouts.plant_admin')

@section('contenido')
    {{-- Campo para guardar el nombre de la carrera en toda la pagina --}}
    <input type="hidden" id="nom_pro" readonly value="{{ $programa[0]->nombre }}">
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
            {{-- Permisos para que solo el administrador de de alta las carreras --}}
            @if (Auth::User()->tipo == "Administrador")
                <div class="collapse demo" style="text-align: right;">
                    <a href="{{ route('carreras.editCarrera') }}" type="button" class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar Carreras</a>
                </div>
            @endif

        </div>
        <div class="col-sm-2" style="text-align: right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target=".demo" onclick="ocultar()" id="btn_editar">Editar</button>
            <div  class="collapse demo">
                <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target=".demo" onclick="mostrar()">Cancelar</button>
            </div>
        </div>
    </div>
    <hr>

    <form enctype="multipart/form-data" method="POST" action="{{ route('carreras.updateCarreraCom',$pro_act->id) }}">
        {{csrf_field()}}
        <input type="hidden" id="idCarrSel" name="idCarrSel" readonly  value="{{ $pro_act->id  }}">
        <div class="row">
            <div class="col-sm-8">
                <h4 id="n_carrera">{{ $pro_act->nombre }}</h4>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-1">

                <a href="{{ route('carreras.showContacto',$pro_act->id) }}"><i class='fas fa-bell' style='font-size:18px;color:red' title="Ver mensajes"></i> {{ $n_msg }}</a>

            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8" style="text-align: center">
                @if($archivos->count()>0)
                    <img src="{{ asset('storage/carreras_imagenes/'.$archivos[0]->nom_img_carr) }}" alt="img_carrera" style="max-width: 400px; max-heigth:400px;">
                @else
                    <img src="{{ asset('images/no_img.jpg') }}" alt="img_carrera" style="max-width: 400px; max-heigth:400px;">
                @endif
                <div  class="collapse demo">
                    <h5>Seleccona una imagen para el logo de la carrera</h5>
                    <input type="file" class="form-control-file border" name="logo">
                </div>
                <br>
                <br>
                <h6>Clave del plan de estudios</h6>
                <h5 id="clave"> <b>{{ $pro_act->plan_estudios }}</b>   </h5>
                <hr>
                <div  class="collapse demo">
                    <input type="text" class="form-control" name="plan_estudios" value="{{ $pro_act->plan_estudios }}" placeholder="Escribe la clave del plan de estudios">
                </div>
                <h4> <b>ESPECIALIDAD(ES)</b> </h4>
            </div>
            <div class="col-sm-2"></div>
        </div>
        {{-- Tabla de especialidades --}}
        <div class="collapse demo" style="text-align: right;">
            <a href="{{ route('carreras.editEspecialidad',$pro_act->id) }}" class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar</a>
        </div>
        <table class="table">
            <thead>
                <th style="width: 25%;">Nombre</th>
                <th style="width: 15%;">Clave</th>
                <th>Objetivo</th>
                <th>Retícula</th>
            </thead>
            <tbody>
                @foreach ($especialidades as $esp)
                    <tr>
                        <td>{{ $esp->nombre }}</td>
                        <td>{{ $esp->clave }}</td>
                        <td>{{ $esp->objetivo }}</td>
                        <td>
                            <a href="{{ asset('storage/carreras_archivos/'.$esp->nom_arch_ret) }}" target="_blank" download type="button" class="btn btn-primary btn-sm" title="Descargar reticula"><i class='fas fa-book' style='font-size:16px'></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>¿Que es un ingeniero en {{ $pro_act->nombre }}?</h3>
        <hr>
        <p id="p_definicion">{{ $pro_act->definicion }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="definicion" name="definicion">{{ $pro_act->definicion }}</textarea>
        </div>
        <br>

        <h3>Misión de {{ $pro_act->nombre }}</h3>
        <hr>
        <p id="p_mision">{{ $pro_act->mision }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="mision" name="mision">{{ $pro_act->mision }}</textarea>
        </div>
        <br>

        <h3>Visión de {{ $pro_act->nombre }}</h3>
        <hr>
        <p id="p_vision">{{ $pro_act->vision }} </p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="vision" name="vision">{{ $pro_act->vision }}</textarea>
        </div>
        <br>

        <h3>Politica de {{ $pro_act->nombre }}</h3>
        <hr>
        <p id="p_politica">{{ $pro_act->politica }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="politica" name="politica">{{ $pro_act->politica }}</textarea>
        </div>
        <br>

        <h3>Objetivo de {{ $pro_act->nombre }}</h3>
        <hr>
        <p id="p_objetivo">{{ $pro_act->objetivo }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="objetivo" name="objetivo">{{ $pro_act->objetivo }}</textarea>
        </div>
        <br>

        <h3>Perfil de ingreso</h3>
        <hr>
        <p id="p_ingreso">{{ $pro_act->per_ingreso }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="ingreso" name="per_ingreso">{{ $pro_act->per_ingreso }}</textarea>
        </div>
        <br>

        <h3>Perfil de egreso</h3>
        <hr>
        <p id="p_egreso">{{ $pro_act->per_egreso }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="egreso" name="per_egreso">{{ $pro_act->per_egreso }}</textarea>
        </div>
        <br>

        <h3>Campo laboral</h3>
        <hr>
        <p id="p_campo">{{ $pro_act->campo }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="egreso" name="campo">{{ $pro_act->campo }}</textarea>
        </div>
        <br>

        <h3>Acreditación CACEI</h3>
            @if(!$archivos->isEmpty())
                @if($archivos[0]->nom_arch_acred<>"")
                    <a href="{{ asset('storage/carreras_archivos/'.$archivos[0]->nom_arch_acred) }}" target="_blank" download type="button" class="btn btn-primary btn-sm">Acreditación {{ $pro_act->nombre }}</a>
                @endif
            @endif
        <div  class="collapse demo">
            <h6>Seleccona una archivo para el certificado de acreditación</h6>
            <input type="file" class="form-control-file border" name="acreditacion">
        </div>

        <hr class="red">

        <h3>PIID del programa educativo</h3>
            @if(!$archivos->isEmpty())
                @if($archivos[0]->nom_arch_piid<>"")
                    <a href="{{ asset('storage/carreras_archivos/'.$archivos[0]->nom_arch_piid) }}" target="_blank" download type="button" class="btn btn-primary btn-sm">PIID {{ $pro_act->nombre }}</a>
                @endif
            @endif
        <div  class="collapse demo">
            <h6>Seleccona el archipo del PIID</h6>
            <input type="file" class="form-control-file border" name="piid">
        </div>
        <br>
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


    <hr class="red">
    <h3>Plan de estudios</h3>
    <hr class="red">

    <div class="collapse demo" style="text-align: right;">
        <a href="{{ route('carreras.editPlanEstudios',$pro_act->id) }}" class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i>Editar</a>
    </div>
    <br>
    <div id="accordion">
        <div class="card">
            <div class="card-header" style="text-align: right">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                    <i class="fa fa-plus-circle" style="font-size:36px"></i>
                </a>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <h5 id="nom_especialidad">Materias de la especialidad de:</h5>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-5">
                            <div class="input-group mb-3 input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Especialidad</span>
                                </div>
                                {{-- Combo con las especialidades de la carrera --}}
                                <select class="form-control form-control-sm" id="id_especialidad" name="id_esp" required>
                                    @foreach($especialidades as $esp)
                                        <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    {{--  <button type="submit" class="btn btn-success">Mostrar</button>--}}
                                    <button type="button" class="btn btn-success" onclick="act_tabla()">Mostrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="red">

                    <div class="table-responsive">
                        <table class="table table-sm" id="tabMatEsp">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Temario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materias_esp as $me )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $me->clave }}</td>
                                        <td>{{ $me->nombre }}</td>
                                        <td>
                                            <a href="{{ asset('storage/carreras_planes_estudio/'.$programa[0]->nombre.'/especialidad/'.$me->nom_archivo) }}"
                                            download type="button" class="btn btn-success btn-sm" title="Descargar temario"><i class='fas fa-book-open' style='font-size:14px'></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="red">
                    <br>

                    <h5>Materias de tronco común</h5>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Temario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mat_com as $mat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mat->clave }}</td>
                                        <td>{{ $mat->nombre }}</td>
                                        <td>
                                            <a href="{{ asset('storage/carreras_planes_estudio/'.$programa[0]->nombre.'/tron_comun/'.$mat->nom_archivo) }}" download type="button" class="btn btn-success btn-sm" title="Descargar temario"><i class='fas fa-book-open' style='font-size:14px'></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>

    <h3>Objetivos educacionales</h3>
    <div class="collapse demo" style="text-align: right;">
        <a href="{{ route('carreras.editObjetivos',$pro_act->id) }}" class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th style="width: 40%">Descripción</th>
                <th style="width: 40%">Criterio</th>
                <th style="width: 20%">Indicador</th>
            </thead>
            <tbody>
                @foreach ($objetivos as $obj)
                    <tr>
                        <td>{{ $obj->descripcion }}</td>
                        <td>{{ $obj->criterio }}</td>
                        <td>{{ $obj->indicador }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>

    <h3>Atributos de egreso</h3>
    <div class="collapse demo" style="text-align: right;">
        <a href="{{ route('carreras.editAtributos',$pro_act->id) }}" class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar</a>
    </div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <th style="width: 5%">Numero</th>
                <th style="width: 35%">Descripción</th>
                <th style="width: 40%">Criterios</th>
            </thead>
            <tbody>
                @php
                    $van=0;
                    $atrAnt="";
                @endphp
                @foreach ($atributos as $atr )
                    @php
                        if($atr->numAtr==$atrAnt)
                        {
                            $van=$van+1;
                            echo "<tr>";
                        }
                        else
                        {
                            echo "<tr>";
                            $atrAnt=$atr->numAtr;
                            $van=0;

                        }
                    @endphp
                    @if($van==0)
                            <td>{{ $atr->numAtr }}</td>
                            <td>{{ $atr->desAtr }}</td>
                            <td>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>{{  $atr->numCri }}</td>
                                            <td>{{  $atr->desCri }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                    @else
                        <td></td>
                        <td></td>
                        <td>
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>{{  $atr->numCri }}</td>
                                        <td>{{  $atr->desCri }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>

                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <br>

    <h3>Estructura académica</h3>
    <hr>

    <div class="collapse demo" style="text-align: right;">
        <a href="{{ route('carreras.editEstructura',$pro_act->id) }}" class="btn btn-sm btn-success"><i class='fas fa-edit' style='font-size:14px'></i> Editar</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <th style="width: 5%">Numero</th>
                <th style="width: 30%">Nombre</th>
                <th style="width: 40%">Area</th>
                <th style="width: 25%">Detalle</th>
            </thead>
            <tbody>
                @foreach ($personal as $per)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $per->nombre }} {{ $per->ap_paterno }} {{ $per->ap_materno }}</td>
                        <td>{{ $per->puesto }}</td>
                        <td>
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#myModalDetalleEst" onclick="obtDetalleEst({{ $per }},{{ $formacion }},{{ $productos }},{{ $per->id }})">
                                <i class='far fa-eye' style='font-size:14px'></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div>
    <br>

    <h2> Datos de Contacto    </h2>
    <hr>
    @foreach ($personal as $per)
        @if((strpos($per->puesto,'Jefe')!== false||strpos($per->puesto,'jefe')!== false) && $per->id_programa==$pro_act->id)
            <li>{{ $personal[0]->nombre }} {{ $personal[0]->ap_paterno }} {{ $personal[0]->ap_materno }}</li>
            <li>Tel. {{ $personal[0]->telefono }} Ext. {{ $personal[0]->extension }} </li>
            <li>Email. {{ $personal[0]->email }} </li>
            <li>{{ $personal[0]->puesto }}, edificio “A” segundo piso.</li>
        @endif
    @endforeach
    <li>Ubicación: Edificio “A” planta alta.</li>
    <hr class="red">

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

    <!-- Modal Vista de Detalles -->
    <div class="modal fade" id="myModalDetalleEst">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background-color:#000;">
                    <h4 class="modal-title" id="nom_per"></h4>
                </div>
                <form id="formEditDetalle">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="text-center">
                            <img alt="Foto" style="height:40%; width:25%;" id="img_per">
                        </div>
                        <b><h5>Formación:</h5></b>
                        <div id="id_formacion"></div>
                        <b><h5>Productos:</h5></b>
                        <div id="id_productos"></div>
                        <b><h5>Email:</h5></b>
                        <div class="form-group">
                            <p id="det_email"></p>
                        </div>
                        <br>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Fin de sección --}}

    @section('js')
        <script>

            //Funcion ajax para actualizar tabla de materias de especialidad
            function act_tabla()
            {
                //Funcion json para pedir datos con get
                //console.log('especialidad:'+$('#id_especialidad').val());
                $.getJSON('/contenido/carreras/actualizarTabla/'+$('#id_especialidad').val()).done(
                    //Funcion en caso de que el servidor devuelva datos
                    function(datos)
                    {
                        //Vaciamos la tabla
                        $('#tabMatEsp').html('');
                        let cont = 1;
                        datos.forEach(me => {
                            let fila='<tr><td>'+cont+
                            '</td><td>'+me.clave+
                            '</td><td>'+me.nombre+
                            '</td><td>'+
                                "<a href='"+me.link+"' target='_blank' download type='button' class='btn btn-success btn-sm' title='Descargar temario'><i class='fas fa-book-open' style='font-size:14px'></i></a>"
                            +'</td></tr>';
                            $('#tabMatEsp').append(fila);
                            cont++;
                        });
                    }
                ).fail(
                    function(error)
                    {
                        alert("No se pudo conectar al servidor");
                    }
                );
            }

            //Ocultar elementos
            function ocultar()
            {
                document.getElementById('p_definicion').style.display = 'none';
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

            //Funcion que llena el modal con los detalles de cada uno de los profesores, mostrando grados académicos y producción
            function obtDetalleEst(per,form,pro,id_prof)
            {
                $("#nom_per").text(per['nombre']+" "+per['ap_paterno']+" "+per['ap_materno']);
                $("#det_email").text(per['email']);

                //Asignamos la ruta de la foto del personal
                if(per['nom_foto']==null)
                {   //Ruta para cuando no tiene imagen asignada
                    $("#img_per").attr("src","{{ asset('images/no_img_per.png') }}");
                }
                else
                {
                    //Ruta para cuando ya tiene una imagen
                    $("#img_per").attr("src","{{ asset('storage/carreras_imagenes') }}"+"/"+ $("#nom_pro").val()+"/fotos_personal/"+ per['nom_foto'] +"");
                }

                //Obtenemos los datos de formacion de cada profesor
                var r_form=form.length;
                var cad_f="<table class='table'><thead><tr><th>Especialización</th><th>Institución Formadora</th><th>Cedula</th></tr></thead><tbody>";
                for(x=0; x<r_form; x++)
                {
                    if(form[x]['id_personal']==id_prof)
                    {
                        cad_f=cad_f+"<tr>";
                        cad_f=cad_f+"<td>"+form[x]['nombre']+"</td>";
                        cad_f=cad_f+"<td>"+form[x]['institucion_pro']+"</td>";
                        cad_f=cad_f+"<td>"+form[x]['cedula']+"</td>";
                        cad_f=cad_f+"</tr>";
                    }
                }
                cad_f=cad_f+"</tbody>";
                $("#id_formacion").html(cad_f);

                //Obtenemos los datos de productos de cada profesor
                var r_prod=pro.length;
                var cad_p="<table class='table'><thead><tr><th>Categoría</th><th>Nombre</th><th>Función desempeñada</th></tr></thead><tbody>";
                for(x=0; x<r_prod; x++)
                {
                    if(pro[x]['id_personal']==id_prof)
                    {
                        cad_p=cad_p+"<tr>";
                        cad_p=cad_p+"<td>"+pro[x]['categoria']+"</td>";
                        cad_p=cad_p+"<td>"+pro[x]['nombre']+"</td>";
                        cad_p=cad_p+"<td>"+pro[x]['funcion']+"</td>";
                        cad_p=cad_p+"</tr>";
                    }
                }
                cad_p=cad_p+"</tbody>";
                $("#id_productos").html(cad_p);

                r="{{url('contenido/carreras')}}/editDetalles/"+per['id_programa']+"/"+per['id'];

                $('#formEditDetalle').attr('action', r);
            }
        </script>
    @endsection
@endsection
