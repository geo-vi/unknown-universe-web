<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerLevelsPlayer extends Model
{
    protected $table = 'server_levels_player';

    protected $fillable = [
        'ID', 'EXP', 'REWARDS',
    ];
}
