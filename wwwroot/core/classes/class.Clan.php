<?php

namespace clan;

use DB\MySQL;
use User;

class Clan
{
    /** @var  User */
    private $User;
    /** @var MySQL */
    private $mysql;

    function __construct($user)
    {
        $this->User  = $user;
        $this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);
    }

    public function getClans($limit = 50)
    {
        return $this->mysql->QUERY("SELECT * FROM server_clans LIMIT " . $limit);
    }

    public function searchClan($string)
    {
        $string = '%' . $string . '%';

        return $this->mysql->QUERY("SELECT * FROM server_clans WHERE DESCRIPTION LIKE ? OR NAME LIKE ? OR TAG LIKE ?",
                                   [
                                       $string,
                                       $string,
                                       $string,
                                   ]
        );
    }

    public function foundClan($args)
    {
        $clanTag  = $args['clan_tag'];
        $clanName = $args['clan_name'];
        if (strlen($clanTag) < 3 || strlen($clanTag) > 4) {
            return "Invalid clan tag";
        } else {
            if (strlen($clanName) < 5 || strlen($clanName) > 20) {
                return "Invalid clan name";
            }
        }

        $result = $this->mysql->QUERY("SELECT * FROM server_clans WHERE TAG = ? || NAME = ? || LEADER = ?",
                                      [
                                          $args['clan_tag'],
                                          $args['clan_name'],
                                          $this->User->__get('USER_ID'),
                                      ]
        );
        if (empty($result)) {
            return self::registerClan($args);
        } else {
            return "The clan name or tag already exists.";
        }
    }

    private function registerClan($args)
    {
        $n          = 1;
        $FACTION_ID = $this->User->__get('FACTION_ID');
        $USER_ID    = $this->User->__get('USER_ID');
        $tag        = $args['clan_tag'];

        $New = $this->mysql->QUERY("INSERT INTO server_clans (NAME,LEADER,TAG,MEMBERS,FACTION,IS_ACCEPTING,CREATED) VALUES(?,?,?,?,?,?,?)",
                                   [
                                       $args['clan_name'],
                                       $USER_ID,
                                       $args['clan_tag'],
                                       $USER_ID,
                                       $FACTION_ID,
                                       $n,
                                       date('Y-m-d H:i:s'),
                                   ]
        );

        if ($New) {
            return self::getClanByTag($tag);
        } else {
            return false;
        }

    }

    private function getClanByTag($tag)
    {
        return $this->mysql->QUERY("SELECT * FROM server_clans WHERE TAG = ?", [$tag]);

    }
}
