<?php
namespace shop;

use DB\MySQL;

class Ammo extends AbstractItem
{
    function __construct($ItemData, MySQL $MySQL)
    {
        $this->mysql = $MySQL;

        $this->setITEMDATA($ItemData);

        $this->ID = (int) $ItemData['ID'];
        $this->NAME = $ItemData['NAME'];
        $this->LOOT_ID = $ItemData['LOOT_ID'];
        $this->PRICE = $ItemData['PRICE_C'] == 0 ? (float) $ItemData['PRICE_U'] : (float) $ItemData['PRICE_C'];
        $this->CURRENCY = $ItemData['PRICE_C'] != 0 ? 1 : 2;
        global $System;
        if($System->User->hasPremium() && $this->CURRENCY == 2){
            $this->PRICE = $this->PRICE * 0.8;
        }
        $this->DESCRIPTION = $ItemData['DESCRIPTION'];
        $this->IMAGE_URL = \Utils::getPathByLootId($this->LOOT_ID, '100x100');
        $this->SHOP_IMAGE_URL = \Utils::getPathByLootId($this->LOOT_ID, 'shop');
    }

    public function buy($UserID, $PlayerID, $Amount = 1)
    {
        if($this->CURRENCY == 1){
            $this->mysql->QUERY('UPDATE player_data SET CREDITS = CREDITS - ? WHERE PLAYER_ID  = ? AND USER_ID = ?', array($this->PRICE * $Amount, $PlayerID, $UserID));
        }else{
            $this->mysql->QUERY('UPDATE player_data SET URIDIUM = URIDIUM - ? WHERE PLAYER_ID  = ? AND USER_ID = ?', array($this->PRICE * $Amount, $PlayerID, $UserID));
        }

        $ROW = str_replace('-','_', $this->NAME);
        return $this->mysql->QUERY("UPDATE player_ammo SET ".$ROW." = ".$ROW." + ? WHERE USER_ID = ? AND PLAYER_ID = ?",array($Amount, $UserID, $PlayerID));
    }
}