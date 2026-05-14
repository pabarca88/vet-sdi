<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\EspecieMascota;
use App\Models\TamanoMascota;
use Illuminate\Database\Eloquent\Builder;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascotas';

    protected $fillable = [
        'id_responsable',
        'chip',
        'tiene_chip',
        'nombre',
        'especie',
        'especie_id',
        'raza_id',
        'otra_especie',
        'tamano',
        'tamano_id',
        'fecha_nacimiento',
        'sexo',
        'foto_perfil',
        'galeria',
        'observaciones_fotos',
        'esterilizado',
        'fecha_esterilizacion',
        'enfermedad_cronica',
        'dieta',
        'ultima_desparasitacion',
        'producto_desparasitacion',
        'cirugias',
        'vacunas',
        'vacunas_registro',
        'desparasitaciones_registro',
        'suscripciones_servicios_registro',
        'reservas_servicios_registro',
        'viajes',
        'vive_con_animales',
        'id_user',
        'estado',
    ];

    protected $casts = [
        'galeria' => 'array',
        'fecha_nacimiento' => 'date',
        'tiene_chip' => 'boolean',
        'esterilizado' => 'boolean',
        'fecha_esterilizacion' => 'date',
        'ultima_desparasitacion' => 'date',
        'vacunas_registro' => 'array',
        'desparasitaciones_registro' => 'array',
        'suscripciones_servicios_registro' => 'array',
        'reservas_servicios_registro' => 'array',
        'vive_con_animales' => 'boolean',
    ];

    public function Responsable()
    {
        return $this->belongsTo(Paciente::class, 'id_responsable', 'id');
    }

    public function especieMascota()
    {
        return $this->belongsTo(EspecieMascota::class, 'especie_id');
    }

    public function razaMascota()
    {
        return $this->belongsTo(RazaMascota::class, 'raza_id');
    }

    public function tamanoMascota()
    {
        return $this->belongsTo(TamanoMascota::class, 'tamano_id');
    }

    public function lugaresAtencion()
    {
        return $this->hasMany(MascotaLugarAtencion::class, 'id_mascota', 'id');
    }

    public function vincularLugarAtencion(?int $idLugarAtencion, ?int $idInstitucion = null, ?string $origen = null): void
    {
        if (empty($idLugarAtencion)) {
            return;
        }

        $this->lugaresAtencion()->updateOrCreate(
            ['id_lugar_atencion' => $idLugarAtencion],
            [
                'id_institucion' => $idInstitucion,
                'origen' => $origen,
            ]
        );
    }

    public function scopePorLugarAtencion(Builder $query, $idLugarAtencion): Builder
    {
        if (empty($idLugarAtencion)) {
            return $query;
        }

        $ids = is_array($idLugarAtencion)
            ? $idLugarAtencion
            : array_filter(array_map('trim', explode(',', (string) $idLugarAtencion)));

        if (empty($ids)) {
            return $query;
        }

        return $query->whereHas('lugaresAtencion', function (Builder $subQuery) use ($ids) {
            $subQuery->whereIn('id_lugar_atencion', $ids);
        });
    }
}
