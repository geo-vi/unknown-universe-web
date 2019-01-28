<?php

use clan\Clan;
use DB\MySQL;
use shop\Shop;

//SYSTEM RELATED CLASSES
include_once(__DIR__ . "/system/class.MySQL.php");
include_once(__DIR__ . "/system/class.Utils.php");
include_once(__DIR__ . "/system/class.Validator.php");
include_once(__DIR__ . "/system/class.ErrorHandler.php");
include_once(__DIR__ . "/system/class.Routing.php");
include_once(__DIR__ . "/system/class.Logging.php");
include_once(__DIR__ . "/system/class.Translation.php");

//USER RELATED CLASSES
include_once(__DIR__ . "/class.User.php");
include_once(__DIR__ . "/user/class.Hangars.php");
include_once(__DIR__ . "/user/class.Inventory.php");
include_once(__DIR__ . '/user/inventory/class.Item.php');

//CLAN RELATED CLASSE
include_once(__DIR__ . "/class.Clan.php");

//SHOP RELATED CLASSES
include_once(__DIR__ . "/class.Shop.php");
include_once(__DIR__ . '/shop/items/class.AbstractItem.php');
include_once(__DIR__ . '/shop/items/class.Ship.php');
include_once(__DIR__ . '/shop/items/class.Item.php');
include_once(__DIR__ . '/shop/items/class.Drone.php');
include_once(__DIR__ . '/shop/items/class.Ammo.php');
include_once(__DIR__ . '/shop/items/class.Booster.php');
include_once(__DIR__ . '/shop/items/class.Design.php');
include_once(__DIR__ . '/shop/items/class.Pet.php');

//SERVER RELATED CLASSES
include_once(__DIR__ . "/class.Game.php");


class System
{

    /** @var MySQL */
    public $mysql;
    /** @var Validator */
    public $validate;
    /** @var ErrorHandler */
    public $error_handler;
    /** @var Routing */
    public $routing;
    /** @var Logging */
    public $logging;
    /** @var  Translation */
    public $translation;

    /** @var User */
    public $User;
    /** @var Clan */
    public $Clan;
    /** @var Shop */
    public $Shop;

    public $Server;

    public $Game;

    function __construct()
    {
        if (!isset($_SESSION)) {
            session_set_cookie_params(0, COOKIE_PATH, COOKIE_DOMAIN);
            session_start();
        }
        session_write_close();
        $this->mysql         = new MySQL(MYSQL_IP, MYSQL_DB_NAME, MYSQL_USER, MYSQL_PW);
        $this->validate      = new Validator($this->mysql);
        $this->error_handler = new ErrorHandler();
        $this->routing       = new Routing();
        $this->logging       = new Logging();
        $this->translation   = new Translation($this->mysql);
    }

    /**
     *  Login Function
     *
     * @param string $username Username
     * @param string $password Password
     *
     * @return bool
     *
     */
    public function Login($username, $password)
    {

        //CHECK IF USER EXITS
        $UserData = $this->getUserInfoByUsername($username);
        $User     = null;


        if (isset($UserData[0])) {
            $UserData = $UserData[0];
        } else {
            return false;
        }

        //CHECK LOGIN_DATA
        if ($username == $UserData['USERNAME'] && password_verify($password, $UserData['PW_HASH'])) {
            if (isset($_SESSION)) {
                session_regenerate_id();
            }
            session_start();
            $_SESSION["USER_ID"] = $UserData['USER_ID'];
            session_write_close();
            $this->User = $User = new User($this->mysql, $UserData);;
            $ip = (string)$this->getUserIP();
            $this->mysql->QUERY('UPDATE users SET SESSION_ID = ? WHERE USER_ID = ?',
                [session_id(), $this->User->USER_ID]);
            $this->mysql->QUERY('UPDATE users SET IP = ? WHERE SESSION_ID = ?', [$ip, session_id()]);
            return true;
        } else {
            return false;
        }

    }

    /**
     *  isLoggedIn Function
     *  checks if User is logged in over USER_ID and sessionID
     *
     * @return bool
     *
     */
    public function isLoggedIn()
    {
        if (isset($_SESSION["USER_ID"]) && $this->isValid($_SESSION["USER_ID"])) {
            $user = $this->getUserInfo();

            if (count($user) == 1) {
                //CREATING FULL USER OBJECT
                $this->User            = new User($this->mysql, $user[0]);
                $this->User->Inventory = new Inventory($this->User);
                $this->User->Hangars   = new Hangars($this->User);
                $this->Shop            = new Shop($this->User);
                $this->Clan            = new Clan($this->User);
                $this->Game            = new Game($this->User);
                //END

                //GET LANGUAGE
                if ($user[0]['LANGUAGE'] != null) {
                    $this->translation->setLanguage($this->User->LANGUAGE);
                } else {
                    $this->mysql->QUERY('UPDATE users SET LANGUAGE = ? WHERE USER_ID = ? AND SESSION_ID = ?',
                        [$this->translation->LANGUAGE_ID, $this->User->USER_ID, session_id()]);
                }

                //CHECK FOR EMAIL VERIFICATION
                if (!$this->User->VERFIED && NEED_EMAIL_VERIFY) {
                    $this->sendEmailVerification($this->User->USER_ID, $this->User->EMAIL);
                    $this->error_handler->throwError(ErrorID::EMAIL_MISSING);
                }

                //LOG ALL USER ACTIONS
                if ($this->routing->request != '/core/ajax/ajax.php') {
                    $this->logging->addLog(
                        $this->User->USER_ID,
                        $this->User->PLAYER_ID,
                        $this->User->SERVER_DB,
                        "Route: " . $this->routing->route . " Request: " . $this->routing->request,
                        LogType::SYSTEM
                    );
                }

                //GET LAST SERVER
                if ($this->User->LAST_SERVER == null) {
                    //SET FIRST SERVER FOR NEW USERS
                    $this->Server            = $this->getServer();
                    $this->User->LAST_SERVER = $this->Server["SHORTCUT"];
                    $this->mysql->QUERY('UPDATE users SET LAST_SERVER = ? WHERE USER_ID = ? AND SESSION_ID = ?',
                        [$this->User->LAST_SERVER, $_SESSION["USER_ID"], session_id()]);
                    $this->redirectToServer();
                } else {
                    //GET CURRENT SERVER BY SUBDOMAIN
                    $this->getCurrentServer();

                    //IF CURRENT SERVER NOT THE LAST_SERVER TRY TO UPDATE
                    if ($this->getCurrentServer(true) != $this->User->LAST_SERVER) {
                        if ($this->Server) {
                            //SELECTED SERVER EXISTS
                            $this->User->LAST_SERVER = $this->Server["SHORTCUT"];
                            $this->mysql->QUERY('UPDATE users SET LAST_SERVER = ? WHERE USER_ID = ? AND SESSION_ID = ?',
                                [$this->User->LAST_SERVER, $_SESSION["USER_ID"], session_id()]);
                        } else {
                            //IF NOT TRY LAST SERVER
                            $this->Server = $this->getServer($this->User->LAST_SERVER);
                            $this->redirectToServer();
                        }
                    }

                    //CHECK IF CURRENT SERVER IS OPEN OTHERWISE REDIRECT
                    if ($this->Server && !$this->Server['OPEN']) {
                        $this->redirectToServer();
                    }
                }

                //CHECK IF USER HAS FACTION
                if (!$this->User->hasFaction()) {
                    if ($this->routing->route != "internalCompanyChoose" && !$this->error_handler->isError && $this->routing->request != '/core/ajax/ajax.php') {
                        header('location: ' . PROJECT_HTTP_ROOT . 'internalCompanyChoose');
                    }
                }

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * redirectToServer Function
     * redirects to selected Server
     *
     */
    public function redirectToServer()
    {
        if ($this->Server && $this->Server['OPEN']) {
            //IF CURRENT SERVER EXISTS AND IS OPEN REDIRECT
            header('location: ' . PROJECT_PROTOCOL . $this->Server['SHORTCUT'] . '.' . PROJECT_WEB_IP . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            //ELSE SELECT OPEN SERVER AND REDIRECT
            $this->Server = $this->getServer();
            header('location: ' . PROJECT_PROTOCOL . $this->Server['SHORTCUT'] . '.' . PROJECT_WEB_IP . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

    /**
     * getCurrentServer Function
     * needs to get called to receive current server info's
     *
     * @param bool $returnServer
     *
     * @return bool|string
     */
    public function getCurrentServer($returnServer = false)
    {
        $sub_domain = strtoupper(explode('.', $_SERVER["HTTP_HOST"])[0]);
        if ($returnServer) {
            return $sub_domain;
        }

        $this->Server = $this->getServer($sub_domain);
        if (!empty($this->Server) && $this->Server != false) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * getServer Function
     * used to get Server Information's by Shortcut
     *
     * @param string $shortcut
     *
     * @return mixed
     *
     */
    public function getServer($shortcut = "")
    {
        $shortcut = strtoupper($shortcut);

        if ($shortcut == "") {
            return $this->mysql->QUERY('SELECT * FROM server_infos WHERE OPEN = 1', [])[0];
        } else {
            $result = $this->mysql->QUERY('SELECT * FROM server_infos WHERE SHORTCUT = ? AND OPEN = 1 ', [$shortcut]);
            if (isset($result[0])) {
                return $result[0];
            } else {
                return false;
            }
        }
    }


    /**
     *  isValid Function
     *  checks if User is valid over USER_ID from $_SESSION and session_id();
     *
     * @return bool
     *
     */
    public function isValid($id)
    {
        $user = $this->mysql->QUERY('SELECT USER_ID FROM users WHERE SESSION_ID = ? AND USER_ID = ?',
            [session_id(), $id]);
        if (count($user) == 1) {
            $this->mysql->QUERY('UPDATE users SET IP = ? WHERE SESSION_ID  = ?', [$this->getUserIP(), session_id()]);
            return true;
        } else {
            return false;
        }
    }

    /**
     *  registerUser Function
     *  used to register new Users
     *
     * @return bool
     *
     */
    public function registerUser($Username, $Password, $Email)
    {
        if (!empty($Username) && !empty($Password)) {
            $PASSWORD_HASH = password_hash($Password, PASSWORD_DEFAULT);
            $IP            = $this->getUserIP();
            return $this->mysql->QUERY('INSERT INTO users (USERNAME,PW_HASH,EMAIL,IP,LAST_SERVER) VALUES(?,?,?,?,?)',
                [$Username, $PASSWORD_HASH, $Email, $IP, $this->getServer()['SHORTCUT']]);
        }
        return false;
    }

    /**
     * sendEmailVerification Function
     * sends E-Mail with an Link to verify account
     *
     * @param $USER_ID
     * @param $EMAIL
     *
     * @return bool
     *
     */
    public function sendEmailVerification($USER_ID, $EMAIL)
    {
        //ONLY 1 MAIL PER HOUR
        $EMAILS = $this->mysql->QUERY('SELECT * FROM server_verfiy WHERE USER_ID = ? AND SEND_TO = ? ORDER BY SEND_DATE DESC',
            [$USER_ID, $EMAIL]);
        if (isset($EMAILS[0])) {
            $TIMEOUT = new DateTime($EMAILS[0]['TIMEOUT']);
            if (new DateTime() < $TIMEOUT) {
                return true;
            }
        }

        //SEND REGISTRATION E-MAIl
        $CODE    = uniqid('UU' . $USER_ID, true);
        $LINK    = PROJECT_HTTP_ROOT . 'confirm.php?code=' . $CODE;
        $DATE    = date('Y-m-d H:i:s');
        $TIMEOUT = date('Y-m-d H:i:s', strtotime("+1 Hour"));

        $MAIL_BODY = '
            <h1>Welcome to UnknownUniverse</h1><br>
            <p>Please confirm your registration on UnknownUniverse using the link below:</p>
            <a href="' . $LINK . '">' . $LINK . '</a><br>
            <p>We wish fun playing!</p>
            <p>Best Regards UnknownUniverse - Team</p>
            <br>
            <br>
            <small>If you haven\'t registered this e-mail on univ3rse.com just ignore it.</small>
        ';

        $QUERY = $this->mysql->QUERY(
            'INSERT INTO server_verfiy (USER_ID, ACTIVATION_CODE, SEND_TO, SEND_DATE, TIMEOUT)
                  VALUES (?,?,?,?,?)',
            [$USER_ID, $CODE, $EMAIL, $DATE, $TIMEOUT]
        );

        if ($QUERY) {
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: UnknownUniverse <registration@univ3rse.com>' . "\r\n";
            return mail($EMAIL, "Welcome to UnknownUniverse - Confirm your E-Mail", $MAIL_BODY, $headers);
        } else {
            return false;
        }
    }

    /**
     * sendRecovery Function
     * sends E-Mail with an Link to recover account
     *
     * @param $USERNAME
     * @param $EMAIL
     *
     * @return bool
     *
     */
    public function sendRecovery($USERNAME, $EMAIL)
    {
        $User = $this->getUserInfoByUsername($USERNAME);
        if (isset($User[0])) {
            if ($User[0]['EMAIL'] != $EMAIL) {
                return false;
            }
        }

        //ONLY 1 MAIL PER HOUR
        $EMAILS = $this->mysql->QUERY('SELECT * FROM server_recovery WHERE USER_ID = ? AND SEND_TO = ? ORDER BY SEND_DATE DESC',
            [$User[0]['USER_ID'], $User[0]['EMAIL']]);
        if (isset($EMAILS[0])) {
            $TIMEOUT = new DateTime($EMAILS[0]['TIMEOUT']);
            if (new DateTime() < $TIMEOUT) {
                return true;
            }
        }

        //SEND REGISTRATION E-MAIl
        $CODE    = uniqid('UU' . $User[0]['USER_ID'], true);
        $LINK    = PROJECT_HTTP_ROOT . 'confirm.php?code=' . $CODE;
        $DATE    = date('Y-m-d H:i:s');
        $TIMEOUT = date('Y-m-d H:i:s', strtotime("+1 Hour"));

        $MAIL_BODY = '
            <h1>Recovery - UnknownUniverse</h1><br>
            <p>To recover your Account use this Link below:</p>
            <a href="' . $LINK . '">' . $LINK . '</a><br>
            <p>We wish fun playing!</p>
            <p>Best Regards UnknownUniverse - Team</p>
            <br>
            <br>
            <small>If you haven\'t asked for this e-mail on univ3rse.com just ignore it.</small>
        ';

        $QUERY = $this->mysql->QUERY(
            'INSERT INTO server_recovery (USER_ID, ACTIVATION_CODE, SEND_TO, SEND_DATE, TIMEOUT)
                  VALUES (?,?,?,?,?)',
            [$User[0]['USER_ID'], $CODE, $EMAIL, $DATE, $TIMEOUT]
        );

        if ($QUERY) {
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: UnknownUniverse <registration@univ3rse.com>' . "\r\n";
            return mail($EMAIL, "UnknownUniverse - Account Recovery", $MAIL_BODY, $headers);
        } else {
            return false;
        }
    }


    /**
     * verifyEmail Function
     * verify an user per send e-mail code
     *
     * @param $CODE
     *
     * @return bool
     *
     */
    public function verifyEmail($CODE)
    {
        $CODE_DATA = $this->mysql->QUERY('SELECT * FROM server_verfiy WHERE ACTIVATION_CODE = ?', [$CODE]);

        if (isset($CODE_DATA[0])) {
            $CODE_DATA = $CODE_DATA[0];
            return $this->mysql->QUERY('UPDATE users SET VERFIED = 1 WHERE USER_ID = ?', [$CODE_DATA['USER_ID']]);
        } else {
            $this->error_handler->throwError('verification_failed_invalid_code');
            return false;
        }
    }


    /**
     *  getUserInfo Function
     *  gets UserData over session_id() and User_ID
     *
     * @return array()
     *
     */
    public function getUserInfo()
    {
        $user = $this->mysql->QUERY('SELECT * FROM users WHERE SESSION_ID = ? AND USER_ID = ?',
            [session_id(), $_SESSION["USER_ID"]]);
        if (!$user) {
            return [];
        } else {
            return $user;
        }
    }

    /**
     * getUserInfoByUsername Function
     * gets UserData over $Username
     *
     * @return array
     */
    public function getUserInfoByUsername($Username)
    {
        $user = $this->mysql->QUERY("SELECT * FROM users WHERE USERNAME = ?", [$Username]);
        return $user;
    }

    /**
     * useInvitationCode Function
     * sets Invitation Code to used status
     *
     * @param $CODE
     *
     * @return array|bool|null
     */
    public function useInvitationCode($CODE)
    {
        return $this->mysql->QUERY('UPDATE server_invitations SET USED = 1 WHERE CODE = ?', [$CODE]);
    }

    /**
     *  Logout Function
     *  Destroys current Session == Logout
     *
     * @return bool
     *
     */
    public function Logout()
    {
        if ($this->isLoggedIn()) {
            try {
                $_SESSION = [];
                session_regenerate_id();
                session_destroy();
                return true;
            } catch (Exception $e) {
                return false;
            }

        }
        return false;
    }

    /**
     *  getUserIP Function
     *  used to get the IP of connected User
     *
     * @return string
     *
     */
    public function getUserIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function __($TEXT)
    {
        return $this->translation->translate($TEXT);
    }
}