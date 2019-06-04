<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerChatModerator extends Model
{
    protected $table = 'server_chat_logs';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'NAME', 'LEVEL',
    ];
}
