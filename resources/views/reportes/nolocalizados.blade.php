<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENES NO LOCALIZADOS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            margin: 40px;
            flex-grow: 1;
        }
        img {
            height: 55px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        .col-1, .col-2, .col-3, .col-6, .col-8, .col-12 {
            padding: 0 15px;
            box-sizing: border-box;
        }
        .col-1 {
            flex: 0 0 8.3333%;
            max-width: 8.3333%;
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
        .col-8 {
            flex: 0 0 66.6667%;
            max-width: 66.6667%;
        }
        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        h4, p {
            margin: 0;
            padding: 5px 0;
        }
        h4{
            font-size: 10pt
        }
        .texto {
            font-family: 'Courier New', Courier, monospace;
            font-size: 10pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 8pt;
        }
        thead {
            background-color: #C0C0C0;
        }
        th {
            font-weight: bold;
        }
        .footer-row {
            margin-left: 40px;
            display: flex;
        }
        .mt-auto {
            margin-top: auto;
        }
        .juntos{
            display: inline-block;
        }
        .texto-titulo{
            font-family: 'Courier New', Courier, monospace;
            font-size: 8pt;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="row">
            <div class="juntos">
                <img src="{{ url('/dist/img/LogoINE.png') }}" alt="LogoINE">
            </div>
            <div class="juntos">
                <h4 style="margin-left: 100px">Junta Local Ejecutiva de Veracruz</h4>
                <p class="texto-titulo" style="margin-left: 120px"><strong>PROGRAMA DE VERIFICACIÓN DE INVENTARIOS {{$year}}</strong></p> 
                <p class="texto-titulo" style="margin-left: 140px"><strong>BIENES NO LOCALIZADOS</strong></p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="juntos" style="margin-right: 50px">
                <p class="texto">{{$datos->rfc_resguardante}}</p>
            </div>
            <div class="juntos">
                <p class="texto">{{$datos->resguardante_actual}}</p>
            </div>
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Inventario Nacional</th>
                        <th>Descripción del bien</th>
                        <th>Numero de serie</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Observaciones</th>
                        <th>Clave UR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_activos=0;?>
                    @foreach ($nolocalizados as $nolocalizado)
                        <tr>
                            <td>{{$nolocalizado->inventario_nacional}}</td>
                            <td>{{$nolocalizado->descripcion}}</td>
                            <td>{{$nolocalizado->numero_de_serie}}</td>
                            <td>{{$nolocalizado->marca}}</td>
                            <td>{{$nolocalizado->modelo}}</td>
                            <td>{{$nolocalizado->observaciones}}</td>
                            <td>{{$nolocalizado->clave_ur}}</td>
                        </tr>
                        <?php $total_activos+=1;?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <p class="texto">Total de bienes:      {{$total_activos}}</p>
        </div>
    </div>
</body>
</html>