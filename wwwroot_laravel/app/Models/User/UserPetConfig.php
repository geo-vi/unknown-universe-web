<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserPetConfig extends Model
{
    protected $table = 'player_pet_config';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'CONFIG_1_DMG', 'CONFIG_2_DMG', 'CONFIG_1_SHIELD', 'CONFIG_2_SHIELD', 'CONFIG_1_SHIELD_LEFT',
        'CONFIG_2_SHIELD_LEFT', 'CONFIG_1_SHIELDABSORB', 'CONFIG_2_SHIELDABSORB',
        'CONFIG_1_GEARS', 'CONFIG_2_GEARS', 'CONFIG_1_PROTOCOLS', 'CONFIG_2_PROTOCOLS',
    ];
}
