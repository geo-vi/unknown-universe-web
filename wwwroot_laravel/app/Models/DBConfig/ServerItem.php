<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerItem extends Model
{
    protected $table = 'server_items';

    protected $fillable = [
        'ID', 'NAME', 'TYPE', 'LOOT_ID', 'CATEGORY', 'PRICE_U', 'PRICE_C', 'SELLING_CREDITS', 'DAMAGE',
        'SHIELD', 'SHIELD_ABSORBATION', 'SPEED', 'SLOTS', 'EFFECT', 'USES', 'DESCRIPTION', 'LEVELS',
    ];
}
