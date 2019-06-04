<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserLaboratory extends Model
{
    protected $table = 'player_laboratory';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'CARGO', 'DELIVERY_END', 'DELIVERY_CONTENT',
        'UPGRADED_LASERS', 'UPGRADED_ROCKETS', 'UPGRADED_GENERATORS', 'UPGRADED_SHIELDS',
    ];
}
