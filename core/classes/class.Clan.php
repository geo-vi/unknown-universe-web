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

    public function searchClan(string $string)
    {
        $string = '%' . $string . '%';
        return $this->mysql->QUERY("SELECT * FROM server_clans WHERE DESCRIPTION LIKE ? OR NAME LIKE ? OR TAG LIKE ?",
            [$string, $string, $string]);
    }

    private function getMyNewClan($tag)
    {
        $clan = $this->mysql->QUERY("SELECT * FROM server_clans WHERE TAG = ?", [$tag]);
        return $clan;
    }

    private function regMyClan($args)
    {
        $clan->mysql->QUERY('UPDATE player_data SET CLAN_ID = ? WHERE USER_ID = ?');
        $clan = $this->mysql->prepare($sqli);
        $clan->bindParam(1, $args[0]['ID'], PDO::PARAM_INT);
        $clan->bindParam(2, $this->user->USER_ID, PDO::PARAM_STR);
        if ($clan->execute()) {
            return true;
        }
    }

    private function regClan($args)
    {
        $n          = 1;
        $FACTION_ID = $this->User->FACTION_ID;
        $tag        = $args['clan_tag'];

        $New = $this->mysql->QUERY("INSERT INTO server_clans (NAME, LEADER,TAG,MEMBERS,FACTION,IS_ACCEPTING) VALUES(?,?,?,?,?,?)",
            [$args['clan_name'], $this->User->USER_ID, $args['clan_tag'], $this->User->USER_ID, $FACTION_ID, $n]);

        if ($New) {
            return self::getMyNewClan($tag);
        } else {
            echo $n;
        }

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
            [$args['clan_tag'], $args['clan_name'], $this->User->USER_ID]);
        if (empty($result)) {
            return self::regClan($args);
        } else {
            return "The clan name or tag already exists.";
        }
    }
}
