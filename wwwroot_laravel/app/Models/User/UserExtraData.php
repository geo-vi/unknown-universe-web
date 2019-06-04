<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserExtraData extends Model
{
    protected $table = 'player_extra_data';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'LOGFILES', 'RESEARCH_POINTS', 'RESEARCH_LEVEL', 'BOOTY_KEYS',
        'DRONE_FORMATIONS', 'SHIP_DESIGNS', 'SETTINGS_GAMEPLAY_OLD', 'SETTINGS_GAMEPLAY_NEW',
        'SETTINGS_SLOTBAR_OLD', 'SETTINGS_SLOTBAR_NEW', 'SETTINGS_KEYS_OLD', 'SETTINGS_KEYS_NEW',
        'STATS', 'CARGO', 'SKYLAB', 'GATES', 'CLIENT_VERSION', 'ASSETS_VERSION', 'GG_ENERGY'
    ];
}
