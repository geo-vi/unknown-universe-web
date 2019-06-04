<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerLanguage extends Model
{
    protected $table = 'server_languages';

    protected $fillable = [
        'ID', 'NAME', 'LOOT_ID', 'SHORTCODE'
    ];
}
