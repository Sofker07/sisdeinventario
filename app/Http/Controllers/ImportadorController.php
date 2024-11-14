<?php

namespace App\Http\Controllers;

use App\Models\Invantario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('database.index');
    }

    public function importar(Request $request)
    {
        // Validar el archivo
        $request->validate([
            'archivo_txt' => 'required|mimes:txt',
        ]);

        // Obtener el archivo
        $archivo = $request->file('archivo_txt');
        $data = file($archivo->getRealPath());
        $data = mb_convert_encoding($data,'UTF-8', 'UTF-8');

        // Inicializar el progreso en la tabla `import_progress`
        DB::table('import_progress')->updateOrInsert(
            ['id' => 1],
            ['status' => 'in_progress', 'total_records' => count($data), 'processed_records' => 0]
        );

        // Limpiar la tabla antes de insertar los nuevos datos
        Invantario::truncate();

        // Insertar los datos y actualizar el progreso
        foreach ($data as $key => $linea) {
            $arregloFilas = explode("\t", trim($linea));

            if ($key > 0) {
                Invantario::create([
                    'numero_de_activo' => isset($arregloFilas[2]) ? $arregloFilas[2] : null,
                    'descripcion' => isset($arregloFilas[5]) ? $arregloFilas[5] : null,
                    'numero_de_serie' => isset($arregloFilas[12]) ? $arregloFilas[12] : null,
                    'modelo' => isset($arregloFilas[13]) ? $arregloFilas[13] : null,
                    'marca' => isset($arregloFilas[14]) ? $arregloFilas[14] : null,
                    'costo_actual' => isset($arregloFilas[17]) ? $arregloFilas[17] : null,
                    'inventario_nacional' => isset($arregloFilas[37]) ? $arregloFilas[37] : null,
                    'clave_ur' => isset($arregloFilas[44]) ? $arregloFilas[44] : null,
                    'resguardante_actual' => isset($arregloFilas[45]) ? $arregloFilas[45] : null,
                    'rfc_resguardante' => isset($arregloFilas[46]) ? $arregloFilas[46] : null,
                    'empleado' => isset($arregloFilas[50]) ? $arregloFilas[50] : null
                ]);

                // Actualizar el progreso inmediatamente
                DB::table('import_progress')->where('id', 1)->update([
                    'processed_records' => $key + 1 // +1 para reflejar el número total procesado
                ]);
            }
        }

        // Actualizar el progreso final
        DB::table('import_progress')->where('id', 1)->update([
            'status' => 'completed',
            'processed_records' => count($data)
        ]);

        return response()->json(['message' => 'La carga de la base de datos se ha completado con éxito.']);
    }

    // Método para obtener el progreso actual
    public function getProgress()
    {
        $progress = DB::table('import_progress')->find(1);
        return response()->json($progress);
    }
}