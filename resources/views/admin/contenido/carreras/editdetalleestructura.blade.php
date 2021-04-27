@extends('layouts.plant_admin')

@section('contenido')
<h4><a href="{{ route('carreras.index') }}"> Carreras/</a><a href="{{ route('carreras.editEstructura',$programa->id) }}">Editar Detalle</a>/ {{ $personal->nombre }} {{ $personal->ap_paterno }} {{ $personal->ap_materno }}</h4>
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
        @foreach ($formacion as $for)
            <tr>
                <td>{{ $for->grado }}</td>
                <td>{{ $for->nombre }}</td>
                <td>{{ $for->institucion_pro }}</td>
                <td>{{ $for->cedula }}</td>
                <td>Accion</td>
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
                <td>Accion</td>
            </tr>     
        @endforeach  
      </tbody>
    </table>
  </div>

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
                            <span class="input-group-text">Nombre de la institución donde se obtuvo</span>
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

<!-- Modal Altas de Formación -->
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

@endsection