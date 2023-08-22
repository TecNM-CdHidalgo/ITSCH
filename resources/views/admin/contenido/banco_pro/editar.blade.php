@extends('layouts.plant_admin')

@section('contenido')
  <h6>Banco de proyectos ITSCH/Modificar</h6>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <form action="{{ route('admin.contenido.banco.modificar',$banco->id ) }}">
        <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
             <span class="input-group-text">Carrera</span>
          </div>
          <input type="text" class="form-control" name="carrera" required value="{{ $banco->carrera }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Proyecto</span>
         </div>
         <input type="text" class="form-control" name="proyecto" required value="{{ $banco->proyecto }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Vacantes</span>
          </div>
          <input type="number" min="1" value="1" class="form-control" name="vacantes" required value="{{ $banco->vacantes }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Empresa/Institución</span>
          </div>
          <input type="text" class="form-control" name="empresa" required value="{{ $banco->empresa }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Dirección</span>
          </div>
          <textarea class="form-control" rows="3" name="direccion" >{{ $banco->direccion }}</textarea>
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Telefono de contacto</span>
          </div>
          <input type="text" class="form-control" name="telefono" value="{{ $banco->telefono }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Correo de contacto</span>
          </div>
          <input type="text" class="form-control" name="correo" required value="{{ $banco->correo }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text">Responsable</span>
          </div>
          <input type="text" class="form-control" name="docente" value="{{ $banco->docente }}">
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text">Tipo de proyecto</span>
            </div>
            <select name="tipo" id="tipo" class="form-control">
                <option value="Publico" {{ $banco->tipo === 'Publico' ? 'selected' : '' }}>Publico</option>
                <option value="Privado" {{ $banco->tipo === 'Privado' ? 'selected' : '' }}>Privado</option>
                <option value="Social" {{ $banco->tipo === 'Social' ? 'selected' : '' }}>Social</option>
            </select>
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">Área </span>
            </div>
            <select name="area" id="area" required class="form-control">
                <option value="Vinculación" {{ $banco->area === 'Vinculación' ? 'selected' : '' }}>Vinculación</option>
                <option value="Investigación" {{ $banco->area === 'Investigación' ? 'selected' : '' }}>Investigación</option>
            </select>
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">Área </span>
            </div>
            <select name="id_convenio" id="id_convenio" class="form-control">
                @foreach ($convenios as $convenio)
                    <option value="{{ $convenio->id }}" {{ $convenio->id === $banco->id_convenio ? 'selected' : '' }}>
                        {{ $convenio->institucion }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">Fecha de inicio del proyecto</span>
            </div>
            <input type="date" class="form-control" name="inicio" required value="{{ $banco->inicio }}">
        </div>
        @if (Auth::User()->tipo == "administrador" || Auth::User()->tipo == "vinculacion")
            <div class="input-group mb-3 input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status</span>
                </div>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ $banco->status === '1' ? 'selected' : '' }}>Abierto</option>
                    <option value="2" {{ $banco->status === '2' ? 'selected' : '' }}>En proceso</option>
                    <option value="3" {{ $banco->status === '3' ? 'selected' : '' }}>Terminado</option>
                </select>
            </div>
        @endif
        <div class="input-group mb-3 input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">Observaciones</span>
            </div>
            <textarea class="form-control" rows="3" name="observaciones" >{{ $banco->observaciones }}</textarea>
        </div>
        <button type="submit" class="btn btn-sm btn-success">Actualizar</button>
      </form>
      <br>
    </div>
    <div class="col-sm-2"></div>
  </div>

@endsection
