<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerLevelsPet extends Model
{
    protected $table = 'server_levels_pet';

    protected $fillable = [
        'ID', 'EXP', 'REWARDS',
    ];
}
