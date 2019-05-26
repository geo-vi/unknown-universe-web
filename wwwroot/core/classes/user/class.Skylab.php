<?php


use DB\MySQL;

class Skylab
{
    /** @var User */
    private $user;
    /** @var MySQL */
    private $mysql;

    public $ORES = [0,0,0,0,0,0,0,0];

    public $STORAGE = [];

    private $POWER_LEVELS = [];

    public $MODULES = [
        "BASIC_MODULE"   => [
            "ACTIVE"    => -1,
            "LEVEL"     => 1,
            "ROBOTS"    => [],
            "POWER"     => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ],
        ],
        "STORAGE_MODULE"  => [
            "ACTIVE"    => -1,
            "LEVEL"     => 1,
            "ROBOTS"    => [],
            "POWER"     => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ],
            "MAX_CAPACITY" => []
        ],
        "SOLAR_MODULE"     => [
            "ACTIVE"    => -1,
            "LEVEL"     => 1,
            "POWER"     => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ]
        ],
        "TRANSPORT_MODULE"  => [
            "ACTIVE"    => -1,
            "LEVEL"     => 1,
            "POWER"     => 16,
        ],
        "PROMETIUM_COLLECTOR" => [
            "ACTIVE"    => 0,
            "LEVEL"     => 1,
            "ROBOTS"    => [
                "MAX"   => 12,
                "OWNED" => [],
            ],
            "POWER"         => 0,
            "PRODUCTION"    => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ]
        ],
        "ENDURIUM_COLLECTOR" => [
            "ACTIVE"    => 0,
            "LEVEL"     => 1,
            "ROBOTS"    => [
                "MAX"   => 12,
                "OWNED" => [],
            ],
            "POWER"     => 0,
            "PRODUCTION"    => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ]
        ],
        "TERBIUM_COLLECTOR" => [
            "ACTIVE"    => 0,
            "LEVEL"     => 1,
            "ROBOTS"    => [
                "MAX"   => 12,
                "OWNED" => [],
            ],
            "POWER"     => 0,
            "PRODUCTION"    => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ]
        ],
        "PROMETID_COLLECTOR" => [
            "ACTIVE"    => 0,
            "LEVEL"     => 0,
            "ROBOTS"    => [],
            "POWER"     => 0,
            "PRODUCTION"    => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ]
        ],
        "DURANIUM_COLLECTOR" => [
            "ACTIVE"    => 0,
            "LEVEL"     => 0,
            "ROBOTS"    => [],
            "POWER"     => 0,
            "PRODUCTION"    => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ]
        ],
        "XENOMIT_MODULE" => [
            "ACTIVE"    => 0,
            "LEVEL"     => 0,
            "ROBOTS"    => [],
            "POWER"     => 0,
            "PRODUCTION"    => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ]
        ],
        "PROMERIUM_COLLECTOR" => [
            "ACTIVE"    => 0,
            "LEVEL"     => 0,
            "ROBOTS"    => [],
            "POWER"     => 0,
            "PRODUCTION"    => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ]
        ],
        "SEPROM_COLLECTOR" => [
            "ACTIVE"    => 0,
            "LEVEL"     => 0,
            "ROBOTS"    => [],
            "POWER"     => 0,
            "PRODUCTION"    => 0,
            "COST"      => [
                "PET"       => 0,
                "CREDITS"   => 0,
                "URIDIUM"   => 0,
                "TIME"      => 0,
            ]
        ],
    ];

    public $ROBOT_CREDIT_COST = 250;

    public $ROBOT_URIDIUM_COST = 50;

    function __construct($user)
    {
        $this->user = $user;
        $this->mysql = $this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);
        $this->refresh();
    }

    function refresh() {
        $skylab = $this->mysql->QUERY('SELECT * FROM player_skylab WHERE USER_ID = ? AND PLAYER_ID = ?',[
            $this->user->__get('USER_ID'),
            $this->user->__get('PLAYER_ID')
        ])[0];

        if ($skylab['MODULES'] !== '') {
            $modules = json_decode($skylab['MODULES'], true);
            if ($modules != null) {
                $this->MODULES = $modules;
                foreach ($modules as $moduleKey => $myModule) {
                    if (isset($myModule['UPGRADE'])) {
                        if ($myModule['UPGRADE']['END'] <= time()) {
                            // finish upgrade
                            unset($this->MODULES[$moduleKey]['UPGRADE']);
                            $this->MODULES[$moduleKey]['LEVEL'] = $this->MODULES[$moduleKey]['LEVEL'] + 1;
                            if ($myModule['ACTIVE'] == 1)  {
                                $this->MODULES[$moduleKey]['ACTIVE'] = 0;
                            }
                        }
                    }
                }
            }
        }

        if ($skylab['ORES'] !== '') {
            $ores = json_decode($skylab['ORES'], true);
            if ($ores != null) {
                $this->ORES = $ores;
            }
        }

        $allModules = $this->mysql->QUERY('SELECT * FROM server_skylab_modules');
        foreach ($allModules as $module) {
            $myModule = $this->MODULES[$module['TYPE']];
            if ($module['LEVEL'] == $myModule['LEVEL'])
            {
                $this->MODULES[$module['TYPE']]['POWER'] = $module['ENERGY'];
                $this->MODULES[$module['TYPE']]['PRODUCTION'] = $module['PRODUCTION'];
            }
            if ($module['LEVEL'] == $myModule['LEVEL'] + 1){
                $this->MODULES[$module['TYPE']]['COST']['PET'] = $module['PET_COST'];
                $this->MODULES[$module['TYPE']]['COST']['CREDITS'] = $module['CREDITS'];
                $this->MODULES[$module['TYPE']]['COST']['URIDIUM'] = $module['URIDIUM'];
                $this->MODULES[$module['TYPE']]['COST']['TIME'] = $module['UPGRADE_TIME'];
            }

            switch ($module['TYPE']){
                case 'STORAGE_MODULE':
                    $storageArray = json_decode($module['STORAGE']);
                    $newArray = [$storageArray[0],$storageArray[0],$storageArray[0],$storageArray[1],$storageArray[1],$storageArray[2],$storageArray[2],$storageArray[3]];
                    array_push($this->STORAGE, $newArray);
                    $this->MODULES[$module['TYPE']]['MAX_CAPACITY'] = $this->STORAGE[$myModule['LEVEL'] - 1];
                    break;
                case 'SOLAR_MODULE':
                    array_push($this->POWER_LEVELS, $module['PRODUCTION']);
                    break;
            }
        }
        $this->save();
    }

    function save() {
        $moduleJson = json_encode($this->MODULES);
        $oresJson = json_encode($this->ORES);
        $this->mysql->QUERY('UPDATE player_skylab SET MODULES = ?, ORES = ? WHERE USER_ID = ? AND PLAYER_ID = ?', [
            $moduleJson,
            $oresJson,
            $this->user->__get('USER_ID'),
            $this->user->__get('PLAYER_ID')
        ]);
    }

    function getStorageLevel() {
        $storageLevel = $this->MODULES["STORAGE_MODULE"]["LEVEL"];
        return $storageLevel - 1;
    }

    function getOreCount($oreId) {
        return $this->ORES[$oreId];
    }

    function getOreMaxCapacity($oreId) {
        $level = $this->getStorageLevel();
        return $this->STORAGE[$level][$oreId];
    }

    function getOreCapacityProgress($oreId) {
        return $this->ORES[$oreId] / $this->getOreMaxCapacity($oreId);
    }

    function getSolarModuleMaxPower() {
        $solarModule = $this->MODULES['SOLAR_MODULE'];
        $level = intval($solarModule['LEVEL']) - 1;
        return $this->POWER_LEVELS[$level];
    }

    function getTotalPowerConsumption() {
        $cons = 0;
        foreach($this->MODULES as $module) {
            if ($module['LEVEL'] > 0 && ($module['ACTIVE'] == 1 || $module['ACTIVE'] == -1)) {
                $cons += $module['POWER'];
            }
        }
        return $cons;
    }

    function getConsumption($moduleType) {
        if ($this->MODULES[$moduleType]['ACTIVE'] == 0) {
            return 0;
        }
        $power = $this->MODULES[$moduleType]['POWER'];
        return $power;
    }

    function moduleExists($moduleType) {
        return $this->getModuleLevel($moduleType) > 0;
    }

    function getModuleLevel($moduleType) {
        $level = $this->MODULES[$moduleType]['LEVEL'];
        return $level;
    }

    function getModuleLevelProgress($moduleType) {
        $level = $this->MODULES[$moduleType]['LEVEL'];
        return ($level / 20) * 100;
    }

    function getProduction($moduleType) {
        $production = $this->MODULES[$moduleType]['PRODUCTION'];
        return $production;
    }

    function getRobots($moduleType) {
        $robots = $this->MODULES[$moduleType]['ROBOTS']['OWNED'];
        return $robots;
    }

    function getMaxRobots($moduleType) {
        $robots = $this->MODULES[$moduleType]['ROBOTS']['MAX'];
        return $robots;
    }

    function getPETCost($moduleType) {
        $cost = $this->MODULES[$moduleType]['COST']['PET'];
        return $cost;
    }

    function getCreditsCost($moduleType) {
        $cost = $this->MODULES[$moduleType]['COST']['CREDITS'];
        return $cost;
    }

    function getUridiumCost($moduleType) {
        $cost = $this->MODULES[$moduleType]['COST']['URIDIUM'];
        return $cost;
    }

    function getTimeCost($moduleType) {
        $cost = $this->MODULES[$moduleType]['COST']['TIME'];
        return $cost;
    }

    function getModuleActive($moduleType) {
        if ($this->MODULES[$moduleType]['LEVEL'] <= 0) return -1;
        $active = $this->MODULES[$moduleType]['ACTIVE'];
        return $active;
    }

    function getEfficiency($moduleType) {
        // 0 - 25 - 50 - 75 - 100
        return 0;
    }

    function getUpgradeTimeStart($moduleType) {
        if ($this->getIsUpgrading($moduleType)) {
            return $this->MODULES[$moduleType]['UPGRADE']['START'];
        }
        return 0;
    }

    function getUpgradeTimeEnd($moduleType) {
        if ($this->getIsUpgrading($moduleType)) {
            return $this->MODULES[$moduleType]['UPGRADE']['END'];
        }
        return 0;
    }

    function getIsUpgrading($moduleType) {
        $inArray = isset($this->MODULES[$moduleType]['UPGRADE']);
        return $inArray;
    }

    function buyRobot($moduleType, $robotID) {
        $timestamp = time();
        switch ($moduleType) {
            case "PROMETIUM_COLLECTOR":
            case "ENDURIUM_COLLECTOR":
            case "TERBIUM_COLLECTOR":
                if (sizeof($this->MODULES[$moduleType]['ROBOTS']['OWNED']) == $this->MODULES[$moduleType]['ROBOTS']['MAX']) {
                    return ['isError' => 1, 'msg' => 'Maximal amount of robots owned'];
                }
                switch ($robotID) {
                    case 1:
                        if ($this->tryTax(250, 0, 0, 0,0)) {
                            array_push($this->MODULES[$moduleType]['ROBOTS']['OWNED'], [
                                "TYPE"       =>  "CRE_ROBOT",
                                "END_TIME"    =>  strtotime('+4 hours'),
                                "EFFICIENCY"    => "2%"
                            ]);
                            $this->save();
                            return ['isError' => 0, 'msg' => 'Successfully bought a Credit robot'];
                        }
                        else {
                            return ['isError' => 1, 'msg' => 'Failed taxing.'];
                        }
                        break;
                    case 2:
                        if ($this->tryTax(0, 50, 0, 0,0)) {
                            array_push($this->MODULES[$moduleType]['ROBOTS']['OWNED'], [
                                "TYPE"       =>  "URI_ROBOT",
                                "END_TIME"    =>  strtotime('+4 hours'),
                                "EFFICIENCY"    => "4%"
                            ]);
                            $this->save();
                            return ['isError' => 0, 'msg' => 'Successfully bought an Uridium robot'];
                        }
                        else {
                            return ['isError' => 1, 'msg' => 'Failed taxing.'];
                        }
                        break;
                }
                break;
        }
        return ['isError' => 1, 'msg' => 'Failed purchasing robot, please try again later.'];
    }

    function tryUpgradeModule($moduleType, $instantBuild) {
        switch ($moduleType) {
            case "BASIC_MODULE":
            case "STORAGE_MODULE":
            case "SOLAR_MODULE":
            case "PROMETIUM_COLLECTOR":
            case "ENDURIUM_COLLECTOR":
            case "TERBIUM_COLLECTOR":
            case "PROMETID_COLLECTOR":
            case "DURANIUM_COLLECTOR":
            case "XENOMIT_MODULE":
            case "PROMERIUM_COLLECTOR":
            case "SEPROM_COLLECTOR":
                if ($this->getIsUpgrading($moduleType) || $this->getModuleLevel($moduleType) >= 20 || ($this->getModuleLevel($moduleType) + 1) > $this->getModuleLevel('BASIC_MODULE') && $moduleType != 'BASIC_MODULE') {
                    return ['isError' => 1, 'msg' => 'Cannot start upgrade.'];
                } else {
                    $buildCost = $this->MODULES[$moduleType]['COST'];
                    $time = date_create_from_format( 'H:i:s' , $buildCost['TIME']);
                    $end = time() + ($time->getTimestamp() - $timestamp = strtotime('today midnight'));
                    if (!$instantBuild) {
                        if ($this->tryTax($buildCost['CREDITS'], 0, $buildCost['PET'], $buildCost['PET'],
                            $buildCost['PET'])) {
                            $this->MODULES[$moduleType]['UPGRADE'] = [
                                "START" => time(),
                                "END"   => $end,
                            ];
                            $this->save();
                            return ['isError' => 0, 'msg' => 'Successfully started building.'];
                        } else {
                            return ['isError' => 1, 'msg' => 'Not enough resources to build.'];
                        }
                    } else {
                        if ($this->tryTax($buildCost['CREDITS'], $buildCost['URIDIUM'], $buildCost['PET'], $buildCost['PET'],
                            $buildCost['PET'])) {
                            array_push($this->MODULES[$moduleType], ['UPGRADE' => [
                                "START" => time(),
                                "END"   => time(),
                            ]]);
                            $this->save();
                            return ['isError' => 0, 'msg' => 'Started building module using Instant Build.'];
                        } else {
                            return ['isError' => 1, 'msg' => 'Not enough resources to build.'];
                        }
                    }
                    break;
                }
        }
        return ['isError' => 1, 'msg' => 'Failed starting upgrade, please try again later.'];
    }

    function tryTax($cre, $uri, $p, $e, $t) {
        $playerCredits = $this->user->__get('CREDITS');
        $playerUridium = $this->user->__get('URIDIUM');
        if ($cre <= $playerCredits && $uri <= $playerUridium && $this->ORES[0] >= $p
            && $this->ORES[1] >= $e && $this->ORES[2] >= $t) {
            $this->mysql->QUERY('UPDATE player_data SET CREDITS = CREDITS - ?, URIDIUM = URIDIUM - ? WHERE USER_ID = ? AND PLAYER_ID = ?', [
                $cre,
                $uri,
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID')
            ]);
            $this->ORES[0] -= $p;
            $this->ORES[1] -= $e;
            $this->ORES[2] -= $t;
            $this->save();
            return true;
        }
        return false;
    }

    function powerModule($moduleType) {
        if ($this->MODULES[$moduleType]['LEVEL'] <= 0) {
            return ['isError' => 1, 'msg' => 'Module not built'];
        }
        if ($this->MODULES[$moduleType]['ACTIVE'] == 0 && $this->MODULES[$moduleType]['POWER'] + $this->getTotalPowerConsumption() <= $this->getSolarModuleMaxPower()) {
            $this->MODULES[$moduleType]['ACTIVE'] = 1;
            $this->save();
            return ['isError' => 0, 'msg' => 'Module powered on.'];
        }
        else if ($this->MODULES[$moduleType]['ACTIVE'] == 1) {
            $this->MODULES[$moduleType]['ACTIVE'] = 0;
            $this->save();
            return ['isError' => 0, 'msg' => 'Module powered off.'];
        }
        return ['isError' => 1, 'msg' => 'Failed powering module.'];
    }
}