@extends('layouts.app')

@section('content')





<div class="container">

    <div class="title-docs">Reglamento</div>
    <table class="table table-docs">
        <thead>
        </thead>
        <tbody>
        <tr>
            <td>Reglamento</td>

            <td>
                <a type="button" class="btn btn-primary"
                   href="{{asset('documents/content/calidad/reglamento.pdf')}}" data-toogle="tooltip" title="documento para descargar" download  target="_blank">
                    <i class='fas fa-download' style='font-size:20px'></i>
                </a>
            </td>
        </tr>

        </tbody>
    </table>
</div>
@endsection
