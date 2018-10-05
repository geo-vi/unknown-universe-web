<?php

class Validator
{
    private $mysql;

    function __construct($mysql)
    {
        $this->mysql = $mysql;
    }

    /**
     * isValidString Function
     * checks is strink is valid (using ctype_alnum)ignoring $allowed characters
     *
     * @param       $string
     * @param array $allowed
     *
     * @return bool
     *
     */
    public function isValidString($string, $allowed = [])
    {
        if (ctype_alnum(str_replace($allowed, '', $string))) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * isUser Function
     * checks if user exists by UserID
     *
     * @param $UserID
     *
     * @return bool
     *
     */
    public function isUser($UserID)
    {
        $User = $this->mysql->QUERY('SELECT USER_ID FROM users WHERE USER_ID = ?', [$UserID]);

        if (count($User) == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * isUserByUsername Function
     * checks if users exists by Username
     *
     * @param $Username
     *
     * @return bool
     *
     */
    public function isUserByUsername($Username)
    {
        $User = $this->mysql->QUERY('SELECT USER_ID FROM users WHERE USERNAME = ?', [$Username]);

        if (count($User) === 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * isUserByEmail Function
     * checks if users exists by Email
     *
     * @param $Email
     *
     * @return bool
     *
     */
    public function isUserByEmail($Email)
    {
        $User = $this->mysql->QUERY('SELECT USER_ID FROM users WHERE EMAIL = ?', [$Email]);
        if (count($User) == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * isValidInvitation Function
     * checks if invitation code is valid
     *
     * @param $InvCode
     *
     * @return bool
     *
     */
    public function isValidInvitation($InvCode)
    {
        $Invitation = $this->mysql->QUERY('SELECT * FROM server_invitations WHERE CODE = ?', [$InvCode]);
        if (isset($Invitation[0])) {
            if (!$Invitation[0]['USED']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}