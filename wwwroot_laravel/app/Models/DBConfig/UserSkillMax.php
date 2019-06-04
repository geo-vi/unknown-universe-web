<?php

namespace App\Models\DBConfig;

use Illuminate\Database\Eloquent\Model;

class UserSkillMax extends Model
{
    protected $table = 'player_skills_max';

    protected $fillable = [
        'ID', 'SKILL_NAME', 'MAX_POINT',
    ];
}
