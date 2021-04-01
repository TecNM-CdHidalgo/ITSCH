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
                <h5 id="clave"> <b>{{ $pro_act->plan_estudios }}</b>   </h5>
                <div  class="collapse demo">                    
                    <input type="text" class="form-control" name="plan_estudios" value="{{ $pro_act->plan_estudios }}">
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
            </thead>
            <tbody>
                @foreach ($especialidades as $esp)
                    <tr>
                        <td>{{ $esp->nombre }}</td>
                        <td>{{ $esp->clave }}</td>
                        <td>{{ $esp->objetivo }}</td>
                    </tr> 
                @endforeach                                            
            </tbody>
        </table>

        <h3>¿Que es un ingeniero en {{ $pro_act->nombre }}?</h3>
        <hr>
        <p id="p_definicion">{{ $pro_act->definicion }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="definicion" name="definicion">
                {{ $pro_act->definicion }}
            </textarea>
        </div>
        <br>

        <h3>Misión de {{ $pro_act->nombre }}</h3>
        <hr>
        <p id="p_mision">{{ $pro_act->mision }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="mision" name="mision">
                {{ $pro_act->mision }}
            </textarea>
        </div>
        <br>

        <h3>Visión de {{ $pro_act->nombre }}</h3>
        <hr>
        <p id="p_vision">{{ $pro_act->vision }} </p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="vision" name="vision">
                {{ $pro_act->vision }}
            </textarea>
        </div>
        <br>

        <h3>Politica de {{ $pro_act->nombre }}</h3>
        <hr>
        <p id="p_politica">{{ $pro_act->politica }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="politica" name="politica">
                {{ $pro_act->politica }}
            </textarea>
        </div>
        <br>

        <h3>Objetivo de {{ $pro_act->nombre }}</h3>
        <hr>
        <p id="p_objetivo">{{ $pro_act->objetivo }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="objetivo" name="objetivo">
                {{ $pro_act->objetivo }}
            </textarea>
        </div>
        <br>

        <h3>Perfil de ingreso</h3>
        <hr>
        <p id="p_ingreso">{{ $pro_act->per_ingreso }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="ingreso" name="per_ingreso">
                {{ $pro_act->per_ingreso }}
            </textarea>
        </div>
        <br>

        <h3>Perfil de egreso</h3>
        <hr>
        <p id="p_egreso">{{ $pro_act->per_egreso }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="egreso" name="per_egreso">
                {{ $pro_act->per_egreso }}
            </textarea>
        </div>
        <br>

        <h3>Campo laboral</h3>
        <hr>
        <p id="p_campo">{{ $pro_act->campo }}</p>
        <div  class="collapse demo">
            <textarea class="form-control" rows="5" id="egreso" name="campo">
                {{ $pro_act->campo }}
            </textarea>
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

        <h3>PIID del programa educativo</h3>
        <hr>
        <div  class="collapse demo">
            <h6>Seleccona el archipo del PIID</h6>
            <input type="file" class="form-control-file border" name="piid">
        </div>
        <br>

        <h3>Reticula del programa educativo</h3>
        <hr>
        <div  class="collapse demo">
            <h6>Seleccona el archipo de la reticula</h6>
            <input type="file" class="form-control-file border" name="materia">
        </div>
        <br>

        <h3>Plan de estudios</h3>
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

        <h3>Estructura académica</h3>
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
        </script>
    @endsection
@endsection
