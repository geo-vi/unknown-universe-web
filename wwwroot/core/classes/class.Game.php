<?php

use DB\MySQL;

class Game
{
    /** @var  User */
    private $User;
    /** @var MySQL */
    private $mysql;

    function __construct($user)
    {
        $this->User = $user;
        $this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);
    }

    public function getEventRunning($day, $hour)
    {
        $event = $this->mysql->QUERY('SELECT * FROM server_events WHERE EVENT_DAY = ? AND EVENT_HOUR = ?',
            [$day, $hour]);
        if ($event == null || sizeof($event) == 0) {
            return 'NONE';
        }
        return $event[0]['NAME'];
    }

    public function getEventRunningNow() {
        return false;
    }
}
