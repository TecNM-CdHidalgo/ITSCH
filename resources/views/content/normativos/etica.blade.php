@extends('layouts.app')

@section('content')



 <div class="container-fluid">
     <div class="row">
        <div class="col-sm">

	            <h2 class="page-title"> Acta de Instalación del Subcomité de Ética del TecNM Campus Ciudad Hidalgo                </h2>
		

                 <hr class="red">
                    &nbsp; <br>
                 
        </div>
    </div>
  
    <hr class="red">
  
      </div>




 
<br><br>
<br><br>
<table class="table">
    <thead class="thead-dark">
<tr>
<th scope="col">Nombre del archivo</th>

<th scope="col">Descarga</th>
</tr>

</thead>
    <tr>
    <td>    <h2></h2> Acta de Instalación del Subcomité de Ética
    </td>
    
    <td>  <a type="button" class="btn btn-primary" href="{{asset('documents/content/subcomite_etica/acta_de_instalacion_subcomite_etica.pdf')}}" data-toogle="tooltip" title="lineamiento de academias." target="_blank">
        <i class='fas fa-download' style='font-size:20px'></i>
        </a></td>
    </tr>
    </table>
    
    <hr class="red">



@endsection
