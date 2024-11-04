<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Bienes Localizados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-fluid { max-width: 100%; margin-top: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .report-info { font-size: 0.9rem; text-align: center; margin-bottom: 10px; }
        .table-container { transform: rotate(-90deg); width: 100vh; height: 100vw; overflow: hidden; margin-top: 30px; }
        .table { width: 100%; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <div class="header">
            <h4>Junta Local Ejecutiva de Veracruz</h4>
            <h5>PROGRAMA DE VERIFICACIÓN DE INVENTARIOS 2024</h5>
            <p><strong>BIENES LOCALIZADOS</strong></p>
        </div>
        
        <!-- Report Info -->
        <div class="report-info">
            <p><strong>Usuario:</strong> RAHM-911103-B66 RAMIREZ HERNANDEZ MAURICIO</p>
            <p><strong>Fecha:</strong> miércoles, 26 de junio de 2024 &nbsp; | &nbsp; <strong>Hora:</strong> 09:35:06</p>
        </div>
        <!-- Assets Table -->
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Inventario Nacional</th>
                        <th>Descripción del bien</th>
                        <th>Número de serie</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>757287</td>
                        <td>MYTEK Ventilador de pedestal</td>
                        <td>-</td>
                        <td>AREA</td>
                        <td>FISCA</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <!-- Total -->
        <p class="text-center"><strong>Total de bienes:</strong> 1</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>