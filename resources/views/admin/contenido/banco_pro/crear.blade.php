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
          <input type="text" class="form-control" name="carrera" required placeholder="Carrera que dirige el proyecto">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Proyecto</span>
         </div>
         <input type="text" class="form-control" name="proyecto" required placeholder="Nombre del proyecto">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Integrantes</span>
          </div>
          <input type="number" min="1" value="1" class="form-control" name="vacantes" required placeholder="Numero de personal o alumnos requerido para laborar en este proyecto">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Empresa/Institución</span>
          </div>
          <input type="text" class="form-control" name="empresa" required placeholder="Nombre de la empresa o institución para la que se elabora el proyecto">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Dirección</span>
          </div>
          <textarea class="form-control" rows="3" name="direccion" placeholder="Dirección de la empresa o institución para la que se elabora el proyecto (opcional)"></textarea>
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Telefono de contacto</span>
          </div>
          <input type="text" class="form-control" name="telefono" placeholder="Telefono de contacto del responsable del proyecto (opcional)">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Correo de contacto</span>
          </div>
          <input type="text" class="form-control" name="correo" required placeholder="Correo de contacto del responsable del proyecto">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Responsable</span>
          </div>
          <input type="text" class="form-control" name="docente" placeholder="Nombre del responsable del proyecto">
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text">Colaboradores</span>
            </div>
            <textarea class="form-control" name="colaboradores" id="colaboradores" rows="3" placeholder="Separa cada nombre con una ',' "></textarea>
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text">Alumnos</span>
            </div>
            <textarea class="form-control" name="alumnos" id="alumnos" rows="3" placeholder="Separa cada nombre con una ',' "></textarea>
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">Fecha de inicio del proyecto</span>
            </div>
            <input type="date" class="form-control" name="inicio" required value="<?php echo date("Y-m-d\TH-i") ?>">
        </div>
        <div class="form-group">
            <label for="sel1">Selecciona el status del proyecto</label>
            <select class="form-control" id="status" name="status" required>
                <option value=" ">Selecciona una opción</option>
                <option value="1">Inicio</option>
                <option value="2">En proceso</option>
                <option value="3">Terminado</option>
            </select>
        </div>
        <input type="submit" class="btn btn-sm btn-success">
      </form>
      <br>
    </div>
    <div class="col-sm-2"></div>
  </div>

@endsection
