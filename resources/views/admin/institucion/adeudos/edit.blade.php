@extends('layouts.plant_admin')

@section('titulo')
    Institución | Adeudos | Modificar status
@endsection

@section('contenido')
    @section('ruta', 'Institución | Adeudos | Modificar status')
    <div class="container">
        <div class="row">
            <div class="col-md-12">  
                <h1>Modificar status de adeudo</h1>
                <form action="{{ route('adeudos.update', $adeudo->id) }}" method="POST">
                    @csrf                    
                    <div class="form-group">
                        <label for="control">Control</label>
                        <input type="text" class="form-control" id="control" name="control" value="{{ $adeudo->control }}" readonly>    
                    </div>
                    <div class="form-group">
                        <label for="alumno">Alumno</label>
                        <input type="text" class="form-control" id="alumno" name="alumno"
                        value="{{ $alumno?->alu_Nombre ?? 'No encontrado' }} {{ $alumno?->alu_ApePaterno ?? '' }} {{ $alumno?->alu_ApeMaterno ?? '' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="concepto">Concepto</label>
                        <textarea  class="form-control" id="concepto" name="concepto" rows="3">{{ $adeudo->concepto }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pendiente">Pendiente</option>
                            <option value="pagado">Pagado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Guardar" class="btn btn-primary">
                        <a href="{{ route('adeudos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
@endsection