@extends('layouts.plant_admin')

@section('titulo')
    Noticias | Inicio
@endsection

@section('contenido')
  
  <a href="{{ route('admin.noticias.crear')}}" class="btn btn-primary float-right mb-1" data-toggle="tooltip" data-replacement="top" title="Crear nueva noticia">
    <img src="{{ asset('images/icons/add-file-32.png') }}" alt="">
  </a>
  <div style="clear:both;"></div>

  <div class="table-responsive">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Título</th>
          <th scope="col">Author</th>
          <th scope="col">Creado</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @php
          $index = 0;
          $date = "";
        @endphp
        @foreach ($articles as $article)
          <tr>
            @php
                $date = strtok($article->created_at," ");
            @endphp
            <th scope="row">{{ ++$index }}</th>
            <td>{{ $article->titulo }}</td>
            <td>{{ $article->autor }}</td>
            <td>{{ $date }}</td>
            <td>
              <a href="{{ route('admin.noticias.ver',$article->id) }}" class="btn btn-mds-primary" data-toggle="tooltip" data-replacement="top" title="Vista previa">
                <img src="{{ asset('images/icons/eye-3-24.png') }}" alt="">
              </a>
              <a href="{{ route('admin.noticias.editar',$article->id) }}" class="btn btn-warning" data-toggle="tooltip" data-replacement="top" title="Editar noticia">
                <img src="{{ asset('images/icons/edit-2-24.png') }}" alt="">
              </a>
              <a href="#" id="{{ $article->id }}" class="btn btn-danger confirmModal" data-toggle="tooltip" data-replacement="top" title="Eliminar noticia">
                <img src="{{ asset('images/icons/x-mark-3-24.png') }}" alt="">
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $articles->links() }}

  <div style="padding: 100px;"></div>
  @section('js')
    <script src="{{ asset('modals/js/jquery.confirmModal.min.js') }}"></script>
    <script>
      document.getElementById('section-articulos').className += " default-text-color";
      $('.confirmModal').click(function(e) {
          e.preventDefault();
          var id = $(this).attr('id');
          $.confirmModal('¿Estas seguro de eliminar este articulo?', function() {
              window.location.href = "{{ route('admin.noticias.eliminar') }}"+"?id="+id;
          });
      });
    </script>
  @endsection
@endsection
