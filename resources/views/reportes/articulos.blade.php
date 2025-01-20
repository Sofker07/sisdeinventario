<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESGUARDO DE BIENES MUEBLES</title>
    
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }
        .content {
            margin-left: 40px;
            margin-right: 40px;
        }
        .titulo {
            text-align: center;
        }
        img {
            height: 48px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            /* margin: 0 -15px; */
        }
        .col-2, .col-3, .col-6, .col-9 {
            padding: 0 15px;
            box-sizing: border-box;
        }
        .col-2 {
            flex: 0 0 16.6667%;
            max-width: 16.6667%;
        }
        .col-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
        .col-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .col-9 {
            flex: 0 0 75%;
            max-width: 75%;
        }
        h4, h6, p {
            margin: 0;
            padding: 5px 0;
            font-weight: 500;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
        }
        table{
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            font-size: 6pt;
        }
        .border {
            border: 1px solid black;
        }
        .opacity-75 {
            opacity: 0.75;
        }
        hr {
            border: none;
            height: 1px;
            background-color: black;
        }
        .content{
            margin: 40px;
        }
        .titulo{
            text-align: center;
        }
        table{
            text-align: center;
        }
        #firma{
            width: 300px;
            margin: auto;
        }
        .titulo-encabezado{
            font-size: 9pt;
        }
        .encabezado{
            display: inline-block;
        }
        .fecha-hora{
            font-size: 7pt;
        }
        p{
            font-size: 6pt;
        }
        .titulos{
            padding-right: 35px;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="datos">
            <div class="encabezado datos titulos">
                <p><strong>UNIDAD RESPONSABLE</strong></p>
                <p><strong>ADSCRIPCION</strong></p>
                <p><strong>SUBDIRECCION / VOCALIA</strong></p>
                <p><strong>DEPARTAMENTO</strong></p>
                <p><strong>NOMBRE</strong></p>
                <p><strong>R.F.C</strong></p>
            </div>
            <div class="encabezado datos">
                <p>{{$datos->clave_ur}} VOCALIA EJECUTIVA DE JUNTA LOCAL</p>
                <p>{{$datos->clave_ur}} COORDINACION ADMINISTRATIVA DE JUNTA LOCAL</p>
                <p>{{$datos->clave_ur}} COORDINACION ADMINISTRATIVA DE JUNTA LOCAL</p>
                <p>{{$datos->clave_ur}} DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS</p>
                <p>{{$datos->resguardante_actual}}</p>
                <p>{{$datos->rfc_resguardante}}</p>
            </div>
        </div>
        <div class="row">
            <table class="border border-dark border-1">
                <thead>
                    <th class="border">NÚMERO DE ACTIVO</th>
                    <th class="border">DESCRIPCIÓN DEL BIEN</th>
                    <th class="border">MARCA</th>
                    <th class="border">SERIE</th>
                    <th class="border">COSTO</th>
                </thead>
                <tbody>
                    <?php $total_activos=0;?>
                    <?php $costo_total=0;?>
                    @foreach ($activos as $activo)
                        <tr>
                            <td>{{$activo->numero_de_activo}}</td>
                            <td>{{$activo->descripcion}}</td>
                            <td>{{$activo->marca}}</td>
                            <td>{{$activo->numero_de_serie}}</td>
                            <td>{{$activo->costo_actual}}</td>
                        </tr>
                        <?php $total_activos+=1;?>
                        <?php $costo_total+=$activo->costo_actual;?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Total de bienes: {{$total_activos}}</th>
                        <th></th>
                        <th>Valor total:</th>
                        <th>{{$costo_total}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <br>
        <div class="border">
            <p>* ME COMPROMETO A CUIDAR, HACER BUEN USO Y APROVECHAR EL MOBILIARIO Y EQUIPO QUE TENGO BAJO MI RESGUARDO.</p>
            <p>* EN CASO DE RENUNCIA, LICENCIA O CAMBIO DE ADSCRIPCIÓN ME COMPROMETO A HACER ENTREGA DE ESTOS BIENES A MI CARGO.</p>
            <p>* ACEPTO PARA EL CASO DE MAL USO O EXTRAVIO DE MI PARTE, DE ALGÚN O ALGUNOS BIENES BAJO MI RESGUARDO REPONERLO(S) CON UNO DE SIMILARES O MEJORES CARACTERISTICAS, O HACER EL PAGO DEL MISMO AL VALOR QUE RIJA EN ESE MOMENTO EN EL MERCADO PARA UN BIEN IGUAL O EQUIVALENTE.</p>
        </div>
        <br>
        <div class="titulo">
            <p class="titulo">RESGUARDANTE</p>
        </div>
        <br><br>
        <hr style="margin: auto; width: 25%;">
        <div class="titulo">
            <p class="titulo">{{$datos->resguardante_actual}}</p>
        </div>
    </div>
</body>
</html>