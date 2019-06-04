<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerCron extends Model
{
    protected $table = 'server_crons';

    protected $fillable = [
        'ID', 'NAME', 'REPEAT', 'TIME', 'INTERVAL', 'EXECUTE', 'ACTIVE'
    ];
}
