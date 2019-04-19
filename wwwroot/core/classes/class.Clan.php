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

    public function foundClan($name, $tag, $desc)
    {
        if (strlen($tag) < 3 || strlen($tag) > 4) {
            return "Invalid clan tag";
        } else {
            if (strlen($name) < 5 || strlen($name) > 20) {
                return "Invalid clan name";
            }
        }

        $result = $this->mysql->QUERY("SELECT * FROM server_clans, server_clans_members WHERE TAG = ? || NAME = ? || USER_ID = ?",
                                      [
                                          $tag,
                                          $name,
                                          $this->User->__get('USER_ID'),
                                      ]
        );
        if (empty($result)) {
            return self::registerClan($name, $tag, $desc);
        } else {
            return "Clan name or tag exists";
        }
    }

    private function registerClan($name, $tag, $desc)
    {
        $n          = 1;
        $FACTION_ID = $this->User->__get('FACTION_ID');
        $USER_ID    = $this->User->__get('USER_ID');
        $PLAYER_ID  = $this->User->__get('PLAYER_ID');

        $this->mysql->QUERY("INSERT INTO server_clans (NAME,TAG,DESCRIPTION,FACTION,IS_ACCEPTING,CREATED) VALUES(?,?,?,?,?,?)",
                                   [
                                       $name,
                                       $tag,
                                       $desc,
                                       $FACTION_ID,
                                       $n,
                                       date('Y-m-d H:i:s'),
                                   ]
        );

        $clanData = $this->mysql->QUERY("SELECT * FROM server_clans WHERE NAME = ? AND TAG = ?",
            [
                $name,
                $tag,
            ]
        );

        $this->mysql->QUERY('INSERT INTO server_clans_members (CLAN_ID, USER_ID, PLAYER_ID, JOIN_DATE, ROLE) VALUES (?,?,?,?,?)',
                                    [
                                        $clanData[0]['ID'],
                                        $USER_ID,
                                        $PLAYER_ID,
                                        date('Y-m-d H:i:s'),
                                        5,
                                    ]
        );

        $this->mysql->QUERY(
            "UPDATE player_data SET CLAN_ID = ? WHERE USER_ID = ?",
            [
                $clanData[0]['ID'],
                $USER_ID,
            ]
        );

        return $clanData[0];
    }

    public function getClanByTag($tag)
    {
        return $this->mysql->QUERY("SELECT * FROM server_clans WHERE TAG = ?", [$tag]);

    }

    public function getClanById($id) {
        return $this->mysql->QUERY('SELECT * FROM server_clans WHERE ID = ?', [$id])[0];
    }

    public function getClanMembers($id) {
        return $this->mysql->QUERY('SELECT * FROM server_clans_members WHERE CLAN_ID = ?', [$id]);
    }

    public function getClanMemberStatistic($member) {
        return $this->mysql->QUERY('SELECT PLAYER_NAME, FACTION_ID, LVL, EXP, HONOR, RANK FROM player_data WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $member['USER_ID'],
                $member['PLAYER_ID'],
            ]
        )[0];
    }

    public function acceptMemberRequest($id) {
        $memberRequest = $this->mysql->QUERY('SELECT * FROM server_clans_members WHERE USER_ID = ?', [$id])[0];

        $this->mysql->QUERY('DELETE FROM server_clans_applications WHERE USER_ID = ?', [$id]);

        $this->mysql->QUERY('INSERT INTO server_clans_members (CLAN_ID, USER_ID, PLAYER_ID, JOIN_DATE, ROLE) VALUES (?,?,?,?,?)',
            [
                $memberRequest['ID'],
                $memberRequest['USER_ID'],
                $memberRequest['PLAYER_ID'],
                date('Y-m-d H:i:s'),
                1
            ]
        );
    }

    public function cancelMemberRequest($id) {
        $this->mysql->QUERY('DELETE FROM server_clans_applications WHERE USER_ID = ?', [$id]);
    }

    public function getJoinRequests($id) {
        return $this->mysql->QUERY('SELECT * FROM server_clans_applications WHERE CLAN_ID = ?', [$id]);
    }

    public function submitJoinRequest($id) {
        $this->mysql->QUERY('INSERT INTO server_clans_applications (USER_ID, PLAYER_ID, CLAN_ID, APPLY_DATE) VALUES (?, ?, ?, ?)',
            [
                $this->User->__get('USER_ID'),
                $this->User->__get('PLAYER_ID'),
                $id,
                date('Y-m-d H:i:s')
            ]);
    }

    public function getRequesterStatistics($request) {
        $stat = $this->mysql->QUERY('SELECT PLAYER_NAME, FACTION_ID, LVL, EXP, HONOR, RANK FROM player_data WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $request['USER_ID'],
                $request['PLAYER_ID'],
            ]
        )[0];
        $stat['APPLY_DATE'] = $request['APPLY_DATE'];
        return $stat;
    }
}
