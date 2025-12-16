<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\ImagenesDentalPaciente;

use App\Models\ImagenesDentalRxPaciente;

class CargaImagenController extends Controller
{
    /** IMAGEN */
    public function cargaImagenTemp(Request $request)
    {
        $datos = array();

        $request->validate([
            'file' => 'required|image|max:4096'
        ]);

        $file_extension = $request->file->extension();
        $file_mime_type = $request->file->getClientMimeType();
        $original_file_name = $request->file->getClientOriginalName();

        // $imagenes = $request->file->store('public/imagenes/temp'); /** ok */
        $imagenes = $request->file('file')->store('public/imagenes/temp');  /** ok */

        /** guardar con nombre */
        // $imagenes = $request->file->storeAs('public/imagenes/temp', $original_file_name);

        $url = Storage::url($imagenes);
        $nombre_img = str_replace('/storage/imagenes/temp/','',$url);
        $datos['estado'] = 1;
        $datos['img']['url'] = $url;
        $datos['img']['original_file_name'] = $original_file_name;
        $datos['img']['nombre_img'] = $nombre_img;
        $datos['img']['file_extension'] = $file_extension;
        $datos['img']['file_mime_type'] = $file_mime_type;


        $datos = array();

        $request->validate([
            'file' => 'required|image|max:4096'
        ]);

        $file_extension = $request->file->extension();
        $file_mime_type = $request->file->getClientMimeType();
        $original_file_name = $request->file->getClientOriginalName();

        // $imagenes = $request->file->store('public/imagenes/temp'); /** ok */
        $imagenes = $request->file('file')->store('public/imagenes/temp');  /** ok */

        /** guardar con nombre */
        // $imagenes = $request->file->storeAs('public/imagenes/temp', $original_file_name);

        $url = Storage::url($imagenes);
        $nombre_img = str_replace('/storage/imagenes/temp/','',$url);
        $datos['estado'] = 1;
        $datos['img']['url'] = $url;
        $datos['img']['original_file_name'] = $original_file_name;
        $datos['img']['nombre_img'] = $nombre_img;
        $datos['img']['file_extension'] = $file_extension;
        $datos['img']['file_mime_type'] = $file_mime_type;

        return $datos;
    }

    public function guardarImagenesRxDental(Request $request){

        // Log para debugging
        \Log::info('guardarImagenesRxDental iniciado', [
            'files_count' => $request->hasFile('file') ? (is_array($request->file('file')) ? count($request->file('file')) : 1) : 0,
            'params' => $request->except('file')
        ]);

        // Verifica si los parámetros están presentes
        $validated = $request->validate([
            'file' => 'required',
            'id_paciente' => 'required|integer',
            'id_lugar_atencion' => 'required|integer',
            'id_especialidad' => 'required|integer',
            'id_profesional' => 'required|integer',
            'id_examen' => 'nullable|integer',
        ]);

        $paths = [];
        $urls = [];

        if ($request->hasFile('file')) {
            // Manejar tanto array de archivos como archivo único
            $files = is_array($request->file('file')) ? $request->file('file') : [$request->file('file')];

            foreach ($files as $file) {
                // Validar cada archivo individualmente
                if (!$file->isValid()) {
                    continue;
                }

                if ($file->getSize() > 4096 * 1024) { // 4MB en bytes
                    \Log::warning('Archivo excede tamaño máximo', ['file' => $file->getClientOriginalName()]);
                    continue;
                }

                if (!in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                    \Log::warning('Tipo de archivo no permitido', ['mime' => $file->getMimeType()]);
                    continue;
                }
                $path = $file->store('images', 'public');
                $paths[] = $path;
                $urls[] = Storage::url($path); // Obtén la URL pública de la imagen

                 // Ahora copiamos la imagen de 'storage/app/public/images' a 'public/storage/images'
                $publicPath = public_path('storage/images/' . basename($path));
                File::copy(storage_path('app/public/' . $path), $publicPath);
            }
        }

        $imagenes_rx = new ImagenesDentalRxPaciente;
        $imagenes_rx->id_paciente = $request->id_paciente;
        $imagenes_rx->id_especialidad = $request->id_especialidad;
        $imagenes_rx->id_profesional = $request->id_profesional;
        $imagenes_rx->id_lugar_atencion = $request->id_lugar_atencion;
        $imagenes_rx->paths_imagenes = json_encode($paths);
        $imagenes_rx->id_examen = $request->id_examen;
        $imagenes_rx->tipo_examen = 1; // general
        $imagenes_rx->estado = 1; // por defecto

        if($imagenes_rx->save()){
            // Retornar respuesta con los datos procesados
            return response()->json([
                'success' => true,
                'paths' => $paths,
                'urls' => $urls,
                'total_imagenes' => count($paths),
            ]);
        }else{
            return response()->json([
                'success' => false,
                'paths' => $paths,
                'urls' => $urls,
                'total_imagenes' => count($paths),
                'mensaje' => 'error'
            ]);
        }


    }

    public function guardarImagenesRxEndDental(Request $request){

        // Log inicial para debugging
        \Log::info('Iniciando guardarImagenesRxEndDental', [
            'files_count' => $request->hasFile('file') ? count($request->file('file')) : 0,
            'params' => $request->except('file')
        ]);

        try {
            // Verifica si los parámetros están presentes
            $request->validate([
                'file' => 'required|array|min:1',
                'file.*' => 'image|max:4096',
                'id_paciente' => 'required|integer',
                'id_lugar_atencion' => 'required|integer',
                'id_especialidad' => 'required|integer',
                'id_profesional' => 'required|integer',
                'id_examen' => 'nullable|integer',
                'tipo_examen' => 'required|string',
            ]);

            \Log::info('Validación exitosa');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Error de validación', ['errors' => $e->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        }

        $paths = [];

        if ($request->hasFile('file')) {
            \Log::info('Procesando archivos', ['count' => count($request->file('file'))]);

            foreach ($request->file('file') as $index => $file) {
                try {
                    \Log::info("Procesando archivo {$index}", [
                        'name' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'mime' => $file->getMimeType()
                    ]);

                    $path = $file->store('images', 'public');
                    $paths[] = $path;

                    \Log::info("Archivo guardado en storage", ['path' => $path]);

                    // Ahora copiamos la imagen de 'storage/app/public/images' a 'public/storage/images'
                    $publicPath = public_path('storage/images/' . basename($path));
                    File::copy(storage_path('app/public/' . $path), $publicPath);

                    \Log::info("Archivo copiado a public", ['public_path' => $publicPath]);

                } catch (\Exception $e) {
                    \Log::error("Error procesando archivo {$index}", [
                        'error' => $e->getMessage(),
                        'file' => $file->getClientOriginalName()
                    ]);
                    throw $e; // Re-throw para que se maneje abajo
                }
            }
        } else {
            \Log::error('No se encontraron archivos en la petición');
        }

        // Determinar tipo de examen
        $tipo_examen = 1; // Por defecto general
        if($request->tipo_examen == 'endo'){
            $tipo_examen = 2;
        }else if($request->tipo_examen == 'odontop'){
            $tipo_examen = 3; // para odontopediatria
        }

        \Log::info('Creando registro en BD', [
            'tipo_examen' => $tipo_examen,
            'paths_count' => count($paths),
            'id_examen' => $request->id_examen
        ]);

        $imagenes_rx = new ImagenesDentalRxPaciente;
        $imagenes_rx->id_paciente = $request->id_paciente;
        $imagenes_rx->id_especialidad = $request->id_especialidad;
        $imagenes_rx->id_profesional = $request->id_profesional;
        $imagenes_rx->id_lugar_atencion = $request->id_lugar_atencion;
        $imagenes_rx->paths_imagenes = json_encode($paths);
        $imagenes_rx->id_examen = $request->id_examen;
        $imagenes_rx->tipo_examen = $tipo_examen;
        $imagenes_rx->estado = 1; // por defecto

        try {
            \Log::info('Intentando guardar en BD');

            if($imagenes_rx->save()){
                \Log::info('Guardado exitoso en BD', ['id' => $imagenes_rx->id]);

                // Retornar respuesta con los datos procesados
                return response()->json([
                    'success' => true,
                    'paths' => $paths,
                    'total_imagenes' => count($paths),
                    'message' => 'Imágenes guardadas exitosamente',
                    'id_registro' => $imagenes_rx->id
                ]);
            } else {
                \Log::error('Error al guardar en BD - save() retornó false');

                return response()->json([
                    'success' => false,
                    'paths' => $paths,
                    'total_imagenes' => count($paths),
                    'mensaje' => 'Error al guardar en base de datos'
                ], 500);
            }
        } catch (\Exception $e) {
            \Log::error('Excepción al guardar en BD', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'mensaje' => 'Error del servidor: ' . $e->getMessage(),
                'paths' => $paths,
                'total_imagenes' => count($paths)
            ], 500);
        }

    }

    public function guardarImagenesDental(Request $request)
    {
        // Validar archivos
        $request->validate([
            'file' => 'required|array|min:1',
            'file.*' => 'image|max:4096',
        ]);

        $imagenes_rx = ImagenesDentalPaciente::find($request->id_examen);

        if (!$imagenes_rx) {
            return response()->json([
                'success' => false,
                'mensaje' => 'No se encontró el examen para asociar las imágenes.'
            ]);
        }

        // Obtener las imágenes anteriores si existen
        $imagenes_anteriores = [];
        if ($imagenes_rx->paths_imagenes) {
            $decoded = json_decode($imagenes_rx->paths_imagenes);
            foreach ($decoded as $item) {
                $imagenes_anteriores[] = $item;
            }
        }

        // Agregar nuevas imágenes
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $path = $file->store('images', 'public');

                $obj = new \stdClass();
                $obj->path = $path;
                $obj->momento = $request->detalle;
                $obj->id_image_pre = $request->id_image_pre;
                $obj->id_image_post = $request->id_image_post;

                $imagenes_anteriores[] = $obj;

                // Copiar a carpeta pública
                $publicPath = public_path('storage/images/' . basename($path));
                File::copy(storage_path('app/public/' . $path), $publicPath);
            }
        }

        // Guardar nuevamente todo el array
        $imagenes_rx->paths_imagenes = json_encode($imagenes_anteriores);
        $imagenes_rx->momento_imagen = $request->detalle;

        if ($imagenes_rx->save()) {
            return response()->json([
                'success' => true,
                'paths' => $imagenes_anteriores,
                'total_imagenes' => count($imagenes_anteriores),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'mensaje' => 'Error al guardar las imágenes.'
            ]);
        }
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
    public function moverImagen_r(Request $request)
    {
        return static::moverImagen($request->nombreArchivo, $request->dirDestino, $request->nombreNuevo);
    }

    /**
     * mover y renombrar archivo
     *
     * @param [string] $nombreArchivo
     * @param [string] $dirDestino (config\filesystems.php)
     * @param [string] $nombreNuevo
     * @return array
     */
    static public function moverImagen($nombreArchivo, $dirDestino, $nombreNuevo)
    {
        $datos = array();

        // img_temp
        // img_examen
        $exists = Storage::disk('img_temp')->exists($nombreArchivo);
        $datos['proceso']['exists'] = $exists;

        if($exists)
        {
            $contents = Storage::disk('img_temp')->get($nombreArchivo);
            $copy = Storage::disk($dirDestino)->put($nombreNuevo, $contents);
            $datos['proceso']['copy'] = $copy;

            if($copy)
            {
                $url = Storage::disk($dirDestino)->url($nombreNuevo);
                Storage::disk('img_temp')->delete($nombreArchivo);
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
        }



        return $datos;
    }

    /** ARCHIVO */
    public function cargaArchivoTemp(Request $request)
    {
        $datos = array();

        $request->validate([
            // 'file' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel,application/x-msexcel,application/x-excel|max:4096'
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv,jpg,jpeg,png,gif,bmp,webp,svg|max:4096',
            // 'file' => 'required|in:doc,csv,xlsx,xls,docx,pdf|max:4096'
        ]);
        // verificar si existe un archivo
        if (!$request->hasFile('file')) {
            return response()->json([
                'message' => 'ARCHIVO: No se ha seleccionado un archivo.'
            ], 422);
        }

        $rules = [
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv,jpg,jpeg,png,gif,bmp,webp,svg|max:10240', // 10MB
        ];
		// Mensajes de error personalizados
        $messages = [
            'file.required' => 'El archivo es obligatorio.',
            'file.file' => 'El campo debe ser un archivo.',
            'file.mimes' => 'El archivo debe ser de tipo: pdf, doc, docx, xls, xlsx, csv.',
            'file.max' => 'El archivo no debe ser mayor a 10MB.',
        ];

        // Validar la solicitud
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ARCHIVO: Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }

        $file_extension = $request->file->extension();
        $file_mime_type = $request->file->getClientMimeType();
        $original_file_name = $request->file->getClientOriginalName();

        // Generar nombre único para el archivo temporal
        $nombre_unico = time() . '_' . uniqid() . '.' . $file_extension;

        // Log para debugging
        \Log::info('Guardando archivo temporal', [
            'original_name' => $original_file_name,
            'nombre_unico' => $nombre_unico,
            'extension' => $file_extension,
            'disco_path' => Storage::disk('archivo_temp')->path(''),
            'archivo_path_completo' => Storage::disk('archivo_temp')->path($nombre_unico)
        ]);

        // Guardar directamente en el disco archivo_temp con nombre específico
        $archivo_guardado = Storage::disk('archivo_temp')->putFileAs('', $request->file('file'), $nombre_unico);

        // Log del resultado
        \Log::info('Resultado guardar archivo temporal', [
            'nombre_unico' => $nombre_unico,
            'archivo_guardado' => $archivo_guardado,
            'archivo_existe_despues' => Storage::disk('archivo_temp')->exists($nombre_unico)
        ]);        if (!$archivo_guardado) {
            return response()->json([
                'estado' => 0,
                'message' => 'Error al guardar el archivo temporal'
            ], 500);
        }

        // Obtener URL del archivo
        $url = Storage::disk('archivo_temp')->url($nombre_unico);

        $datos['estado'] = 1;
        $datos['archivo']['url'] = $url;
        $datos['archivo']['original_file_name'] = $original_file_name;
        $datos['archivo']['nombre_archivo'] = $nombre_unico; // Este es el nombre que buscará moverArchivo()
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

        // img_temp
        // img_examen
        $exists = Storage::disk('archivo_temp')->exists($nombreArchivo);
        $datos['proceso']['exists'] = $exists;

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
        }



        return $datos;
    }

}
