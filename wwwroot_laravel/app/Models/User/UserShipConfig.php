<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserShipConfig extends Model
{
    protected $table = 'player_ship_config';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'HANGAR_ID', 'CONFIG_1_DMG', 'CONFIG_2_DMG', 'CONFIG_1_SHIELD', 'CONFIG_2_SHIELD',
        'CONFIG_1_SHIELD_LEFT', 'CONFIG_2_SHIELD_LEFT', 'CONFIG_1_SPEED', 'CONFIG_2_SPEED',
        'CONFIG_1_EXTRAS', 'CONFIG_2_EXTRAS', 'CONFIG_1_HEAVY', 'CONFIG_2_HEAVY', 'CONFIG_1_SHIELDABSORB',
        'CONFIG_2_SHIELDABSORB', 'CONFIG_1_LASERCOUNT', 'CONFIG_2_LASERCOUNT', 'CONFIG_1_LASER_TYPES', 'CONFIG_2_LASER_TYPES',
    ];
}
