<?php

namespace App\Http\Controllers;
use App\Models\Ubicacion;
use Illuminate\Http\Request;



class UbicacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
        ]);

        Ubicacion::create([
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ]);

        return response()->json(['status' => 'ok']);
    }
}

