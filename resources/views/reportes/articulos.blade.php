<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Bienes Muebles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header { 
            text-align: center; 
            margin-top: 20px; 
        }
        .report-info { 
            margin: 20px 0; 
            font-size: 0.9rem; 
        }
        .table { 
            margin-bottom: 20px; 
        }
        .commitment { 
            font-size: 0.9rem; 
            margin-top: 20px; 
            border: 2px solid #000000;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h4>DIRECCIÓN EJECUTIVA DE ADMINISTRACIÓN</h4>
            <p>DIRECCIÓN DE RECURSOS MATERIALES Y SERVICIOS</p>
            <p>SUBDIRECCIÓN DE ALMACENES INVENTARIOS Y DESINCORPORACIÓN</p>
        </div>
        
        <!-- Report Info -->
        <div class="report-info">
            <p><strong>Fecha:</strong> 11/01/2024 &nbsp; | &nbsp; <strong>Hora:</strong> 18:19:23</p>
            <p><strong>Fecha:</strong>{{$fecha}}</p>
            <h3 style="text-align: center">RESGUARDO DE BIENE MUEBLES</h3>
            <p><strong>Hora:</strong>{{$hora}}</p>
            <p><strong>UNIDAD RESPONSABLE:</strong> VZ00 VOCALIA EJECUTIVA DE JUNTA LOCAL</p>
            <p><strong>ADSCRIPCIÓN:</strong> VZ00 COORDINACIÓN ADMINISTRATIVA DE JUNTA LOCAL</p>
            <p><strong>SUBDIRECCIÓN / VOCALÍA:</strong> VZ00 COORDINACIÓN ADMINISTRATIVA DE JUNTA LOCAL</p>
            <p><strong>DEPARTAMENTO:</strong> VZ00 DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS</p>
            <p><strong>NOMBRE:</strong> {{ $activo->resguardante }} &nbsp; | &nbsp; <strong>R.F.C.:</strong> ROCN-770220-336</p>
        </div>

        <!-- Assets Table -->
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>NÚMERO DE ACTIVO</th>
                    <th>DESCRIPCIÓN DEL BIEN</th>
                    <th>MARCA</th>
                    <th>SERIE</th>
                    <th>COSTO</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador=0;?>
                <?php $costo_total=0;?>
                @foreach ($activos as $activo)
                <tr>
                    <?php $contador=$contador+1;?>
                    <td>{{ $activo->numero_de_activo }}</td>
                    <td>{{ $activo->descripcion }}</td>
                    <td>{{ $activo->marca }}</td>
                    <td>{{ $activo->no_de_serie }}</td>
                    <td>{{ $activo->costo_actual }}</td>
                    <?php $costo_total = $contador + $activo->costo_actual;?>
                </tr>    
                @endforeach
            </tbody>
        </table>
        
        <!-- Total -->
        <p><strong>Total de bienes:</strong> <?php echo $contador;?> &nbsp; | &nbsp; <strong>Valor total:</strong> <?php echo $costo_total;?></p>

        <!-- Commitment Section -->
        <div class="commitment">
            <p>* ME COMPROMETO A CUIDAR, HACER BUEN USO Y APROVECHAR EL MOBILIARIO Y EQUIPO QUE TENGO BAJO MI RESGUARDO.</p>
            <p>* EN CASO DE RENUNCIA, LICENCIA O CAMBIO DE ADSCRIPCIÓN ME COMPROMETO A HACER ENTREGA DE ESTOS BIENES A MI CARGO.</p>
            <p>* ACEPTO PARA EL CASO DE MAL USO O EXTRAVÍO DE MI PARTE, DE ALGÚN O ALGUNOS BIENES BAJO MI RESGUARDO REPONERLO(S) CON UNO DE SIMILARES O MEJORES CARACTERÍSTICAS, O HACER EL PAGO DEL MISMO AL VALOR QUE RIJA EN ESE MOMENTO EN EL MERCADO PARA UN BIEN IGUAL O EQUIVALENTE.</p>
        </div>

        <!-- Footer -->
        <div class="footer mt-4">
            <p><strong>RESGUARDANTE:</strong> {{ $activo->resguardante }}</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>