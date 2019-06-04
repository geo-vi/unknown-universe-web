<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserPet extends Model
{
    protected $table = 'player_nanotech';

    protected $fillable = [
        'ID', 'USER_ID', 'PLAYER_ID', 'PET_TYPE', 'ITEM_ID', 'NAME', 'LEVEL', 'EXPERIENCE', 'HP', 'FUEL'
    ];
}
