@extends('layouts.plant_admin')

@section('contenido')
  <h6>Banco de proyectos ITSCH/Modificar</h6>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">      
      <form action="{{ route('admin.contenido.banco.modificar',$banco[0]->id ) }}">
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">Carrera</span>
          </div>
          <input type="text" class="form-control" name="carrera" required value="{{ $banco[0]->carrera }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Proyecto</span>
         </div>
         <input type="text" class="form-control" name="proyecto" required value="{{ $banco[0]->proyecto }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Vacantes</span>
          </div>
          <input type="number" min="1" value="1" class="form-control" name="vacantes" required value="{{ $banco[0]->vacantes }}"> 
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Empresa/Institución</span>
          </div>
          <input type="text" class="form-control" name="empresa" required value="{{ $banco[0]->empresa }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Dirección</span>
          </div>
          <textarea class="form-control" rows="3" name="direccion" >{{ $banco[0]->direccion }}</textarea>
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Telefono de contacto</span>
          </div>
          <input type="text" class="form-control" name="telefono" value="{{ $banco[0]->telefono }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Correo de contacto</span>
          </div>
          <input type="text" class="form-control" name="correo" required value="{{ $banco[0]->correo }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Docente responsable</span>
          </div>
          <input type="text" class="form-control" name="docente" value="{{ $banco[0]->docente }}">
        </div>
        <button type="submit" class="btn btn-sm btn-success">Actualizar</button>        
      </form>
      <br>
    </div>
    <div class="col-sm-2"></div>
  </div>
  
@endsection