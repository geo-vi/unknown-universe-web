<?php

use DB\MySQL;

/**
 * Class Logging
 */
class Logging
{
    /** @var MySQL */
    private $mysql;

    /**
     * addLog Function
     * used to add a Log to player_logs
     *
     * @param     $USER_ID
     * @param     $PLAYER_ID
     * @param     $SERVER_DB
     * @param     $Description
     * @param int $LogType = LogType::NORMAL
     *
     */
    public function addLog($USER_ID, $PLAYER_ID, $SERVER_DB, $Description, $LogType = LogType::NORMAL)
    {

        $this->mysql = new MySQL(MYSQL_IP, $SERVER_DB, MYSQL_USER, MYSQL_PW);

        $this->mysql->QUERY(
            'INSERT INTO player_logs (USER_ID, PLAYER_ID, LOG_TYPE, LOG_DESCRIPTION, LOG_DATE) VALUES (?, ?, ?, ?, ?)',
            [$USER_ID, $PLAYER_ID, $LogType, $Description, date('Y-m-d H:i:s')]
        );

    }

    /**
     * getLogs Function
     * used to get player_logs by LogType
     *
     * @param        $USER_ID
     * @param        $PLAYER_ID
     * @param        $SERVER_DB
     * @param bool   $LogType = LogType::ALL
     * @param int    $Limit   = 10
     * @param string $Order   = 'DESC'
     *
     * @return array|bool|null
     *
     */
    public function getLogs($USER_ID, $PLAYER_ID, $SERVER_DB, $LogType = LogType::ALL, $Limit = 20, $Order = 'DESC')
    {

        $this->mysql = new MySQL(MYSQL_IP, $SERVER_DB, MYSQL_USER, MYSQL_PW);

        $SQL    = 'SELECT * FROM player_logs WHERE USER_ID = ? AND PLAYER_ID = ?';
        $VALUES = [$USER_ID, $PLAYER_ID];

        if ($LogType !== LogType::ALL) {
            $SQL .= ' AND LOG_TYPE = ?';
            array_push($VALUES, $LogType);
        }

        $SQL .= 'ORDER BY LOG_DATE ' . $Order . ' LIMIT ' . $Limit;

        $logs = $this->mysql->QUERY($SQL, $VALUES);

        return $logs;
    }

}

/**
 * Class LogType
 */
abstract class LogType
{
    const DEBUG   = 1;
    const SYSTEM  = 2;
    const NORMAL  = 3;
    const VOUCHER = 4;
    const ACP     = 5;
    consT CLAN    = 6;
    const ALL     = true;
}