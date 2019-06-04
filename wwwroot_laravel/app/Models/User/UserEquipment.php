<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserEquipment extends Model
{
    protected $table = 'player_equipment';

    protected $fillable = [
        'ID', 'USER_ID', 'PLAYER_ID', 'ITEM_ID', 'ITEM_TYPE', 'ITEM_LVL',
        'ON_CONFIG_1', 'ON_CONFIG_2', 'ON_DRONE_ID_1', 'ON_DRONE_ID_2',
        'ON_PET_1', 'ON_PET_2', 'ITEM_AMOUNT'
    ];
}
