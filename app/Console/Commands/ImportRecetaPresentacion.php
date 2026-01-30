<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportRecetaPresentacion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'receta_presentacion:import
                            {--file= : Ruta al CSV}
                            {--no-truncate : No borrar la tabla antes de importar}
                            {--yes : No pedir confirmacion}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa receta_presentacion desde un CSV';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->option('file') ?: base_path('../receta_presentacion.csv');

        if (!is_file($path)) {
            $this->error("No se encontro el archivo: {$path}");
            return 1;
        }

        if (!$this->option('no-truncate')) {
            if (!$this->option('yes')) {
                $confirm = $this->confirm('Esto eliminara TODOS los registros de receta_presentacion antes de importar. Continuar?');
                if (!$confirm) {
                    $this->info('Importacion cancelada.');
                    return 0;
                }
            }
            DB::table('receta_presentacion')->truncate();
        }

        $fh = fopen($path, 'r');
        if ($fh === false) {
            $this->error("No se pudo abrir el archivo: {$path}");
            return 1;
        }

        $header = fgetcsv($fh, 0, ';');
        if ($header === false) {
            $this->error('El CSV no tiene cabecera.');
            return 1;
        }

        $index = array_flip($header);
        foreach (['id', 'nombre', 'cod_parent', 'glosa'] as $col) {
            if (!array_key_exists($col, $index)) {
                $this->error("Falta la columna {$col} en el CSV.");
                return 1;
            }
        }

        $now = Carbon::now();
        $records = [];
        $skipped = 0;

        while (($row = fgetcsv($fh, 0, ';')) !== false) {
            if (count(array_filter($row, function ($v) { return $v !== null && $v !== ''; })) === 0) {
                continue;
            }

            $rawId = $this->clean($row[$index['id']] ?? '');
            if ($rawId === '') {
                $skipped++;
                continue;
            }
            $id = (int) $rawId;

            $nombre = $this->clean($row[$index['nombre']] ?? '');
            $codParent = $this->clean($row[$index['cod_parent']] ?? '');
            $glosa = $this->clean($row[$index['glosa']] ?? '');

            $isParent = ($codParent === '' && $nombre !== '');

            if ($isParent) {
                $records[] = [
                    'id' => $id,
                    'cantidad' => 0,
                    'tipo_presentacion' => $nombre,
                    'cant' => 0,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                continue;
            }

            $cantidad = 0;
            if ($glosa !== '' && preg_match('/(\d+)/', $glosa, $m)) {
                $cantidad = (int) $m[1];
            }

            $records[] = [
                'id' => $id,
                'cantidad' => $cantidad,
                'tipo_presentacion' => ($codParent === '' ? 0 : (int) $codParent),
                'cant' => $glosa,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        fclose($fh);

        if (empty($records)) {
            $this->error('No se encontraron registros validos para importar.');
            return 1;
        }

        foreach (array_chunk($records, 500) as $chunk) {
            DB::table('receta_presentacion')->insert($chunk);
        }

        $this->info('Importacion completada.');
        $this->info('Registros insertados: '.count($records));
        if ($skipped > 0) {
            $this->warn('Filas omitidas por id vacio: '.$skipped);
        }

        return 0;
    }

    private function clean($value)
    {
        $value = (string) $value;
        if (function_exists('mb_check_encoding')) {
            if (!mb_check_encoding($value, 'UTF-8')) {
                $value = @iconv('ISO-8859-1', 'UTF-8//IGNORE', $value);
            }
        } else {
            $value = @iconv('UTF-8', 'UTF-8//IGNORE', $value);
        }
        $value = str_replace(["\xc2\xa0", "\xa0"], ' ', $value);
        return trim($value);
    }
}
