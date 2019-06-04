<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerClanApplication extends Model
{
    protected $table = 'server_clans_applications';

    protected $fillable = [
        'ID', 'USER_ID', 'PLAYER_ID', 'CLAN_ID', 'APPLY_DATE'
    ];
}
