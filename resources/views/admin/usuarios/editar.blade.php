@extends('layouts.plant_admin')

@section('titulo')
    Usuarios | Editar
@endsection

@section('contenido')
  <form action="{{ route('admin.usuarios.modificar',$usuario->id) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="nombre">Nombre</label>
    <input name="name" value="{{ $usuario->name}}"type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre del usuario" >
    </div>
    <div class="form-group">
      <label for="correo">Correo</label>
    <input name="email" value="{{ $usuario->email }}" type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Correo electrónico, ejem: fulanito@gmail.com" >
    </div>
    <div class="from-group">
      <label for="tipo">Tipo de Usuario</label>
      <select name="tipo" id="tipo" class="form-control">
        @if ($usuario->tipo == "Administrador")
          <option value="Miembro">Miembro</option>
          <option value="Administrador" selected>Administrador</option>
        @else
          <option value="Miembro" selected>Miembro</option>
          <option value="Administrador">Administrador</option>
          <option value="Jefe de carrera">Jefe de carrera</option>
        @endif

      </select>
    </div>
    <div class="form-group">
      <label for="nueva">Contrase&ntilde;a</label>
      <input name="pass_nueva" type="password" class="form-control" id="nueva" placeholder="Nueva contrase&ntilde;a" >
    </div>
    <div class="form-group">
      <label for="confirm">Confirmar contrase&ntilde;a</label>
      <input name="pass_confirm" type="password" class="form-control" id="confirm" placeholder="Confirme la nueva contrase&ntilde;a" >
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
