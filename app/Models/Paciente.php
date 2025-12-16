<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prevision;
use App\Models\Premium;
use App\Models\AntecedentesPaciente;
use App\Models\Direccion;
use App\Models\Licencia;
use App\Models\RecetaPPF;
use App\Models\Examen;
use App\Models\ContactoEmergencia;
use App\Models\FichaAtencion;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    protected $fillable = [
        'token',
        'rut',
        'nombres',
        'apellido_uno',
        'apellido_dos',
        'fecha_nac',
        'sexo',
        'id_prevision',
        'telefono_uno',
        'telefono_dos',
        'id_usuario',
        'email',
        'id_direccion',
        'foto_perfil'
    ];

    public function Prevision()
    {
        return $this->hasOne(Prevision::class, 'id', 'id_prevision');
    }

    public function Premium()
    {
        return $this->hasOne(Premium::class, 'id', 'id_premium');
    }

    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function Antecedentes()
    {
        return $this->hasOne(AntecedentesPaciente::class, 'id', 'id_antecedente');
    }

    public function GrupoSanguineo()
    {
        return $this->hasOne(GrupoSanguineo::class, 'id', 'id_grupo_sanguineo');
    }

    public function Licencias()
    {
        return $this->belongsToMany(Licencia::class, 'licencias_ppf', 'id_paciente', 'id_licencia');
    }

    public function Recetas()
    {
        return $this->belongsTo(RecetaPPF::class, 'id', 'id_paciente');
    }

    public function Examenes()
    {
        return $this->belongsToMany(Examen::class, 'examenes_ppf', 'id_paciente', 'id_examen');
    }

    public function ContactosEmergencia()
    {
        return $this->belongsToMany(ContactoEmergencia::class, 'pacientes_contacto_emergencia', 'id_paciente', 'id_contacto')
            ->withPivot('relacion')
            ->orderBy('prioridad');
    }

    public function FichaAtencionOtrosProfesionales()
    {
        return $this->belongsTo(FichaOtrosProfesionales::class, 'id', 'id_paciente');
    }

    public function FichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id', 'id_paciente');
    }

    public function fichasAtencion()
    {
        return $this->hasMany(FichaAtencion::class, 'id_paciente', 'id');
    }


    public function FichaAtencionConfi()
    {
        return $this->belongsTo(FichaAtencion::class, 'id', 'id_paciente')->where('confidencial', true);
    }

    public function FichaAtencionNoConfi()
    {
        return $this->belongsTo(FichaAtencion::class, 'id', 'id_paciente')->where('confidencial', false);
    }

    public function ConConsentimientoPctActiva()
    {
        return $this->hasMany(ConConsentimientosPcte::class, 'id_paciente', 'id')->where('confirmacion', 1);
    }

    /** pacientes_dependientes */
    public function PacienteDependiente()
    {
        return $this->hasMany(PacientesDependientes::class, 'id_paciente', 'id');
    }

    public function scopePorLugarAtencion($query, $id_lugar_atencion)
    {
        if (!empty($id_lugar_atencion)) {
            $fichas = FichaAtencion::select('id_paciente')->where('id_lugar_atencion', $id_lugar_atencion)->get();
            $array_ficha = array();
            foreach ($fichas as $key => $value)
            {
                array_push($array_ficha, $value->id_paciente);
            }
            return $query->whereIn('id', $array_ficha);
        }
    }

    public function scopeNombre($query, $nombre)
    {
        if (!empty($nombre))
        {
            return $query->where('nombres', 'like', '%' . $nombre . '%');
        }
    }

    public function scopeApellido($query, $apellido)
    {
        if (!empty($apellido))
        {
            return $query->where('apellido_uno', 'like', '%' . $apellido . '%');
        }
    }


    /**
     * Scope para filtra paciente por lugar atencio, rut, nombre, apellido
     *
     * @param [$QUERY] $query
     * @param [int] $id_lugar_atencion -> requerido
     * @param [string] $rut -> opcional
     * @param [string] $nombre -> opcional
     * @param [sting] $apellido -> opcional
     * @return query
     */
    public function scopePorLuAt_Rut_Nom_Ape($query, $id_lugar_atencion, $rut, $nombre, $apellido)
    {
        if (!empty($id_lugar_atencion))
        {

            $array_temp = array();
            if(is_array($id_lugar_atencion))
            {
                $array_temp = $id_lugar_atencion;
            }
            else
            {
                $array_temp = explode(',', $id_lugar_atencion);
            }


            $fichas = FichaAtencion::select('id_paciente')->whereIn('id_lugar_atencion', $array_temp);
            $fichas_otros = FichaOtrosProfesionales::select('id_paciente')->whereIn('id_lugar_atencion', $array_temp)
                ->union($fichas)
                ->pluck('id_paciente')
                ->toArray();;
            $array_ficha = array();
            // foreach ($fichas as $key => $value)
            // {
            //     array_push($array_ficha, $value->id_paciente);
            // }
            $array_ficha = $fichas_otros;

            return $query->whereIn('id', $array_ficha)
                ->where(function ($query) use ($rut, $nombre, $apellido) {
                    if (!empty($rut) && !empty($nombre) && !empty($apellido)) // rut, nombre, apellido
                    {
                        $query->where('rut', $rut)
                            ->orwhere('nombres', 'like', '%' . $nombre . '%')
                            ->orwhere('apellido_uno', 'like', '%' . $apellido . '%')
                            ->orwhere('apellido_dos', 'like', '%' . $apellido . '%');
                    }
                    else if (!empty($rut) && !empty($nombre) && empty($apellido)) // rut, nombre,
                    {
                        $query->where('rut', $rut)
                            ->orwhere('nombres', 'like', '%' . $nombre . '%');
                    }
                    else if (!empty($rut) && empty($nombre) && !empty($apellido)) // rut, apellido
                    {
                        $query->where('rut', $rut)
                            ->orwhere('apellido_uno', 'like', '%' . $apellido . '%')
                            ->orwhere('apellido_dos', 'like', '%' . $apellido . '%');
                    }
                    else if (!empty($rut) && empty($nombre) && empty($apellido)) // rut
                    {
                        $query->where('rut', $rut);
                    }
                    else if (empty($rut) && !empty($nombre) && empty($apellido)) // nombre
                    {
                        $query->where('nombres', 'like', '%' . $nombre . '%');
                    }
                    else if (empty($rut) && empty($nombre) && !empty($apellido)) // apellido
                    {
                        $query->where('apellido_uno', 'like', '%' . $apellido . '%')
                            ->orwhere('apellido_dos', 'like', '%' . $apellido . '%');
                    }

                    if (empty($rut) && !empty($nombre) && !empty($apellido)) // nombre, apellido
                    {
                        $query->where('nombres', 'like', '%' . $nombre . '%')
                            ->orwhere('apellido_uno', 'like', '%' . $apellido . '%')
                            ->orwhere('apellido_dos', 'like', '%' . $apellido . '%');
                    }
                });
        }
    }
}
