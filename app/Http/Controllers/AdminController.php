<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Invantario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $articulos = Invantario::count();
        $registros_actuales = Historial::whereYear('created_at', Carbon::now()->year)
        ->select('numero_de_activo', Historial::raw('MAX(created_at) as created_at'))
        ->groupBy('numero_de_activo', 'created_at')
        ->get()
        ->unique(function ($item) {
            return $item->numero_de_activo . '-' . \Carbon\Carbon::parse($item->created_at)->format('Y-m-d');
        })
        ->count();
        $registros_faltantes = $articulos - $registros_actuales;
        $data=[$registros_actuales,$registros_faltantes];
        $labels=['Artículos inventariados','Artículos faltantes'];
        return view('index', compact(
            'articulos',
            'registros_actuales',
            'registros_faltantes',
            'data',
            'labels'
        ));
    }
}