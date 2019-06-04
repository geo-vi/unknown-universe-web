<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerCollectable extends Model
{
    protected $table = 'server_collectables';

    protected $fillable = [
        'ID', 'TYPE', 'REWARDS', 'SPAWN_COUNT', 'PVP_SPAWN_COUNT'
    ];
}
