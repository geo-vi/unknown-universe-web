<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerChatLog extends Model
{
    protected $table = 'server_chat_logs';

    protected $fillable = [
        'ID', 'PLAYER_ID', 'ROOM_ID', 'LOG', 'LOG_TYPE', 'LOG_DATE'
    ];
}
