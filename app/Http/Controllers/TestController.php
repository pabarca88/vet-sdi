<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testTerapiaVoz(Request $request)
    {
        try {
            // Test básico
            \Log::info('Test iniciado');

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Test funcionando correctamente',
                'datos_recibidos' => $request->all()
            ]);

        } catch (\Exception $e) {
            \Log::error('Error en test: ' . $e->getMessage());

            return response()->json([
                'estado' => 0,
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
}
