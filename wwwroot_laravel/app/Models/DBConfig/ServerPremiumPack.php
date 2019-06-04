<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerPremiumPack extends Model
{
    protected $table = 'server_premium_packs';

    protected $fillable = [
        'ID', 'NAME', 'DESCRIPTION', 'PRICE', 'ITEMS',
    ];
}
