<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'player_data';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'SESSION_ID', 'PLAYER_NAME', 'FACTION_ID', 'TITLE_ID', 'LVL',
        'EXP', 'HONOR', 'RANK_POINTS', 'RANK', 'URIDIUM', 'CREDITS', 'PREMIUM', 'PREMIUM_UNTIL',
        'GG_RINGS', 'JACKPOT', 'CLAN_ID', 'REGISTERED', 'RANKING', 'LAST_MODIFIED',
    ];
}
