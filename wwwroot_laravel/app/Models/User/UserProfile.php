<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'player_profile';

    protected $fillable = [
        'ID', 'USER_ID', 'PLAYER_ID', 'AVATAR', 'ONLINE'
    ];
}
