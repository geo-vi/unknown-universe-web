<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserAmmo extends Model
{
    protected $table = 'player_ammo';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'LCB_10', 'MCB_25', 'MCB_50', 'SAB_50', 'UCB_100',
        'RSB_75', 'JOB_100', 'CBO_100', 'RB_214', 'DCR_250', 'PLD_8', 'HSTRM_01',
        'UBR_100', 'SAR_01', 'SAR_02', 'PLT_2021', 'PLT_2026', 'PLT_2030', 'R_310',
        'ECO_10', 'BDR_1211', 'WIZ_X', 'CBR', 'ACM_01', 'SL_M01', 'DD_M01', 'SAB_M01',
        'EMP_01', 'EMP_M01',

    ];
}
