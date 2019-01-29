<?php

namespace hangar;

class Hangar
{

    public $ID;
    public $COUNT;
    public $SHIP_ID;
    public $ACTIVE;
    public $SHIP_DESIGN;
    public $SHIP_HP;
    public $SHIP_NANO;
    public $SHIP_MAP_ID;
    public $SHIP_X;
    public $SHIP_Y;
    public $IN_EQUIPMENT_ZONE;

    function __construct($DATA)
    {
        $this->ID                = $DATA['ID'];
        $this->COUNT             = $DATA['HANGAR_COUNT'];
        $this->SHIP_ID           = $DATA['SHIP_ID'];
        $this->ACTIVE            = (bool)$DATA['ACTIVE'];
        $this->SHIP_DESIGN       = $DATA['SHIP_DESIGN'];
        $this->SHIP_HP           = $DATA['SHIP_HP'];
        $this->SHIP_NANO         = $DATA['SHIP_NANO'];
        $this->SHIP_MAP_ID       = $DATA['SHIP_MAP_ID'];
        $this->SHIP_X            = $DATA['SHIP_X'];
        $this->SHIP_Y            = $DATA['SHIP_Y'];
        $this->IN_EQUIPMENT_ZONE = (bool)$DATA['IN_EQUIPMENT_ZONE'];
    }
}
