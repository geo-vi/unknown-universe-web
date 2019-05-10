<?php
/*
 * This Script should get accessed via Cronjob only
 * Also should be executed every 12 / 24 hrs
 * Program: C:\xampp\php\php.exe
 * Arguments: -f "C:\xampp\htdocs\core\tasks\task.Ranking.php"
 * Start in "C:\xampp\htdocs\core\tasks"
 */

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
    $player_list = $server_mysql->QUERY('SELECT * FROM player_data WHERE `RANK` != 21', []);

    foreach ($player_list as $player) {
        $player_extra_data = $server_mysql->QUERY('SELECT * FROM player_extra_data WHERE USER_ID = ?  AND PLAYER_ID = ?',
                                                  [$player['USER_ID'], $player['PLAYER_ID']])[0];
        $player_ship       = $server_mysql->QUERY('SELECT SHIP_ID FROM player_hangar WHERE USER_ID = ? AND PLAYER_ID = ? AND ACTIVE = 1',
                                                  [$player['USER_ID'], $player['PLAYER_ID']])[0];
        $server_npcs_data  = $server_mysql->QUERY('SELECT ship_id, ship_hp FROM server_ships', []);
        $DaysSinceRegister = floor((time() - strtotime($player['REGISTERED'])) / (60 * 60 * 24));
        $npc_stats         = json_decode($player_extra_data['STATS'], true);
        $server_npcs       = [];
        $RankPoints        = 0;

        foreach ($server_npcs_data as $npc_data) {
            $server_npcs[$npc_data['ship_id']] = $npc_data;
        }

        $RankPoints += ($player['EXP'] / 100000);
        $RankPoints += ($player['HONOR'] / 100);
        $RankPoints += ($player['LVL'] * 100);
        $RankPoints += ($DaysSinceRegister * 6);
        // $RankPoints += ($player_ship['SHIP_ID'] * 1000);

        if (isset($npc_stats['KilledShipsDictionary'])) {
            foreach ($npc_stats['KilledShipsDictionary'] as $npc_id => $npc_kills) {
                $RankPoints += ($server_npcs[$npc_id]['ship_hp'] / 20) * $npc_kills;
            }
        }

        $server_mysql->QUERY('UPDATE player_data SET RANK_POINTS = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                             [$RankPoints, $player['USER_ID'], $player['PLAYER_ID']]);
    }

    //Creating Ranks for each Company
    for ($i = 1; $i <= 3; $i++) {
        $player_list = $server_mysql->QUERY('SELECT * FROM player_data WHERE FACTION_ID = ? AND `RANK` != 21 ORDER BY RANK_POINTS DESC',
                                            [$i]);
        $player_cnt  = count($player_list);

        $Rank1  = 1;
        $Rank2  = ceil(($player_cnt * 0.0001));
        $Rank3  = ceil(($player_cnt * 0.001));
        $Rank4  = ceil(($player_cnt * 0.005));
        $Rank5  = ceil(($player_cnt * 0.01));
        $Rank6  = ceil(($player_cnt * 0.015));
        $Rank7  = ceil(($player_cnt * 0.02));
        $Rank8  = ceil(($player_cnt * 0.025));
        $Rank9  = ceil(($player_cnt * 0.03));
        $Rank10 = ceil(($player_cnt * 0.035));
        $Rank11 = ceil(($player_cnt * 0.04));
        $Rank12 = ceil(($player_cnt * 0.045));
        $Rank13 = ceil(($player_cnt * 0.05));
        $Rank14 = ceil(($player_cnt * 0.06));
        $Rank15 = ceil(($player_cnt * 0.07));
        $Rank16 = ceil(($player_cnt * 0.08));
        $Rank17 = ceil(($player_cnt * 0.09));
        $Rank18 = ceil(($player_cnt * 0.1));
        $Rank19 = ceil(($player_cnt * 0.129));
        $Rank20 = ceil(($player_cnt * 0.2));

        $Rank1_cnt  = 0;
        $Rank2_cnt  = 0;
        $Rank3_cnt  = 0;
        $Rank4_cnt  = 0;
        $Rank5_cnt  = 0;
        $Rank6_cnt  = 0;
        $Rank7_cnt  = 0;
        $Rank8_cnt  = 0;
        $Rank9_cnt  = 0;
        $Rank10_cnt = 0;
        $Rank11_cnt = 0;
        $Rank12_cnt = 0;
        $Rank13_cnt = 0;
        $Rank14_cnt = 0;
        $Rank15_cnt = 0;
        $Rank16_cnt = 0;
        $Rank17_cnt = 0;
        $Rank18_cnt = 0;
        $Rank19_cnt = 0;
        $Rank20_cnt = 0;

        foreach ($player_list as $player) {
            if ($Rank1_cnt < $Rank1) {//Check if player cnt < max count for Rank
                $Rank1_cnt++;
                $Rank = 20;
            } elseif ($Rank2_cnt < $Rank2) {
                $Rank2_cnt++;
                $Rank = 19;
            } elseif ($Rank3_cnt < $Rank3) {
                $Rank3_cnt++;
                $Rank = 18;
            } elseif ($Rank4_cnt < $Rank4) {
                $Rank4_cnt++;
                $Rank = 17;
            } elseif ($Rank5_cnt < $Rank5) {
                $Rank5_cnt++;
                $Rank = 16;
            } elseif ($Rank6_cnt < $Rank6) {
                $Rank6_cnt++;
                $Rank = 15;
            } elseif ($Rank7_cnt < $Rank7) {
                $Rank7_cnt++;
                $Rank = 14;
            } elseif ($Rank8_cnt < $Rank8) {
                $Rank8_cnt++;
                $Rank = 13;
            } elseif ($Rank9_cnt < $Rank9) {
                $Rank9_cnt++;
                $Rank = 12;
            } elseif ($Rank10_cnt < $Rank10) {
                $Rank10_cnt++;
                $Rank = 11;
            } elseif ($Rank11_cnt < $Rank11) {
                $Rank11_cnt++;
                $Rank = 10;
            } elseif ($Rank12_cnt < $Rank12) {
                $Rank12_cnt++;
                $Rank = 9;
            } elseif ($Rank13_cnt < $Rank13) {
                $Rank13_cnt++;
                $Rank = 8;
            } elseif ($Rank14_cnt < $Rank14) {
                $Rank14_cnt++;
                $Rank = 7;
            } elseif ($Rank15_cnt < $Rank15) {
                $Rank15_cnt++;
                $Rank = 6;
            } elseif ($Rank16_cnt < $Rank16) {
                $Rank16_cnt++;
                $Rank = 5;
            } elseif ($Rank17_cnt < $Rank17) {
                $Rank17_cnt++;
                $Rank = 4;
            } elseif ($Rank18_cnt < $Rank18) {
                $Rank18_cnt++;
                $Rank = 3;
            } elseif ($Rank19_cnt < $Rank19) {
                $Rank19_cnt++;
                $Rank = 2;
            } elseif ($Rank20_cnt < $Rank20) {
                $Rank20_cnt++;
                $Rank = 1;
            }
            $server_mysql->QUERY('UPDATE player_data SET `RANK` = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                                 [$Rank, $player['USER_ID'], $player['PLAYER_ID']]);
        }
    }

    //Creating Top Rankings
    $player_list = $server_mysql->QUERY('SELECT * FROM player_data WHERE  `RANK` != 21 ORDER BY RANK_POINTS DESC', []);

    foreach ($player_list as $pos => $player) {
        $ranking = $pos + 1;
        $server_mysql->QUERY('UPDATE player_data SET RANKING = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                             [$ranking, $player['USER_ID'], $player['PLAYER_ID']]);
    }
}
