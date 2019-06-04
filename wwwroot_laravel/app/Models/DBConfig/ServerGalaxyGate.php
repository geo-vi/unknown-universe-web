<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerGalaxyGate extends Model
{
    protected $table = 'server_galaxy_gates';

    protected $fillable = [
        'ID', 'NAME', 'PART_CNT', 'REWARDS'
    ];
}
