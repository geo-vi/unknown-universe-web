<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserGalaxyGate extends Model
{
    protected $table = 'player_galaxy_gates';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'COMPLETED_GATES', 'MULTIPLIER',
        'ALPHA_PARTS', 'ALPHA_PREPARED', 'ALPHA_WAVE', 'ALPHA_LIVES',
        'BETA_PARTS', 'BETA_PREPARED', 'BETA_WAVE', 'BETA_LIVES',
        'GAMMA_PARTS', 'GAMMA_PREPARED', 'GAMMA_WAVE', 'GAMMA_LIVES',
        'DELTA_PARTS', 'DELTA_PREPARED', 'DELTA_WAVE', 'DELTA_LIVES',
        'EPSILON_PARTS', 'EPSILON_PREPARED', 'EPSILON_WAVE', 'EPSILON_LIVES',
        'ZETA_PARTS', 'ZETA_PREPARED', 'ZETA_WAVE', 'ZETA_LIVES',
        'KAPPA_PARTS', 'KAPPA_PREPARED', 'KAPPA_WAVE', 'KAPPA_LIVES',
        'LAMBDA_PARTS', 'LAMBDA_PREPARED', 'LAMBDA_WAVE', 'LAMBDA_LIVES',
        'HADES_PARTS', 'HADES_PREPARED', 'HADES_WAVE', 'HADES_LIVES',
    ];
}
