<?php

namespace App\Models;

use app\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogUsersDevices extends Model
{
    use HasFactory;

    protected $table = 'log_users_devices';

    public function user()
    {
        return $this->belongsTo(Region::class,'id', 'id_user');
    }
}
