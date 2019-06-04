<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerShip extends Model
{
    protected $table = 'server_ships';

    protected $fillable = [
        'ship_id', 'name', 'inShop', 'ship_lootid', 'ship_hp', 'nanohull', 'shield', 'shieldAbsorb',
        'minDamage', 'maxDamage', 'base_speed', 'isNeutral', 'laserID', 'laser', 'heavy', 'generator',
        'batteries', 'rockets', 'extra', 'gear', 'protocols', 'cargo', 'experience', 'honor',
        'credits', 'uridium', 'rankPoints', 'AI', 'price_cre', 'price_uri', 'dropJSON'
    ];
}
