<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerChatLogin extends Model
{
    protected $table = 'server_chat_login';

    protected $fillable = [
        'USER_LOGIN_MSG', 'MODERATOR_LOGIN_MSG'
    ];
}
