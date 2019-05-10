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
            return -1;
        } else {
            if (strlen($name) < 5 || strlen($name) > 20) {
                return -2;
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
            return -3;
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

        return 1;
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
        $MemberStatistics = $this->mysql->QUERY('SELECT USER_ID, PLAYER_ID, PLAYER_NAME, FACTION_ID, LVL, EXP, HONOR, RANK FROM player_data WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $member['USER_ID'],
                $member['PLAYER_ID'],
            ]
        )[0];
        $rankName = $this->mysql->QUERY('SELECT RANK_NAME FROM server_ranks WHERE ID = ?',
            [
                $MemberStatistics['RANK'],
            ]
        )[0]['RANK_NAME'];
        $MemberStatistics['RANK_NAME'] = $rankName;
        return $MemberStatistics;
    }

    public function acceptMemberRequest($userId) {
        $CLAN_ID = $this->User->__get('CLAN_ID');

        $memberRequest = $this->mysql->QUERY('SELECT * FROM server_clans_applications WHERE USER_ID = ? AND CLAN_ID = ?', [$userId, $CLAN_ID])[0];

        $this->mysql->QUERY('INSERT INTO server_clans_members (CLAN_ID, USER_ID, PLAYER_ID, JOIN_DATE, ROLE) VALUES (?,?,?,?,?)',
            [
                $memberRequest['CLAN_ID'],
                $memberRequest['USER_ID'],
                $memberRequest['PLAYER_ID'],
                date('Y-m-d H:i:s'),
                1
            ]
        );

        $this->mysql->QUERY("UPDATE player_data SET CLAN_ID = ? WHERE USER_ID = ? AND PLAYER_ID = ?",
            [
               $memberRequest['CLAN_ID'],
               $memberRequest['USER_ID'],
               $memberRequest['PLAYER_ID']
            ]
        );

        $this->mysql->QUERY('DELETE FROM server_clans_applications WHERE USER_ID = ?', [$userId]);
    }

    public function cancelMemberRequest($userId) {
        $clanId = $this->User->__get('CLAN_ID');
        $this->mysql->QUERY('DELETE FROM server_clans_applications WHERE USER_ID = ? AND CLAN_ID = ?', [$userId, $clanId]);
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
        $stat = $this->mysql->QUERY('SELECT USER_ID, PLAYER_ID, PLAYER_NAME, FACTION_ID, LVL, EXP, HONOR, RANK FROM player_data WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $request['USER_ID'],
                $request['PLAYER_ID'],
            ]
        )[0];
        $stat['APPLY_DATE'] = $request['APPLY_DATE'];
        return $stat;
    }

    public function getMyJoinRequests() {
        return $this->mysql->QUERY('SELECT * FROM server_clans_applications WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $this->User->__get('USER_ID'),
                $this->User->__get('PLAYER_ID')
            ]);
    }

    public function memberIsLeader($userId) {
        $QUERY = $this->mysql->QUERY('SELECT ROLE FROM server_clans_members WHERE USER_ID = ?', [$userId])[0];
        if ($QUERY['ROLE'] == '5')
            return true;
        return false;
    }

    public function setLeader($userId) {
        $this->mysql->QUERY('UPDATE server_clans_members SET ROLE = ? WHERE USER_ID = ?', [
            5,
            $userId,
        ]);
    }

    public function getLeader($clanId) {
        $clanMember = $this->mysql->QUERY('SELECT * FROM server_clans_members WHERE ROLE = 5 AND CLAN_ID = ?',
            [$clanId])[0];
        return $this->mysql->QUERY('SELECT * FROM player_data WHERE USER_ID = ? AND PLAYER_ID = ?', [
            $clanMember['USER_ID'],
            $clanMember['PLAYER_ID'],
        ])[0];
    }

    public function kick($userId) {
        $this->mysql->QUERY('DELETE FROM server_clans_members WHERE USER_ID = ?', [
            $userId,
        ]);

        $this->mysql->QUERY("UPDATE player_data SET CLAN_ID = ? WHERE USER_ID = ?",
            [
                0,
                $userId,
            ]
        );
    }

    public function leave() {
        $CLAN_ID = $this->User->__get('CLAN_ID');
        if ($this->memberIsLeader($this->User->__get('USER_ID'))) {
            $members = $this->getClanMembers($CLAN_ID);
            if (count($members) > 1) {
                $leaders = $this->mysql->QUERY('SELECT * FROM server_clans_members WHERE CLAN_ID = ? AND RANK = 5', [$CLAN_ID]);
                if (count($leaders) <= 1) {
                    $firstMember = $this->mysql->QUERY('SELECT * FROM server_clans_members WHERE CLAN_ID = ? AND USER_ID != ?',[
                        $CLAN_ID,
                        $this->User->__get('USER_ID'),
                    ])[0];
                    $this->setLeader($firstMember['USER_ID']);
                    $this->kick($this->User->__get('USER_ID'));
                } else {
                    $this->kick($this->User->__get('USER_ID'));
                }
            }
            else {
                $this->deleteClan();
            }
        }
        else {
            $this->kick($this->User->__get('USER_ID'));
        }
    }

    public function deleteClan() {
        $CLAN_ID = $this->User->__get('CLAN_ID');
        $members = $this->getClanMembers($CLAN_ID);
        foreach ($members as $member) {
            $this->kick($member['USER_ID']);
        }

        $this->mysql->QUERY('DELETE FROM server_clans WHERE ID = ?', [$CLAN_ID]);
        $this->mysql->QUERY('DELETE FROM server_clans_members WHERE CLAN_ID = ?', [$CLAN_ID]);
        $this->mysql->QUERY('DELETE FROM server_clans_applications WHERE CLAN_ID = ?', [$CLAN_ID]);
        $this->mysql->QUERY('DELETE FROM server_clans_diplomacy WHERE CLAN_ID = ? OR TARGET_CLAN_ID = ?', [$CLAN_ID, $CLAN_ID]);
    }

    public function demote($userId, $newRank) {
        $this->mysql->QUERY('UPDATE server_clans_members SET ROLE = ? WHERE USER_ID = ?', [
            $newRank,
            $userId,
        ]);
    }
}
