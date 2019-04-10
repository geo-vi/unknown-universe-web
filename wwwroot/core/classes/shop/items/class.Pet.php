<?php

namespace shop;

use DB\MySQL;

class Pet extends AbstractItem
{
    public $IS_PET;
    public $HAS_PET;
    public $CAT;
    public $SHOW_FUEL;
    public $SHOW_CATS;

    function __construct($ItemData, MySQL $MySQL)
    {
        $this->mysql = $MySQL;

        $this->setITEMDATA($ItemData);

        $this->ID       = (int) $ItemData['ID'];
        $this->NAME     = $ItemData['NAME'];
        $this->LOOT_ID  = $ItemData['LOOT_ID'];
        $this->PRICE    = $ItemData['PRICE_C'] == 0 ? $ItemData['PRICE_U'] : $ItemData['PRICE_C'];
        $this->CURRENCY = $ItemData['PRICE_C'] != 0 ? 1 : 2;
        $this->CAT      = $ItemData['CATEGORY'];

        global $System;
        if ($this->LOOT_ID == 'pet_pet10') {
            $this->AMOUNT_SELECTABLE = false;
            $this->IS_PET            = true;
            if ($System->User->hasPet()) {
                $this->HAS_PET = true;
            } else {
                $this->HAS_PET = false;
            }
        } elseif ($this->LOOT_ID == 'pet_fuel-100') {
            $this->AMOUNT_SELECTABLE = true;
            $this->IS_PET            = false;

            if ($System->User->hasPet()) {
                $this->SHOW_FUEL = false;
            } else {
                $this->SHOW_FUEL = true;
            }
        } elseif ($this->CAT == 'protocols' || $this->CAT == 'gear') {
            $this->AMOUNT_SELECTABLE = false;
            $this->LEVEL_SELECTABLE = true;
            $this->IS_PET            = false;

            if ($System->User->hasPet()) {
                $this->SHOW_CATS = false;
            } else {
                $this->SHOW_CATS = true;
            }

        } else {
            $this->AMOUNT_SELECTABLE = true;
            $this->IS_PET            = false;
        }

        if ($System->User->hasPremium() && $this->CURRENCY == 2) {
            $this->PRICE = $this->PRICE * 0.8;
        }

        $this->DESCRIPTION    = $ItemData['DESCRIPTION'];
        $this->IMAGE_URL      = \Utils::getPathByLootId($this->LOOT_ID, '100x100');
        $this->SHOP_IMAGE_URL = \Utils::getPathByLootId($this->LOOT_ID, 'shop');

        $this->ATTRIBUTES = [
            "Slots" => $ItemData['SLOTS'],
        ];
    }

    public function buyPet($UserID, $PlayerID, $Name, $Amount = 1)
    {

    }

    public function buy($UserID, $PlayerID, $Amount = 1, $Level = 1)
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
        if ($ITEM_DATA['CATEGORY'] == 'pet') {
            $this->mysql->QUERY(
                "INSERT INTO player_pet_config (USER_ID, PLAYER_ID) 
                    VALUES(?,?)",
                [
                    $UserID,
                    $PlayerID,
                ]
            );
            $this->mysql->QUERY(
                'UPDATE player_hangar SET PET_ID = 12 WHERE PLAYER_ID = ? AND USER_ID =?',
                [
                    $PlayerID,
                    $UserID,
                ]
            );

            if (
            $this->mysql->QUERY(
                "INSERT INTO player_pet (USER_ID, PLAYER_ID, PET_TYPE, ITEM_ID, NAME, LEVEL, EXPERIENCE, HP, FUEL) 
                    VALUES(?,?,?,?,?,?,?,?, ?)",
                [
                    $UserID,
                    $PlayerID,
                    12,
                    96,
                    'PetID-' . $PlayerID,
                    1,
                    0,
                    50000,
                    0,
                ]
            )
            ) {
                return $this->mysql->lastID();
            } else return false;
        } elseif ($ITEM_DATA['CATEGORY'] == 'pet_fuel') {
            $this->mysql->QUERY(
                'UPDATE player_pet SET FUEL = FUEL + ? WHERE PLAYER_ID = ? ',
                [
                    $Amount,
                    $PlayerID,
                ]
            );

            return true;
        } elseif ($ITEM_DATA['CATEGORY'] == 'gear') {
            if (
            $this->mysql->QUERY(
                "INSERT INTO player_equipment (USER_ID, PLAYER_ID, ITEM_ID, ITEM_TYPE, ITEM_AMOUNT, ITEM_LVL) VALUES(?,?,?,?,?,?)",
                [
                    $UserID,
                    $PlayerID,
                    $this->ID,
                    $ITEM_DATA['TYPE'],
                    1,
                    $Level,
                ]
            )
            ) {
                return $this->mysql->lastID();
            } else return false;
        } elseif ($ITEM_DATA['CATEGORY'] == 'protocols') {
            if ($this->mysql->QUERY(
                "INSERT INTO player_equipment (USER_ID, PLAYER_ID, ITEM_ID, ITEM_TYPE, ITEM_AMOUNT, ITEM_LVL) VALUES(?,?,?,?,?,?)",
                [
                    $UserID,
                    $PlayerID,
                    $this->ID,
                    $ITEM_DATA['TYPE'],
                    1,
                    $Level,
                ]
            )) {
                return $this->mysql->lastID();
            } else return false;
        } else {
            return false;
        }
    }
}
