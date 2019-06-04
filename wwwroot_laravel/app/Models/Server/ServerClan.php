<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerClan extends Model
{
    protected $table = 'server_chat_rooms';

    protected $fillable = [
        'ID', 'NAME', 'TAG', 'DESCRIPTION', 'FACTION', 'IS_ACCEPTING', 'CREATED', 'PICTURE',
        'RANK', 'NEWS', 'CREDITS', 'RATE'
    ];
}
