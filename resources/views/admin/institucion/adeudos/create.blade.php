@extends('layouts.plant_admin')

@section('titulo')
    Institución | Adeudos | Agregar adeudo
@endsection

@section('contenido')
    @section('ruta', 'Institución | Adeudos | Agregar adeudo')
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>                
            <div class="col-md-4">      
                <form action="{{ route('adeudos.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="control">Numero de control</label>
                        <input type="text" class="form-control" id="control" name="control" required>
                    </div>                    
                    <div class="form-group">
                        <label for="monto">Area</label>
                        <select name="area_id" id="area_id" class="form-control" required>
                            <option value="">Seleccione un área</option>
                            @foreach ($areas as $a)
                                <option value="{{ $a->id }}">{{ $a->nombre }}</option>                       
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="concepto">Concepto</label>
                        <textarea  class="form-control" id="concepto" name="concepto" required rows="4" placeholder="Escribe el nombre y/o descripción del adeudo"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha">fecha del adeudo</label>
                        <input type="date" class="form-control" id="fecha_adeudo" name="fecha_adeudo" required>                        
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Agregar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection