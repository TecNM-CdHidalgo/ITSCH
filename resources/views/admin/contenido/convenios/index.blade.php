@extends('layouts.plant_admin')

@section('contenido')
    <h5> <a href="#">Convenios</a>/Inicio</h5>

    <form action="" method="get">
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tipo</span>
                    </div>
                    <select name="tipo" id="tipo" required class="form-control">
                        <option value="">Selecciona una opción</option>
                        <option value="1">Marco</option>
                        <option value="2">Especifico</option>
                        <option value="3">Residencias</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <select multiple name="areas[]" id="areas" class="form-control">
                    <option value="1">x</option>
                    <option value="2">y</option>
                </select>
            </div>
            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Institución</span>
                    </div>
                    <input type="text" name="institucion" id="institucion" required class="form-control" placeholder='Nombre de la empresa o institucion '>
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
            <div class="col-sm-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Fin</span>
                    </div>
                    <input type="date" name="fin" id="fin" required class="form-control">
                </div>
            </div>
            <div class="col-sm-5">
                <input type="file" name="convenio" id="convenio" required class="form-control">
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

        </tbody>
    </table>

    @section('js')
        <script>
            $('#areas').multiSelect({
                selectableHeader: "<div class='custom-header'>Seleccionar áreas</div>",
                selectionHeader: "<div class='custom-header'>Áreas seleccionadas</div>",
            });
        </script>
    @endsection

@endsection
