<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerBetaInfo extends Model
{
    protected $table = 'server_beta_info';

    protected $fillable = [
        'PUBLIC_END', 'WHITELISTED_PLAYERS'
    ];
}
