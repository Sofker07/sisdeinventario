<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Invantario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inventario.index');
    }

    public function infoActivo($numero)
    {
        // // Quitar los primeros dos dígitos
        // $numeroComoCadena = (string)$numero;
        // $resultado = substr($numeroComoCadena, 2);
        
        // Busca el activo por su número
        $activo = Invantario::where('numero_de_activo', $numero)->first();

        // Si no se encuentra el activo, devuelve una respuesta con un error
        if (!$activo) {
            return response()->json(['error' => 'Activo no encontrado'], 404);
        }

        // Busca el último registro en la tabla Historial del activo
        $ultimoHistorial = Historial::where('numero_de_activo', $numero)->orderBy('created_at', 'desc')->first();

        // Verifica si existe un registro en Historial y si la fecha es del año actual
        $mensajeHistorial = null;
        if ($ultimoHistorial && Carbon::parse($ultimoHistorial->created_at)->year == Carbon::now()->year) {
            $mensajeHistorial = "Este artículo ya fue revisado el " . Carbon::parse($ultimoHistorial->created_at)->format('d/m/Y');
        }

        // Devuelve la información del activo y, si existe, el mensaje del historial
        return response()->json([
            'activo' => $activo,
            'mensajeHistorial' => $mensajeHistorial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request){
        //Validación de los campos del formulario
        $request->validate([
            'numero_activo'=>'required',
            'baja'=>'required',
            'resguardante'=>'required',
            'nuevo_resguardante'=>'required_if:resguardante,false',
            'rfc_nuevo'=>'required_if:resguardante,false',
            'no_empleado'=>'required_if:resguardante,false'
        ]);

        if($request->resguardante=='false'){//cuando el reguadante no es el correcto
            //Actualizar los valores en la tabla de inventario junto con los del nuevo resguardante
            Invantario::where('numero_de_activo',$request->numero_activo)->update([
                'observaciones' => $request->observaciones,
                'baja' => $request->baja === 'true',
                'localizado' => 'true',
                'resguardante_nuevo'=>$request->nuevo_resguardante,
                'rfc_resguardante_nuevo'=>$request->rfc_nuevo,
                'empleado_nuevo'=>$request->no_empleado,
            ]);
            //Insertar los valores en la tabla de historial junto con los del nuevo resguardante
            Historial::create([
                'numero_de_activo'=>$request->numero_activo,
                'observaciones' => $request->observaciones,
                'baja' => $request->baja === 'true',
                'resguardante_correcto' => $request->resguardante === 'true',
                'resguardante_nuevo'=>$request->nuevo_resguardante,
                'rfc_resguardante_nuevo'=>$request->rfc_nuevo,
                'empleado_nuevo'=>$request->no_empleado,
            ]);
        }else{//Cuando el resguardante si es el correcto
            //Actualizar los valores en la tabla de inventario sin afectar al resguardante actual
            Invantario::where('numero_de_activo',$request->numero_activo)->update([
                'observaciones' => $request->observaciones,
                'baja' => $request->baja === 'true',
                'localizado' => 'true',
            ]);
            //Insertar los valores en la tabla de historial sin un nuevo resguardante
            Historial::create([
                'numero_de_activo'=>$request->numero_activo,
                'observaciones' => $request->observaciones,
                'baja' => $request->baja === 'true',
                'resguardante_correcto' => $request->resguardante === 'true',
            ]);
        }

        //redireccionar a la vista de inventario
        return redirect()->route('inventario.index')->with('mensaje','Se actualizó correctamente el artículo');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($numero_de_activo)
    {
        // // Quitar los primeros dos dígitos
        // $numeroComoCadena = (string)$numero_de_activo;
        // $resultado = substr($numeroComoCadena, 2);
        $activos = Historial::where('numero_de_activo', $numero_de_activo)->get();
        return view('inventario.show', compact('activos'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}