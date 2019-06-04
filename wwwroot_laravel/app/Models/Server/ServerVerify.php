<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerVerify extends Model
{
    protected $table = 'server_verfiy';

    protected $fillable = [
        'ID', 'USER_ID', 'ACTIVATION_CODE', 'SEND_TO', 'SEND_DATE', 'TIMEOUT',
    ];
}
