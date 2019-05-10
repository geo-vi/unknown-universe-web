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
        $server_mysql->QUERY('INSERT INTO player_galaxy_gates (USER_ID, PLAYER_ID) VALUES (?, ?)', [
           $player['USER_ID'],
           $player['PLAYER_ID']
        ]);
    }

}