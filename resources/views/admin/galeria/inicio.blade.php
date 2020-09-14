@extends('template')

@section('titulo')
    Galleria | Inicio
@endsection

@section('contenido')

<a href="{{ route('admin.galeria.crear')}}" class="btn btn-primary float-right mb-2" data-toggle="tooltip" data-placement="top" title="Crear nuevo album">
  <img src="{{ asset('images/icons/photo.png') }}" alt="" style="filter:invert(1);">
</a>
<div style="clear:both;"></div>

<div class="table-responsive">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Título</th>
        <th scope="col">Descripción</th>
        <th scope="col">Creado</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach ($galleries as $gallery)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $gallery->titulo }}</td>
                <td>{{ $gallery->descripcion }}</td>
                <td>{{ $gallery->created_at }}</td>
                <td>
                    <a href="{{ route('admin.galeria.ver') }}?id={{ $gallery->id }}" class="btn btn-mds-primary" data-toggle="tooltip" data-placement="top" title="Ver/Subir imágenes">
                        <img src="{{ asset('images/icons/eye-3-24.png') }}" alt="">
                    </a>
                    <a href="{{ route('admin.galeria.editar',['id' => $gallery->id]) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar album">
                        <img src="{{ asset('images/icons/edit-2-24.png') }}" alt="">
                    </a>
                    <a href="#" id="{{ $gallery->id }}" class="btn btn-danger confirmModal" data-toggle="tooltip" data-placement="top" title="Eliminar album">
                        <img src="{{ asset('images/icons/x-mark-3-24.png') }}" alt="">
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
{{ $galleries->links() }}
<div style="padding: 100px;"></div>
  @section('js')
  <script src="{{ asset('modals/js/jquery.confirmModal.min.js') }}"></script>
    <script>
      var section = document.getElementById('section-galeria');
      section.className += " default-text-color";
      $('.confirmModal').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $.confirmModal('¿Estas seguro de eliminar este album?', function() {
            window.location.href = "{{ route('admin.galeria.eliminar') }}"+"?id="+id;
        });
      });
    </script>
  @endsection
@endsection
