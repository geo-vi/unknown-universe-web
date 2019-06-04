<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerRank extends Model
{
    protected $table = 'server_ranks';

    protected $fillable = [
        'ID', 'RANK_NAME',
    ];
}
