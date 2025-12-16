<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDependencia extends Model
{
    use HasFactory;
    protected $table = 'tipo_dependencia';

    public function scopeListaId($query, $lista)
    {
        if (!empty($lista))
        {
            if(gettype($lista) == 'string')
                $lista = explode(',', $lista);

            $query->whereIn('id', $lista);
        }
    }

    public function scopeListaTipo($query, $lista)
    {
        if (!empty($lista))
        {
            if(gettype($lista) == 'string')
                $lista = explode(',',$lista);

            $query->where(function($q) use($lista){
                foreach ($lista as $key => $value) {
                    if($key == 1)
                        $q->OrWhere('tipo', 'like', '%'.$value.'%');
                    else
                        $q->OrWhere('tipo', 'like', '%'.$value.'%');
                }
            });
        }
    }
}
