<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerClanBattleStation extends Model
{
    protected $table = 'server_clanbattlestations';

    protected $fillable = [
        'ID', 'NAME', 'FACTION', 'TYPE', 'MAP_ID', 'CLAN_ID', 'POSITION', 'HEALTH', 'SHIELD',
        'MODULES', 'BUILD_START', 'BUILD_END', 'DEFLECTOR_END'
    ];
}
