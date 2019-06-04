<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserDrone extends Model
{
    protected $table = 'player_drones';

    protected $fillable = [
        'ID', 'USER_ID', 'PLAYER_ID', 'ITEM_ID', 'DRONE_TYPE', 'DAMAGE',
        'LEVEL', 'EXPERIENCE', 'UPGRADE_LVL', 'DESIGN_1', 'DESIGN_2'
    ];
}
