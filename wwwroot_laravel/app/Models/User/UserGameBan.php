<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserGameBan extends Model
{
    protected $table = 'player_game_bans';

    protected $fillable = [
        'ID', 'USER_ID', 'PLAYER_ID', 'ISSUED_TIME', 'REASON', 'EXPIRE_TIME', 'ISSUED_BY'
    ];
}
