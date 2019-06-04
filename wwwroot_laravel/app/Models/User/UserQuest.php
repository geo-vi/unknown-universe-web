<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserQuest extends Model
{
    protected $table = 'player_quests';

    protected $fillable = [
        'PLAYER_ID', 'QUEST_ID', 'CONDITION_ID', 'STATE'
    ];
}
