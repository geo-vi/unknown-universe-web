<?php

namespace shop;

use DB\MySQL;

class Drone extends AbstractItem
{
    public $HAS_MAX_IRIS;
    public $hasFormation;

    function __construct($ItemData, MySQL $MySQL)
    {
        $this->mysql = $MySQL;

        $this->setITEMDATA($ItemData);

        $this->ID       = (int) $ItemData['ID'];
        $this->NAME     = $ItemData['NAME'];
        $this->LOOT_ID  = $ItemData['LOOT_ID'];
        $this->PRICE    = $ItemData['PRICE_C'] == 0 ? $ItemData['PRICE_U'] : $ItemData['PRICE_C'];
        $this->CURRENCY = $ItemData['PRICE_C'] != 0 ? 1 : 2;

        global $System;
        $UserDrones = $System->User->hasDrones(true, true);
        if ($this->NAME == 'Flax') {
            for ($drone = 0; $drone < $UserDrones[$this->NAME]; $drone++) {
                $this->PRICE = ( $this->PRICE * 2 );
            }
        } else {
            if ($this->NAME == 'Iris') {
                switch ($UserDrones[$this->NAME]) {
                    case 0:
                        $this->PRICE = 15000;
                        break;
                    case 1:
                        $this->PRICE = 24000;
                        break;
                    case 2:
                        $this->PRICE = 42000;
                        break;
                    case 3:
                        $this->PRICE = 60000;
                        break;
                    case 4:
                        $this->PRICE = 84000;
                        break;
                    case 5:
                        $this->PRICE = 96000;
                        break;
                    case 6:
                        $this->PRICE = 126000;
                        break;
                    case 7:
                        $this->PRICE = 200000;
                        break;
                    case 8:
                        $this->HAS_MAX_IRIS = true;
                        break;
                }
            }
        }
        if ($System->User->hasPremium() && $this->CURRENCY == 2) {
            $this->PRICE = $this->PRICE * 0.8;
        }

        $this->DESCRIPTION       = $ItemData['DESCRIPTION'];
        $this->IMAGE_URL         = \Utils::getPathByLootId(
            $this->LOOT_ID,
            '100x100',
            $ItemData['CATEGORY'] == 'drone' ? '1' : ''
        );
        $this->SHOP_IMAGE_URL    = \Utils::getPathByLootId($this->LOOT_ID, 'shop');
        $this->AMOUNT_SELECTABLE = false;

        $this->ATTRIBUTES = [
            "Slots" => $ItemData['SLOTS'],
        ];

        if ($System->User->hasFormation($this->ID)) {
            $this->hasFormation = true;
        }
    }

    public function buy($UserID, $PlayerID, $Amount = 1)
    {
        if ($this->CURRENCY == 1) {
            $this->mysql->QUERY(
                'UPDATE player_data SET CREDITS = CREDITS - ? WHERE PLAYER_ID  = ? AND USER_ID = ?',
                [
                    $this->PRICE * $Amount,
                    $PlayerID,
                    $UserID,
                ]
            );
        } else {
            $this->mysql->QUERY(
                'UPDATE player_data SET URIDIUM = URIDIUM - ? WHERE PLAYER_ID  = ? AND USER_ID = ?',
                [
                    $this->PRICE * $Amount,
                    $PlayerID,
                    $UserID,
                ]
            );
        }

        $ITEM_DATA = $this->getItemData();
        if ($ITEM_DATA['CATEGORY'] == 'drone') {
            switch ($this->LOOT_ID) {
                case 'drone_flax':
                    $DRONE_TYPE = 0;
                    break;
                case 'drone_iris':
                    $DRONE_TYPE = 1;
                    break;
                case 'drone_apis':
                    $DRONE_TYPE = 2;
                    break;
                case 'drone_zeus':
                    $DRONE_TYPE = 3;
                    break;
                default:
                    return false;
            }

            return $this->mysql->QUERY(
                "INSERT INTO player_drones (USER_ID,PLAYER_ID,ITEM_ID,DRONE_TYPE,DAMAGE,LEVEL,UPGRADE_LVL) 
                    VALUES(?,?,?,?,?,?,?)",
                [
                    $UserID,
                    $PlayerID,
                    $this->ID,
                    $DRONE_TYPE,
                    "0%",
                    1,
                    1,
                ]
            );
        } elseif ($ITEM_DATA['CATEGORY'] == 'drone_formation') {
            global $System;
            $DESIGNS         = json_decode($System->User->__get('DRONE_FORMATIONS'), true);
            $ITEM_DATA       = $this->getItemData();
            $DESIGNS['ID'][] = $this->ID;
            $DESIGNS         = json_encode($DESIGNS);

            $this->mysql->QUERY(
                "INSERT INTO player_equipment (USER_ID, PLAYER_ID, ITEM_ID, ITEM_TYPE, ITEM_AMOUNT) VALUES(?,?,?,?,?)",
                [
                    $UserID,
                    $PlayerID,
                    $this->ID,
                    $ITEM_DATA['TYPE'],
                    1,
                ]
            );
            $this->mysql->QUERY(
                'UPDATE player_extra_data SET DRONE_FORMATIONS = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                [
                    $DESIGNS,
                    $UserID,
                    $PlayerID,
                ]
            );

            return true;
        } elseif ($ITEM_DATA['CATEGORY'] == 'drone_design') {
            $this->mysql->QUERY(
                "INSERT INTO player_equipment (USER_ID, PLAYER_ID, ITEM_ID, ITEM_TYPE, ITEM_AMOUNT) VALUES(?,?,?,?,?)",
                [
                    $UserID,
                    $PlayerID,
                    $this->ID,
                    $ITEM_DATA['TYPE'],
                    1,
                ]
            );

            return true;
        } else {
            return false;
        }
    }
}
