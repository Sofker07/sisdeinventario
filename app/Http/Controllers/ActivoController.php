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
            'observaciones'=>'required', //modificar a opcional
            'baja'=>'required',
            'resguardante'=>'required',
            'nuevo_resguardante'=>'required_if:resguardante,false',
            'rfc_nuevo'=>'required_if:resguardante,false',
            'no_empleado'=>'required_if:resguardante,false'
        ]);
        /* Guardar los datos en el Histórico*/
        //Crear un nuevo registro en la tabla historial
        $activo_historial= new Historial();
        //Guardar la información del activo con los datos del formulario en el histórico
        $activo_historial->numero_de_activo=$request->numero_activo;
        $activo_historial->observaciones = $request->observaciones;
        $activo_historial->baja = $request->baja === 'true';
        $activo_historial->resguardante_correcto = $request->resguardante === 'true';
        //Añadir nuevo resguardante si el actual no es correcto
        if($request->resguardante=='false'){
            $activo_historial->resguardante_nuevo=$request->nuevo_resguardante;
            $activo_historial->rfc_resguardante_nuevo=$request->rfc_nuevo;
            $activo_historial->empleado_nuevo=$request->no_empleado;
        }
        //Guardar los datos en la tabla historial
        $activo_historial->save();

        /*Actualizar los datos en la tabla de inventario*/
        //Buscar el activo por su numero en la tabla de inventario
        $activo_inventario= Invantario::find($request->numero_activo);
        //
        $activo_inventario->observaciones = $request->observaciones;
        $activo_inventario->baja = $request->baja === 'true';
        $activo_inventario->localizado = 'true';
        //Actualizar el reguardante si el actual no es correcto en la tabla de inventario
        if($request->resguardante=='false'){
            $activo_inventario->resguardante_nuevo=$request->nuevo_resguardante;
            $activo_inventario->rfc_resguardante_nuevo=$request->rfc_nuevo;
            $activo_inventario->empleado_nuevo=$request->no_empleado;
        }
        //Guardar los datos en la tabla historial
        $activo_inventario->save();

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