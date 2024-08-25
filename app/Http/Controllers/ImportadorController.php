<?php

namespace App\Http\Controllers;

use App\Models\Invantario;
use Illuminate\Http\Request;

class ImportadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $inventario = Invantario::all();
        // print_r($inventario);
        // foreach ($inventario as $inventariofila){
        //     print_r($inventariofila->id);
        // }
        // $filainventario=new Invantario;
        
        // // $inventario=Invantario::Create([
        // //     'numero_de_activo'=>595154,
        // //     'numero_de_activo'=>595154,
        // //     'numero_de_activo'=>595154,
        // //     'numero_de_activo'=>595154,
        // // ]);

        // // $filainventario->id="";
        // $filainventario->numero_de_activo="595154";
        // $filainventario->descripcion="Computadora";
        // $filainventario->numero_de_serie="abc123";
        // $filainventario->modelo="ultimo";
        // $filainventario->marca="registrada";
        // $filainventario->costo_actual="1000";
        // $filainventario->inventario_nacional="abc123";
        // $filainventario->clave_ur="123";
        // $filainventario->resguardante_actual="yo";
        // $filainventario->rfc_resguardante="abc123";
        // $filainventario->emplado="123";
        // $filainventario->save();
        return view('database.index');
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
    public function importar(Request $request)
    {
        
        $archivo=$request->file('archivo_txt');
        $data=file($archivo->getRealPath());
        $arregloFilas=[];
        foreach ($data as $key => $linea) {
            $arregloFilas=explode("\t",trim($linea));
            if($key==0){
                print_r($key);
            }else{
                $inventario=Invantario::Create([
                    'numero_de_activo'=>isset($arregloFilas[2]) ? $arregloFilas[2] : null,
                    'descripcion'=>isset($arregloFilas[5]) ? $arregloFilas[5] : null,
                    'numero_de_serie'=>isset($arregloFilas[12]) ? $arregloFilas[12] : null,
                    'modelo'=>isset($arregloFilas[13]) ? $arregloFilas[13] : null,
                    'marca'=>isset($arregloFilas[14]) ? $arregloFilas[14] : null,
                    'costo_actual'=>isset($arregloFilas[17]) ? $arregloFilas[17] : null,
                    'inventario_nacional'=>isset($arregloFilas[37]) ? $arregloFilas[37] : null,
                    'clave_ur'=>isset($arregloFilas[44]) ? $arregloFilas[44] : null,
                    'resguardante_actual'=>isset($arregloFilas[45]) ? $arregloFilas[45] : null,
                    'rfc_resguardante'=>isset($arregloFilas[46]) ? $arregloFilas[46] : null,
                    'empleado'=>isset($arregloFilas[50]) ? $arregloFilas[50] : null
                ]);
                // print_r($arregloFilas);
                // isset($arregloFilas[45]) ? $arregloFilas[45] : "";
                // print_r($arregloFilas[2]);
                // print_r($arregloFilas[5]);
                // print_r($arregloFilas[12]);
                // print_r($arregloFilas[13]);
                // print_r($arregloFilas[14]);
                // print_r($arregloFilas[17]);
                // print_r($arregloFilas[37]);
                // print_r($arregloFilas[44]);
                // print_r($arregloFilas[45]);
                // print_r($arregloFilas[46]);
                // print_r($arregloFilas[50]);
            }
            $linea++;
        }
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