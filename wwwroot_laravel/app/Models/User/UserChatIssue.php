<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserChatIssue extends Model
{
    protected $table = 'player_chat_issues';

    protected $fillable = [
        'ID', 'USER_ID', 'PLAYER_ID', 'ISSUE_TYPE', 'ISSUED_BY', 'ISSUED_AT',
        'EXPIRY', 'REASON',
    ];
}
