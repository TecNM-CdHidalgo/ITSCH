@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col text-center">
        <img src="{{ asset('images/content/transparencia/rf.png') }}" alt="Reportes" class="img-fluid mx-auto d-block mb-3" style="width:1000px height:800px;">
        <p>Aquí puedes colocar los reportes financieros públicos (PDFs, enlaces, tablas).</p>
        <hr>
        <div class="row justify-content-center">
            <div class="col-auto text-center mb-2">
                <a href="#" class="btn btn-outline-primary" target="_blank">
                   <i class="bi bi-download"  style="font-size:1.2em"></i>
                    &nbsp;<strong>Reporte financiero 1 (PDF)</strong>
                </a>
            </div>
            <div class="col-auto text-center mb-2">
                <a href="#" class="btn btn-outline-primary" target="_blank">
                    <i class="bi bi-download"  style="font-size:1.2em"></i>
                    &nbsp;<strong>Reporte financiero 2 (PDF)</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>

@endsection
