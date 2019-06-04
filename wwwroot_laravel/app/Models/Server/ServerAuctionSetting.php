<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerAuctionSetting extends Model
{
    protected $table = 'server_auctions_settings';

    protected $fillable = [
        'ID', 'LAST_HOURLY', 'LAST_DAILY', 'LAST_WEEKLY'
    ];
}
