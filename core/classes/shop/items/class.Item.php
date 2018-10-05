<?php

namespace shop;

use DB\MySQL;

class Item extends AbstractItem
{
    function __construct($ItemData, MySQL $MySQL)
    {
        $this->mysql = $MySQL;

        $this->setITEMDATA($ItemData);

        $this->ID       = (int)$ItemData['ID'];
        $this->NAME     = $ItemData['NAME'];
        $this->LOOT_ID  = $ItemData['LOOT_ID'];
        $this->PRICE    = $ItemData['PRICE_C'] == 0 ? $ItemData['PRICE_U'] : $ItemData['PRICE_C'];
        $this->CURRENCY = $ItemData['PRICE_C'] != 0 ? 1 : 2;

        global $System;
        if ($System->User->hasPremium() && $this->CURRENCY == 2) {
            $this->PRICE = $this->PRICE * 0.8;
        }

        $this->DESCRIPTION    = $ItemData['DESCRIPTION'];
        $this->IMAGE_URL      = \Utils::getPathByLootId($this->LOOT_ID, '100x100');
        $this->SHOP_IMAGE_URL = \Utils::getPathByLootId($this->LOOT_ID, 'shop');

        $this->ATTRIBUTES = [
            "Damage"      => $ItemData['DAMAGE'],
            "Shield"      => $ItemData['SHIELD'],
            "Absorbation" => $ItemData['SHIELD'] > 0 ? ($ItemData['SHIELD_ABSORBATION']) : 'NULL',
            "Speed"       => $ItemData['SPEED'],
            "Uses"        => $ItemData['USES'] > 1 ? ($ItemData['USES']) : 'NULL',
        ];
    }

    public function buy($UserID, $PlayerID, $Amount = 1)
    {
        if ($this->CURRENCY == 1) {
            $this->mysql->QUERY('UPDATE player_data SET CREDITS = CREDITS - ? WHERE PLAYER_ID  = ? AND USER_ID = ?',
                [$this->PRICE * $Amount, $PlayerID, $UserID]);
        } else {
            $this->mysql->QUERY('UPDATE player_data SET URIDIUM = URIDIUM - ? WHERE PLAYER_ID  = ? AND USER_ID = ?',
                [$this->PRICE * $Amount, $PlayerID, $UserID]);
        }

        $ITEM_DATA = $this->getITEMDATA();
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
                return $this->mysql->QUERY('UPDATE player_extra_data SET BOOTY_KEYS = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                    [$BOOTY_KEYS, $UserID, $PlayerID]);
            } else {
                if (strpos($this->LOOT_ID, 'resource_logfile') !== false) {
                    $LOGFILES = (int)$System->User->LOGFILES;
                    $LOGFILES += $Amount;
                    return $this->mysql->QUERY('UPDATE player_extra_data SET LOGFILES = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                        [$LOGFILES, $UserID, $PlayerID]);
                }
            }

        } else {
            for ($Success = 0; $Success < $Amount;) {
                if (
                $this->mysql->QUERY("INSERT INTO player_equipment (USER_ID, PLAYER_ID, ITEM_ID, ITEM_TYPE, ITEM_AMOUNT) VALUES(?,?,?,?,?)",
                    [$UserID, $PlayerID, $this->ID, $ITEM_DATA['TYPE'], $ITEM_DATA['USES']])
                ) {
                    $Success++;
                }
            }

            return true;
        }

        return false;
    }
}