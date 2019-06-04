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

    /** define the used session_id column of the table "users". */
    protected $rememberTokenName = "SESSION_ID";


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
        'BANNED' => 'datetime',
        'BIRTHDATE' => 'datetime',
        'VERFIED' => 'boolean',
        'ONLINE' => 'boolean',
        'WAS_TESTER' => 'boolean',
    ];

    /**
     * If the cast is an empty array, it will return an empty array instead of null.
     *
     * @param string $key
     * @param mixed $value
     * @return array|mixed
     */
    protected function castAttribute($key, $value)
    {
        if($this->getCastType($key) == 'array' && is_null($value)) {
            return [];
        }
        return parent::castAttribute($key, $value);
    }

    /**
     * laravel uses the column "password" for the password of the user.
     * this magic function sets the column to "PW_HASH".
     *
     * @return mixed|string
     */
    public function getAuthPassword()
    {
        return $this->PW_HASH;
    }




}
