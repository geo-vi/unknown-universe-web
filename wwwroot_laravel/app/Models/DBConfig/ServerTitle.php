<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class ServerTitle extends Model
{
    protected $table = 'server_titles';

    protected $fillable = [
        'ID', 'KEY', 'TITLE_NAME', 'TITLE_COLOR', 'TITLE_COLOR_HEX',
    ];
}
