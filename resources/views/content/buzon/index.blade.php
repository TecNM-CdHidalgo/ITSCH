@extends('layouts.app')


@section('content')
    <h3>Buzón</h3>
    <p>Buzón de felicitaciones, quejas y sugerencias</p>
    <hr>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action="{{ route('contenido.buzon.store') }}" method="get">
                <div class="form-group">
                    <label for="sel1">Elije un tipo de mensaje</label>
                    <select class="form-control" id="sel1" required name="tipo">
                    <option value="Felicitaciones" selected>Felicitaciones</option>
                    <option value="Sugerencias">Sugerencias</option>
                    <option value="Quejas">Quejas</option>
                    </select>
                </div>

                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                    </div>
                    <input type="text" class="form-control" required name="nombre">
                </div>

                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Correo</span>
                    </div>
                    <input type="email" class="form-control" required name="correo">
                </div>

                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Mensaje</span>
                    </div>
                    <textarea class="form-control" name="mensaje" id="mensaje" rows="15" required></textarea>
                </div>
                <button class="g-recaptcha btn btn-success"data-sitekey="6Ldy40IeAAAAAF3qBqMdRrflLSn83zwwpnNrYdad"data-callback='onSubmit'data-action='submit'>Enviar</button>

            </form>
            <br>
        </div>
        <div class="col-sm-2"></div>
    </div>

@endsection
