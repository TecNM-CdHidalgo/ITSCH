@extends('layouts.app')


@section('content')
    <h2>Convenios</h2>
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
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    @section('js')
        <script>
            //Codigo para adornar las tablas con datatables
            $(document).ready(function() {

                                //Construimos la tabla de convenios con los registros de la consulta
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
                    $("#tabConvenios>tbody").append("<tr><td>"+con+"</td><td>"+tip[x]+"</td><td>"+areas[x]+"</td><td>"+ins[x]+"</td><td>"+ini[x]+"</td><td>"+fin[x]+"</td><td><a href="+r+" download class='btn btn-primary btn-sm'><i class='fas fa-file-alt' style='font-size:14px'></i></a></td></tr>");
                }


                $('#tabConvenios').DataTable({

                    dom: 'Bfrtip',

                    responsive: {
                        breakpoints: [
                        {name: 'bigdesktop', width: Infinity},
                        {name: 'meddesktop', width: 1366},
                        {name: 'smalldesktop', width: 1280},
                        {name: 'medium', width: 1188},
                        {name: 'tabletl', width: 1024},
                        {name: 'btwtabllandp', width: 848},
                        {name: 'tabletp', width: 768},
                        {name: 'mobilel', width: 600},
                        {name: 'mobilep', width: 320}
                        ]
                    },

                    lengthMenu: [
                        [ 5, 10, 25, 50, -1 ],
                        [ '5 reg', '10 reg', '25 reg', '50 reg', 'Ver todo' ]
                    ],

                    buttons: [
                        {extend: 'collection', text: 'Exportar',
                            buttons: [
                                { extend: 'copyHtml5', text: 'Copiar' },
                                'csvHtml5',
                                'excelHtml5',
                                'pdfHtml5',
                                { extend: 'print', text: 'Imprimir' },
                            ]},
                        { extend: 'colvis', text: 'Columnas visibles' },
                        { extend:'pageLength',text:'Ver registros'},
                    ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    }
                });
            });
        </script>
    @endsection
@endsection
