<?php

namespace shop;

use DB\MySQL;

class Pet extends AbstractItem
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
        if ($ITEM_DATA['CATEGORY'] == 'pet') {
            $this->mysql->QUERY(
                "INSERT INTO player_pet_config (USER_ID, PLAYER_ID) 
                    VALUES(?,?)",
                [$UserID, $PlayerID]
            );
            return $this->mysql->QUERY(
                "INSERT INTO player_pet (USER_ID, PLAYER_ID, PET_NAME, PET_HP, PET_EXP, PET_LVL) 
                    VALUES(?,?,?,?,?,?)",
                [$UserID, $PlayerID, 'JustAnotherPet', 80000, 0, 1]
            );
        } else {
            return false;
        }
    }
}