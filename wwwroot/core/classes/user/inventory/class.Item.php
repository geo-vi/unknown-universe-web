<?php

namespace inventory;

use DB\MySQL;

class Item
{
    public $ID;
    public $ITEM_ID;
    public $LOOT_ID;
    public $ITEM_NAME;
    public $TYPE;
    public $CATEGORY;
    public $LVL;
    public $AMOUNT;
    public $SELLING_CREDITS;
    public $ATTRIBUTES = [
        "DAMAGE"        => 0,
        "SHIELD"        => 0,
        "SHIELD_ABSORB" => 0,
        "SPEED"         => 0,
    ];
    public $CONFIGS;
    /** @var MySQL * */
    private $mysql;
    private $ITEM_DATA;

    function __construct($ItemData, $mysql)
    {
        $this->mysql     = $mysql;
        $this->ITEM_DATA = $ItemData;

        $this->ID              = (int) $ItemData['ID'];
        $this->ITEM_ID         = (int) $ItemData['ITEM_ID'];
        $this->LOOT_ID         = $ItemData['LOOT_ID'];
        $this->ITEM_NAME       = $ItemData['NAME'];
        $this->TYPE            = (int) $ItemData['ITEM_TYPE'];
        $this->CATEGORY        = $ItemData['CATEGORY'];
        $this->LVL             = (int) $ItemData['ITEM_LVL'];
        $this->AMOUNT          = (int) $ItemData['ITEM_AMOUNT'];
        $this->SELLING_CREDITS = (int) $ItemData['SELLING_CREDITS'];

        //ITEM ATTRIBUTES
        $this->ATTRIBUTES['DAMAGE']             = $ItemData['DAMAGE'];
        $this->ATTRIBUTES['SHIELD']             = $ItemData['SHIELD'];
        $this->ATTRIBUTES['SHIELD_ABSORBATION'] = $ItemData['SHIELD_ABSORBATION'];
        $this->ATTRIBUTES['SPEED']              = $ItemData['SPEED'];

        $this->CONFIGS = $this->mysql->QUERY(
            'SELECT ON_CONFIG_1, ON_CONFIG_2, ON_DRONE_ID_1, ON_DRONE_ID_2, ON_PET_1, ON_PET_2 
                                      FROM player_equipment WHERE ID = ?',
            [$this->ID]
        )[0];
    }


    /**
     * isSlotsCPU Function
     * returns bool if !$Slots to check if Item SlotCPU
     * returns extraSlot Count if $Slots
     *
     * @param bool $Slots
     *
     * @return bool
     */
    public function isSlotCPU($Slots = false)
    {
        if ($this->TYPE == 9 && !$Slots) {
            return true;
        } else {
            if ($this->TYPE == 9 && $Slots) {
                return $this->ITEM_DATA['SLOTS'];
            } else {
                return false;
            }
        }
    }

    /**
     * moveToEquipment Function
     * used to move The Item from Inventory to Equipment
     *
     * @param $HangarID
     * @param $Config
     * @param (array) $To
     *
     * @return bool
     */
    public function moveToEquipment($HangarID, $Config, $To)
    {
        if ( !isset($To['target'])) {
            return false;
        }
        if ($this->isInUse($HangarID, $Config)) {
            return false;
        }

        $toDrone = false;
        switch ($To['target']) {
            case 'ship':
                $Location = 'ON_CONFIG_' . $Config;
                break;
            case 'drone':
                if ( !isset($To['droneID'])) {
                    return false;
                }
                $Location = 'ON_DRONE_ID_' . $Config;
                $toDrone  = true;
                break;
            case 'pet':
                $Location = 'ON_PET_' . $Config;
                break;
            default:
                return false;
        }

        $ConfigID = $Config;
        $Config   = json_decode($this->CONFIGS[$Location]);
        if ( !isset($Config->hangars[$HangarID])) {
            $Config->hangars[] = $HangarID;
            array_values($Config->hangars);
            if ($toDrone) {
                $Config->droneID[] = $To['droneID'];
                array_values($Config->droneID);
            }
        }

        if ($this->CATEGORY == 'drone_design') {
            if ($this->LOOT_ID == 'drone_design_havoc') {
                $this->mysql->QUERY(
                    'UPDATE player_drones SET DESIGN_' . $ConfigID . ' = 1 WHERE ID = ?',
                    [$To['droneID']]
                );
            } elseif ($this->LOOT_ID == 'drone_design_hercules') {
                $this->mysql->QUERY(
                    'UPDATE player_drones SET DESIGN_' . $ConfigID . ' = 2 WHERE ID = ?',
                    [$To['droneID']]
                );
            }
        }

        return $this->mysql->QUERY(
            'UPDATE player_equipment SET ' . $Location . ' = ? WHERE ID = ?',
            [
                json_encode($Config),
                $this->ID,
            ]
        );
    }

    /**
     * isInUse Function
     * used to check if an Item is in Use on $Config by $HangarID
     *
     * @param      $HangarID
     * @param      $Config
     * @param bool $ReturnLocation
     *
     * @return bool|string
     */
    public function isInUse($HangarID, $Config, $ReturnLocation = false)
    {
        $Ship  = json_decode($this->CONFIGS['ON_CONFIG_' . $Config])->hangars;
        $Drone = json_decode($this->CONFIGS['ON_DRONE_ID_' . $Config])->hangars;
        $Pet   = json_decode($this->CONFIGS['ON_PET_' . $Config])->hangars;

        if ( !$ReturnLocation) {
            if (in_array($HangarID, $Ship) || in_array($HangarID, $Drone) || in_array($HangarID, $Pet)) {
                return true;
            } else {
                return false;
            }
        } else {
            if (in_array($HangarID, $Ship)) {
                return 'ON_CONFIG_' . $Config;
            } elseif (in_array($HangarID, $Drone)) {
                return 'ON_DRONE_ID_' . $Config;
            } elseif (in_array($HangarID, $Pet)) {
                return 'ON_PET_' . $Config;
            } else {
                return false;
            }
        }
    }

    /**
     * moveToInventory Function
     * used to move The Item from equipment to the Inventory
     *
     * @param $HangarID
     * @param $Config
     *
     * @return bool
     */
    public function moveToInventory($HangarID, $Config)
    {
        $Location = $this->isInUse($HangarID, $Config, true);
        if ( !$Location) {
            return false;
        }

        $ConfigID = $Config;
        $Config   = json_decode($this->CONFIGS[$Location]);
        $Index    = array_search($HangarID, $Config->hangars);

        if ($this->CATEGORY == 'drone_design') {
            $this->mysql->QUERY(
                'UPDATE player_drones SET DESIGN_' . $ConfigID . ' = 0 WHERE ID = ?',
                [$Config->droneID[$Index]]
            );
        }

        if (isset($Config->droneID)) {
            unset($Config->droneID[$Index]);
            if ( !isset($Config->droneID[$Index])) {
                $Config->droneID = array_values($Config->droneID);
            } else {
                return false;
            }
        }

        unset($Config->hangars[$Index]);
        if ( !isset($Config->hangars[$Index])) {
            $Config->hangars = array_values($Config->hangars);

            return $this->mysql->QUERY(
                'UPDATE player_equipment SET ' . $Location . ' = ? WHERE ID = ?',
                [
                    json_encode($Config),
                    $this->ID,
                ]
            );

        } else {
            return false;
        }
    }

    /**
     * delete Function
     * used to delete an item from a User
     *
     * @return array|bool|null
     */
    public function delete()
    {
        return $this->mysql->QUERY('DELETE FROM player_equipment WHERE ID = ?', [$this->ID]);
    }
}
