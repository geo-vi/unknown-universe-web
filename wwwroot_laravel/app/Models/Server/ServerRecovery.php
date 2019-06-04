<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerRecovery extends Model
{
    protected $table = 'server_recovery';

    protected $fillable = [
        'ID', 'USER_ID', 'ACTIVATION_CODE', 'SEND_TO', 'SEND_DATE', 'TIMEOUT',
    ];
}
