@extends('layouts.plant_admin')

@section('contenido')
  <h6>Banco de proyectos ITSCH/Crear</h6>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">      
      <form action="{{ route('admin.contenido.banco.guardar') }}">
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">Carrera</span>
          </div>
          <input type="text" class="form-control" name="carrera" required>
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Proyecto</span>
         </div>
         <input type="text" class="form-control" name="proyecto" required>
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Vacantes</span>
          </div>
          <input type="number" min="1" value="1" class="form-control" name="vacantes" required>
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Empresa/Institución</span>
          </div>
          <input type="text" class="form-control" name="empresa" required>
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Dirección</span>
          </div>
          <textarea class="form-control" rows="3" name="direccion"></textarea>
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Telefono de contacto</span>
          </div>
          <input type="text" class="form-control" name="telefono">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Correo de contacto</span>
          </div>
          <input type="text" class="form-control" name="correo" required>
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Docente responsable</span>
          </div>
          <input type="text" class="form-control" name="docente">
        </div>
        <input type="submit" class="btn btn-sm btn-success">
      </form>
      <br>
    </div>
    <div class="col-sm-2"></div>
  </div>
  
@endsection