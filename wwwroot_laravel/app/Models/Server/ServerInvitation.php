<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerInvitation extends Model
{
    protected $table = 'server_invitations';

    protected $fillable = [
        'ID', 'CODE', 'USED'
    ];
}
