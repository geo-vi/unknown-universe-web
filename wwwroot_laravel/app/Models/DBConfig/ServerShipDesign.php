<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerShipDesign extends Model
{
    protected $table = 'server_ships_designs';

    protected $fillable = [
        'Id', 'ShipId', 'Name', 'type', 'inShop', 'price_cre', 'price_uri', 'desc',
    ];
}
