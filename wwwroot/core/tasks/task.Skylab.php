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

    //Calculating Skylab collectors
    $player_list = $server_mysql->QUERY('SELECT * FROM player_skylab', []);

    foreach ($player_list as $skylab) {
        $MODULES = json_decode($skylab['MODULES'], true);
        $ORES = json_decode($skylab['ORES']);

        foreach ($MODULES as $key => $module) {
            // if upgrade is found
            if (isset($module['UPGRADE'])) {
                if ($module['UPGRADE']['END'] <= time()) {
                    // finish upgrade
                    unset($MODULES[$key]['UPGRADE']);
                    $MODULES[$key]['LEVEL'] = $MODULES[$key]['LEVEL'] + 1;
                    if ($module['ACTIVE'] == 1)  {
                        $MODULES[$key]['ACTIVE'] = 0;
                    }
                }
            }

            //calculate ores production
            if ($module['PRODUCTION'] != null && $module['ACTIVE'] == 1) {
                $PRODUCTION = $module['PRODUCTION'] / 60;
                $robots = $MODULES[$key]['ROBOTS']['OWNED'];
                $efficiencyBoost = 1;
                foreach ($robots as $robotKey => $robot) {
                    if ($robot['END_TIME'] > time()) {
                        $efficiencyBoost += (intval($robot['EFFICIENCY']) * 0.01);
                    }
                    else {
                        unset($MODULES[$key]['ROBOTS']['OWNED'][$robotKey]);
                    }
                }
                $MODULES[$key]['ROBOTS']['OWNED'] = array_values($MODULES[$key]['ROBOTS']['OWNED']);

                switch ($key) {
                    case 'PROMETIUM_COLLECTOR':
                        if (($ORES[0] + $PRODUCTION) > $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][0]) {
                            $ORES[0] = $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][0];
                        }
                        else $ORES[0] += round($PRODUCTION * $efficiencyBoost);
                        break;
                    case 'ENDURIUM_COLLECTOR':
                        if (($ORES[1] + $PRODUCTION) > $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][1]) {
                            $ORES[1] = $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][1];
                        }
                        else $ORES[1] += round($PRODUCTION * $efficiencyBoost);
                        break;
                    case 'TERBIUM_COLLECTOR':
                        if (($ORES[2] + $PRODUCTION) > $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][2]) {
                            $ORES[2] = $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][2];
                        }
                        else $ORES[2] += round($PRODUCTION * $efficiencyBoost);
                        break;
                    case 'PROMETID_COLLECTOR':
                        if (($ORES[3] + $PRODUCTION) > $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][3]) {
                            $ORES[3] = $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][3];
                        }
                        else $ORES[3] += round($PRODUCTION);
                        break;
                    case 'DURANIUM_COLLECTOR':
                        if (($ORES[4] + $PRODUCTION) > $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][4]) {
                            $ORES[4] = $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][4];
                        }
                        else $ORES[4] += round($PRODUCTION);
                        break;
                    case 'PROMERIUM_COLLECTOR':
                        if (($ORES[6] + $PRODUCTION) > $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][6]) {
                            $ORES[6] = $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][6];
                        }
                        else $ORES[6] += round($PRODUCTION);
                        break;
                    case 'SEPROM_COLLECTOR':
                        if (($ORES[7] + $PRODUCTION) > $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][7]) {
                            $ORES[7] = $MODULES['STORAGE_MODULE']['MAX_CAPACITY'][7];
                        }
                        else $ORES[7] += round($PRODUCTION);
                        break;
                }
            }
        }

        $server_mysql->QUERY("UPDATE player_skylab SET MODULES = ?, ORES = ? WHERE USER_ID = ? AND PLAYER_ID = ?", [
            json_encode($MODULES),
            json_encode($ORES),
            $skylab['USER_ID'],
            $skylab['PLAYER_ID']
        ]);
    }
}