<?php

namespace shop;

use DB\MySQL;

class AdminItem extends AbstractItem
{
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
        if ($System->User->hasPremium() && $this->CURRENCY == 2 && $System->User->DISCOUNT == 0) {
            $this->PRICE = $this->PRICE * 0.8;
        } elseif ($System->User->DISCOUNT > 0 && $System->User->hasPremium() && $this->CURRENCY == 2) {
            $premium     = 0.8 - ( $System->User->DISCOUNT / 100 );
            $this->PRICE = $this->PRICE * $premium;
        }


        $this->DESCRIPTION    = $ItemData['DESCRIPTION'];
        $this->IMAGE_URL      = \Utils::getPathByLootId($this->LOOT_ID, '100x100');
        $this->SHOP_IMAGE_URL = \Utils::getPathByLootId($this->LOOT_ID, 'shop');

        $this->ATTRIBUTES = [
            "Damage"      => $ItemData['DAMAGE'],
            "Shield"      => $ItemData['SHIELD'],
            "Absorbation" => $ItemData['SHIELD'] > 0 ? ( $ItemData['SHIELD_ABSORBATION'] ) : 'NULL',
            "Speed"       => $ItemData['SPEED'],
            "Uses"        => $ItemData['USES'] > 1 ? ( $ItemData['USES'] ) : 'NULL',
        ];
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
        if (strpos($this->LOOT_ID, 'resource_') !== false) {
            global $System;
            if (strpos($this->LOOT_ID, 'resource_booty-key') !== false) {
                $BOOTY_KEYS = json_decode($System->User->BOOTY_KEYS, true);
                if (empty($BOOTY_KEYS)) {
                    $BOOTY_KEYS = [
                        0 => 0,
                        1 => 0,
                        2 => 0,
                    ];
                }
                if ($this->LOOT_ID == 'resource_booty-key') {
                    $BOOTY_KEYS[0] += $Amount;
                } elseif ($this->LOOT_ID == 'resource_booty-key-red') {
                    $BOOTY_KEYS[1] += $Amount;
                } elseif ($this->LOOT_ID == 'resource_booty-key-blue') {
                    $BOOTY_KEYS[2] += $Amount;
                }
                $BOOTY_KEYS = json_encode($BOOTY_KEYS);

                return $this->mysql->QUERY(
                    'UPDATE player_extra_data SET BOOTY_KEYS = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                    [
                        $BOOTY_KEYS,
                        $UserID,
                        $PlayerID,
                    ]
                );
            } else {
                if (strpos($this->LOOT_ID, 'resource_logfile') !== false) {
                    $LOGFILES = (int) $System->User->LOGFILES;
                    $LOGFILES += $Amount;

                    return $this->mysql->QUERY(
                        'UPDATE player_extra_data SET LOGFILES = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                        [
                            $LOGFILES,
                            $UserID,
                            $PlayerID,
                        ]
                    );
                }
            }

        }
        if (strpos($this->LOOT_ID, 'ammunition_laser_') !== false) {
            $ROW = str_replace('-', '_', $this->NAME);

            return $this->mysql->QUERY(
                "UPDATE player_ammo SET " . $ROW . " = " . $ROW . " + ? WHERE USER_ID = ? AND PLAYER_ID = ?",
                [
                    $Amount,
                    $UserID,
                    $PlayerID,
                ]
            );
        }
        if ($this->LOOT_ID == 'drone_apis' || $this->LOOT_ID == 'drone_zeus') {
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

            if (
            $this->mysql->QUERY(
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
            )
            ) {
                return $this->mysql->lastID();
            } else return false;
        }

        return false;
    }
}
