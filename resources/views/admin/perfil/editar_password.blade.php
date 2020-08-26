@extends('layouts.plant_admin')

@section('titulo')
    Mi Perfil | Contraseña
@endsection

@section('contenido')
  <form action="{{ route('admin.usuarios.mi_perfil_modificar_password') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="anterior">Contrase&ntilde;a</label>
      <input name="pass_anterior" type="password" class="form-control" id="anterior" placeholder="Contrase&ntilde;a anterior" >
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
        document.getElementById('section-username').className += " default-text-color";
      </script>
  @endsection
@endsection