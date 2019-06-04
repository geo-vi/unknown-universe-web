<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerEvent extends Model
{
    protected $table = 'server_events';

    protected $fillable = [
        'ID', 'NAME', 'DESCRIPTION', 'TYPE', 'ACTIVE', 'EVENT_DAY', 'EVENT_HOUR'
    ];
}
