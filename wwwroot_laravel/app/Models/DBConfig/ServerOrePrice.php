<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerOrePrice extends Model
{
    protected $table = 'server_ore_prices';

    protected $fillable = [
        'ID', 'LOOT_ID', 'SELL_PRICE',
    ];
}
