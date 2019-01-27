<?php

use DB\MySQL;
use inventory\item;

class Inventory
{
    /** @var User */
    private $user;
    /** @var MySQL */
    private $mysql;

    function __construct($user)
    {
        $this->user  = $user;
        $this->mysql = $this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);
    }

    public function getInventory()
    {
        /*
         * @var $JSON
         * Structure used by the equipment JS to render the Equipment (HTML5)
         */
        $JSON = [
            "SHIP"     => $this->getShipInfo(),
            "CONFIG_1" => [
                "ITEMS"         => [], //Contains unused Items
                "ON_CONFIG_1"   => [], //Contains Items on Ship
                "ON_DRONE_ID_1" => [], //Contains DronesID and Items on Drone
                "ON_PET_1"      => [], //Contains Items on Pet
            ],
            "CONFIG_2" => [
                "ITEMS"         => [], //Contains unused Items
                "ON_CONFIG_2"   => [], //Contains Items on Ship
                "ON_DRONE_ID_2" => [], //Contains DronesID and Items on Drone
                "ON_PET_2"      => [], //Contains Items on Pet
            ],
            "DRONES"   => $this->getDrones(),
            "PET"      => [],
        ];

        for ($config = 1; $config <= 2; $config++) {
            foreach ($this->getItems() as $item) {
                $item     = new item($item, $this->mysql);
                $Location = $item->isInUse($this->user->Hangars->CURRENT_HANGAR->ID, $config, true);

                if (!$Location) {
                    unset($item->CONFIGS);
                    $JSON['CONFIG_' . $config]['ITEMS'][] = $item;
                } else {
                    if ($Location == 'ON_DRONE_ID_' . $config) {
                        $drone_json     = json_decode($item->CONFIGS[$Location]);
                        $id_pos         = array_search($this->user->Hangars->CURRENT_HANGAR->ID, $drone_json->hangars);
                        $droneID        = $drone_json->droneID[$id_pos];
                        $item->DRONE_ID = $droneID;
                        unset($item->CONFIGS);
                        $JSON['CONFIG_' . $config][$Location][] = $item;

                    } else {
                        if ($item->CATEGORY == 'extra') {
                            $extraSlots                                          = $item->isSlotCPU(true);
                            $JSON['SHIP']['SLOTS']['CONFIG_' . $config]['EXTRA'] += $extraSlots;
                        }
                        unset($item->CONFIGS);
                        $JSON['CONFIG_' . $config][$Location][] = $item;
                    }
                }
            }
        }

        return $JSON;
    }

    /**
     * calculateConfigs Function
     * used to Calculate all Ship Configs
     *
     */
    public function calculateConfigs()
    {
        $ITEMS     = $this->getItems();
        $SHIP_DATA = $this->getShipInfo();

        $CONFIGS = [
            1 => [
                "DAMAGE"             => 0,
                "SHIELD"             => 0,
                "SHIELD_ABSORBATION" => 0,
                "SPEED"              => $SHIP_DATA["SPEED"],
                "LASER_COUNT"        => 0,
                "LAUNCHER_COUNT"     => 0,
                "HEAVY"              => [],
                "EXTRAS"             => [],
            ],
            2 => [
                "DAMAGE"             => 0,
                "SHIELD"             => 0,
                "SHIELD_ABSORBATION" => 0,
                "SPEED"              => $SHIP_DATA["SPEED"],
                "LASER_COUNT"        => 0,
                "LAUNCHER_COUNT"     => 0,
                "HEAVY"              => [],
                "EXTRAS"             => [],
            ],
        ];

        for ($config = 1; $config <= 2; $config++) {
            foreach ($ITEMS as $ITEM_OBJ) {
                $ITEM = new item($ITEM_OBJ, $this->mysql);
                if (!$ITEM->isInUse($this->user->Hangars->CURRENT_HANGAR->ID, $config)) {
                    continue;
                }

                if ($ITEM->CATEGORY == 'extra') {
                    //SET EXTRAS
                    $ITEM_ARR                     = [
                        "Id"     => $ITEM->ID,
                        "Amount" => $ITEM->AMOUNT,
                        "LootId" => $ITEM->LOOT_ID,
                    ];
                    $CONFIGS[$config]['EXTRAS'][] = $ITEM_ARR;
                } elseif ($ITEM->CATEGORY == 'heavy') {
                    //SET ROCKETLAUNCHER
                    if ($CONFIGS[$config]['LAUNCHER_COUNT'] < 15) {
                        $LAUNCHER_TYPE = $ITEM->ITEM_NAME == 'HST-01' ? 1 : 2;
                        $CONFIGS[$config]['LAUNCHER_COUNT']++;
                        $CONFIGS[$config]['HEAVY'][] = $LAUNCHER_TYPE;
                    }
                } else {
                    //SET LASER DAMAGE
                    if ($ITEM->CATEGORY == 'laser') {
                        $CONFIGS[$config]['LASER_COUNT'] < 15 ? $CONFIGS[$config]['LASER_COUNT']++ : null;
                    }

                    $CONFIGS[$config]['DAMAGE']             += $ITEM->LVL > 1 ? $ITEM->ATTRIBUTES['DAMAGE'] * ((($ITEM->LVL - 1) * 0.004) + 1) : $ITEM->ATTRIBUTES['DAMAGE'];
                    $CONFIGS[$config]['SHIELD']             += $ITEM->LVL > 1 ? $ITEM->ATTRIBUTES['SHIELD'] * ((($ITEM->LVL - 1) * 0.01) + 1) : $ITEM->ATTRIBUTES['SHIELD'];
                    $CONFIGS[$config]['SHIELD_ABSORBATION'] += $ITEM->LVL > 1 ? $ITEM->ATTRIBUTES['SHIELD_ABSORBATION'] * ((($ITEM->LVL - 1) * 0.01) + 1) : $ITEM->ATTRIBUTES['SHIELD_ABSORBATION'];
                    $CONFIGS[$config]['SPEED']              += $ITEM->ATTRIBUTES['SPEED'];
                }
            }
        }

        //UPDATE SHIP CONFIGS
        $this->mysql->QUERY(
            "UPDATE player_ship_config
                 SET CONFIG_1_DMG = ?,
                 CONFIG_1_SHIELD = ?,
                 CONFIG_1_SPEED = ?,
                 CONFIG_1_SHIELDABSORB = ?,
                 CONFIG_1_LASERCOUNT = ?,
                 CONFIG_1_HEAVY = ?,
                 CONFIG_1_EXTRAS = ?,
                 CONFIG_2_DMG = ?,
                 CONFIG_2_SHIELD = ?,
                 CONFIG_2_SPEED = ?,
                 CONFIG_2_SHIELDABSORB = ?,
                 CONFIG_2_LASERCOUNT = ?,
                 CONFIG_2_HEAVY = ?,
                 CONFIG_2_EXTRAS = ?
                 WHERE USER_ID = ? AND PLAYER_ID = ?",
            [
                $CONFIGS[1]['DAMAGE'],
                $CONFIGS[1]['SHIELD'],
                $CONFIGS[1]['SPEED'],
                $CONFIGS[1]['SHIELD_ABSORBATION'],
                $CONFIGS[1]['LASER_COUNT'],
                json_encode($CONFIGS[1]['HEAVY']),
                json_encode($CONFIGS[1]['EXTRAS']),
                $CONFIGS[2]['DAMAGE'],
                $CONFIGS[2]['SHIELD'],
                $CONFIGS[2]['SPEED'],
                $CONFIGS[2]['SHIELD_ABSORBATION'],
                $CONFIGS[2]['LASER_COUNT'],
                json_encode($CONFIGS[2]['HEAVY']),
                json_encode($CONFIGS[2]['EXTRAS']),
                $this->user->USER_ID,
                $this->user->PLAYER_ID,
            ]
        );

        $this->mysql->QUERY("UPDATE player_hangar SET SHIP_HP = ? WHERE USER_ID = ? AND PLAYER_ID = ? AND ACTIVE = 1",
            [$this->user->USER_ID, $this->user->PLAYER_ID, $SHIP_DATA["HP"]]);
        $this->user->refresh();
    }

    /**
     * getItems Function
     * used to get Items from ItemInventory
     *
     * @return array|bool|null
     */
    public function getItems()
    {
        $Items = $this->mysql->QUERY(
            'SELECT player_equipment.*,
                  server_items.NAME,
                  server_items.CATEGORY,
                  server_items.LOOT_ID,
                  server_items.SLOTS,
                  server_items.DAMAGE,
                  server_items.SHIELD,
                  server_items.SHIELD_ABSORBATION,
                  server_items.SPEED,
                  server_items.SELLING_CREDITS
                  FROM player_equipment, server_items 
                  WHERE player_equipment.USER_ID = ? 
                  AND player_equipment.PLAYER_ID = ? 
                  AND server_items.ID = player_equipment.ITEM_ID
                  ORDER BY server_items.TYPE ASC,
                  server_items.ID DESC,
                  player_equipment.ITEM_LVL DESC',
            [$this->user->USER_ID, $this->user->PLAYER_ID]);
        return $Items;
    }


    /**
     * getItem Function
     * used to get an Item by ID
     *
     * @param $ID
     *
     * @return bool|item
     */
    public function getItem($ID)
    {
        $Item = $this->mysql->QUERY(
            'SELECT player_equipment.*,
                  server_items.NAME,
                  server_items.CATEGORY,
                  server_items.LOOT_ID,
                  server_items.SLOTS,
                  server_items.DAMAGE,
                  server_items.SHIELD,
                  server_items.SHIELD_ABSORBATION,
                  server_items.SPEED,
                  server_items.SELLING_CREDITS
                  FROM player_equipment, server_items 
                  WHERE player_equipment.USER_ID = ? 
                  AND player_equipment.PLAYER_ID = ? 
                  AND server_items.ID = player_equipment.ITEM_ID
                  AND player_equipment.ID = ?',
            [$this->user->USER_ID, $this->user->PLAYER_ID, $ID]);

        if (!isset($Item[0])) {
            return false;
        } else {
            return new item($Item[0], $this->mysql);
        }
    }

    /**
     * sellItem Function
     * used to sell an Item
     *
     * @param $ItemID
     *
     * @return bool
     */
    public function sellItem($ItemID)
    {
        $Item = $this->getItem($ItemID);
        if (!$Item) {
            return false;
        }

        if ($Item->delete()) {
            return $this->mysql->QUERY(
                'UPDATE player_data SET CREDITS =  CREDITS + ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                [
                    $Item->SELLING_CREDITS,
                    $this->user->USER_ID,
                    $this->user->PLAYER_ID,
                ]
            );
        } else {
            return false;
        }
    }

    /**
     * getShipInfo Function
     * used to get all data used by ship
     *
     * @return array
     */
    public function getShipInfo()
    {
        $ShipData = $this->mysql->QUERY(
            'SELECT player_hangar.*,
                  player_extra_data.SHIP_DESIGNS,
                  server_ships.name,
                  server_ships.laser, 
                  server_ships.heavy, 
                  server_ships.generator, 
                  server_ships.extra, 
                  server_ships.base_speed, 
                  server_ships.ship_hp
                  FROM player_hangar, player_extra_data, server_ships
                  WHERE player_hangar.USER_ID = ? 
                  AND player_hangar.PLAYER_ID = ? 
                  AND player_hangar.ACTIVE = 1
                  AND player_extra_data.USER_ID = ? AND player_extra_data.PLAYER_ID = ?
                  AND server_ships.ship_id = player_hangar.SHIP_ID',
            [$this->user->USER_ID, $this->user->PLAYER_ID, $this->user->USER_ID, $this->user->PLAYER_ID]
        )[0];


        //GET DESIGNS
        $ShipDesigns = json_decode($ShipData['SHIP_DESIGNS'], true);

        if (isset($ShipDesigns[$ShipData['SHIP_ID']])) {
            $ShipDesigns = $ShipDesigns[$ShipData['SHIP_ID']];
            foreach ($ShipDesigns as $index => $ShipDesign) {
                $DesignData = $this->mysql->QUERY(
                    'SELECT Name FROM server_ships_designs WHERE Id = ?',
                    [$ShipDesign]
                )[0];

                unset($ShipDesigns[$index]);
                $ShipDesigns[$ShipDesign]['NAME'] = $DesignData['Name'];
            }
        } else {
            $ShipDesigns = [];
        }
        $ShipDesigns[$ShipData['SHIP_ID']]['NAME'] = $ShipData['name'];

        $ShipInfo = [
            "ID"              => $ShipData['SHIP_ID'],
            "DESIGN_ID"       => $ShipData['SHIP_DESIGN'],
            "DESIGNS"         => $ShipDesigns,
            "SPEED"           => $ShipData['base_speed'],
            "HP"              => $ShipData['ship_hp'],
            "CURRENT_CONFIGS" => [
                "CONFIG_1" => [
                    "DAMAGE" => $this->user->CONFIG_1_DMG,
                    "SHIELD" => $this->user->CONFIG_1_SHIELD,
                    "SPEED"  => $this->user->CONFIG_1_SPEED,
                ],
                "CONFIG_2" => [
                    "DAMAGE" => $this->user->CONFIG_2_DMG,
                    "SHIELD" => $this->user->CONFIG_2_SHIELD,
                    "SPEED"  => $this->user->CONFIG_2_SPEED,
                ],
            ],
            "SLOTS"           => [
                "CONFIG_1" => [
                    "LASER"     => $ShipData['laser'],
                    "HEAVY"     => $ShipData['heavy'],
                    "GENERATOR" => $ShipData['generator'],
                    "EXTRA"     => $ShipData['extra'],
                ],
                "CONFIG_2" => [
                    "LASER"     => $ShipData['laser'],
                    "HEAVY"     => $ShipData['heavy'],
                    "GENERATOR" => $ShipData['generator'],
                    "EXTRA"     => $ShipData['extra'],
                ],
            ],
        ];

        return $ShipInfo;
    }

    /**
     * sellDrone Function
     * used to sell a Drone
     *
     * @param $ID
     *
     * @return array|bool|null
     */
    public function sellDrone($ID)
    {
        $error = false;
        foreach ($this->getItems() as $Item) {
            $CONFIGS = $this->mysql->QUERY('SELECT ON_DRONE_ID_1, ON_DRONE_ID_2 FROM player_equipment WHERE ID = ?',
                [$Item['ID']])[0];

            for ($config = 1; $config <= 2; $config++) {
                $Location = 'ON_DRONE_ID_' . $config;
                $CONFIG   = json_decode($CONFIGS[$Location]);

                if (in_array($ID, $CONFIG->droneID)) {
                    $ID_POS = array_search($ID, $CONFIG->droneID);

                    if (isset($CONFIG->droneID)) {
                        unset($CONFIG->droneID[$ID_POS]);
                        if (!isset($CONFIG->droneID[$ID_POS])) {
                            $CONFIG->droneID = array_values($CONFIG->droneID);
                        } else {
                            $error = true;
                            break;
                        }
                    }

                    unset($CONFIG->hangars[$ID_POS]);
                    if (!isset($CONFIG->hangars[$ID_POS])) {
                        $CONFIG->hangars = array_values($CONFIG->hangars);

                        $error = !$this->mysql->QUERY(
                            'UPDATE player_equipment SET ' . $Location . ' = ? WHERE ID = ?',
                            [json_encode($CONFIG), $Item['ID']]
                        );
                    } else {
                        $error = true;
                        break;
                    }
                } else {
                    continue;
                }
            }
        }

        if (!$error) {
            return $this->mysql->QUERY(
                'DELETE FROM player_drones WHERE ID = ? AND USER_ID = ? AND PLAYER_ID = ?',
                [$ID, $this->user->USER_ID, $this->user->PLAYER_ID]
            );
        } else {
            return false;
        }
    }

    /**
     * getDrones Function
     * used to get all Data about user Drones
     *
     * @return array|bool
     */
    public function getDrones()
    {
        $DroneData = $this->mysql->QUERY(
            'SELECT player_drones.*, server_items.NAME, server_items.SLOTS FROM player_drones, server_items 
                  WHERE server_items.ID = player_drones.ITEM_ID 
                  AND USER_ID = ? AND PLAYER_ID = ?',
            [$this->user->USER_ID, $this->user->PLAYER_ID]
        );

        $Drones = [];
        foreach ($DroneData as $Drone) {
            $DroneInfo = [
                "ID"         => $Drone['ID'],
                "DRONE_TYPE" => $Drone['DRONE_TYPE'],
                "NAME"       => $Drone['NAME'],
                "DESIGN_1"   => $Drone['DESIGN_1'],
                "DESIGN_2"   => $Drone['DESIGN_2'],
                "LEVEL"      => $Drone['LEVEL'],
                "DAMAGE"     => $Drone['DAMAGE'],
                "SLOTS"      => $Drone['SLOTS'],
            ];

            $Drones[$Drone['ID']] = $DroneInfo;
        }

        return $Drones;
    }

    /**
     * ownsItem Function
     * used to check if the user owns the Item by ID
     *
     * @param $ID
     *
     * @return bool
     */
    public function ownsItem($ID)
    {
        $Item = $this->mysql->QUERY('SELECT ITEM_ID FROM player_equipment WHERE USER_ID = ? AND PLAYER_ID = ? AND ID = ?',
            [$this->user->USER_ID, $this->user->PLAYER_ID, $ID]);

        if (empty($Item) || $Item == null || !$Item || count($Item) < 1) {
            return false;
        } else {
            return true;
        }
    }
}