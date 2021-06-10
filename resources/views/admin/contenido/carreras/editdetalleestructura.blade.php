@extends('layouts.plant_admin')

@section('contenido')
<h4><a href="{{ route('carreras.index') }}"> Carreras/</a><a href="{{ route('carreras.editEstructura',$programa->id) }}">Estructura academica</a>/Ficha: {{ $personal->nombre }} {{ $personal->ap_paterno }} {{ $personal->ap_materno }}</h4>
<hr>
<h5>Formación</h5>
<div class="d-flex">
    <button class="btn btn-success btn-sm ml-auto" role="button" data-toggle="modal" data-target="#myModalAltasFor"><i class='fas fa-plus' style='font-size:14px'></i> Agregar</button>
</div>
<br>
<div class="table-responsive">                   
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Grado</th>
          <th>Nombre</th>
          <th>Institución</th>
          <th>Cedula</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($formacion as $form)
            <tr>
                <td>{{ $form->grado }}</td>
                <td>{{ $form->nombre }}</td>
                <td>{{ $form->institucion_pro }}</td>
                <td>{{ $form->cedula }}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalEditarFor" onclick="obtDatEditarFor({{ $form }})">
                        <i class='fas fa-edit' style='font-size:14px'></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalBajasFor" onclick="obtDatEliminarPro({{ $form }})">
                        <i class='fas fa-trash-alt' style='font-size:14px'></i>
                    </button>
                </td>
            </tr>     
        @endforeach     
      </tbody>
    </table>
  </div>

<h5>Productos</h5>
<div class="d-flex">
    <button class="btn btn-success btn-sm ml-auto" role="button" data-toggle="modal" data-target="#myModalAltasPro"><i class='fas fa-plus' style='font-size:14px'></i> Agregar</button>
</div>
<div class="table-responsive">             
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Categoria</th>
          <th>Nombre</th>
          <th>Función</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($productos as $pro)
            <tr>
                <td>{{ $pro->categoria }}</td>
                <td>{{ $pro->nombre }}</td>
                <td>{{ $pro->funcion }}</td>                
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalEditarPro" onclick="obtDatEditarPro({{ $pro }})">
                        <i class='fas fa-edit' style='font-size:14px'></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalBajasPro" onclick="obtDatEliminarPro({{ $pro }})">
                        <i class='fas fa-trash-alt' style='font-size:14px'></i>
                    </button>
                </td>
            </tr>     
        @endforeach  
      </tbody>
    </table>
  </div>
  <br>
  <br>

{{-- Sección de modals --}}
<!-- Modal Altas de Formación -->
<div class="modal fade" id="myModalAltasFor">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('carreras.storeDetallesFor') }}">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Alta de Formación académica</h4>                
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Grado</span>
                        </div>
                        <input type="text" class="form-control" name="grado" placeholder="Maestría|Doctorado|Especialidad|Licenciatura|Diplomado|Otro">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nombre del Grado</span>
                        </div>
                        <input type="text" class="form-control" name="nombre" placeholder="Ej. Maestria en ciencias de la educación">
                    </div>  
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Institución formadora</span>
                        </div>
                        <input type="text" class="form-control" name="institucion_pro" placeholder="Ej. Tecnologico de Ciudad Hidalgo">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cedula</span>
                        </div>
                        <input type="text" class="form-control" name="cedula" placeholder="Cedula o numero de identificación">
                    </div>
                                    
                    <input type="hidden" id="id_programa" name="id_programa" value="{{ $programa->id }}">
                    <input type="hidden" id="id_personal" name="id_personal" value="{{ $personal->id }}">
                    <br>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Editar formacion -->
<div class="modal fade" id="myModalEditarFor">
    <div class="modal-dialog">
    <div class="modal-content">
        <form id="formEditarForm">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar formación académica</h4>                
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Grado</span>
                        </div>
                        <input type="text" class="form-control" name="grado" id="grado">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nombre</span>
                        </div>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>  
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Institución formadora</span>
                        </div>
                        <input type="text" class="form-control" name="institucion_pro" id="institucion_pro">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cedula</span>
                        </div>
                        <input type="text" class="form-control" name="cedula" id="cedula">
                    </div>                              
                    <input type="hidden" id="id_programa" readonly name="id_programa" value="{{ $programa->id }}">
                    <input type="hidden" id="id_personal_form" readonly name="id_pesonal">
                    <br>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
        </form>

        </div>
        </div>
    </div>

    <!-- Modal Bajas Formación -->
    <div class="modal fade" id="myModalBajasFor">
        <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEliminarForm">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">¿Estas seguro de eliminar la siguiente formación académica?</h4>                
                </div>

                <!-- Modal body -->
                <div class="modal-body">                    
                    <b><label id="id_formacion_baja"></label></b>
                    <input type="hidden" readonly id="id_Profesor_baja" name="id_personal">
                    <input type="hidden" readonly id="id_programa_baja" name="id_programa" value="{{ $programa->id }}">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Eliminar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- Modal Altas de Producción -->
    <div class="modal fade" id="myModalAltasPro">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('carreras.storeDetallesPro') }}">
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Alta de Producción académica</h4>                
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Categoría</span>
                            </div>
                            <input type="text" class="form-control" name="categoria" placeholder="Investigación|Artículos|Desarrollos|Otros">
                        </div>
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" class="form-control" name="nombre" placeholder="Ej. Desarrollo de aplicacion para el control...">
                        </div>  
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Función desempeñada</span>
                            </div>
                            <select class="form-control" id="sel1" name="funcion">
                                <option value="Responsable" selected>Responsable</option>
                                <option value="Colaborador">Colaborador</option>                           
                            </select>
                        </div>
                        
                                        
                        <input type="hidden" id="id_programa" name="id_programa" value="{{ $programa->id }}">
                        <input type="hidden" id="id_personal" name="id_personal" value="{{ $personal->id }}">
                        <br>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar productos -->
    <div class="modal fade" id="myModalEditarPro">
        <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditarPro">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Editar producción académica</h4>                
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Categoría</span>
                            </div>
                            <input type="text" class="form-control" name="categoria" id="categoria">
                        </div>
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" class="form-control" name="nombre" id="nombre_pro">
                        </div>  
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Función desempeñada</span>
                            </div>
                            <select class="form-control" id="funcion" name="funcion">
                                <option value="Responsable" selected>Responsable</option>
                                <option value="Colaborador">Colaborador</option>                           
                            </select>
                        </div>
                                                    
                        <input type="hidden" id="id_programa" readonly name="id_programa" value="{{ $programa->id }}">
                        <input type="hidden" id="id_personal_pro" readonly name="id_pesonal">
                        <br>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
            </form>

            </div>
        </div>
    </div>

    <!-- Modal Bajas Productos -->
    <div class="modal fade" id="myModalBajasPro">
        <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEliminarPro">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">¿Estas seguro de eliminar la siguiente producción académica?</h4>                
                </div>

                <!-- Modal body -->
                <div class="modal-body">                    
                    <b><label id="id_produccion_baja"></label></b>
                    <input type="hidden" readonly id="id_Profesor_baja" name="id_personal">
                    <input type="hidden" readonly id="id_programa_baja" name="id_programa" value="{{ $programa->id }}">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Eliminar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
        </div>
    </div>

@endsection

{{-- Sección js --}}
@section('js')
    <script>
        function obtDatEditarFor(form)
        { 
            $("#grado").val(form['grado']);
            $("#nombre").val(form['nombre']);  
            $("#institucion_pro").val(form['institucion_pro']); 
            $("#cedula").val(form['cedula']);
            $("#id_personal_form").val(form['id_personal']); 
                                        
            r="{{url('contenido/carreras')}}/updateDetallesFormacion/"+form['id'];
            $('#formEditarForm').attr('action', r);
        }

        function obtDatEliminarPro(form)
        {
            $("#id_formacion_baja").text("Nombre:"+ form['nombre']);
            r="{{url('contenido/carreras')}}/destroyDetallesFormacion/"+form['id'];
            $('#formEliminarForm').attr('action', r);
        }

        function obtDatEditarPro(prod)
        { 
            $("#categoria").val(prod['categoria']);
            $("#nombre_pro").val(prod['nombre']);  
            $("#funcion").val(prod['funcion']);             
            $("#id_personal_pro").val(prod['id_personal']); 
                                        
            r="{{url('contenido/carreras')}}/updateDetallesProduccion/"+prod['id'];
            $('#formEditarPro').attr('action', r);
        }

        function obtDatEliminarPro(prod)
        {
            $("#id_produccion_baja").text("Nombre:"+ prod['nombre']);
            r="{{url('contenido/carreras')}}/destroyDetallesProduccion/"+prod['id'];
            $('#formEliminarPro').attr('action', r);
        }
    </script>
@endsection
{{-- Fin de sección js --}}


