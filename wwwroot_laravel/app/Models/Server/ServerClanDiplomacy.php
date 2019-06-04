<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerClanDiplomacy extends Model
{
    protected $table = 'server_clans_diplomacy';

    protected $fillable = [
        'ID', 'CLAN_ID', 'TARGET_CLAN_ID', 'DIPLOMACY', 'START_DATE', 'REQUESTED_PLAYER_ID'
    ];
}
