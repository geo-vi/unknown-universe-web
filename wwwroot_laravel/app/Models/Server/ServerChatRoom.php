<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerChatRoom extends Model
{
    protected $table = 'server_chat_rooms';

    protected $fillable = [
        'ID', 'ROOM_NAME_ID', 'INSTANCE_ID', 'LANGUAGE_ID', 'FACTION_ID', 'TAB_ORDER', 'ROOM_TYPE', 'NEWCOMER_ROOM',
        'MULTILANGUAGE_ROOM', 'SECTOR_ID', 'PARENT_ID', 'MAX_USER_PER_CHILD', 'MAX_AVG_ROOM_USER',
    ];
}
