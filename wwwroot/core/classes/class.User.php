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
            "SELECT player_ship_config.*, player_hangar.*, player_pet_config.*
                FROM player_hangar, player_ship_config, player_pet_config
                WHERE  player_hangar.USER_ID = ?
                AND player_hangar.ACTIVE = 1
                AND player_hangar.PLAYER_ID = ?
                AND player_ship_config.HANGAR_ID = player_hangar.ID
                AND player_ship_config.USER_ID = ?
                AND player_ship_config.PLAYER_ID = ?
                AND player_pet_config.USER_ID = ?
                AND player_pet_config.PLAYER_ID = ?",
            [
                $this->USER_ID,
                $this->PLAYER_ID,
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
     * create Function
     * creates a new user
     *
     * @return bool
     */
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
                ])
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
        return true;
    }

    /**
     * editUser Function
     * changes the selected user in the database
     *
     * @return bool
     */
    public function editUser($name, $rank, $lvl, $hon, $exp, $uri, $credits, $id)
    {
        $do = $this->mysql->QUERY('UPDATE player_data SET PLAYER_NAME = ?, RANK =?, LVL = ?,
                          HONOR = ?, EXP = ?, URIDIUM = ?, CREDITS = ? WHERE USER_ID = ?',
            [$name, $rank, $lvl, $hon, $exp, $uri, $credits, $id]);
        if($do){
            echo "<script>swal('Success!', 'Successfully edited player!', 'success')</script>";
            $MSG = 'Successfully updated userid '. $id;
            return self::addlog($MSG, LogType::ACP);
        } else {
            echo "<script>swal('Error!', 'Could not edit player!', 'error')</script>";
            $MSG = 'Could not edit player';
            return self::addlog($MSG, LogType::ACP);
        }
        return true;
    }

    /**
     * changeName Function
     * changes the selected user's name in the database
     *
     * @return bool
     */
    public function changeName($arg)
    {
        $name = $this->mysql->QUERY('UPDATE player_data SET PLAYER_NAME = ? WHERE USER_ID = ?', [$arg, $this->USER_ID]);
        if ($name) {
            $do = $this->mysql->QUERY('UPDATE server_clans_members SET PLAYER_NAME = ? WHERE PLAYER_ID = ?', [$arg, $this->USER_ID]);
            if ($do) {
                $MSG = 'Changed Name';
                return self::addlog($MSG, LogType::NORMAL);
            }
        }
    }

    /**
     * changePetName Function
     * changes the selected user's PET name in the database
     *
     * @return bool
     */
    public function changePetName($arg)
    {
        $do = $this->mysql->QUERY('UPDATE player_pet SET NAME = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
            [$arg, $this->USER_ID, $this->PLAYER_ID]);
        if ($do) {
            $MSG = 'Changed Pet Name';
            return self::addlog($MSG, LogType::NORMAL);
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
     * getProfilePic Function
     * used to get the ShipImage-Path by ship_lootid
     *
     * @param string $playerId
     *
     * @return string
     */
    public function getProfilePic($playerId)
    {
        $used = $this->mysql->QUERY('SELECT * FROM player_profile WHERE PLAYER_ID =  ? ', [$playerId]);
        if (empty($used[0]['AVATAR'])){
            print 'default.jpg';
        } else {
            print $used[0]['AVATAR'];
        }
    }

    /**
     * hasFaction Function
     * used to check if the user has a Faction
     *
     * @return bool
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
     * isAdmin Function
     * used to check if User is an Admin User
     *
     * @return bool
     */
    public function isAdmin()
    {
        $userRank = $this->mysql->QUERY("SELECT RANK FROM player_data WHERE PLAYER_ID = ? AND USER_ID = ?",
            [$this->PLAYER_ID, $this->USER_ID]);
        if ($userRank[0]['RANK'] == 21) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * hasPet Function
     * used to check if the User has a P.E.T
     *
     * @return bool
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
     * getPetName Function
     * returns the name of the User's P.E.T
     *
     * @return string
     */
    public function getPetName(){
        return $this->mysql->QUERY('SELECT * FROM player_pet WHERE USER_ID = ? AND PLAYER_ID = ?',
            [$this->USER_ID, $this->PLAYER_ID])[0]['NAME'];
    }

    /**
     * getPetLevel Function
     * returns the level of the User's P.E.T
     *
     * @return int
     */
    public function getPetLevel(){
        return $this->mysql->QUERY('SELECT * FROM player_pet WHERE USER_ID = ? AND PLAYER_ID = ?',
            [$this->USER_ID, $this->PLAYER_ID])[0]['LEVEL'];
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
     * hasFormation Function
     * used to check if the User has any drone formations
     *
     * @return bool
     */
    public function hasFormation($ItemID)
    {
        $formation = $this->mysql->QUERY('SELECT * FROM player_equipment WHERE PLAYER_ID = ? AND USER_ID = ? AND ITEM_ID = ?',
            [$this->PLAYER_ID, $this->USER_ID, $ItemID]);

        if (isset($formation[0])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * getDroneLevel Function
     * gets the level of the first drone the user has
     *
     * @return int
     */
    public function getDroneLevel(){
        return $this->mysql->QUERY('SELECT * FROM player_drones WHERE USER_ID = ? AND PLAYER_ID = ?',
            [$this->USER_ID, $this->PLAYER_ID])[0]['LEVEL'];
    }

    /**
     * getLevelProgress Function
     * used to get Percent of LEVEL Progress
     *
     * @return float|int
     */
    public function getLevelProgress()
    {
        $ExpNeed = $this->mysql->QUERY('SELECT * FROM server_levels_player WHERE ID = ?', [$this->LVL + 1])[0]['EXP'];

        return ($this->EXP / $ExpNeed) * 100;
    }

    /**
     * expToNextLevel Function
     *
     * prints out the formatted EXP required for the next level
     */
    public function expToNextLevel()
    {

        $level = $this->mysql->QUERY('SELECT EXP from server_levels_player WHERE ID = (? + 1)', [$this->LVL]);
        if($level)
        {
            $result = $level[0]['EXP'] - $this->EXP;
            print number_format($result, 0, ',', ',');
        }
    }


    // +--------------------------------------------------------+
    // + RANKING FUNCTIONS                                      +
    // +--------------------------------------------------------+
    public function getRankName()
    {
        $RankName = $this->mysql->QUERY('SELECT RANK_NAME FROM server_ranks WHERE ID = ?',
            [$this->RANK])[0]['RANK_NAME'];
        return $RankName;
    }

    public function getRanking()
    {
        $update = $this->mysql->QUERY("UPDATE player_data SET RANK_POINTS = (round(EXP / 100000, 2) +
        HONOR / 100 + LVL * 100 ) WHERE PLAYER_ID = (SELECT PLAYER_ID WHERE LVL >=1 )");
        return $update;
    }

    public function getNextRank()
    {
        $rank = $this->mysql->QUERY('SELECT  MIN(RANK_POINTS) as lowest FROM player_data
        WHERE RANK = ? + 1', [$this->RANK])[0]['lowest'];
        return $rank;
    }

    public function getRankBelowPT()
    {
        $rank = $this->mysql->QUERY('SELECT  MAX(RANK_POINTS) as highest FROM player_data
        WHERE RANK = ? + 1', [$this->RANK])[0]['highest'];
        return $rank;
    }

    public function getNextRankN()
    {
        $RankName = $this->mysql->QUERY('SELECT RANK_NAME FROM server_ranks WHERE ID = ? + 1',
            [$this->RANK])[0]['RANK_NAME'];
        return $RankName;
    }

    public function getRankBelow()
    {
        $RankName = $this->mysql->QUERY('SELECT RANK_NAME FROM server_ranks WHERE ID = ? - 1',
            [$this->RANK])[0]['RANK_NAME'];
        return $RankName;
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


    // +--------------------------------------------------------+
    // + MESSAGING FUNCTIONS                                    +
    // +--------------------------------------------------------+
    public function messages()
    {
        return $this->mysql->QUERY('SELECT * FROM player_messages WHERE USER_ID = ? ORDER BY ID DESC', [$this->USER_ID]);
    }

    public function outbox()
    {
        return $this->mysql->QUERY('SELECT * FROM player_messages WHERE SENDER = ? ORDER BY ID DESC', [$this->USER_ID]);
    }

    public function hasMessages()
    {
        $messages = $this->mysql->QUERY('SELECT * FROM player_messages WHERE USER_ID = ? AND NEW = 1',
            [$this->USER_ID]);
        if ($messages) {
            return count($messages);
        } else {
            return false;
        }
    }

    public function sendMessage($receiverId, $message, $title)
    {
        $this->mysql->QUERY("INSERT INTO player_messages (USER_ID,SENDER,DATE,NEW,HEADER,MESSAGE,TYPE) VALUES(?,?,?,1,?,?,1)",
            [$receiverId, $this->USER_ID, date('Y-m-d H:i:s'), $title, $message]);
        $MSG = 'Sent message';
        return self::addlog($MSG, LogType::NORMAL);
    }

    public function delMessage($arg)
    {
        $do = $this->mysql->QUERY('DELETE FROM player_messages WHERE ID = ? ', [$arg]);
        if($do)
        {
            echo "<script>swal('Success!', 'Deleted message!', 'success')</script>";
            $MSG = 'Deleted message';
            return self::addlog($MSG, LogType::NORMAL);
        }
    }

    public function markRead($arg)
    {
        return $this->mysql->QUERY('UPDATE player_messages SET NEW = 0  WHERE ID = ?', [$arg]);
    }

    public function messageInfo($arg)
    {
        return $this->mysql->QUERY('SELECT * FROM player_messages WHERE ID = ?', [$arg]);
    }

    public function massMessage($message)
    {
        $userid = $this->mysql->QUERY('SELECT USER_ID FROM player_data WHERE USER_ID >= 1');
        foreach($userid as $u => $send)
        {
            $this->mysql->QUERY('INSERT INTO player_messages(USER_ID, SENDER, DATE, NEW ,HEADER , MESSAGE, TYPE)
            VALUES (?,?,?,?,?,?,?)', [$send['USER_ID'], 1, DATE('Y-m-d H:i:s'), 1, 'Test', $message, 2]);

        }
        $MSG = 'Sent Mass Message';
        return self::addlog($MSG, LogType::ACP);
    }


    // +--------------------------------------------------------+
    // + INFORMATIONAL FUNCTIONS                                +
    // +--------------------------------------------------------+
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

    public function getID($arg)
    {
        return $this->mysql->QUERY('SELECT ID FROM player_data WHERE PLAYER_NAME = ?', [$arg]);
    }

    public function getUsers()
    {
        $userid = $this->mysql->QUERY('SELECT * FROM player_data WHERE USER_ID >= 1');
        return $userid;
    }

    public function userInfo()
    {
        $userinfo = $this->mysql->QUERY(
            'SELECT player_data.*, player_extra_data.*
                  FROM player_data, player_extra_data
                  WHERE player_data.USER_ID > 0
                   AND player_data.USER_ID = player_extra_data.USER_ID and player_data.CLAN_ID >= 0
                  ');
        return $userinfo;
    }

    public function getInfo($ID, $Type)
    {
        if($Type == 1) {
            $userinfo = $this->mysql->QUERY(
                'SELECT player_data.*, player_extra_data.*
                  FROM player_data, player_extra_data
                  WHERE player_data.USER_ID = ?
                  AND player_data.USER_ID = player_extra_data.USER_ID and player_data.CLAN_ID >= 0', [$ID]);
            return $userinfo;
        } elseif ($Type == 2){
            $userinfo = $this->mysql->QUERY(
                'SELECT player_data.*, player_extra_data.*
                  FROM player_data, player_extra_data
                  WHERE player_data.PLAYER_NAME = ? AND player_data.USER_ID = player_extra_data.USER_ID', [$ID]);
           return $userinfo;
        } elseif ($Type == 3){
            $userinfo = $this->mysql->QUERY(
                'SELECT player_data.*, player_extra_data.*
                  FROM player_data, player_extra_data
                  WHERE player_data.RANKING = ? AND player_data.USER_ID = player_extra_data.USER_ID', [$ID]);
            return $userinfo;
        } elseif ($Type == 4){
            $userinfo = $this->mysql->QUERY('SELECT * FROM player_data WHERE RANK = 21 ');
            return $userinfo;
        } elseif ($Type == 5){
            $userinfo = $this->mysql->QUERY(
                'SELECT player_data.*, player_extra_data.*
                  FROM player_data, player_extra_data
                  WHERE player_data.PLAYER_ID = ? AND player_data.USER_ID = player_extra_data.USER_ID', [$ID])[0];
            return $userinfo;
        }
    }

    public function clanName($id)
    {
        $clan = $this->mysql->QUERY('SELECT * FROM server_clans WHERE ID = ?', [$id]);
        return $clan[0]['NAME'];
    }


    // +--------------------------------------------------------+
    // + CODES & VOUCHERS FUNCTIONS                             +
    // +--------------------------------------------------------+
    public function getCodes()
    {
        $check = $this->mysql->QUERY('SELECT * FROM server_voucher_codes');
        return $check;
    }

    public function getUserCode($id)
    {
        $check = $this->mysql->QUERY('SELECT * FROM player_voucher_codes WHERE USER_ID = ? AND CODE_ID = ? ',
            [$this->USER_ID, $id]);
        return $check[0]['USED'];
    }

    public function sendMassCode($codeid)
    {
        $userid = $this->mysql->QUERY('SELECT * FROM player_data WHERE USER_ID >= 1');
        foreach($userid as $u => $send)
        {
            $LINK    = PROJECT_HTTP_ROOT . 'internalPayment';
            $MESSAGE_BODY = '
            Hello, '.$send['PLAYER_NAME'].'
            You have been given a free voucher code: '.$codeid.'
            <b><a href="' . $LINK . '">click here to go redeem it</a></b>
                  We wish you fun playing!
            Best Regards UnknownUniverse - Team
        ';
            $that = $this->mysql->QUERY('INSERT INTO player_messages(USER_ID, SENDER, DATE, NEW ,HEADER , MESSAGE, TYPE)
            VALUES (?,?,?,?,?,?,?)', [$send['USER_ID'], 1, DATE('Y-m-d H:i:s'), 1, $codeid, $MESSAGE_BODY, 2]);
        }

        $MSG = 'Sent voucher code ('.$codeid.') to all players';
        self::addlog($MSG, LogType::ACP);
        return true;
    }

    public function redeem($codeid, $userid)
    {
        Global $System;
        $check = $this->mysql->QUERY('SELECT AMOUNT, REWARD, ID FROM server_voucher_codes WHERE CODE = ?', [$codeid]);

        if(empty($check)){
            echo '<script>swal("Error!", "Code doesn\'t exist", "error");</script>';
            $Success = false;
            $MSG = 'Code does not exist. Code: ' .$codeid;
            return self::addlog($MSG, LogType::VOUCHER);
        } else {
            $amt = $check[0]['AMOUNT'];
            $reward = $check[0]['REWARD'];
            $r = $System->Shop->getItemInfo($reward);
            $name = $r['NAME'];
            $category = $r['CATEGORY'];
            if(!is_numeric($reward))
            {
                $category = $reward;
                $name = $reward;
            }

            switch($reward){
                case '27':
                $d = 'RSB_75';
                break;
                case '28':
                $d = 'UCB_100';
                break;
            }

            $check_user = $this->mysql->QUERY('SELECT * FROM player_voucher_codes WHERE USER_ID = ? AND CODE_ID = ?', [$userid, $codeid]);
            if(empty($check_user)){
                switch($category){
                    case 'notlisted':
                    case 'ammo':
                    $update = $this->mysql->QUERY("UPDATE player_ammo SET ".$d." = ".$d." + ? WHERE USER_ID = ?", [$amt, $this->USER_ID]);
                    break;
                    case 'laser':
                    $d = 0;
                    $update = $this->mysql->QUERY("INSERT INTO player_equipment (USER_ID, PLAYER_ID, ITEM_ID, ITEM_TYPE, ITEM_AMOUNT) VALUES(?,?,?,?,?)",
                    [$this->USER_ID, $this->PLAYER_ID, $reward, $d, $amt]);
                    break;
                    case 'uridium':
                    $update = $this->mysql->QUERY("UPDATE player_data SET URIDIUM = URIDIUM + ? WHERE USER_ID = ?", [$amt, $this->USER_ID]);
                    break;
                }
                 if($update)
                 {
                    $this->mysql->QUERY('INSERT INTO player_voucher_codes (USER_ID, CODE_ID, USED) VALUES (?, ? ,?)',
                    [$userid, $codeid, 1]);
                    echo "<script>swal('Success!', 'Redeemed code!', 'success')</script>";
                    $Success = true;
                    $MSG = 'Received ('.$amt . ') ' . $name . '. Code: '.$codeid;
                    return self::addlog($MSG, LogType::VOUCHER);
                 }
                 else
                 {
                    echo "<script>swal('Error!', 'Could not redeem code!', 'error')</script>";
                    $Success = false;
                    $MSG = 'Could not redeem code' .$name;
                    return self::addlog($MSG, LogType::VOUCHER);
                 }
            }else{
                echo "<script>swal('Error!', 'Already redeemed this code!', 'error')</script>";
                $Sucess = false;
                $MSG = 'Already Redeemed Code';
                return self::addlog($MSG, LogType::VOUCHER);
            }
        }
    }


    // +--------------------------------------------------------+
    // + LOGGING FUNCTIONS                                      +
    // +--------------------------------------------------------+
    public function getLogs($id, $type)
    {
        if($type == '0'){
            $logs = $this->mysql->QUERY('SELECT * FROM player_logs WHERE LOG_TYPE = ?', [$id]);
            return $logs;
        }elseif ($type == '1'){
            $logs = $this->mysql->QUERY('SELECT * FROM player_logs WHERE USER_ID = ?', [$id]);
            return $logs;
        }elseif ($type == '2'){
            $logs = $this->mysql->QUERY('SELECT * FROM player_logs WHERE PLAYER_ID = ?', [$id]);
            return $logs;
        }
    }

    private function addlog($MSG, $LogType = LogType::NORMAL)
    {
        $this->mysql->QUERY(
            'INSERT INTO player_logs (USER_ID, PLAYER_ID, LOG_TYPE, LOG_DESCRIPTION, LOG_DATE) VALUES (?, ?, ?, ?, ?)',
            [$this->USER_ID, $this->PLAYER_ID, $LogType, $MSG, date('Y-m-d H:i:s')]
        );
    }


    // +--------------------------------------------------------+
    // + GENERIC FUNCTIONS                                      +
    // +--------------------------------------------------------+
    public function banUser()
    {
        $ban = $this->mysql->QUERY("UPDATE player_data SET PLAYER_NAME = 'Banned' WHERE USER_ID = ? AND PLAYER_ID = ?",
            [$this->USER_ID, $this->PLAYER_ID]);
        return $ban;
    }

    public function getName($arg)
    {
       $do = $this->mysql->QUERY('SELECT * FROM player_data WHERE USER_ID = ?', [$arg]);
       return $do[0]['PLAYER_NAME'];
    }

    public function getShipName($id)
    {
        $ship = $this->mysql->QUERY('SELECT * FROM server_ships WHERE ship_id = ?', [$id]);
        return $ship[0]['name'];
    }

    public function getTopExp()
    {
        $userid = $this->mysql->QUERY('SELECT * FROM player_data WHERE USER_ID >= 1 AND RANK != 21 ORDER BY EXP DESC LIMIT 100');
        return $userid;
    }

    public function getTopHon()
    {
        $userid = $this->mysql->QUERY('SELECT * FROM player_data WHERE USER_ID >= 1 AND RANK != 21  ORDER BY HONOR DESC LIMIT 100');
        return $userid;
    }

    public function getTopUser()
    {
        $userid = $this->mysql->QUERY('SELECT * FROM player_data WHERE USER_ID >= 1 AND RANK != 21  ORDER BY RANK_POINTS DESC LIMIT 100');
        return $userid;
    }

    public function GRN($arg)
    {
        $RankName = $this->mysql->QUERY('SELECT RANK_NAME FROM server_ranks WHERE ID = ?',
            [$arg])[0]['RANK_NAME'];
        return $RankName;
    }

    public function getDeathsPvP($type)
    {
        /*
        DEATH CODE / TYPE
        0 / Player
        1 / NPC
        2 / Radiation
        3 / mine
        4 / misc
        5 / battlestation
        */

        $returnCount  = false;
        $deathResult = $this->mysql->QUERY("SELECT ID FROM player_deaths WHERE PLAYER_ID = ? AND DEATH_TYPE = ?", [$this->PLAYER_ID, $type]);

        if (count($deathResult) > 0) {
            return count($deathResult);
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
}