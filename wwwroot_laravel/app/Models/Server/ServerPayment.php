<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerPayment extends Model
{
    protected $table = 'server_payments';

    protected $fillable = [
        'ID', 'PLAYER_ID', 'USER_ID', 'PACK_ID', 'STATUS', 'STARTED', 'FINISHED', 'AUTH_KEY'
    ];
}
