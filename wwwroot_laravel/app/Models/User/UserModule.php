<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserModule extends Model
{
    protected $table = 'player_modules';

    protected $fillable = [
        'ID', 'PLAYER_ID', 'TYPE', 'EQUIPPED', 'CBS_ID', 'POSITION', 'HP', 'SHIELD',
        'UPGRADE_LVL'
    ];
}
