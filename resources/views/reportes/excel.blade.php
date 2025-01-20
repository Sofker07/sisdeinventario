<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resguardo de Bienes</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Número de activo</th>
                <th>Descripción</th>
                <th>Número de serie</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Costo actual</th>
                <th>Inventario nacional</th>
                <th>Clave UR</th>
                <th>Resguardante actual</th>
                <th>RFC del resguardante</th>
                <th>Número de empleado</th>
                <th>observaciones</th>
                <th>Baja</th>
                <th>Localizado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activos as $activo)
                <tr>
                    <td>{{$activo->numero_de_activo}}</td>
                    <td>{{$activo->descripcion}}</td>
                    <td>{{$activo->numero_de_serie}}</td>
                    <td>{{$activo->modelo}}</td>
                    <td>{{$activo->marca}}</td>
                    <td>{{$activo->costo_actual}}</td>
                    <td>{{$activo->inventario_nacional}}</td>
                    <td>{{$activo->clave_ur}}</td>
                    <td>{{$activo->resguardante_actual}}</td>
                    <td>{{$activo->rfc_resguardante}}</td>
                    <td>{{$activo->empleado}}</td>
                    <td>{{$activo->observaciones}}</td>
                    <td>{{$activo->baja ? 'Sí' : 'No' }}</td>
                    <td>{{$activo->localizado ? 'Sí' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>