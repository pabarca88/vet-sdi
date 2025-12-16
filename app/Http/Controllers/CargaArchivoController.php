<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CargaArchivoController extends Controller
{
    public function cargaArchivoTemp(Request $request)
    {
        $datos = array();

        $request->validate([
            'file' => 'required|file|mimes:pdf,xls,xlsx,csv|max:4096'
        ]);

        $file_extension = $request->file->extension();
        $file_mime_type = $request->file->getClientMimeType();
        $original_file_name = $request->file->getClientOriginalName();

        // $archivo = $request->file->store('public/archivo/temp'); /** ok */
        $archivo = $request->file('file')->store('public/archivo/temp');  /** ok */

        /** guardar con nombre */
        // $archivo = $request->file->storeAs('public/archivo/temp', $original_file_name);

        $url = Storage::url($archivo);
        $nombre_archivo = str_replace('/storage/archivo/temp/','',$url);
        $datos['estado'] = 1;
        $datos['archivo']['url'] = $url;
        $datos['archivo']['original_file_name'] = $original_file_name;
        $datos['archivo']['nombre_archivo'] = $nombre_archivo;
        $datos['archivo']['file_extension'] = $file_extension;
        $datos['archivo']['file_mime_type'] = $file_mime_type;

        return $datos;
    }


    /**
     * mover y renombrar archivo
     *
     * @param [Request] $request
     *  [string] $nombreArchivo
     *  [string] $dirDestino (config\filesystems.php)
     *  [string] $nombreNuevo
     * @return array
     */
    public function moverArchivo_r(Request $request)
    {
        return static::moverArchivo($request->nombreArchivo, $request->dirDestino, $request->nombreNuevo);
    }

    /**
     * mover y renombrar archivo
     *
     * @param [string] $nombreArchivo
     * @param [string] $dirDestino (config\filesystems.php)
     * @param [string] $nombreNuevo
     * @return array
     */
    static public function moverArchivo($nombreArchivo, $dirDestino, $nombreNuevo)
    {
        $datos = array();

        // Log inicial para debugging
        \Log::info('Iniciando moverArchivo', [
            'nombreArchivo' => $nombreArchivo,
            'dirDestino' => $dirDestino,
            'nombreNuevo' => $nombreNuevo,
            'disco_temp_path' => Storage::disk('archivo_temp')->path(''),
            'archivo_path_completo' => Storage::disk('archivo_temp')->path($nombreArchivo)
        ]);

        // Listar archivos en disco temporal para debugging
        try {
            $archivos_temp = Storage::disk('archivo_temp')->files();
            \Log::info('Archivos en disco temporal antes de mover', [
                'total_archivos' => count($archivos_temp),
                'archivos' => $archivos_temp,
                'buscando' => $nombreArchivo
            ]);
        } catch (\Exception $e) {
            \Log::error('Error listando archivos temporales en moverArchivo', [
                'error' => $e->getMessage()
            ]);
        }

        // archivo_temp
        // archivo_archivo
        $exists = Storage::disk('archivo_temp')->exists($nombreArchivo);
        $datos['proceso']['exists'] = $exists;

        \Log::info('Verificación de existencia', [
            'nombreArchivo' => $nombreArchivo,
            'exists' => $exists
        ]);

        if($exists)
        {
            $contents = Storage::disk('archivo_temp')->get($nombreArchivo);
            $copy = Storage::disk($dirDestino)->put($nombreNuevo, $contents);
            $datos['proceso']['copy'] = $copy;

            if($copy)
            {
                $url = Storage::disk($dirDestino)->url($nombreNuevo);
                Storage::disk('archivo_temp')->delete($nombreArchivo);
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
                $datos['proceso']['url'] = $url;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'fallo';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'no encontrado';

            \Log::warning('Archivo no encontrado en moverArchivo', [
                'nombreArchivo' => $nombreArchivo,
                'disco_path' => Storage::disk('archivo_temp')->path(''),
                'archivo_path_buscado' => Storage::disk('archivo_temp')->path($nombreArchivo)
            ]);
        }

        \Log::info('Resultado final moverArchivo', [
            'nombreArchivo' => $nombreArchivo,
            'resultado' => $datos
        ]);

        return $datos;
    }

}
