@extends('layouts.plant_admin')

@section('contenido')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-5"></div>
                <div class="col-sm-2">
                    <a href="{{ route('admin.contenido.banco.eliminar', $proyecto->id) }}" type="button" class="btn btn-sm btn-danger delete-link"><i class='fas fa-trash-alt' style='font-size:14px'></i></a>
                    <a href="{{ route('admin.contenido.banco.editar',$proyecto->id) }}" type="button" class="btn btn-sm btn-warning"><i class='fas fa-pen' style='font-size:14px'></i></a>
                </div>
            </div>
            <hr>
            <h5>Nombre del proyecto: {{ $proyecto->proyecto }}</h5>
            <h6>Numero de vacantes: {{ $proyecto->vacantes }}</h6>
            <h6>Carrera: {{ $proyecto->carrera }}</h6>
            <h6>Empresa o onstitución: {{ $proyecto->empresa }}</h6>
            <h6>Dirección de la empresa: {{ $proyecto->direccion }}</h6>
            <h6>Tipo de proyecto: {{ $proyecto->tipo }}</h6>
            <h6>Telefono de contacto: {{ $proyecto->telefono }}</h6>
            <h6>Correo: {{ $proyecto->correo }}</h6>
            <h6>Responsable: {{ $proyecto->docente }}</h6>
            <h6>Área de registro: {{ $proyecto->area }}</h6>
            {{-- Si convenio no esta bacio ponemos el convenio al que pertenece --}}
            @if ($convenio != null)
                <h6>Convenio: {{ $convenio->institucion }}</h6>
            @else
                <h6>Convenio: Este proyecto no deriva de ningún convenio</h6>
            @endif
            <h6>Fecha de inicio: {{ $proyecto->inicio }}</h6>
            <h6>Observaciones: {{ $proyecto->observaciones }}</h6>
            <div class="row">
                <div class="col-sm-1">
                    <h6>Status:</h6>
                </div>
                <div class="col-sm-4">
                    @if ($proyecto->status==1)
                        <p class="bg-success text-white">Inicio</p>
                    @elseif ($proyecto->status==2)
                        <p class="bg-warning text-white">En proceso</p>
                    @elseif ($proyecto->status==3)
                        <p class="bg-danger text-white">Terminado</p>
                    @endif
                </div>
            </div>
            <hr>
            <h5>Colaboradores:</h5>
            <a href="{{ route('admin.contenido.banco.createColaboradores',$proyecto->id) }}" class="btn btn-primary btn-sm" title="Agregar colaboradores"><i class='fas fa-user-plus'></i></a>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colaboradores as $col)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $col->nombre }}</td>
                            <td>{{ $col->sexo }}</td>
                            <td>{{ $col->tipo }}</td>
                            <td>
                                <a href="" type="button" class="btn btn-sm btn-danger"><i class='fas fa-trash-alt' style='font-size:14px'></i></a>
                                <a href="" type="button" class="btn btn-sm btn-warning"><i class='fas fa-pen' style='font-size:14px'></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>
        </div>
        <div class="col-sm-2"></div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteLinks = document.querySelectorAll('.delete-link');

            deleteLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();

                    const url = this.getAttribute('href');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Esta acción no se puede deshacer',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        });
    </script>
@endsection
