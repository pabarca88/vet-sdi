<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportArticulosFromExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articulos:import
                            {--file= : Ruta al Excel}
                            {--no-truncate : No borrar la tabla antes de importar}
                            {--yes : No pedir confirmacion}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa articulos desde un Excel (respetando el id)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->option('file') ?: base_path('../prod-veterinarios.xlsx');

        if (!is_file($path)) {
            $this->error("No se encontro el archivo: {$path}");
            return 1;
        }

        if (!Schema::hasColumn('articulos', 'uso')) {
            $this->error("La columna 'uso' no existe en la tabla articulos. Ejecuta la migracion primero.");
            return 1;
        }

        if (!$this->option('no-truncate')) {
            if (!$this->option('yes')) {
                $confirm = $this->confirm('Esto eliminara TODOS los registros de articulos antes de importar. Continuar?');
                if (!$confirm) {
                    $this->info('Importacion cancelada.');
                    return 0;
                }
            }
            DB::table('articulos')->truncate();
        }

        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        if (count($rows) < 2) {
            $this->error('El Excel no tiene filas de datos.');
            return 1;
        }

        $headerRow = array_shift($rows);
        $columns = Schema::getColumnListing('articulos');
        $contRecKey = in_array('cont-rec', $columns, true) ? 'cont-rec' : 'cont_rec';

        $allowed = [
            'id',
            'cod_parent',
            'nombre',
            'present',
            $contRecKey,
            'tipo_cont',
            'uso',
            'dosis',
            'cant_comp',
            'cod_isp',
            'vigencia',
            'droga',
            'grupo',
            'temperatura',
        ];

        $columnMap = [];
        foreach ($headerRow as $col => $name) {
            $key = Str::snake(trim((string) $name));
            $key = str_replace(['-', '.'], '_', $key);
            if ($key === 'cod_pare') {
                $key = 'cod_parent';
            }
            if ($key === 'cont_rec' || $key === 'cont-rec') {
                $key = $contRecKey;
            }
            if ($key !== '' && in_array($key, $allowed, true)) {
                $columnMap[$col] = $key;
            }
        }

        $idCol = null;
        foreach ($columnMap as $col => $field) {
            if ($field === 'id') {
                $idCol = $col;
                break;
            }
        }

        $nextId = 1;
        $excelToNewParent = [];
        $currentParentId = null;

        $defaults = [
            'cod_parent' => '0',
            'nombre' => '',
            'present' => null,
            $contRecKey => '1',
            'tipo_cont' => '1',
            'uso' => null,
            'dosis' => '0',
            'cant_comp' => '0',
            'cod_isp' => '',
            'vigencia' => '1',
            'droga' => '(Sin Información)',
            'grupo' => 'Sin Info',
            'temperatura' => null,
        ];

        $now = Carbon::now();
        $records = [];
        $skipped = 0;

        foreach ($rows as $row) {
            $record = $defaults;
            $record['created_at'] = $now;
            $record['updated_at'] = $now;
            $hasData = false;
            $rowExcelId = null;
            $rowExcelParent = null;

            foreach ($columnMap as $col => $field) {
                $value = isset($row[$col]) ? (string) $row[$col] : '';
                $value = trim(str_replace("\xc2\xa0", ' ', $value));
                $value = ($value === '') ? null : $value;
                if ($field === 'id') {
                    if ($value !== null) {
                        $rowExcelId = (int) $value;
                        $hasData = true;
                    }
                    continue;
                }
                if ($field === 'cod_parent' && $value !== null) {
                    $rowExcelParent = (int) $value;
                }
                if ($field === 'cod_parent' && $value === null) {
                    $value = $defaults['cod_parent'];
                }
                if ($field === 'nombre' && $value === null) {
                    $value = $defaults['nombre'];
                }
                if ($field === 'droga' && $value === null) {
                    $value = $defaults['droga'];
                }
                if ($field === 'grupo' && $value === null) {
                    $value = $defaults['grupo'];
                }
                if ($value !== null) {
                    $hasData = true;
                }
                $record[$field] = $value;
            }

            if (!$hasData) {
                $skipped++;
                continue;
            }

            if ($rowExcelId !== null) {
                $record['id'] = $nextId++;
                $currentParentId = $record['id'];
                $excelToNewParent[$rowExcelId] = $currentParentId;
                $record['cod_parent'] = '0';
            } else {
                $record['id'] = $nextId++;
                if ($rowExcelParent !== null && isset($excelToNewParent[$rowExcelParent])) {
                    $record['cod_parent'] = (string) $excelToNewParent[$rowExcelParent];
                } elseif ($currentParentId !== null) {
                    $record['cod_parent'] = (string) $currentParentId;
                }
            }

            $records[] = $record;
        }

        if (empty($records)) {
            $this->error('No se encontraron registros validos para importar.');
            return 1;
        }

        foreach (array_chunk($records, 500) as $chunk) {
            DB::table('articulos')->insert($chunk);
        }

        $this->info('Importacion completada.');
        $this->info('Registros insertados: '.count($records));
        if ($skipped > 0) {
            $this->warn('Filas omitidas por id vacio: '.$skipped);
        }

        return 0;
    }
}
