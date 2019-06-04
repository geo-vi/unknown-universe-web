<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerAuction extends Model
{
    protected $table = 'server_auctions';

    protected $fillable = [
        'ID', 'ITEMID', 'ITEMNAME', 'ITEMQ', 'ITEM_DESC', 'TYPE', 'AUCTION_TYPE', 'MAX_BID', 'BID_USER_ID'
    ];
}
