<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserSkylab extends Model
{
    protected $table = 'player_skylab';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'MODULES', 'ORES', 'TRANSFER_IN_PROGRESS', 'TRANSFER_END_TIME',
        'TRANSFER_CONTENT'
    ];
}
