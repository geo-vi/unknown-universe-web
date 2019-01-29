<?php

namespace shop;

use DB\MySQL;

abstract class AbstractItem
{
    /** @var MySQL */
    protected $mysql;

    public $ID;
    public $NAME;
    public $LOOT_ID;
    public $IMAGE_URL;
    public $SHOP_IMAGE_URL;
    public $AMOUNT_SELECTABLE = true;
    public $PRICE;
    public $CURRENCY;
    public $DESCRIPTION;
    public $ATTRIBUTES = [];
    private $ITEM_DATA;

    /**
     * Item constructor.
     *
     * @param       $ItemData
     * @param MySQL $MySQL
     */
    abstract function __construct($ItemData, MySQL $MySQL);

    /**
     * @param $property
     *
     * @return mixed
     */
    function __get($property)
    {
        return $this->$property;
    }

    /**
     * @param     $UserID
     * @param     $PlayerID
     * @param int $Amount
     *
     * @return mixed
     */
    abstract function buy($UserID, $PlayerID, $Amount = 1);

    /**
     * @return mixed
     */
    public function getITEMDATA()
    {
        return $this->ITEM_DATA;
    }

    /**
     * @param mixed $ITEM_DATA
     */
    public function setITEMDATA($ITEM_DATA)
    {
        $this->ITEM_DATA = $ITEM_DATA;
    }
}