<?php

namespace shop;

use DB\MySQL;

class Booster extends AbstractItem
{
    function __construct($ItemData, MySQL $MySQL)
    {
        $this->mysql = $MySQL;

        $this->setITEMDATA($ItemData);

        $this->ID                = (int) $ItemData['ID'];
        $this->NAME              = $ItemData['NAME'];
        $this->LOOT_ID           = $ItemData['LOOT_ID'];
        $this->PRICE             = $ItemData['PRICE_C'] == 0 ? $ItemData['PRICE_U'] : $ItemData['PRICE_C'];
        $this->CURRENCY          = $ItemData['PRICE_C'] != 0 ? 1 : 2;
        $this->AMOUNT_SELECTABLE = false;

        global $System;
        if ($System->User->hasPremium() && $this->CURRENCY == 2) {
            $this->PRICE = $this->PRICE * 0.8;
        }

        $this->DESCRIPTION    = $ItemData['DESCRIPTION'];
        $this->IMAGE_URL      = \Utils::getPathByLootId($this->LOOT_ID, '100x100');
        $this->SHOP_IMAGE_URL = \Utils::getPathByLootId($this->LOOT_ID, 'shop');
    }

    public function buy($UserID, $PlayerID, $Amount = 1)
    {
        if ($this->CURRENCY == 1) {
            $this->mysql->QUERY(
                'UPDATE player_data SET CREDITS = CREDITS - ? WHERE PLAYER_ID  = ? AND USER_ID = ?',
                [
                    $this->PRICE,
                    $PlayerID,
                    $UserID,
                ]
            );
        } else {
            $this->mysql->QUERY(
                'UPDATE player_data SET URIDIUM = URIDIUM - ? WHERE PLAYER_ID  = ? AND USER_ID = ?',
                [
                    $this->PRICE,
                    $PlayerID,
                    $UserID,
                ]
            );
        }

        global $System;
        $Current_Booster = $System->User->getBoosters($this->ID);

        if ($Current_Booster == true) {
            return $this->mysql->QUERY(
                'UPDATE player_boosters SET END_TIME = DATE_ADD(END_TIME, INTERVAL 10 HOUR) WHERE BOOSTER_ID = ? AND PLAYER_ID = ?',
                [
                    $this->ID,
                    $PlayerID,
                ]
            );
        }
        if ( !$Current_Booster == true) {
            $date = date('Y-m-d H:i:s', strtotime("+10 hour"));

            if (
            $this->mysql->QUERY(
                'INSERT INTO player_boosters (PLAYER_ID, BOOSTER_ID, END_TIME) VALUES (?,?,?)',
                [
                    $PlayerID,
                    $this->ID,
                    $date,
                ]
            )
            ) {
                return $this->mysql->lastID();
            } else return false;
        }
    }
}
