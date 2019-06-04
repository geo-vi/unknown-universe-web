<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserVoucherCode extends Model
{
    protected $table = 'player_skylab';

    protected $fillable = [
        'ID', 'USER_ID', 'CODE_ID', 'USED'
    ];
}
