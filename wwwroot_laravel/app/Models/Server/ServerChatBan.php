<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerChatBan extends Model
{
    protected $table = 'server_chat_bans';

    protected $fillable = [
        'ID', 'PLAYER_ID', 'ISSUED_TIME', 'REASON', 'EXPIRE_TIME', 'ISSUED_BY'
    ];
}
