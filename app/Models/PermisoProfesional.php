<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermisoProfesional extends Model
{
    protected $table = 'permisos_profesional';

    protected $fillable = [
        'id_profesional',
        'id_paciente',
        'permiso_cotizar',
        'permiso_vender_audifonos',
        'permiso_anular_hora',
        'permiso_subir_ver_archivos',
        'permiso_eliminar_archivos',
        'permiso_editar_pacientes',
        'permiso_ver_pacientes',
    ];

    // Si tienes relaciones, puedes agregarlas aquí
    // public function profesional() {
    //     return $this->belongsTo(Profesional::class, 'id_profesional');
    // }
    // public function paciente() {
    //     return $this->belongsTo(Paciente::class, 'id_paciente');
    // }
}
