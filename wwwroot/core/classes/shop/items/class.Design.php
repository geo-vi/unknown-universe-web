<?php

namespace shop;

use DB\MySQL;

class Design extends AbstractItem
{
    public $hasDesign;

    function __construct($ItemData, MySQL $MySQL)
    {
        global $System;

        $this->mysql = $MySQL;

        $this->setITEMDATA($ItemData);

        $this->ID       = (int) $ItemData['Id'];
        $this->NAME     = $ItemData['Name'];
        $this->LOOT_ID  = $ItemData['type'];
        $this->PRICE    = $ItemData['price_cre'] == 0 ? $ItemData['price_uri'] : $ItemData['price_cre'];
        $this->CURRENCY = $ItemData['price_cre'] != 0 ? 1 : 2;


        $this->DESCRIPTION       = $ItemData['desc'];
        $this->AMOUNT_SELECTABLE = false;
        $this->IMAGE_URL         = \Utils::getPathByLootId($this->LOOT_ID, '100x100');
        $this->SHOP_IMAGE_URL    = \Utils::getPathByLootId($this->LOOT_ID, 'shop');

        $DESIGNS   = json_decode($System->User->__get('SHIP_DESIGNS'), true);
        $ITEM_DATA = $this->getItemData();

        if ($System->User->hasPremium() && $this->CURRENCY == 2) {
            $this->PRICE = $this->PRICE * 0.8;
        }

        if (is_array($DESIGNS) && in_array($this->ID, $DESIGNS[$ITEM_DATA['ShipId']])) {
            $this->hasDesign = true;
        }
    }

    public function buy($UserID, $PlayerID, $Amount = 1)
    {
        global $System;

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

        $DESIGNS                         = json_decode($System->User->__get('SHIP_DESIGNS'), true);
        $ITEM_DATA                       = $this->getItemData();
        $DESIGNS[$ITEM_DATA['ShipId']][] = $this->ID;
        $DESIGNS                         = json_encode($DESIGNS);

        return $this->mysql->QUERY(
            "UPDATE player_extra_data SET SHIP_DESIGNS = ? WHERE USER_ID = ? AND PLAYER_ID = ?",
            [
                $DESIGNS,
                $UserID,
                $PlayerID,
            ]
        );
    }
}
