<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorización de Pase</title>
</head>
<body>
    <h1>Autorización de Pase de Salida</h1>    
    <p>Hola {{ $jefe->name }},</p>
    <p>El trabajador {{ $trabajador->name }} ha solicitado un pase de salida con los siguientes detalles:</p>
    <p>Fecha de la solicitud: {{ $pase->fecha_solicitud }}</p>
    <p>Hora de salida: {{ $pase->hora_salida }}</p>
    <p>Motivo: {{ $pase->motivo }}</p>
    
    <p>Por favor, autoriza o niega el pase a través del siguiente enlace:</p>
    <a href="{{ route('pases.autorizar', ['pase_id' => $pase->id, 'autorizar' => 'true']) }}">Autorizar pase</a> 
    <br>
    <br>
    <a href="{{ route('pases.autorizar', ['pase_id' => $pase->id, 'autorizar' => 'false']) }}">Negar pase</a>

</body>
</html>
