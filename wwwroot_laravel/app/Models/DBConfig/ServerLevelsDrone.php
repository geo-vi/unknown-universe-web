<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerLevelsDrone extends Model
{
    protected $table = 'server_levels_drone';

    protected $fillable = [
        'ID', 'EXP', 'REWARDS',
    ];
}
