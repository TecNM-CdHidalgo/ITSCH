@extends('layouts.plant_admin')

@section('contenido')
    <h4><a href="{{ route('carreras.index') }}"> Carreras/</a>Mensajes/ {{ $programa[0]->nombre }}</h4>
    <hr>
    <a href="{{ route('carreras.showContacto',$programa[0]->id) }}"  type="button" class="btn btn-outline-primary btn-sm"><i class='fas fa-eye' style='font-size:14px'></i> Sin Leer</a>
    <a href="{{ route('carreras.showContactoLeido',$programa[0]->id) }}" type="button" class="btn btn-outline-dark btn-sm"><i class='fas fa-eye' style='font-size:14px'></i> Leidos</a>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <th>Número</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Acción</th>
            </thead>
            <tbody>
                @foreach ($msgs as $ms)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ms->nombre }}</td>
                        <td>{{ $ms->created_at }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#myModalMsg" type="button" class="btn btn-outline-success btn-sm" onclick="mensaje({{ $ms }})"><i class='fas fa-eye' style='font-size:14px'></i> Ver más</button>
                            @if($ms->status==1)
                                <a data-toggle="modal" data-target="#myModalDelMsg" type="button" class="btn btn-outline-danger btn-sm" onclick="obtDatEliminarMsg({{ $ms }})"><i class='fas fa-trash' style='font-size:16px; color:red'></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <br>

    {{-- Sección de modals --}}
    <!-- The Modal Para visualizar mensajes -->
    <div class="modal fade" id="myModalMsg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('carreras.updateContacto',$programa[0]->id) }}">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Mensaje</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <label for="nombre">Nombre:</label>
                        <h4 id="nombre"></h4>
                        <h6 id="fecha"></h6>
                        <h5>Datos de contacto:</h5>
                        <h6><b id="email"></b></h6>
                        <h6><b id="telefono"></b></h6>
                        <hr>
                        <label for="comentario">Mensaje:</label>
                        <h6><b id="comentario"></b></h6>
                        <input type="hidden" readonly name="id" id="id_contacto">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The Modal Para eliminar mensajes -->
    <div class="modal fade" id="myModalDelMsg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formEliminarMsg">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar Mensaje</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>¿Estas seguro de eliminar el mensaje de:?</h5>
                        <h6 id="idMsgNom"></h6>
                        <p id="fecMsg"></p>
                        <input type="hidden" readonly name="id" id="id_contacto_del">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Eliminar</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('js')
        <script>
            function mensaje(ms)
            {
                $("#nombre").text(ms['nombre']);
                $("#fecha").text("Fecha: "+ms['created_at']);
                $("#comentario").text(ms['comentarios']);
                $("#email").text("Correo: "+ms['email']);
                $("#telefono").text("Telefono: "+ms['telefono']);
                $("#id_contacto").val(ms['id']);
            }

            function obtDatEliminarMsg(ms)
            {
                $("#idMsgNom").text("Nombre: "+ms['nombre']);
                $("#fecMsg").text("Fecha: "+ms['created_at']);
                $("#id_contacto_del").val(ms['id']);
                r="{{url('contenido/carreras')}}/destroyContacto/"+ms['id_programa'];
                $('#formEliminarMsg').attr('action', r);
            }
        </script>
    @endsection

@endsection
