<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserLogs extends Model
{
    protected $table = 'player_logs';

    protected $fillable = [
        'ID', 'USER_ID', 'PLAYER_ID', 'LOG_TYPE', 'LOG_DESCRIPTION', 'LOG_DATE'
    ];
}
