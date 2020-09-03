@extends('layouts.app')

@section('content')




    <table class="table table-dark table-hover">
        <head>
            <br><br>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descargar</th>


            </tr>
        </head>
        <body>
        @foreach($TemarioSistemas as $tem)
            <tr>
                <td>{{$tem->id}}</td>
                <td>{{$tem->link}}</td>
                <td>{{$tem->link}}</td>

            </tr>
        @endforeach
        </body>
    </table>

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2">
            {{ $TemarioSistemas->links() }}
        </div>
        <div class="col-sm-5"></div>
    </div>





@endsection


@section('js')


@endsection
