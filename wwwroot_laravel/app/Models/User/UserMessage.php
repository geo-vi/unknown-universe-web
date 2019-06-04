<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $table = 'player_messages';

    protected $fillable = [
        'ID', 'USER_ID', 'SENDER', 'DATE', 'NEW', 'HEADER', 'MESSAGE', 'TYPE',
    ];
}
