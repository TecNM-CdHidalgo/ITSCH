@extends('template')

@section('titulo')
    Mi Perfil | Editar
@endsection

@section('contenido')
  <form action="{{ route('admin.usuarios.mi_perfil_modificar') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="nombre">Nombre</label>
    <input name="name" value="{{ Auth::User()->name }}"type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre del usuario" required>
    </div>
    <div class="form-group">
      <label for="correo">Correo</label>
    <input name="email" value="{{ Auth::User()->email }}" type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Correo electrónico, ejem: fulanito@gmail.com" required>
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