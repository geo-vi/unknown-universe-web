<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerMaxResearchPoint extends Model
{
    protected $table = 'server_max_research_point';

    protected $fillable = [
        'ID', 'RESEARCH_POINT', 'LOGS_NEEDED',
    ];
}
