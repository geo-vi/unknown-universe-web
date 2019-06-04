<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserOutbox extends Model
{
    protected $table = 'player_nanotech';

    protected $fillable = [
        'ID', 'USER_ID', 'RECIPIENT', 'DATE', 'HEADER', 'MESSAGE', 'TYPE',
    ];
}
