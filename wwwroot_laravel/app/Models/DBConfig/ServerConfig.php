<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerConfig extends Model
{
    protected $table = 'server_collectables';

    protected $fillable = [
        'DEFAULT_SHIP', 'DEFAULT_URI', 'DEFAULT_CREDITS', 'DEFAULT_ITEMS', 'DEFAULT_AMMO'
    ];
}
