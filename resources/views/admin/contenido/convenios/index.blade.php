@extends('layouts.plant_admin')

@section('contenido')
    <div class="row">
        <div class="col-sm-4">
            <h5> <a href="{{ route('convenios.inicio') }}">Convenios</a>/Inicio</h5>
        </div>
        <div class="col-sm-4">
            <h6>Área(s) a las que impacta el convenio</h6>
        </div>
        <div class="col-sm-4">
            <form action="{{ route('convenios.guardar.area') }}" method="get">
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Área</span>
                    </div>
                    <input type="text" name="nombre" id="nombre" required class="form-control" placeholder="Nombre del área">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary btn-sm" title="Guardar"><i class="fa fa-save" style="font-size:14px;"></i></button>
                        <a href="{{ route('convenios.areas.inicio') }}" class="btn btn-success btn-sm" title="Ver mas"><i class='fas fa-search-plus' style='font-size:14px'></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr>

    <form action="{{ route('convenios.save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tipo</span>
                    </div>
                    <select name="tipo" id="tipo" required class="form-control">
                        <option value="">Selecciona una opción</option>
                        <option value="Marco">Marco</option>
                        <option value="Especifico">Especifico</option>
                        <option value="Residencias">Residencias</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <select multiple name="areas[]" id="areas" class="form-control" required>
                    @foreach ($areas as $ar )
                        <option value={{ $ar->id }}>{{ $ar->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Institución</span>
                    </div>
                    <input type="text" name="institucion" id="institucion" required class="form-control" placeholder='Nombre de la empresa o institución '>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Inicio</span>
                    </div>
                    <input type="date" name="inicio" id="inicio" required class="form-control">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Fin</span>
                    </div>
                    <input type="date" name="fin" id="fin" required class="form-control">
                </div>
            </div>
            <div class="col-sm-1">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="indefinido" id="indefinido" value="select" onclick="enabledCalendar()">Indefinido
                </label>
            </div>
            <div class="col-sm-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Convenio en PDF</span>
                    </div>
                    <input type="file" name="convenio" id="convenio" required class="form-control">
                </div>
            </div>
            <div class="col-sm-1 text-right">
                <input type="submit" value="Guardar" class="btn btn-success btn-sm">
            </div>
        </div>
    </form>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tipo</th>
                <th>Area(s)</th>
                <th>Empresa ó institución</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Convenio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($convenios as $convenio)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $convenio->tipo }}</td>
                    <td>{{ $convenio->nom_area }}</td>
                    <td>{{ $convenio->institucion }}</td>
                    <td>{{ $convenio->inicio }}</td>
                    <td>{{ $convenio->fin }}</td>
                    <td>
                        <a href="{{ asset('storage/convenios/'.$convenio->id.'/'.$convenio->convenio) }}" class="btn btn-success btn-sm" download title="Descargar convenio"><i class='fas fa-file-download' style='font-size:14px'></i></a>
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm"><i class='fas fa-edit' style='font-size:14px'></i></a>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalEliminar" onclick="eliminar({{ $convenio }})"><i class='far fa-trash-alt' style='font-size:14px'></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Sección de modals -->
    <div class="modal fade" id="myModalEliminar">
        <div class="modal-dialog">
        <form action="{{ route('convenios.eliminar') }}" method="get">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar convenio</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h6 id="msjEliminar"></h6>
                    <input type="hidden" name="id_convenio" id="id_convenio" readonly>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning btn-sm">Eliminar</button>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
        </div>
    </div>



    @section('js')
        <script>
            $('#areas').multiSelect({
                selectableHeader: "<div class='custom-header'>Seleccionar áreas</div>",
                selectionHeader: "<div class='custom-header'>Áreas seleccionadas</div>",
            });

            function eliminar(convenio)
            {
                $('#msjEliminar').text('Estas seguro(a) de eliminar el convenio No. '+convenio['id']+' con la empresa: '+convenio['institucion']);
                $('#id_convenio').val(convenio['id']);
            }

            //Funcion que innavilita el calendario cuando se selecciona fecha indefinida
            function enabledCalendar()
            {
                if( $('#indefinido').prop('checked')==true)
                {
                    $("#fin").prop('disabled', true);
                }
                else
                {
                    $("#fin").prop('disabled', false);
                }

            }
        </script>
    @endsection

@endsection
