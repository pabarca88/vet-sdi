<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PruneProfesionalesToVeterinarios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'veterinarios:prune-professionals
                            {--file= : Ruta al archivo Excel}
                            {--dry-run : Mostrar que se eliminaria sin ejecutar cambios}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina profesionales no veterinarios, conservando los veterinarios del Excel y a Jaime Kriman';

    private const JAIME_EMAIL = 'jkriman@gmail.com';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->option('file') ?: base_path('../veterinarios.xlsx');

        if (!is_file($path)) {
            $this->error("No se encontro el archivo: {$path}");
            return 1;
        }

        $keepRuts = $this->loadVeterinaryRuts($path);
        if (empty($keepRuts)) {
            $this->error('No se pudieron obtener RUTs validos desde el Excel.');
            return 1;
        }

        $profesionales = DB::table('profesionales')
            ->select('id', 'rut', 'email')
            ->get();

        $keepIds = [];
        $deleteIds = [];

        foreach ($profesionales as $profesional) {
            $rut = $this->normalizeRut($profesional->rut);
            $email = mb_strtolower(trim((string) $profesional->email));

            if ($email === self::JAIME_EMAIL || ($rut !== '' && isset($keepRuts[$rut]))) {
                $keepIds[] = (int) $profesional->id;
                continue;
            }

            $deleteIds[] = (int) $profesional->id;
        }

        $this->line('Depuracion de profesionales');
        $this->line('RUTs veterinarios encontrados en Excel: '.count($keepRuts));
        $this->line('Profesionales a conservar: '.count($keepIds));
        $this->line('Profesionales a eliminar: '.count($deleteIds));

        if (empty($deleteIds)) {
            $this->info('No hay profesionales para eliminar.');
            return 0;
        }

        $referencingDeletes = $this->buildReferencingDeletes($deleteIds);

        if ($this->option('dry-run')) {
            foreach ($referencingDeletes as $delete) {
                $count = DB::table($delete['table'])
                    ->whereIn($delete['column'], $deleteIds)
                    ->count();
                if ($count > 0) {
                    $this->line("- {$delete['table']}.{$delete['column']}: {$count}");
                }
            }

            $this->info('Dry run finalizado. No se guardaron cambios.');
            return 0;
        }

        DB::transaction(function () use ($deleteIds, $referencingDeletes) {
            foreach ($referencingDeletes as $delete) {
                DB::table($delete['table'])->whereIn($delete['column'], $deleteIds)->delete();
            }

            DB::table('profesionales')->whereIn('id', $deleteIds)->delete();
        });

        $this->info('Depuracion completada.');

        return 0;
    }

    private function loadVeterinaryRuts(string $path): array
    {
        $spreadsheet = IOFactory::load($path);
        $keepRuts = [];

        foreach (['CENTRO', 'SUR'] as $sheetName) {
            $sheet = $spreadsheet->getSheetByName($sheetName);
            if (!$sheet) {
                continue;
            }

            $rows = $sheet->toArray(null, true, true, false);
            if (count($rows) < 2) {
                continue;
            }

            $header = array_shift($rows);
            $rutIndex = null;
            foreach ($header as $index => $column) {
                $normalized = mb_strtolower(trim((string) $column));
                if (in_array($normalized, ['rut', 'rut sin punto'], true)) {
                    $rutIndex = $index;
                    break;
                }
            }

            if ($rutIndex === null) {
                continue;
            }

            foreach ($rows as $row) {
                $rut = $this->normalizeRut($row[$rutIndex] ?? '');
                if ($rut !== '') {
                    $keepRuts[$rut] = true;
                }
            }
        }

        return $keepRuts;
    }

    private function buildReferencingDeletes(array $deleteIds): array
    {
        $tables = [];

        $foreignKeys = DB::select("
            SELECT DISTINCT TABLE_NAME, COLUMN_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = DATABASE()
              AND REFERENCED_TABLE_NAME = 'profesionales'
        ");

        foreach ($foreignKeys as $foreignKey) {
            if ($foreignKey->TABLE_NAME === 'profesionales') {
                continue;
            }
            $tables[$foreignKey->TABLE_NAME.'::'.$foreignKey->COLUMN_NAME] = [
                'table' => $foreignKey->TABLE_NAME,
                'column' => $foreignKey->COLUMN_NAME,
            ];
        }

        $columns = DB::select("
            SELECT DISTINCT TABLE_NAME, COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_SCHEMA = DATABASE()
              AND COLUMN_NAME = 'id_profesional'
        ");

        foreach ($columns as $column) {
            if ($column->TABLE_NAME === 'profesionales') {
                continue;
            }
            $tables[$column->TABLE_NAME.'::'.$column->COLUMN_NAME] = [
                'table' => $column->TABLE_NAME,
                'column' => $column->COLUMN_NAME,
            ];
        }

        $deletes = array_values($tables);

        usort($deletes, function ($a, $b) {
            return strcmp($a['table'], $b['table']);
        });

        return $deletes;
    }

    private function normalizeRut($value): string
    {
        $value = trim((string) $value);
        if ($value === '') {
            return '';
        }

        $value = str_replace('.', '', $value);
        $value = preg_replace('/\s+/', '', $value);
        $value = preg_replace('/[^0-9kK-]/', '', $value);

        if (strpos($value, '-') === false && strlen($value) > 1) {
            $value = substr($value, 0, -1).'-'.substr($value, -1);
        }

        [$number, $dv] = array_pad(explode('-', $value, 2), 2, '');

        if ($number === '' || $dv === '' || !preg_match('/^[0-9]+$/', $number) || !preg_match('/^[0-9kK]$/', $dv)) {
            return '';
        }

        $number = ltrim($number, '0');

        return $number.'-'.mb_strtolower($dv);
    }
}
