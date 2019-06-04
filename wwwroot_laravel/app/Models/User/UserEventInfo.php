<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserEventInfo extends Model
{
    protected $table = 'player_event_info';

    protected $fillable = [
        'PLAYER_ID', 'EVENT_ID', 'SCORE', 'DATA'
    ];
}
