<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerCalendar extends Model
{
    protected $table = 'server_calendar';

    protected $fillable = [
        'ID', 'Month', 'Reward'
    ];
}
