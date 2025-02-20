@extends('layouts.plant_admin')

@section('contenido')
    <div class="row">
        <div class="col-sm-4">
            <h5> <a href="{{ route('convenios.inicio') }}">Convenios</a>/Inicio</h5>
        </div>
        <div class="col-sm-4">
            <h6>Agregar división o departamento de impacto, dentro del ITSCH</h6>
            <form action="{{ route('convenios.guardar.area') }}" method="get">
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                    </div>
                    <input type="text" name="nombre" id="nombre" required class="form-control" placeholder="Departamento o división">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary btn-sm" title="Guardar"><i class="fa fa-save" style="font-size:14px;"></i></button>
                        <a href="{{ route('convenios.areas.inicio') }}" class="btn btn-success btn-sm" title="Ver mas"><i class='fas fa-search-plus' style='font-size:14px'></i></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4">

        </div>
    </div>

    <hr>
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
    <table class="table" id="tabConvenios">
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
                selectableHeader: "<div class='custom-header'>Seleccionar Divs o Dep</div>",
                selectionHeader: "<div class='custom-header'>Áreas seleccionadas</div>",
            });

            function eliminar(id)
            {
                $('#msjEliminar').text('Estas seguro(a) de eliminar el convenio No. '+id);
                $('#id_convenio').val(id);
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

            //Construimos la tabla de convenios con los registros de la consulta
            $(document).ready(function(){
                //Obtenemos los datos desde una vista blade y guardamos la información en una variable en jQuery
                const conv = @json($convenios);


                //Contamos los elementos diferentes dentro del arreglo
                var id_a=0, dif=-1;
                //var id_s=conv[0]['id'];
                var tip=[''];
                var ins=[''];
                var ini=[''];
                var fin=[''];
                var areas=[''];
                var id=[''];
                var nom_conv=[''];

                for(x=0; x < conv.length; x++)
                {
                    id_s=conv[x]['id'];

                    if(id_a!=id_s)
                    {
                        dif=dif+1;
                        id[dif]=conv[x]['id'];
                        nom_conv[dif]=conv[x]['convenio'];
                        tip[dif]=conv[x]['tipo'];
                        ins[dif]=conv[x]['institucion'];
                        ini[dif]=conv[x]['inicio'];
                        fin[dif]=conv[x]['fin'];
                        areas[dif]=conv[x]['nom_area'];
                        id_a=id_s;
                    }
                    else
                    {
                        areas[dif]=areas[dif]+","+conv[x]['nom_area'];
                    }
                }



                //Escribimos las areas dentro de la tabla en la vista
                con=0;
                for(x=0; x<=dif;x++)
                {
                    con++;
                    var r = "{{ asset('storage/convenios') }}";
                    r += "/"+id[x]+"/"+nom_conv[x];
                    $("#tabConvenios>tbody").append("<tr><td>"+con+"</td><td>"+tip[x]+"</td><td>"+areas[x]+"</td><td>"+ins[x]+"</td><td>"+ini[x]+"</td><td>"+fin[x]+"</td><td><a href="+r+" download class='btn btn-primary btn-sm'><i class='fas fa-file-alt' style='font-size:14px'></i></a></td><td><button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#myModalEliminar' onclick='eliminar("+id[x]+")'><i class='far fa-trash-alt' style='font-size:14px'></i></a></td></tr>");
                }
            });

            //Funcion que verifica si hay errores en el formulario
                // Verificamos si hay un mensaje error, success o warning
                @switch(session('msg'))
                    @case('error')
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: '{{ session('msj') }}',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Aceptar'
                        });
                        @break
                    @case('success')
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: '{{ session('msj') }}',
                            confirmButtonColor: '#28a745',
                            confirmButtonText: 'Aceptar'
                        });
                        @break
                    @case('warning')
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: '{{ session('msj') }}',
                            confirmButtonColor: '#ffc107',
                            confirmButtonText: 'Aceptar'
                        });
                        @break
                @endswitch

        </script>
    @endsection

@endsection
