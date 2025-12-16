<?php
namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'ciudades';

    public function Region()
    {
       return $this->belongsTo(Region::class,'id_region', 'id');
    }
}
