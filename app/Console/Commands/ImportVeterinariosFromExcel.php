<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ImportVeterinariosFromExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'veterinarios:import
                            {--file= : Ruta al archivo Excel}
                            {--dry-run : Analiza y muestra el resultado sin guardar cambios}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa veterinarios desde las hojas CENTRO y SUR del Excel';

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

        if (!Schema::hasTable('profesionales') || !Schema::hasTable('direcciones') || !Schema::hasTable('ciudades')) {
            $this->error('Faltan tablas requeridas para la importacion.');
            return 1;
        }

        $spreadsheet = $this->loadSpreadsheet($path);
        $sheetNames = ['CENTRO', 'SUR'];
        $rawRows = [];

        foreach ($sheetNames as $sheetName) {
            $sheet = $spreadsheet->getSheetByName($sheetName);
            if (!$sheet) {
                $this->error("No existe la hoja {$sheetName} en el Excel.");
                return 1;
            }

            $rows = $sheet->toArray(null, true, true, false);
            if (count($rows) < 2) {
                continue;
            }

            $header = array_shift($rows);
            $headerMap = $this->buildHeaderMap($header);

            foreach ($rows as $index => $row) {
                $record = $this->normalizeRow($row, $headerMap, $sheetName, $index + 2);
                if ($record !== null) {
                    $rawRows[] = $record;
                }
            }
        }

        if (empty($rawRows)) {
            $this->warn('No se encontraron filas validas en las hojas CENTRO y SUR.');
            return 0;
        }

        $cities = DB::table('ciudades')->pluck('id')->map(function ($id) {
            return (int) $id;
        })->flip();

        $prepared = $this->collapseByRut(collect($rawRows));
        $validRecords = $prepared['records'];
        $skipped = $prepared['skipped'];

        $existingByRut = DB::table('profesionales')
            ->select('id', 'rut', 'email')
            ->orderBy('id')
            ->get()
            ->groupBy(function ($row) {
                return $this->normalizeRut($row->rut);
            });

        $existingByEmail = DB::table('profesionales')
            ->select('id', 'rut', 'email')
            ->whereNotNull('email')
            ->get()
            ->keyBy(function ($row) {
                return mb_strtolower(trim((string) $row->email));
            });

        $usedEmails = [];
        $now = Carbon::now();
        $toInsert = [];
        $toUpdate = [];

        foreach ($validRecords as $record) {
            $email = $this->resolveEmail($record, $usedEmails, $existingByEmail);
            $direccionId = $this->resolveDireccionId($record, $cities, $now, (bool) $this->option('dry-run'));

            $payload = [
                'nombre' => $record['nombre'],
                'apellido_uno' => $record['apellido_uno'],
                'apellido_dos' => $record['apellido_dos'],
                'sexo' => $record['sexo'],
                'rut' => $record['rut'],
                'email' => $email,
                'telefono_uno' => $record['telefono_uno'],
                'telefono_dos' => $record['telefono_dos'],
                'estado' => $record['estado'],
                'certificado' => $record['certificado'],
                'numero_certificado' => $record['numero_certificado'],
                'dv_certiicado' => $record['dv_certiicado'],
                'id_direccion' => $direccionId,
                'id_especialidad' => $record['id_especialidad'],
                'id_usuario' => $record['id_usuario'],
                'id_tipo_especialidad' => $record['id_tipo_especialidad'],
                'id_sub_tipo_especialidad' => $record['id_sub_tipo_especialidad'],
                'updated_at' => $now,
            ];

            $rutKey = $this->normalizeRut($record['rut']);
            $existingMatches = $existingByRut->get($rutKey, collect());

            if ($existingMatches->isNotEmpty()) {
                $existing = $existingMatches->first();
                $payload['id'] = $existing->id;
                $toUpdate[] = $payload;
                continue;
            }

            $payload['bienvenida'] = 0;
            $payload['provisorio'] = 0;
            $payload['id_tipo_atencion'] = 1;
            $payload['created_at'] = $now;
            $toInsert[] = $payload;
        }

        $this->line('Resumen importacion veterinarios');
        $this->line('Archivo: '.$path);
        $this->line('Filas leidas: '.count($rawRows));
        $this->line('Registros preparados: '.$validRecords->count());
        $this->line('Insertar: '.count($toInsert));
        $this->line('Actualizar: '.count($toUpdate));
        $this->line('Omitidos: '.count($skipped));

        if (!empty($skipped)) {
            $this->warn('Registros omitidos por conflicto de RUT:');
            foreach ($skipped as $item) {
                $this->warn('- '.$item['rut'].' ['.$item['reason'].'] '.$item['details']);
            }
        }

        if ($this->option('dry-run')) {
            $this->info('Dry run finalizado. No se guardaron cambios.');
            return 0;
        }

        DB::transaction(function () use ($toInsert, $toUpdate) {
            foreach ($toUpdate as $payload) {
                $id = $payload['id'];
                unset($payload['id']);
                DB::table('profesionales')->where('id', $id)->update($payload);
            }

            foreach (array_chunk($toInsert, 300) as $chunk) {
                DB::table('profesionales')->insert($chunk);
            }
        });

        $this->info('Importacion completada.');

        return 0;
    }

    protected function loadSpreadsheet(string $path)
    {
        $resolvedPath = realpath($path) ?: $path;

        $reader = new Xlsx();
        $reader->setReadDataOnly(true);

        return $reader->load($resolvedPath);
    }

    protected function buildHeaderMap(array $header)
    {
        $map = [];
        foreach ($header as $index => $value) {
            $normalized = $this->normalizeHeader($value);
            if ($normalized !== '') {
                $map[$index] = $normalized;
            }
        }

        return $map;
    }

    protected function normalizeHeader($value)
    {
        $value = mb_strtolower(trim((string) $value));
        $value = preg_replace('/\s+/', ' ', $value);

        $aliases = [
            'nombres' => 'nombre',
            'apellido uno' => 'apellido_uno',
            'apellido dos' => 'apellido_dos',
            'sexo' => 'sexo',
            'rut' => 'rut',
            'rut sin punto' => 'rut',
            'fn' => 'fecha_nacimiento',
            'region' => 'region',
            'id_region' => 'id_region',
            'correo electronico' => 'email',
            'correo electrónico' => 'email',
            'foto perfil' => 'foto_perfil',
            'fono' => 'telefono_uno',
            'fono 2' => 'telefono_dos',
            'estado' => 'estado',
            'cert colegio' => 'numero_certificado',
            'dv_cert' => 'dv_certiicado',
            'direccion' => 'direccion',
            'dirección' => 'direccion',
            'ciudad' => 'id_ciudad',
            'ciudad o comuna(numero' => 'id_ciudad',
            'ciudad ' => 'id_ciudad',
            'id-especialidad' => 'id_especialidad',
            'id_usuario' => 'id_usuario',
            'id-tipo especialidad' => 'id_tipo_especialidad',
            'sub_tipo especialidad' => 'id_sub_tipo_especialidad',
        ];

        return $aliases[$value] ?? '';
    }

    protected function normalizeRow(array $row, array $headerMap, $sheetName, $rowNumber)
    {
        $record = [
            '_sheet' => $sheetName,
            '_row' => $rowNumber,
            'nombre' => '',
            'apellido_uno' => '',
            'apellido_dos' => '',
            'sexo' => 'M',
            'rut' => '',
            'email' => '',
            'telefono_uno' => 's/i',
            'telefono_dos' => null,
            'estado' => 1,
            'certificado' => 0,
            'numero_certificado' => null,
            'dv_certiicado' => null,
            'direccion' => null,
            'id_ciudad' => null,
            'id_especialidad' => null,
            'id_usuario' => null,
            'id_tipo_especialidad' => null,
            'id_sub_tipo_especialidad' => null,
        ];

        foreach ($headerMap as $index => $field) {
            $value = array_key_exists($index, $row) ? $row[$index] : null;
            $value = is_string($value) ? trim(preg_replace('/\s+/u', ' ', str_replace("\xc2\xa0", ' ', $value))) : $value;

            if ($value === '') {
                $value = null;
            }

            switch ($field) {
                case 'nombre':
                case 'apellido_uno':
                case 'apellido_dos':
                    $record[$field] = $value ?: '';
                    break;
                case 'sexo':
                    $record['sexo'] = in_array(mb_strtoupper((string) $value), ['F', 'M'], true) ? mb_strtoupper((string) $value) : 'M';
                    break;
                case 'rut':
                    $record['rut'] = $this->formatRut($value);
                    break;
                case 'email':
                    $record['email'] = mb_strtolower(trim((string) ($value ?: '')));
                    break;
                case 'telefono_uno':
                    $record[$field] = $this->normalizePhone($value, false);
                    break;
                case 'telefono_dos':
                    $record[$field] = $this->normalizePhone($value, true);
                    break;
                case 'estado':
                    $record['estado'] = ($value === null || $value === '') ? 1 : (int) $value;
                    break;
                case 'numero_certificado':
                    $record['numero_certificado'] = $this->normalizeNullableText($value);
                    $record['certificado'] = $record['numero_certificado'] !== null ? 1 : 0;
                    break;
                case 'dv_certiicado':
                    $record['dv_certiicado'] = $this->normalizeNullableText($value);
                    break;
                case 'direccion':
                    $record['direccion'] = $this->normalizeNullableText($value);
                    break;
                case 'id_ciudad':
                case 'id_especialidad':
                case 'id_usuario':
                case 'id_tipo_especialidad':
                case 'id_sub_tipo_especialidad':
                    $record[$field] = $this->normalizeNullableInt($value);
                    break;
            }
        }

        if ($record['rut'] === '' || $record['nombre'] === '' || $record['apellido_uno'] === '') {
            return null;
        }

        if ($record['telefono_uno'] === null) {
            $record['telefono_uno'] = 's/i';
        }

        return $record;
    }

    protected function collapseByRut(Collection $records)
    {
        $collapsed = collect();
        $skipped = [];

        foreach ($records->groupBy('rut') as $rut => $items) {
            if ($items->count() === 1) {
                $collapsed->push($items->first());
                continue;
            }

            $nameKeys = $items->map(function ($item) {
                return $this->nameFingerprint($item);
            })->unique()->filter()->values();

            if ($nameKeys->count() > 1) {
                $skipped[] = [
                    'rut' => $rut,
                    'reason' => 'conflicto_nombre',
                    'details' => $items->map(function ($item) {
                        return $item['_sheet'].'#'.$item['_row'].' '.$item['nombre'].' '.$item['apellido_uno'].' '.$item['apellido_dos'];
                    })->implode(' | '),
                ];
                continue;
            }

            $base = $items->sortByDesc(function ($item) {
                return $this->completenessScore($item);
            })->first();

            foreach ($items as $item) {
                foreach ([
                    'email',
                    'telefono_uno',
                    'telefono_dos',
                    'direccion',
                    'id_ciudad',
                    'numero_certificado',
                    'dv_certiicado',
                    'id_especialidad',
                    'id_usuario',
                    'id_tipo_especialidad',
                    'id_sub_tipo_especialidad',
                ] as $field) {
                    if ($this->isEmptyValue($base[$field]) && !$this->isEmptyValue($item[$field])) {
                        $base[$field] = $item[$field];
                    }
                }
            }

            $collapsed->push($base);
        }

        return [
            'records' => $collapsed->values(),
            'skipped' => $skipped,
        ];
    }

    protected function resolveEmail(array $record, array &$usedEmails, Collection $existingByEmail)
    {
        $preferred = $this->normalizeNullableText($record['email']);
        $rut = $record['rut'];

        $candidate = $preferred;
        if ($candidate !== null) {
            $existing = $existingByEmail->get($candidate);
            if ($existing && $this->normalizeRut($existing->rut) !== $this->normalizeRut($rut)) {
                $candidate = null;
            }
        }

        if ($candidate === null || isset($usedEmails[$candidate])) {
            $candidate = $this->buildPlaceholderEmail($rut);
        }

        $baseCandidate = $candidate;
        $counter = 1;
        while (isset($usedEmails[$candidate]) || ($existingByEmail->has($candidate) && $this->normalizeRut($existingByEmail->get($candidate)->rut) !== $this->normalizeRut($rut))) {
            $candidate = $this->appendEmailSuffix($baseCandidate, $counter);
            $counter++;
        }

        $usedEmails[$candidate] = true;

        return $candidate;
    }

    protected function resolveDireccionId(array $record, Collection $cities, Carbon $now, $dryRun)
    {
        $direccion = $this->normalizeNullableText($record['direccion']);
        $idCiudad = $record['id_ciudad'];

        if ($direccion === null || $idCiudad === null || !$cities->has((int) $idCiudad)) {
            return null;
        }

        $existing = DB::table('direcciones')
            ->where('direccion', $direccion)
            ->where('id_ciudad', $idCiudad)
            ->whereNull('numero_dir')
            ->first();

        if ($existing) {
            return $existing->id;
        }

        if ($dryRun) {
            return null;
        }

        return DB::table('direcciones')->insertGetId([
            'direccion' => $direccion,
            'numero_dir' => null,
            'id_ciudad' => $idCiudad,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    protected function buildPlaceholderEmail($rut)
    {
        $slug = preg_replace('/[^a-z0-9]+/', '', mb_strtolower((string) $rut));
        return 'import+'.($slug ?: uniqid()).'@vet-sdi.local';
    }

    protected function appendEmailSuffix($email, $suffix)
    {
        $parts = explode('@', $email, 2);
        if (count($parts) !== 2) {
            return $email.'.'.$suffix;
        }

        return $parts[0].'.'.$suffix.'@'.$parts[1];
    }

    protected function completenessScore(array $record)
    {
        $score = 0;
        foreach ($record as $key => $value) {
            if (str_starts_with($key, '_')) {
                continue;
            }
            if (!$this->isEmptyValue($value)) {
                $score++;
            }
        }

        return $score;
    }

    protected function nameFingerprint(array $record)
    {
        return $this->normalizeComparableText(
            $record['nombre'].
            $record['apellido_uno'].
            $record['apellido_dos']
        );
    }

    protected function formatRut($value)
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

        return ltrim($number, '0').'-'.mb_strtolower($dv);
    }

    protected function normalizeRut($value)
    {
        return $this->formatRut($value);
    }

    protected function normalizeNullableText($value)
    {
        $value = trim((string) ($value ?? ''));
        if ($value === '' || mb_strtolower($value) === 's/i') {
            return null;
        }

        return $value;
    }

    protected function normalizePhone($value, $nullable = false)
    {
        $value = $this->normalizeNullableText($value);
        if ($value === null) {
            return $nullable ? null : 's/i';
        }

        return mb_substr($value, 0, 20);
    }

    protected function normalizeNullableInt($value)
    {
        if ($value === null || $value === '') {
            return null;
        }

        $value = (int) $value;

        return $value > 0 ? $value : null;
    }

    protected function normalizeComparableText($value)
    {
        $value = mb_strtolower(trim((string) $value));
        $replacements = [
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ñ' => 'n',
        ];
        $value = strtr($value, $replacements);
        $value = preg_replace('/[^a-z0-9]+/', '', $value);

        return $value;
    }

    protected function isEmptyValue($value)
    {
        if ($value === null) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        return false;
    }
}
