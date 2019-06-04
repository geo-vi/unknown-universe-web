<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerSkylabModule extends Model
{
    protected $table = 'server_skylab_modules';

    protected $fillable = [
        'ID', 'TYPE', 'LEVEL', 'PET_COST', 'CREDITS', 'URIDIUM', 'UPGRADE_TIME', 'PRODUCTION',
        'STORAGE', 'ENERGY'
    ];
}
