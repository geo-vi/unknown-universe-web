<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerModule extends Model
{
    protected $table = 'server_modules';

    protected $fillable = [
        'ID', 'NAME', 'HP', 'SHIELD', 'ATTACK_RANGE'
    ];
}
