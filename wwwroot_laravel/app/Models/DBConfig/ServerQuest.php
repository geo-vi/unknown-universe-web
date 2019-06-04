<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerQuest extends Model
{
    protected $table = 'server_quests';

    protected $fillable = [
        'ID', 'NAME', 'DESC', 'ROOT', 'REWARDS', 'TYPE', 'ICON', 'ACCEPT_LEVEL', 'EXPIRY_DATE', 'DAY_OF_WEEK',
    ];
}
