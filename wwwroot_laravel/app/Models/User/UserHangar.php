<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserHangar extends Model
{
    protected $table = 'player_hangar';

    protected $fillable = [
        'ID', 'USER_ID', 'PLAYER_ID', 'HANGAR_COUNT', 'ACTIVE', 'SHIP_ID',
        'SHIP_DESIGN', 'SHIP_HP', 'SHIP_NANO', 'SHIP_MAP_ID', 'SHIP_X', 'SHIP_Y',
        'IN_EQUIPMENT_ZONE', 'PET_ID'
    ];
}
