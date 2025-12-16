<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CnsTipoTemplate extends Model
{
    use HasFactory;
    protected $table = 'cns_tipo_template';

    public function CnsTipo()
    {
        return $this->hasOne(CnsTipo::class, 'id_cns_template', 'id');
    }
}
