<?php

namespace App\Models;

use app\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersDevices extends Model
{
    use HasFactory;

    protected $hidden = [

        'password'

    ];


    protected $table = 'users_devices';

    public function user_create()
    {
        return $this->belongsTo(Region::class,'id', 'id_user_create');
    }

    public function user_recept()
    {
        return $this->belongsTo(Region::class,'id', 'id_user_recept');
    }

}
