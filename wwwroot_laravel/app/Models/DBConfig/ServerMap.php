<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerMap extends Model
{
    protected $table = 'server_maps';

    protected $fillable = [
        'ID', 'NAME', 'LIMITS', 'PORTALS', 'NPCS', 'IS_STARTER_MAP', 'FACTION_ID', 'LEVEL', 'MAP_ASSETS', 'MAP_TYPE'
    ];
}
