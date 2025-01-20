<?php

namespace App\Http\Controllers;

use App\Models\Invantario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ImportadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Limpiar la caché del progreso
        Cache::forget('total_registros');
        Cache::forget('registros_procesados');
        return view('database.index');
    }

    public function importar(Request $request)
    {
        // Limpiar la caché del progreso antes de empezar
        Cache::forget('total_registros');
        Cache::forget('registros_procesados');

        // Validar el archivo
        $request->validate([
            'archivo_txt' => 'required|mimes:txt',
        ]);

        // Obtener el archivo
        $archivo = $request->file('archivo_txt');
        $data = file($archivo->getRealPath());
        $data = mb_convert_encoding($data, 'UTF-8', 'UTF-8');

        // Limpiar la tabla antes de insertar los nuevos datos
        Invantario::truncate();

        // Establecer el total de registros en caché
        Cache::put('total_registros', count($data) - 1); // Restar 1 para excluir la cabecera
        Cache::put('registros_procesados', 0); // Inicializar registros procesados

        foreach ($data as $key => $linea) {
            if ($key > 0) {
                $arregloFilas = explode("\t", trim($linea));

                // Insertar en la base de datos
                Invantario::create([
                    'numero_de_activo' => $arregloFilas[2] ?? null,
                    'descripcion' => $arregloFilas[5] ?? null,
                    'numero_de_serie' => $arregloFilas[12] ?? null,
                    'modelo' => $arregloFilas[13] ?? null,
                    'marca' => $arregloFilas[14] ?? null,
                    'costo_actual' => $arregloFilas[17] ?? null,
                    'inventario_nacional' => $arregloFilas[37] ?? null,
                    'clave_ur' => $arregloFilas[44] ?? null,
                    'resguardante_actual' => $arregloFilas[45] ?? null,
                    'rfc_resguardante' => $arregloFilas[46] ?? null,
                    'empleado' => $arregloFilas[50] ?? null,
                ]);

                // Actualizar el progreso en caché
                $registrosProcesados = Cache::get('registros_procesados', 0) + 1;
                Cache::put('registros_procesados', $registrosProcesados);
            }
        }

        // Devolver una respuesta JSON con el mensaje de finalización
        return response()->json([
            'message' => 'Importación completada',
            'status' => 'success',
        ]);
    }


    // Método para obtener el progreso
    public function obtenerProgreso()
    {
        $totalRegistros = Cache::get('total_registros', 1); // Total estimado
        $registrosProcesados = Cache::get('registros_procesados', 0); // Los procesados

        return response()->json([
            'total' => $totalRegistros,
            'progreso' => $registrosProcesados,
            'porcentaje' => ($registrosProcesados / $totalRegistros) * 100,
        ]);
    }
}