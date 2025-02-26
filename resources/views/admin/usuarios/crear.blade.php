@extends('layouts.plant_admin')

@section('titulo')
    Usuarios | crear
@endsection

@section('contenido')
  <form action="{{ route('admin.usuarios.guardar') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input name="name" type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre del usuario" required>
    </div>
    <!-- Selección de roles (permitir múltiples roles) -->
    <div class="form-outline mb-4">
        <label class="form-label" for="roles">Roles</label>
        <select name="roles[]" id="roles" class="form-control selectpicker" multiple data-live-search="true" required>
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
      <label for="correo">Correo</label>
      <input name="email" type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Correo electrónico, ejem: fulanito@gmail.com" required>
    </div>
    <div class="form-group">
      <label for="contra">Contrase&ntilde;a</label>
      <input name="password" type="password" class="form-control" id="contra" placeholder="Contrase&ntilde;a" required>
    </div>
    <div class="form-group">
      <label for="contra2">Confirmar contrase&ntilde;a</label>
      <input name="confirm" type="password" class="form-control" id="contra2" placeholder="Escriba la contrase&ntilde;a nuevamente" required>
    </div>
    <button name="" type="submit" class="btn btn-primary">Guardar</button>
  </form>
  <div style="padding: 100px;"></div>
  @section('js')
      <script>
        document.getElementById('section-usuarios').className += " default-text-color";
      </script>
  @endsection
@endsection


