<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bodega;
use App\Models\BodegasSucursal;
use App\Models\Sucursal;

use Illuminate\Support\Facades\Auth;

class SucursalBodegaController extends Controller
{
    //

    function asignarBodegaSucursal_r(Request $request)
    {
        $id_bodega = $request->input('id');

        $bodega = Bodega::find($id_bodega);

        $sucursal = Sucursal::where('id_lugar_atencion',$request->id_lugar_atencion)->first();

        $existe = BodegasSucursal::where('id_bodega',$bodega->id)
                    ->where('id_sucursal',$sucursal->id)
                    ->first();

        if($existe){
            return response()->json([
                'estado' => 0,
                'mensaje' => 'La bodega ya está asignada a la sucursal.',
            ]);
        }

        $bodega_sucursal = new BodegasSucursal();
        $bodega_sucursal->id_sucursal = $sucursal->id;
        $bodega_sucursal->id_bodega = $bodega->id;
        $bodega_sucursal->activo = 1;
        $bodega_sucursal->id_responsable = Auth::user()->id;


        $bodega_sucursal->save();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Bodega asignada correctamente a la sucursal.',
            'bodega_sucursal' => $bodega_sucursal,
        ]);
    }

    function verBodegasSucursal_r(Request $request)
    {

        $id_lugar_atencion = $request->input('id_lugar_atencion');
        $id_sucursal = $request->input('id_sucursal');
        $id_institucion = $request->input('id_institucion');

        $bodega_asignadas = BodegasSucursal::where('id_sucursal', $id_sucursal)->with(['bodega', 'sucursal'])->get();
        $bodegas = Bodega::where('id_institucion', $id_institucion)->get();

        foreach ($bodegas as $bodega) {
            $bodega->asignada = false;
            foreach ($bodega_asignadas as $bodega_asignada) {
                if ($bodega->id == $bodega_asignada->id_bodega) {
                    $bodega->asignada = true;
                    break;
                }
            }
        }

        return response()->json([
            'estado' => 1,
            'bodegas' => $bodegas,
            'bodega_asignadas' => $bodega_asignadas,
        ]);
    }

    function removerBodegaSucursal_r(Request $request)
    {
        $id_bodega = $request->input('id');
        $id_sucursal = $request->input('id_sucursal');

        $bodega_sucursal = BodegasSucursal::where('id_bodega', $id_bodega)
                            ->where('id_sucursal', $id_sucursal)
                            ->first();

        if (!$bodega_sucursal) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'La bodega no está asignada a la sucursal.',
            ]);
        }

        $bodega_sucursal->delete();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Bodega removida correctamente de la sucursal.',
        ]);
    }
}
