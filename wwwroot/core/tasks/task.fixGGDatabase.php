<?php
include_once('../core.php');
include_once('../classes/system/class.MySQL.php');

use DB\MySQL;

$server_list = $System->mysql->QUERY('SELECT * FROM server_infos', []);

foreach ($server_list as $server) {
    if (!$server['OPEN']) {
        continue;
    }

    $server_mysql = new MySQL(MYSQL_IP, $server['DB_NAME'], MYSQL_USER, MYSQL_PW);

    //Calculating Ranking Points
    $player_list = $server_mysql->QUERY('SELECT * FROM player_data', []);

    foreach ($player_list as $player) {
        $playerGates = $server_mysql->QUERY('SELECT * FROM player_galaxy_gates WHERE USER_ID = ? AND PLAYER_ID = ?', [
           $player['USER_ID'],
           $player['PLAYER_ID']
        ])[0];

        echo $playerGates['COMPLETED_GATES'];

        $COMPLETED_GATES = json_decode($playerGates['COMPLETED_GATES']);
        array_push($COMPLETED_GATES, 0);

        $server_mysql->QUERY('UPDATE player_galaxy_gates SET COMPLETED_GATES = ? WHERE USER_ID = ? AND PLAYER_ID = ?', [
            json_encode($COMPLETED_GATES),
            $player['USER_ID'],
            $player['PLAYER_ID']
        ]);
    }

}