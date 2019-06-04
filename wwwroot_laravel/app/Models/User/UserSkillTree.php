<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserSkillTree extends Model
{
    protected $table = 'player_skill_tree';

    protected $fillable = [
        'USER_ID', 'PLAYER_ID', 'SHIP_HULL', 'SHIP_HULL_2', 'ENGINEERING', 'SHIELD_ENGINEERING',
        'EVASIVE_MANEUVERS', 'EVASIVE_MANEUVERS_2', 'SHIELD_MECHANICS', 'TACTICS', 'LOGISTICS', 'LUCK',
        'LUCK_2', 'CRUELTY', 'CRUELTY_2', 'TRACTOR_BEAM', 'TRACTOR_BEAM_2', 'GREED',
        'DETONATION', 'DETONATION_2', 'EXPLOSIVES', 'HEAT_SEEKING_MISSLES', 'BOUNTY_HUNTER', 'BOUNTY_HUNTER_2',
        'ROCKET_FUSION', 'ALIEN_HUNTER', 'ELECTRO_OPTICS',
    ];
}
