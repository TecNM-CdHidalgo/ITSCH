@extends('template')

@section('titulo')
    Información
@endsection

@section('contenido')
    <form action="{{ route('admin.informacion.modificar') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="direccion">Calle</label>
          <input value="{{ $informacion->direccion }}" name="direccion" type="text" class="form-control" id="direccion" aria-describedby="emailHelp" placeholder="Calle de la organización" required>
        </div>
        <div class="form-group">
            <label for="numero">Número del lugar</label>
            <input value="{{ $informacion->numero }}" name="numero" type="text" class="form-control" id="numero" aria-describedby="emailHelp" placeholder="Numero del lugar donde se encuentra la organización" required>
        </div>
        <div class="form-group">
            <label for="colonia">Colonia</label>
            <input value="{{ $informacion->colonia }}" name="colonia" type="text" class="form-control" id="colonia" aria-describedby="emailHelp" placeholder="Colonia" required>
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input value="{{ $informacion->codigo_postal }}" name="codigo_postal" type="text" class="form-control" id="codigo_postal" aria-describedby="emailHelp" placeholder="Código Postal" required>
        </div>
        <div class="form-group">
          <label for="correo_electronico">Correo Electrónico</label>
          <input value="{{ $informacion->correo_electronico }}" name="correo_electronico" type="email" class="form-control" id="correo_electronico" aria-describedby="emailHelp" placeholder="Correo electrónico, ejem: fulanito@gmail.com" required>
        </div>
        <div class="form-group">
            <label for="numero_cuenta">Cuenta de banco</label>
            <input value="{{ $informacion->numero_cuenta }}" name="numero_cuenta" type="text" class="form-control" id="numero_cuenta" aria-describedby="emailHelp" placeholder="Número de cuenta de banco" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input value="{{ $informacion->telefono }}" name="telefono" type="text" class="form-control" id="telefono" aria-describedby="emailHelp" placeholder="Número de cuenta de banco" required>
        </div>
        <div class="form-group">
            <label for="banco">Banco</label>
            <input value="{{ $informacion->banco }}" name="banco" type="text" class="form-control" id="banco" aria-describedby="emailHelp" placeholder="Banamex, Bancomer, etc.." required>
        </div>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
  <div style="padding: 100px;"></div>
  @section('js')
      <script>
        document.getElementById('section-informacion').className += " default-text-color";
      </script>
  @endsection
@endsection