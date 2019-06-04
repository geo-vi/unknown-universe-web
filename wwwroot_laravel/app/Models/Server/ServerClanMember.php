<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerClanMember extends Model
{
    protected $table = 'server_clans_members';

    protected $fillable = [
        'ID', 'CLAN_ID', 'USER_ID', 'PLAYER_ID', 'JOIN_DATE', 'ROLE'
    ];
}
