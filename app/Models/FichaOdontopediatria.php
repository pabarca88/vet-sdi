<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaOdontopediatria extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo.
     */
    protected $table = 'ficha_odontopediatria';

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'id_ficha_atencion',
        'id_lugar_atencion',
        'id_profesional',
        'id_responsable',
        'descripcion_consulta',
        'op_bruxismo',
        'op_sueno',
        'op_resp',
        'op_interpling',
        'op_atm',
        'op_asim_atm',
        'op_resalte_atm',
        'op_dolor_atm',
        'obs_ex_op_morfologico',
        'tpo_oclusion_dent_temp',
        'tpo_oclusion_dent_permanente',
        'tpo_mord',
        'supernum',
        'ot_anomalias',
        'obs_ex_oral',
        'tipo_radio',
        'result_radio',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     */
    protected $casts = [
        'id_ficha_atencion' => 'integer',
        'id_lugar_atencion' => 'integer',
        'id_profesional' => 'integer',
        'id_responsable' => 'integer',
        'op_bruxismo' => 'integer',
        'op_sueno' => 'integer',
        'op_resp' => 'integer',
        'op_interpling' => 'integer',
        'op_atm' => 'integer',
        'op_asim_atm' => 'integer',
        'op_resalte_atm' => 'integer',
        'op_dolor_atm' => 'integer',
        'tpo_oclusion_dent_temp' => 'integer',
        'tpo_oclusion_dent_permanente' => 'integer',
        'tpo_mord' => 'integer',
        'supernum' => 'integer',
        'ot_anomalias' => 'integer',
        'tipo_radio' => 'integer',
        'result_radio' => 'integer',
    ];

    /**
     * Relaciones del modelo (puedes agregar las relaciones necesarias)
     */

    // Ejemplo de relación con ficha de atención (ajustar según tu estructura)
    // public function fichaAtencion()
    // {
    //     return $this->belongsTo(FichaAtencion::class, 'id_ficha_atencion');
    // }

    // public function lugarAtencion()
    // {
    //     return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    // }

    // public function profesional()
    // {
    //     return $this->belongsTo(User::class, 'id_profesional');
    // }

    // public function responsable()
    // {
    //     return $this->belongsTo(User::class, 'id_responsable');
    // }
}
