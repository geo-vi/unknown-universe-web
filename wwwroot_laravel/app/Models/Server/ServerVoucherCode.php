<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerVoucherCode extends Model
{
    protected $table = 'server_voucher_codes';

    protected $fillable = [
        'ID', 'CODE', 'CODE_DESC', 'REWARD', 'AMOUNT',
    ];
}
