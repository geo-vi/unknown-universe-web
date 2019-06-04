<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerAnnouncement extends Model
{
    protected $table = 'server_announcements';

    protected $fillable = [
        'ID', 'ANNOUNCEMENT'
    ];
}
