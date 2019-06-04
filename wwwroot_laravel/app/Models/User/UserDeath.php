<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserDeath extends Model
{
    protected $table = 'player_deaths';

    protected $fillable = [
        'ID', 'PLAYER_ID', 'KILLER_NAME', 'KILLER_LINK', 'DEATH_TYPE',
        'ALIAS', 'TIME_OF_DEATH',
    ];
}
