<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerInfo extends Model
{
    protected $table = 'server_infos';

    protected $fillable = [
        'ID', 'REGION', 'SHORTCUT', 'NAME', 'SERVER_IP', 'DB_NAME', 'OPEN', 'XMAS', 'ONLINE_PLAYERS'
    ];
}
