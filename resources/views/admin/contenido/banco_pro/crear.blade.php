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
            <span class="input-group-text">Vacantes para este proyecto</span>
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
              <span class="input-group-text">Tipo de proyecto</span>
            </div>
            <select name="tipo" id="tipo" required class="form-control">
                <option value="">Selecciona una opción</option>
                <option value="Publico">Publico</option>
                <option value="Privado">Privado</option>
                <option value="Social">Social</option>
            </select>
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
            <span class="input-group-text">Área de registro </span>
          </div>
          <select name="area" id="area" required class="form-control">
            <option value="">Selecciona una opción</option>
            <option value="Vinculación">Vinculación</option>
            <option value="Investigación">Investigación</option>
          </select>
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">Fecha de inicio del proyecto</span>
            </div>
            <input type="date" class="form-control" name="inicio" required value="<?php echo date("Y-m-d\TH-i") ?>">
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text">Status </span>
            </div>
            <select name="status" id="status" required class="form-control">
                <option value=" ">Selecciona una opción</option>
                <option value="1">Abierto</option>
                <option value="2">En proceso</option>
                <option value="3">Terminado</option>
            </select>
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text">Convenio 'Opcional'</span>
            </div>
            <select name="id_convenio" id="id_convenio" class="form-control">
                <option value="">Selecciona una opción o deja en blanco si no deriva de un convenio</option>
                @foreach ($convenios as $convenio)
                    <option value="{{ $convenio->id }}">{{ $convenio->institucion }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-sm btn-success" value="Guardar">
      </form>
      <br>
    </div>
    <div class="col-sm-2"></div>
  </div>

@endsection
