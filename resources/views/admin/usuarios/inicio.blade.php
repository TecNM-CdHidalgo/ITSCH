@extends('layouts.plant_admin')

@section('titulo')
    Usuarios
@endsection
@section('contenido')
  <a href="{{ route('admin.usuarios.crear')}}" class="btn btn-primary float-right mb-2" data-toggle="tooltip" data-replacement="top" title="Crear nuevo usuario">
    <img src="{{ asset('images/icons/add-user-32.png') }}" alt="">
  </a>
  <div class="table-responsive" >
    <table class="table" id="usuarios">
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
                <i class='fas fa-user-edit' style='font-size:24px; color:white'></i>
              </a>
              <a class="btn btn-danger btnEliminar" title="Eliminar usuario" data-toggle="modal" data-target="#modalEliminar"  data-id="{{ $usuario->id }}" data-nombre="{{ $usuario->name }}">
                <i class='fas fa-trash-alt' style='font-size:24px; color:white'></i>
              </a>                           
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>   
  </div>
  

  <!-- Modal -->
<div id="modalEliminar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar usuario</h4>
      </div>
      <div class="modal-body">
        <p>Estas seguro de eliminar el usuario <b id="nombre"></b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="btnConfEliminar">Eliminar</button>
      </div>
    </div>

  </div>
</div>
  <div style="padding: 100px;"></div>
  

@endsection

@section('js')
  <script>
    //Codigo de confirmacion de eliminación de usuario
    $(document).ready(function(){         
      //Evento para abrir el modal de confirmación
      $('.btnEliminar').click(function(){ 
        var idUsuario = $(this).data('id'); 
        var nombreUsuario = $(this).data('nombre');
        $('#nombre').text(nombreUsuario); // Coloca el nombre en el modal
        $('#btnConfEliminar').data('id', idUsuario); // Guarda el id en el botón del modal    
      });
      

      //Verificamos si se presiono el boton del modal para eliminar
      $('#modalEliminar').on('click','#btnConfEliminar',function(){
        var id = $(this).data('id');       
       $.ajax({
          url: "{{ route('admin.usuarios.eliminar') }}",
          method: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            id: id
          },
          success: function(response){                      
            if(response == 'exito'){
              alert('Usuario eliminado correctamente');
              location.reload();
            }else{
              alert('Error al eliminar el usuario');
            }
          }
        });
      });


      //Codigo de datatable
      $('#usuarios').DataTable({

      dom: 'Bfrtip',

      responsive: {
      breakpoints: [
      {name: 'bigdesktop', width: Infinity},
      {name: 'meddesktop', width: 1366},
      {name: 'smalldesktop', width: 1280},
      {name: 'medium', width: 1188},
      {name: 'tabletl', width: 1024},
      {name: 'btwtabllandp', width: 848},
      {name: 'tabletp', width: 768},
      {name: 'mobilel', width: 600},
      {name: 'mobilep', width: 320}
      ]
      },

      lengthMenu: [
      [ 5, 10, 25, 50, -1 ],
      [ '5 reg', '10 reg', '25 reg', '50 reg', 'Ver todo' ]
      ],

      buttons: [
        {extend: 'collection', text: 'Exportar',
          buttons: [
            { extend: 'copyHtml5', text: 'Copiar' },
            'csvHtml5',
            'excelHtml5',
            'pdfHtml5',
            { extend: 'print', text: 'Imprimir' },
          ]},
          { extend: 'colvis', text: 'Columnas visibles' },
          { extend:'pageLength',text:'Ver registros'},
      ],
      "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      }
      });
    });
 
  </script>
@endsection
