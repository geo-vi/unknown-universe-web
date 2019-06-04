<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserBooster extends Model
{
    protected $table = 'player_boosters';

    protected $fillable = [
        'ID', 'PLAYER_ID', 'BOOSTER_ID', 'END_TIME'
    ];
}
