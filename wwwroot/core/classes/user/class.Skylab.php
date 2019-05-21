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
            ]
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
            ]
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
            "ACTIVE"    => 1,
            "LEVEL"     => 1,
            "ROBOTS"    => [
                "MAX"   => 12,
                "OWNED" => [
                    [
                        "TYPE"       =>  "URI_ROBOT",
                        "END_TIME"    =>  "2019-8-7 6:53PM",
                        "EFFICIENCY"    => "4%"
                    ],
                    [
                        "TYPE"       =>  "CRE_ROBOT",
                        "END_TIME"    =>  "2019-8-7 6:55PM",
                        "EFFICIENCY"    => "2%"
                    ],
                ],
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
            "LEVEL"     => 0,
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
            "LEVEL"     => 0,
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
        $allModules = $this->mysql->QUERY('SELECT * FROM server_skylab_modules');
        foreach ($allModules as $module) {
            $myModule = $this->MODULES[$module['TYPE']];
            if ($module['LEVEL'] == $myModule['LEVEL'])
            {
                $this->MODULES[$module['TYPE']]['POWER'] = $module['ENERGY'];
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
                    break;
                case 'SOLAR_MODULE':
                    array_push($this->POWER_LEVELS, $module['PRODUCTION']);
                    break;
            }
        }
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
            if ($module['LEVEL'] > 0) {
                $cons += $module['POWER'];
            }
        }
        return $cons;
    }

    function getConsumption($moduleType) {
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
}