<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CnsTipo extends Model
{
    use HasFactory;
    protected $table = 'cns_tipo';

    public function CnsTipoTemplate()
    {
        return $this->hasOne(CnsTipoTemplate::class, 'id', 'id_cns_template');
    }
}
