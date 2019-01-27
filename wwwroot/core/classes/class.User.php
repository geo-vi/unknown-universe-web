<?php

use DB\MySQL;

class User
{
    /** @var MySQL */
    private $mysql;

    protected $AccountData;
    protected $PlayerData;
    protected $PlayerExtraData;
    protected $ShipConfigData;

    /** @var Inventory */
    public $Inventory;

    /** @var  Hangars */
    public $Hangars;

    protected $SERVER_DB;

    /**
     * User constructor.
     *
     * @param $AccountData
     *
     */
    function __construct($mysql, $AccountData)
    {
        $this->mysql = $mysql;

        $this->AccountData = $AccountData;

        //GET DB_NAME FROM CURRENT SERVER
        $this->SERVER_DB = $this->mysql->QUERY("SELECT DB_NAME FROM server_infos WHERE SHORTCUT = ?",
            [$this->LAST_SERVER])[0]['DB_NAME'];
        $this->mysql     = new MySQL(MYSQL_IP, $this->SERVER_DB, MYSQL_USER, MYSQL_PW);

        //GET PLAYER_DATA , SHIP_CONFIG, PLAYER_EXTRA_DATA FROM CURRENT SERVER
        $PlayerData = $this->mysql->QUERY("SELECT SESSION_ID FROM player_data WHERE player_data.USER_ID = ?",
            [$this->USER_ID]);
        if (isset($PlayerData[0])) {
            $this->refresh();
        } else {
            $this->create();
        }
    }

    /**
     * refresh Function
     * refreshs all User Data
     */
    public function refresh()
    {

        //REFRESH player_data
        $PlayerData       = $this->mysql->QUERY("SELECT * FROM player_data WHERE player_data.USER_ID = ?",
            [$this->USER_ID]);
        $this->PlayerData = $PlayerData[0];

        $this->mysql->QUERY("UPDATE player_data SET SESSION_ID = ? WHERE  USER_ID = ?",
            [$this->SESSION_ID, $this->USER_ID]);
        //GET DATA FROM SHIP CONFIG
        $ShipConfigData       = $this->mysql->QUERY(
            "SELECT player_ship_config.*, player_hangar.ID 
                      FROM player_hangar, player_ship_config 
                      WHERE  player_hangar.USER_ID = ? 
                      AND player_hangar.ACTIVE = 1 
                      AND player_hangar.PLAYER_ID = ? 
                      AND player_ship_config.HANGAR_ID = player_hangar.ID 
                      AND player_ship_config.USER_ID = ? 
                      AND player_ship_config.PLAYER_ID = ?",
            [
                $this->USER_ID,
                $this->PLAYER_ID,
                $this->USER_ID,
                $this->PLAYER_ID,
            ]
        )[0];
        $this->ShipConfigData = $ShipConfigData;

        //GET ALL USER EXTRA DATA
        $PlayerExtraData       = $this->mysql->QUERY(
            "SELECT * FROM player_extra_data 
                      WHERE  USER_ID = ? 
                      AND PLAYER_ID = ?",
            [
                $this->USER_ID,
                $this->PLAYER_ID,
            ]
        )[0];
        $this->PlayerExtraData = $PlayerExtraData;
    }

    /**
     * Magic getter
     *
     * @param $property
     *
     * @return mixed
     *
     */
    function __get($property)
    {
        if (isset($this->$property)) {
            return $this->$property;
        } elseif (isset($this->AccountData[$property])) {
            return $this->AccountData[$property];
        } elseif (isset($this->PlayerData[$property])) {
            return $this->PlayerData[$property];
        } elseif (isset($this->PlayerExtraData[$property])) {
            return $this->PlayerExtraData[$property];
        } else {
            return $this->ShipConfigData[$property];
        }
    }

    /**
     * getShipImage Function
     * used to get the ShipImage-Path by ship_lootid
     *
     * @param string $Design
     *
     * @return string
     */
    public function getShipImage($Design = "")
    {
        if ($Design == "") {
            $Design = $this->Hangars->CURRENT_HANGAR->SHIP_DESIGN;
        }
        $loot_id = $this->mysql->QUERY("SELECT ship_lootid FROM server_ships WHERE ship_id = ?",
            [$Design])[0]['ship_lootid'];
        if ($loot_id == 'ship_aegis' || $loot_id == 'ship_citadel' || $loot_id == 'ship_spearhead') {
            $loot_id .= '-' . $this->getFactionName();
        }
        return Utils::getPathByLootId($loot_id);
    }

    /**
     * hasFaction Function
     * used to check if the user has a Faction
     *
     * @return bool
     *
     */
    public function hasFaction()
    {
        if ($this->FACTION_ID == 0) {
            return false;
        } else {
            return true;
        }
    }


    /**
     * setFaction Function
     *
     * @param $FactionID
     *
     * @return array|bool|null
     */
    public function setFaction($FactionID)
    {
        if ($this->FACTION_ID == 0) {
            if ($FactionID === 1 || $FactionID === 2 || $FactionID === 3) {
                return $this->mysql->QUERY('UPDATE player_data SET FACTION_ID = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                    [$FactionID, $this->USER_ID, $this->PLAYER_ID]);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * getFactionName Function
     * used to get the FactionName by FactionID
     *
     * @param int $FactionId
     *
     * @return string
     *
     */
    public function getFactionName($FactionId = 0)
    {
        if (!$FactionId) {
            $FactionId = $this->FACTION_ID;
        }

        switch ($FactionId) {
            case 1:
                return "mmo";
            case 2:
                return "eic";
            case 3:
                return "vru";
            default:
                return "";
        }
    }

    /**
     * hasPremium Function
     * used to check if User is Premium User
     *
     * @return bool
     *
     */
    public function hasPremium()
    {
        $Today       = time();
        $PremiumDate = strtotime($this->PREMIUM_UNTIL);
        $Premium     = (bool)$this->PREMIUM;

        if ($PremiumDate < $Today) {
            if ($Premium) {
                $this->mysql->QUERY('UPDATE player_data SET PREMIUM = 0 WHERE USER_ID = ? AND PLAYER_ID = ?',
                    [$this->USER_ID, $this->PLAYER_ID]);
                return false;
            } else {
                return false;
            }
        } else {
            return $Premium;
        }
    }

    /**
     * hasPet Function
     * used to check if the User has a P.E.T
     *
     * @return bool
     *
     */
    public function hasPet()
    {
        $pet = $this->mysql->QUERY('SELECT * FROM player_pet WHERE PLAYER_ID = ? AND USER_ID = ?',
            [$this->PLAYER_ID, $this->USER_ID]);

        if (isset($pet[0])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * hasDrones Function
     * used to check if the User has drones
     *
     * @param bool $returnCount
     * @param bool $splitTypes
     *
     * @return array|bool|int
     */
    public function hasDrones($returnCount = false, $splitTypes = false)
    {
        if ($returnCount && $splitTypes) {
            $droneFlax = $this->mysql->QUERY("SELECT ID FROM player_drones WHERE USER_ID = ? AND PLAYER_ID = ? AND DRONE_TYPE = 0",
                [$this->USER_ID, $this->PLAYER_ID]);
            $droneIris = $this->mysql->QUERY("SELECT ID FROM player_drones WHERE USER_ID = ? AND PLAYER_ID = ? AND DRONE_TYPE = 1",
                [$this->USER_ID, $this->PLAYER_ID]);
            $droneApis = $this->mysql->QUERY("SELECT ID FROM player_drones WHERE USER_ID = ? AND PLAYER_ID = ? AND DRONE_TYPE = 2",
                [$this->USER_ID, $this->PLAYER_ID]);
            $droneZeus = $this->mysql->QUERY("SELECT ID FROM player_drones WHERE USER_ID = ? AND PLAYER_ID = ? AND DRONE_TYPE = 3",
                [$this->USER_ID, $this->PLAYER_ID]);
            $result    = [
                "Iris" => count($droneIris),
                "Flax" => count($droneFlax),
                "Apis" => count($droneApis),
                "Zeus" => count($droneZeus),
            ];
            return $result;
        } else {
            $droneResult = $this->mysql->QUERY("SELECT ID, DRONE_TYPE FROM player_drones WHERE USER_ID = ? AND PLAYER_ID = ?",
                [$this->USER_ID, $this->PLAYER_ID]);
        }

        if (count($droneResult) > 0) {
            if ($returnCount) {
                return count($droneResult);
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * getLevelProgress Function
     * used to get Percent of LEVEL Progress
     *
     * @return float|int
     *
     */
    public function getLevelProgress()
    {
        $ExpNeed = $this->mysql->QUERY('SELECT * FROM server_levels_player WHERE ID = ?', [$this->LVL + 1])[0]['EXP'];

        return ($this->EXP / $ExpNeed) * 100;
    }

    /**
     * getRankName Function
     * returns the Name of the current rank
     *
     * @return string
     */
    public function getRankName()
    {
        $RankName = $this->mysql->QUERY('SELECT RANK_NAME FROM server_ranks WHERE ID = ?',
            [$this->RANK])[0]['RANK_NAME'];
        return $RankName;
    }

    public function create()
    {
        if ($this->USER_ID == $_SESSION["USER_ID"]) {
            $server_config = $this->mysql->QUERY("SELECT * FROM server_config")[0];

            if (
            $this->mysql->QUERY(
                "INSERT INTO player_data (USER_ID,PLAYER_NAME,URIDIUM,CREDITS,REGISTERED,RANKING) 
                      VALUES(?,?,?,?,?,?)",
                [
                    $this->USER_ID,
                    $this->USERNAME,
                    $server_config["DEFAULT_URI"],
                    $server_config["DEFAULT_CREDITS"],
                    date('Y-m-d H:i:s'),
                    99999,
                ]
            )
            ) {

                //GET PLAYER_DATA
                $PlayerData = $this->mysql->QUERY("SELECT * FROM player_data WHERE player_data.USER_ID = ?",
                    [$this->USER_ID]);
                if (isset($PlayerData[0])) {
                    $this->PlayerData = $PlayerData[0];
                }

                //GET DEFAULT_SHIP_INFOS
                $default_ship = $this->mysql->QUERY("SELECT * FROM server_ships WHERE ship_id =  ?",
                    [$server_config["DEFAULT_SHIP"]])[0];

                // INSERT Hangar Data
                $this->mysql->QUERY(
                    "INSERT INTO player_hangar (USER_ID,PLAYER_ID,ACTIVE,SHIP_ID,SHIP_DESIGN,SHIP_HP)
                          VALUES(?,?,?,?,?,?)",
                    [
                        $this->USER_ID,
                        $this->PLAYER_ID,
                        1,
                        $default_ship["ship_id"],
                        $default_ship["ship_id"],
                        $default_ship["ship_hp"],
                    ]
                );

                // GIVE DEFAULT ITEMS TO USER
                $default_json = $server_config["DEFAULT_ITEMS"];
                $items        = json_decode($default_json);

                foreach ($items->items as $item) {
                    $item_info = $this->mysql->QUERY("SELECT * FROM server_items WHERE ID = ?", [$item->ID])[0];
                    for ($i = 1; $i <= $item->Q; $i++) {
                        $this->mysql->QUERY(
                            "INSERT INTO player_equipment (USER_ID,PLAYER_ID,ITEM_ID,ITEM_TYPE,ITEM_LVL) VALUES(?,?,?,?,?)",
                            [
                                $this->USER_ID,
                                $this->PLAYER_ID,
                                $item->ID,
                                $item_info["TYPE"],
                                $item->LVL,
                            ]
                        );
                    }
                }

                //GIVE DEFAULT AMMO
                $this->mysql->QUERY("INSERT INTO player_ammo (USER_ID,PLAYER_ID) VALUES(?,?)",
                    [$this->USER_ID, $this->PLAYER_ID]);
                $default_ammo_json = $server_config["DEFAULT_AMMO"];
                $ammoTypes         = json_decode($default_ammo_json);

                foreach ($ammoTypes->ammo as $ammo) {
                    $Selector = $ammo->NAME;
                    $Ammount  = $ammo->Q;
                    $this->mysql->QUERY("UPDATE player_ammo SET " . $Selector . " =  ? WHERE USER_ID = ? AND PLAYER_ID = ?",
                        [
                            $Ammount,
                            $this->USER_ID,
                            $this->PLAYER_ID,
                        ]
                    );
                }

                //INSERT player_extra_data
                $this->mysql->QUERY("INSERT INTO player_extra_data (USER_ID,PLAYER_ID) VALUES(?,?)",
                    [$this->USER_ID, $this->PLAYER_ID]);

                //INSERT player_ship_config
                $hangarID = $this->mysql->QUERY("SELECT ID FROM player_hangar WHERE USER_ID = ? AND PLAYER_ID = ? AND ACTIVE = 1",
                    [$this->USER_ID, $this->PLAYER_ID])[0];
                $this->mysql->QUERY("INSERT INTO player_ship_config (USER_ID,PLAYER_ID,HANGAR_ID) VALUES(?,?,?)",
                    [$this->USER_ID, $this->PLAYER_ID, $hangarID["ID"]]);

                //INSERT player_queststats
                $this->mysql->QUERY("INSERT INTO player_queststats (USER_ID,PLAYER_ID) VALUES(?,?)",
                    [$this->USER_ID, $this->PLAYER_ID]);

                //INSERT player_skill_tree
                $this->mysql->QUERY("INSERT INTO player_skill_tree(USER_ID,PLAYER_ID) VALUES(?,?)",
                    [$this->USER_ID, $this->PLAYER_ID]);

                $this->refresh();
            }

        } else {
            return false;
        }
        return false;
    }

    public function createRankingList()
    {
        $playerRanking = $this->mysql->QUERY('SELECT PLAYER_NAME, RANK_POINTS, RANK, FACTION_ID FROM player_data WHERE RANK != 21 ORDER BY RANKING LIMIT 100');

        foreach ($playerRanking as $pos => $player) {
            echo '<div class="pilot-entry"><span>';
            echo $pos + 1;
            echo '. ' . $player['PLAYER_NAME'] . '
                 <img src="' . PROJECT_HTTP_ROOT . 'resources/images/factions/logo_' . $this->getFactionName($player['FACTION_ID']) . '_mini.png">
                 <span class="pull-right">' . number_format($player['RANK_POINTS'], 0, '.', '.') . '</span>
                 <img class="pull-right ranking-icon" src="' . PROJECT_HTTP_ROOT . '/do_img/global/ranks/rank_' . $player['RANK'] . '.gif">';
            echo '</span></div>';
        }
    }


    public function fixDB()
    {
        $server_items = $this->mysql->QUERY('SELECT * FROM server_items');
        foreach ($server_items as $item) {
            $this->mysql->QUERY('UPDATE player_equipment SET ITEM_TYPE = ? WHERE ITEM_ID = ?',
                [$item['TYPE'], $item['ID']]);
        }
    }

    public function getTitle()
    {
        if ($this->TITLE_ID == 0) {
            return "";
        }
        $title = $this->mysql->QUERY('SELECT TITLE_NAME FROM server_titles WHERE ID = ?',
            [$this->TITLE_ID])[0]['TITLE_NAME'];
        return $title;
    }

    public function getTitleColor()
    {
        if ($this->TITLE_ID == 0) {
            return "#fff";
        }
        $titleColor = $this->mysql->QUERY('SELECT TITLE_COLOR_HEX FROM server_titles WHERE ID = ?',
            [$this->TITLE_ID])[0]['TITLE_COLOR_HEX'];
        return $titleColor;
    }

}