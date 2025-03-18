<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constancia de no adeudos</title>
    <style>
        p {
            font-family: serif, sans-serif;
            font-size: 12px;
            text-align: justify;
        }

        html {
            min-height: 100%;
            position: relative;
        }
        body {
            margin: 0;
            margin-bottom: 40px;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
        }

    </style>
</head>
<body style="margin-left: 25px; margin-right: 25px">
    <head>
         <table>
            <tbody>
                <tr>
                    <td style="width: 150px">
                        <img src="{{ public_path('images/itsch.jpg') }}" alt="ITSCH" style="max-width: 40px;">
                    </td>
                    <td>
                    </td>
                    <td><h5>INSTITUTO TECNOLÓGICO SUPERIOR DE CIUDAD HIDALGO</h5></td>
                    <td style="width: 150px">
                    </td>
                    <td >
                        <img src="{{ public_path('images/tecnm.png') }}" alt="ITSCH" style="max-width: 90px;">
                    </td>
                </tr>
            </tbody>
         </table>
         <style>
            body {
                position: relative;
            }

            .marca-agua {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 70%;
                transform: translate(-50%, -50%);
                opacity: 0.1; /* Ajusta la opacidad según necesites */
                z-index: -1; /* Envía la imagen al fondo */
            }
        </style>
        <img src="{{ public_path('images/itsch.jpg') }}" class="marca-agua" alt="ITSCH" >
    </head>

    <h1 style="text-align: center; font-size: 65px; font-weight: lighter; font-family: 'Garamond', serif; margin-bottom: 5px;">
        Constancia
    </h1>
    <h2 style="text-align: center; font-size: 25px; font-weight: normal; font-family: 'Garamond', serif; margin-top: 0;">
        No adeudos
    </h2>
    <h1 style="text-align: center; font-size: 30px; font-weight: lighter; font-family: 'Garamond', serif; margin-bottom: 5px;">
       Titulación
    </h1>

    <p style="text-align: justify; font-size: 20px; font-family: 'Palatino Linotype', serif;">
       Por medio de la presente se hace constar que el (la) alumno (a) <b>{{ $alumno->alu_Nombre }} {{ $alumno->alu_ApePaterno }} {{ $alumno->alu_ApeMaterno }}</b>  de la carrera de <b>{{ $carrera->car_Nombre }}</b>  con número de control <b>{{ $alumno->alu_NumControl }}</b> en la consulta realizada el dia {{ $fecha }} <b>no presenta adeudos</b> con la institución.
    </p>

    <p style="text-align: justify; font-size: 20px; font-family: 'Palatino Linotype', serif;">
        Se extiende la presente constancia a petición del interesado para los fines que al mismo convengan.
    </p>

    <div style="padding: 50px;"></div>

    <img src="" alt="Firma" width="150px">
    <p style="text-align: center; font-size: 20px; font-weight: bold; font-family: 'Palatino Linotype', serif;"><strong>_______________________________ <br> Departamento de servicios escolares</strong></p>


    <div style="padding: 80px;"></div>

    <p style="text-align: right; font-size: 16px; font-family: 'Palatino Linotype', serif;">
        Ciudad Hidalgo, Michoacán a {{ $fecha }}
    </p>
    <p style="text-align: right; font-size: 12px; font-family: 'Palatino Linotype', serif;">
        C.c.p. Archivo
    </p>

    <footer class="footer"><p style="text-align: right">Febrero 2025</p></footer>



</body>
</html>
