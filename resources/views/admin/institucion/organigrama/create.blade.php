@extends('layouts.plant_admin')

@section('titulo')
    Institución | Pases
@endsection

@section('contenido')
    @section('ruta', 'Institución | Organigrama | Agregar puesto')
    <div class="container">
        <a href="{{ route('organigrama.index') }}" class="btn btn-success" title="Regresar a Organigrama"><i class="fas fa-sitemap"></i></a>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Agregar puesto</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('organigrama.store') }}" method="POST">
                            @csrf
                            <div class="form-group
                            @error('nombre_puesto')
                                has-error
                            @enderror">
                                <label for="nombre_puesto">Nombre del puesto</label>
                                <input type="text" name="nombre_puesto" id="nombre_puesto" class="form-control" value="{{ old('nombre_puesto') }}" placeholder="Nombre del puesto">
                                @error('nombre_puesto')
                                    <span class="help-block
                                    @error('nombre_puesto')
                                        text-danger
                                    @enderror">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('descripcion')
                                has-error
                            @enderror">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Descripción">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="help-block
                                    @error('descripcion')
                                        text-danger
                                    @enderror">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('nivel')
                                has-error
                            @enderror">
                                <label for="nivel">Nivel</label>
                                <input type="number" name="nivel" id="nivel" class="form-control" value="{{ old('nivel') }}" placeholder="Nivel">
                                @error('nivel')
                                    <span class="help-block
                                    @error('nivel')
                                        text-danger
                                    @enderror">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('superior')
                                has-error
                            @enderror">
                                <label for="superior">Puesto superior</label>
                                <select name="superior" id="superior" class="form-control">
                                    <option value="">Selecciona un puesto</option>
                                    @foreach ($puestos as $puesto)
                                        <option value="{{ $puesto->id }}">{{ $puesto->nombre_puesto }}</option>
                                    @endforeach
                                </select>
                                @error('superior')
                                    <span class="help-block
                                    @error('superior')
                                        text-danger
                                    @enderror">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('organigrama.index') }}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
