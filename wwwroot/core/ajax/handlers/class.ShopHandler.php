<?php

/**
 * Class ShopHandler
 */
class ShopHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('load', ['CATEGORY']);
        $this->addAction('buy', ['CATEGORY', 'ITEM_ID', 'AMOUNT']);
    }

    public function handle()
    {
        parent::handle();

        $function = 'exec_' . $this->action;

        $this->$function();
    }

    public function exec_load()
    {
        global $System;
        $CATEGORY = (string)strtoupper($this->params['CATEGORY']);

        die(json_encode($System->Shop->getItems($CATEGORY)));
    }

    public function exec_buy()
    {
        global $System;
        $CATEGORY = (string)strtoupper($this->params['CATEGORY']);
        $ITEM_ID  = (int)$this->params['ITEM_ID'];
        $AMOUNT   = (int)$this->params['AMOUNT'];

        if (!isset($System->Shop->CATEGORIES[$CATEGORY])) {
            die(json_encode(['error' => true, 'error_msg' => 'Category doesn\'t exists!']));
        }

        if ($AMOUNT < 1) {
            die(json_encode(['error' => true, 'error_msg' => 'You need to buy min. 1 Item! (Amount to low)']));
        }

        $ITEM = $System->Shop->getItem($CATEGORY, $ITEM_ID);
        if ($ITEM == null) {
            die(json_encode(['error' => true, 'error_msg' => 'Item doesn\'t exists!']));
        }

        if ($AMOUNT > 1 && !$ITEM->AMOUNT_SELECTABLE) {
            die(json_encode(['error' => true, 'error_msg' => 'Amount invalid!']));
        }

        $PRICE = $ITEM->PRICE * $AMOUNT;
        if ($ITEM->CURRENCY == 1) {
            if (($System->User->CREDITS - $PRICE) < 0) {
                die(json_encode(['error' => true, 'error_msg' => 'You don\'t have that much Credits!']));
            }
        } else {
            if (($System->User->URIDIUM - $PRICE) < 0) {
                die(json_encode(['error' => true, 'error_msg' => 'You don\'t have that much Uridium!']));
            }
        }

        $Success = false;
        $MSG     = 'Something went wrong while buying ' . $ITEM->NAME . '!';
        switch ($CATEGORY) {
            case 'BOOSTER':
                if($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID, $AMOUNT)){
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'ADMINITEM':
                if($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID, $AMOUNT)){
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'ADMINSHIP':

                $hasShip = false;
                $Hangars = $System->User->Hangars->getHangars();
                foreach ($Hangars as $Hangar) {
                    /** @var $Hangar Hangar */
                    if ($Hangar->SHIP_ID == $ITEM->ID) {
                        $hasShip = true;
                        break;
                    }
                }

                if (!$hasShip && $ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID)) {
                    $Success = true;
                    $MSG     = 'You successfully bought an ' . $ITEM->NAME . '!';
                } else {
                    $Success = false;
                    $MSG     = 'You already have an ' . $ITEM->NAME . ' in your Hangars!';
                }

                break;
            case 'SHIPS':

                $hasShip = false;
                $Hangars = $System->User->Hangars->getHangars();
                foreach ($Hangars as $Hangar) {
                    /** @var $Hangar Hangar */
                    if ($Hangar->SHIP_ID == $ITEM->ID) {
                        $hasShip = true;
                        break;
                    }
                }

                if (!$hasShip && $ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID)) {
                    $Success = true;
                    $MSG     = 'You successfully bought an ' . $ITEM->NAME . '!';
                } else {
                    $Success = false;
                    $MSG     = 'You already have an ' . $ITEM->NAME . ' in your Hangars!';
                }

                break;
            case 'EQUIPABLES':
                if ($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID, $AMOUNT)) {
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'EXTRAS':
                if ($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID, $AMOUNT)) {
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'GENERATOR':
                if ($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID, $AMOUNT)) {
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'AMMO':
                if ($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID, $AMOUNT)) {
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'DRONES':
                $ITEM_DATA = $ITEM->getITEMDATA();
                if ($ITEM_DATA['CATEGORY'] == 'drone') {
                    $DRONES = $System->User->hasDrones(true, true);
                    if ($ITEM->LOOT_ID != 'drone_zeus' && $ITEM->LOOT_ID != 'drone_apis') {
                        if (($DRONES['Iris'] + $DRONES['Flax']) < 8) {
                            if ($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID)) {
                                $Success = true;
                                $MSG     = 'You successfully bought an ' . $ITEM->NAME . '!';
                            }
                        } else {
                            $Success = false;
                            $MSG     = 'You already have 8 Drones! Go sell one.';
                        }
                    } else {
                        if ($ITEM->LOOT_ID == 'drone_zeus') {
                            if ($DRONES['Zeus'] < 1) {
                                if ($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID)) {
                                    $Success = true;
                                    $MSG     = 'You successfully bought a ' . $ITEM->NAME . '!';
                                }
                            } else {
                                $Success = false;
                                $MSG     = 'You already have an Zeus-Drone!';
                            }
                        } else {
                            if ($DRONES['Apis'] < 1) {
                                if ($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID)) {
                                    $Success = true;
                                    $MSG     = 'You successfully bought an ' . $ITEM->NAME . '!';
                                }
                            } else {
                                $Success = false;
                                $MSG     = 'You already have an Apis-Drone!';
                            }
                        }
                    }
                } elseif ($ITEM_DATA['CATEGORY']== 'drone_design') {
                    if($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID))
                    {
                        $Success = true;
                        $MSG = 'You successfully bought a '. $ITEM->NAME .' Design!';
                    }
                } elseif ($ITEM_DATA['CATEGORY']== 'drone_formation') {
                    if (!$System->User->hasFormation($ITEM_ID)) {
                        if($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID)){
                            $Success = true;
                            $MSG = 'You successfully bought drone formation - '. $ITEM->NAME .'!';
                        }
                    } else {
                            $Success = false;
                            $MSG = 'You already have this formation!';
                    }
                } else {
                    die(json_encode(['error' => true, 'error_msg' => 'Buy Function not implemented!']));
                }
                break;
            case 'DESIGNS':
                $DESIGNS   = json_decode($System->User->SHIP_DESIGNS, true);
                $ITEM_DATA = $ITEM->getITEMDATA();

                if (is_array($DESIGNS) && in_array($ITEM->ID, $DESIGNS[$ITEM_DATA['ShipId']])) {
                    $Success = false;
                    $MSG     = 'You already have the ' . $ITEM->NAME . ' - Design!';
                } else {
                    if ($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID)) {
                        $Success = true;
                        $MSG     = 'You successfully bought ' . $ITEM->NAME . ' - Design!';
                    }
                }
                break;
            case 'PET':
                $ITEM_DATA = $ITEM->getITEMDATA();
                if($ITEM_DATA['CATEGORY'] == 'pet'){
                    if(!$System->User->hasPet()){
                        if($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID)){
                            die(json_encode(['success' => true,
                                'msg' => 'You successfully bought a '.$ITEM->NAME.'!
                                Go to hangar to give it a name!']));
                        }
                    }else{
                        die(json_encode(['error' => true, 'error_msg' => 'You already have a PET!']));
                    }
                } else {
                    if ($System->User->hasPet()) {
                        if($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID, $AMOUNT)){
                            die(json_encode(['success' => true, 'msg' => 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!']));
                        }
                    } else {
                        die(json_encode(['error' => true, 'error_msg' => 'You need to buy a PET first!']));
                    }
                }

                if ($ITEM_DATA['CATEGORY'] == 'gear' || $ITEM_DATA['CATEGORY'] == 'protocols'){
                    if ($ITEM->buy($System->User->USER_ID, $System->User->PLAYER_ID)) {
                        $Success = true;
                        $MSG     = 'You successfully bought ' . $ITEM->NAME . '!';
                    } else {
                        die(json_encode(['error' => true, 'error_msg' => 'Error occurred']));
                    }
                }
                break;

        }

        if ($Success) {
            $System->logging->addLog(
                $System->User->USER_ID,
                $System->User->PLAYER_ID,
                $System->User->SERVER_DB,
                $MSG
            );
            die(json_encode(['success' => true, 'msg' => $MSG]));
        } else {
            $System->logging->addLog(
                $System->User->USER_ID,
                $System->User->PLAYER_ID,
                $System->User->SERVER_DB,
                $MSG,
                LogType::SYSTEM
            );
            die(json_encode(['error' => true, 'error_msg' => $MSG]));
        }
    }
}