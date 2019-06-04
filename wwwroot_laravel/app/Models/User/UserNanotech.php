<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserNanotech extends Model
{
    protected $table = 'player_nanotech';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'BRR_TECHS', 'BRR_PRODUCTION_END', 'ELA_TECHS', 'ELA_PRODUCTION_END', 'ECI_TECHS', 'ECI_PRODUCTION_END',
        'RPM_TECHS', 'EPM_PRODUCTION_END', 'SBU_TECHS', 'SBU_PRODUCTION_END', 'APIS_PARTS', 'ZEUS_PARTS',
    ];
}
