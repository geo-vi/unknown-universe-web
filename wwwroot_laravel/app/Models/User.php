<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/** TODO: Change "SESSION_ID" to "remember_token" in table for laravel's authentication system **/
/** TODO: Migrate GG, Settings, etc. **/


class User extends Authenticatable
{
    use Notifiable;

    public static $GENDER = [
        '1' => 'Male',
        '2' => 'Female',
        '3' => 'Potato',
        '4' => 'Other',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID', 'USERNAME', 'EMAIL', 'SESSION_ID', 'PW_HASH', 'LAST_SERVER', 'IP', 'VERFIED',
        'ONLINE', 'WAS_TESTER', 'FIRST_NAME', 'LAST_NAME', 'COUNTRY_NAME', 'GENDER',
        'BIRTHDATE', 'LANGUAGE', 'DISCORD_ID'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
