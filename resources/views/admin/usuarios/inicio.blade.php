@extends('layouts.plant_admin')

@section('titulo')
    Usuarios
@endsection
@section('contenido')
  <a href="{{ route('admin.usuarios.crear')}}" class="btn btn-primary float-right mb-2" data-toggle="tooltip" data-replacement="top" title="Crear nuevo usuario">
    <img src="{{ asset('images/icons/add-user-32.png') }}" alt="">
  </a>
  <div class="table-responsive">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>  
          <th scope="col">Tipo</th>       
          <th scope="col">Acción</th>
        </tr>
      </thead>
      <tbody>
        @php
          $index = 0;
        @endphp
        @foreach ($usuarios as $usuario)
          <tr>
            <th scope="row">{{ ++$index }}</th>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>  
            <td>{{ $usuario->tipo }}</td>          
            <td>
              <a href="{{ route('admin.usuarios.editar',$usuario->id) }}" class="btn btn-warning" data-toggle="tooltip" data-replacement="top" title="Editar usuario">
                <img src="{{ asset('images/icons/edit-2-24.png') }}" alt="">
              </a>
              <a href="#" class="btn btn-danger confirmModal" id="{{ $usuario->id }}" data-toggle="tooltip" data-replacement="top" title="Eliminar usuario">
                <img src="{{ asset('images/icons/x-mark-3-24.png') }}" alt="">
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div style="padding: 100px;"></div>
  @section('js')
    <script src="{{ asset('modals/js/jquery.confirmModal.min.js') }}"></script>
    <script>
      document.getElementById('section-usuarios').className += " default-text-color";
      $('.confirmModal').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $.confirmModal('¿Estas seguro de eliminar este usuario?', function() {
            window.location.href = "{{ route('admin.usuarios.eliminar') }}"+"?id="+id;
        });
      });
    </script>
  @endsection
@endsection