@extends('template')

@section('titulo')
    Mi Perfil
@endsection

@section('contenido')
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input name="name" type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre del usuario" disabled value="{{ Auth::User()->name }}">
    </div>
    <div class="from-group">
      <label for="tipo">Tipo de Usuario</label>
      <input name="tipo" type="text" class="form-control" id="tipo" aria-describedby="emailHelp" placeholder="Tipo de usuario" disabled value="{{ Auth::User()->tipo }}">
    </div>
    <div class="form-group">
      <label for="correo">Correo</label>
      <input name="email" type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Correo electrónico, ejem: fulanito@gmail.com" disabled value="{{ Auth::User()->email }}">
    </div>
    <a href="{{ route('admin.usuarios.mi_perfil_editar') }}" class="btn btn-primary">Editar información</a>
    <a href="{{ route('admin.usuarios.mi_perfil_editar_password') }}" class="btn btn-primary">Cambiar contraseña</a>
  <div style="padding: 100px;"></div>
  @section('js')
      <script>
          document.getElementById('section-username').className += " default-text-color";
      </script>
  @endsection
@endsection