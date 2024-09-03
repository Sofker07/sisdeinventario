<?php

namespace App\Http\Controllers;

use App\Models\Invantario;
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
        // Busca el activo por su número
        $activo = Invantario::where('numero_de_activo', $numero)->first();

        // Si no se encuentra el activo, devuelve una respuesta vacía o con un mensaje de error
        if (!$activo) {
            return response()->json(['error' => 'Activo no encontrado'], 404);
        }

        // Devuelve la información del activo como JSON
        return response()->json($activo);
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
     * Display the specified resource.
     */
    public function show(string $id)
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
