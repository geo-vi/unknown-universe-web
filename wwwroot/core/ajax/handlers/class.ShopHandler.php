<?php

use hangar\Hangar;

/**
 * Class ShopHandler
 */
class ShopHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('load', ['CATEGORY']);
        $this->addAction(
            'buy',
            [
                'CATEGORY',
                'ITEM_ID',
                'AMOUNT',
            ]
        );
    }

    public function handle() : void
    {
        parent::handle();

        $function = 'exec_' . $this->action;

        $this->$function();
    }

    public function exec_load()
    {
        global $System;
        $CATEGORY = (string) strtoupper($this->params['CATEGORY']);

        die(json_encode($System->Shop->getShopItems($CATEGORY)));
    }

    public function exec_buy()
    {
        global $System;
        $CATEGORY = (string) strtoupper($this->params['CATEGORY']);
        $ITEM_ID  = (int) $this->params['ITEM_ID'];
        $AMOUNT   = (int) $this->params['AMOUNT'];

        if ( !isset($System->Shop->CATEGORIES[$CATEGORY])) {
            http_response_code(400);
            die(json_encode(['message' => 'Category doesn\'t exist!']));
        }

        if ($AMOUNT < 1) {
            http_response_code(400);
            die(json_encode(['message' => 'You need to buy a min. of 1 Item!']));
        }

        $ITEM = $System->Shop->getItem($CATEGORY, $ITEM_ID);
        if ($ITEM == null) {
            http_response_code(400);
            die(json_encode(['message' => 'Item doesn\'t exist!']));
        }

        if ($AMOUNT > 1 && !$ITEM->AMOUNT_SELECTABLE) {
            http_response_code(400);
            die(json_encode(['message' => 'Amount invalid!']));
        }

        $PRICE = $ITEM->PRICE * $AMOUNT;
        if ($ITEM->CURRENCY == 1) {
            if (( $System->User->__get('CREDITS') - $PRICE ) < 0) {
                http_response_code(400);
                die(json_encode(['message' => 'Insufficient Credits!']));
            }
        } else {
            if (( $System->User->__get('URIDIUM') - $PRICE ) < 0) {
                http_response_code(400);
                die(json_encode(['message' => 'Insufficient Uridium!']));
            }
        }

        $Success = false;
        $MSG     = 'Something went wrong while buying ' . $ITEM->NAME . '!';
        switch ($CATEGORY) {
            case 'BOOSTER':
                if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'), $AMOUNT)) {
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'ADMINITEM':
                if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'), $AMOUNT)) {
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

                if ( !$hasShip && $ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
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

                if ( !$hasShip && $ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
                    $Success = true;
                    $MSG     = 'You successfully bought an ' . $ITEM->NAME . '!';
                } else {
                    $Success = false;
                    $MSG     = 'You already have an ' . $ITEM->NAME . ' in your Hangars!';
                }

                break;
            case 'EQUIPABLES':
                if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'), $AMOUNT)) {
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'EXTRAS':
                if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'), $AMOUNT)) {
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'GENERATOR':
                if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'), $AMOUNT)) {
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'AMMO':
                if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'), $AMOUNT)) {
                    $Success = true;
                    $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                }
                break;
            case 'DRONES':
                $ITEM_DATA = $ITEM->getItemData();
                if ($ITEM_DATA['CATEGORY'] == 'drone') {
                    $DRONES = $System->User->hasDrones(true, true);
                    if ($ITEM->LOOT_ID != 'drone_zeus' && $ITEM->LOOT_ID != 'drone_apis') {
                        if (( $DRONES['Iris'] + $DRONES['Flax'] ) < 8) {
                            if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
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
                                if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
                                    $Success = true;
                                    $MSG     = 'You successfully bought a ' . $ITEM->NAME . '!';
                                }
                            } else {
                                $Success = false;
                                $MSG     = 'You already have an Zeus-Drone!';
                            }
                        } else {
                            if ($DRONES['Apis'] < 1) {
                                if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
                                    $Success = true;
                                    $MSG     = 'You successfully bought an ' . $ITEM->NAME . '!';
                                }
                            } else {
                                $Success = false;
                                $MSG     = 'You already have an Apis-Drone!';
                            }
                        }
                    }
                } elseif ($ITEM_DATA['CATEGORY'] == 'drone_design') {
                    if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
                        $Success = true;
                        $MSG     = 'You successfully bought a ' . $ITEM->NAME . ' Design!';
                    }
                } elseif ($ITEM_DATA['CATEGORY'] == 'drone_formation') {
                    if ( !$System->User->hasFormation($ITEM_ID)) {
                        if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
                            $Success = true;
                            $MSG     = 'You successfully bought drone formation - ' . $ITEM->NAME . '!';
                        }
                    } else {
                        $Success = false;
                        $MSG     = 'You already have this formation!';
                    }
                } else {
                    http_response_code(400);
                    die(
                    json_encode(
                        ['message' => 'Buy functionality for ' . $ITEM_DATA['CATEGORY'] . ' not implemented!']
                    )
                    );
                }
                break;
            case 'DESIGNS':
                $DESIGNS   = json_decode($System->User->__get('SHIP_DESIGNS'), true);
                $ITEM_DATA = $ITEM->getItemData();

                if (is_array($DESIGNS) && in_array($ITEM->ID, $DESIGNS[$ITEM_DATA['ShipId']])) {
                    $Success = false;
                    $MSG     = 'You already have the ' . $ITEM->NAME . ' - Design!';
                } else {
                    if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
                        $Success = true;
                        $MSG     = 'You successfully bought ' . $ITEM->NAME . ' - Design!';
                    }
                }
                break;
            case 'PET':
                $ITEM_DATA = $ITEM->getItemData();
                if ($ITEM_DATA['CATEGORY'] == 'pet') {
                    if ( !$System->User->hasPet()) {
                        if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
                            $Success = true;
                            $MSG     = 'You successfully bought a ' .
                                       $ITEM->NAME .
                                       '! Go to the Hangar to give it a name!';
                        }
                    } else {
                        http_response_code(400);
                        die(json_encode(['message' => 'You already have a PET!']));
                    }
                } else {
                    if ($System->User->hasPet()) {
                        if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'), $AMOUNT)) {
                            $Success = true;
                            $MSG     = 'You successfully bought  ' . $AMOUNT . 'x ' . $ITEM->NAME . '!';
                        }
                    } else {
                        http_response_code(400);
                        die(json_encode(['message' => 'You need to buy a PET first!']));
                    }
                }

                if ($ITEM_DATA['CATEGORY'] == 'gear' || $ITEM_DATA['CATEGORY'] == 'protocols') {
                    if ($ITEM->buy($System->User->__get('USER_ID'), $System->User->__get('PLAYER_ID'))) {
                        $Success = true;
                        $MSG     = 'You successfully bought ' . $ITEM->NAME . '!';
                    } else {
                        http_response_code(400);
                        die(json_encode(['message' => 'Error occurred']));
                    }
                }
                break;

        }

        if ($Success) {
            $System->logging->addLog(
                $System->User->__get('USER_ID'),
                $System->User->__get('PLAYER_ID'),
                $System->User->__get('SERVER_DB'),
                $MSG
            );
            die(json_encode(['message' => $MSG]));
        } else {
            $System->logging->addLog(
                $System->User->__get('USER_ID'),
                $System->User->__get('PLAYER_ID'),
                $System->User->__get('SERVER_DB'),
                $MSG,
                LogType::SYSTEM
            );
            http_response_code(400);
            die(json_encode(['message' => $MSG]));
        }
    }
}
