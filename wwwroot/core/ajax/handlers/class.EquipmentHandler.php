<?php

/**
 * Class EquipmentHandler
 */
class EquipmentHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('load');
        $this->addAction(
            'move_items',
            [
                'ITEMS',
                'CONFIG',
                'DISPLAY',
                'TO'
            ]
        );
        $this->addAction('switch_design', ['TO']);
        $this->addAction('switch_hangar', ['HANGAR_ID']);
        $this->addAction('sell_drone', ['DRONE_ID']);
        $this->addAction('sell_item', ['ITEM_ID']);
        $this->addAction('sell_items', ['ITEMS']);
        $this->addAction('change_pet_name', ['NEW_PET_NAME']);
    }

    public function handle() : void
    {
        parent::handle();

        $function = 'exec_' . $this->action;

        $this->$function();
    }

    /*
     * Load Function
     */
    public function exec_load()
    {
        global $System;
        $System->User->Inventory->calculateConfigs();
        die(json_encode($System->User->Inventory->getInventory()));
    }

    /*
     * Switch Hangar Function
     */
    public function exec_switch_hangar()
    {
        global $System;
        if ($System->User->Hangars->setHangar($this->params['HANGAR_ID'])) {
            die(
            json_encode(
                [
                    "NEW_SHIP"  => $System->User->getShipImage(),
                    "HANGAR_ID" => $System->User->Hangars->CURRENT_HANGAR->ID,
                ]
            )
            );
        } else {
            http_response_code(400);
            die(json_encode(["message" => "Something went wrong while switching Hangars!"]));
        }
    }

    /*
     * Set Design Function
     */
    public function exec_switch_design()
    {
        global $System;
        $DESIGN_ID         = (int) $this->params['TO'];
        $AVAILABLE_DESIGNS = $System->User->Inventory->getShipInfo()['DESIGNS'];
        $CURRENT_DESIGN    = $System->User->Inventory->getShipInfo()['DESIGN_ID'];

        if ($DESIGN_ID != $CURRENT_DESIGN && isset($AVAILABLE_DESIGNS[$DESIGN_ID])) {
            if ($System->User->Hangars->setDesign($DESIGN_ID)) {
                die(
                json_encode(
                    [
                        "NEW_SHIP"  => $System->User->getShipImage(),
                        "HANGAR_ID" => $System->User->Hangars->CURRENT_HANGAR->ID,
                    ]
                )
                );
            } else {
                http_response_code(400);
                die(json_encode(["message" => "Something went wrong while switching Designs!"]));
            }
        } else {
            http_response_code(400);
            die(json_encode(["message" => "Something went wrong while switching Designs!",]));
        }
    }

    /*
     * Sell Drone Function
     */
    public function exec_sell_drone()
    {
        global $System;

        $DRONE_ID = (int) $this->params['DRONE_ID'];
        $DRONES   = $System->User->Inventory->getDrones();
        if ( !isset($DRONES[$DRONE_ID])) {
            http_response_code(400);
            die(json_encode(["message" => "This Drone doesn't exists!"]));
        }

        if ($System->User->Inventory->sellDrone($DRONE_ID)) {
            //NO ERROR OCCURED
            die(json_encode(["message" => "Drone sold!"]));
        } else {
            http_response_code(400);
            die(json_encode(["message" => "Something went wrong..."]));
        }
    }

    /*
     * Sell Item Function
     */
    public function exec_sell_item()
    {
        global $System;

        $ITEM_ID = (int) $this->params['ITEM_ID'];
        if ( !$System->User->Inventory->ownsItem($ITEM_ID)) {
            http_response_code(400);
            die(json_encode(["message" => "This Item doesn't exists!"]));
        }

        if ($System->User->Inventory->sellItem($ITEM_ID)) {
            //NO ERROR OCCURED
            die(json_encode(["message" => "Success!"]));
        } else {
            http_response_code(400);
            die(json_encode(["message" => "Something went wrong..."]));
        }
    }

    /*
     * Sell Items Function
     */
    public function exec_sell_items() {
        global $System;
        $ITEMS = json_decode($this->params['ITEMS']);
        die(json_encode(["message" => "Something went wrong...".$ITEMS]));
        foreach ($ITEMS as $ITEM) {
             $ITEM_ID = $ITEM->ID;
        }
    }

    /*
     * Move Items Function
     */
    public function exec_move_items()
    {
        global $System;

        //READ OUT PARAMETERS
        $ITEMS   = $this->params['ITEMS'];
        $CONFIG  = (int) $this->params['CONFIG'];
        $DISPLAY = (string) $this->params['DISPLAY'];
        $TO      = $this->params['TO'];

        if ($TO == 'equip') {
            $INVENTORY = $System->User->Inventory->getInventory();

            switch ($DISPLAY) {
                case 'ship':
                    $IDENTIFIER = 'ON_CONFIG_' . $CONFIG;

                    $SLOT_TYPES = [
                        "LASER"     => [
                            "MAX"    => 0,
                            "IN_USE" => 0,
                        ],
                        "HEAVY"     => [
                            "MAX"    => 0,
                            "IN_USE" => 0,
                        ],
                        "GENERATOR" => [
                            "MAX"    => 0,
                            "IN_USE" => 0,
                        ],
                        "EXTRA"     => [
                            "MAX"    => 0,
                            "IN_USE" => 0,
                            "ITEMS"  => [],
                            "TYPES"  => [],
                        ],
                    ];

                    foreach ($INVENTORY['SHIP']['SLOTS']['CONFIG_' . $CONFIG] as $SLOT_TYPE => $MAX_SLOTS) {
                        $SLOT_TYPES[$SLOT_TYPE]['MAX'] = (int) $MAX_SLOTS;
                    }

                    foreach ($INVENTORY['CONFIG_' . $CONFIG][$IDENTIFIER] as $ITEM) {
                        $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['IN_USE']++;
                        if ($ITEM->CATEGORY == 'extra') {
                            $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['ITEMS'][$ITEM->LOOT_ID] = $ITEM->LOOT_ID;
                            $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['TYPES'][$ITEM->TYPE]    = $ITEM->TYPE;
                        }
                    }

                    foreach ($ITEMS as $ITEM) {
                        $ITEM = $System->User->Inventory->getItem($ITEM['ID']);

                        if (
                            isset($SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['ITEMS'][$ITEM->LOOT_ID]) ||
                            isset($SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['TYPES'][$ITEM->TYPE])
                        ) {
                            continue;
                        }

                        if (
                            $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['MAX'] >
                            $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['IN_USE']
                        ) {
                            if (
                            $ITEM->moveToEquipment(
                                $System->User->Hangars->CURRENT_HANGAR->ID,
                                $CONFIG,
                                ['target' => $DISPLAY]
                            )
                            ) {
                                $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['IN_USE']++;
                            } else {
                                http_response_code(400);
                                die(json_encode(["message" => "Something went wrong while moveing the Item!"]));
                            }
                        } else {
                            break;
                        }
                    }
                    break;
                case 'drone':
                    $IDENTIFIER  = 'ON_DRONE_ID_' . $CONFIG;
                    $DRONES      = $INVENTORY['DRONES'];
                    $DRONE_ITEMS = $INVENTORY['CONFIG_' . $CONFIG][$IDENTIFIER];

                    $DRONES_USAGE  = [];
                    $DRONES_DESIGN = [];
                    foreach ($DRONES as $DRONE) {
                        $DRONES_USAGE[$DRONE['ID']]  = 0;
                        $DRONES_DESIGN[$DRONE['ID']] = 0;
                    }

                    foreach ($DRONE_ITEMS as $DRONE_ITEM) {
                        $DRONE_ID = $DRONE_ITEM->DRONE_ID;
                        if ($DRONE_ITEM->CATEGORY == 'drone_design')
                        {
                            $DRONES_DESIGN[$DRONE_ID]++;
                        }
                        else $DRONES_USAGE[$DRONE_ID]++;
                    }

                    if (empty($DRONES)) {
                        http_response_code(400);
                        die(json_encode(["message" => "Something went wrong while moveing the Item!"]));
                    }

                    foreach ($ITEMS as $ITEM) {
                        $ITEM_OBJ = $System->User->Inventory->getItem($ITEM['ID']);
                        if (
                            $ITEM_OBJ->CATEGORY == 'extras' ||
                            $ITEM_OBJ->CATEGORY == 'heavy' ||
                            $ITEM_OBJ->ATTRIBUTES['SPEED'] != null
                        ) {
                            continue;
                        }

                        if (isset($ITEM['DRONE_ID'])) {
                            if (isset($DRONES[$ITEM['DRONE_ID']])) {
                                if (
                                    ( $DRONES_USAGE[$ITEM['DRONE_ID']] < $DRONES[$ITEM['DRONE_ID']]['SLOTS'] && $ITEM['CATEGORY'] != 'drone_design') ||
                                    ( $ITEM['CATEGORY'] == 'drone_design' && $DRONES_DESIGN[$ITEM['DRONE_ID']] < 1 )
                                ) {
                                    if (
                                    $ITEM_OBJ->moveToEquipment(
                                        $System->User->Hangars->CURRENT_HANGAR->ID,
                                        $CONFIG,
                                        [
                                            'target'  => $DISPLAY,
                                            'droneID' => $ITEM['DRONE_ID'],
                                        ]
                                    )
                                    ) {
                                        if ($ITEM['CATEGORY'] == 'drone_design') {
                                            $DRONES_DESIGN[$ITEM['DRONE_ID']]++;
                                        } else {
                                            $DRONES_USAGE[$ITEM['DRONE_ID']]++;
                                        }
                                    } else {
                                        http_response_code(400);
                                        die(json_encode(["message" => "Something went wrong while moveing the Item!"]));
                                    }
                                }
                            } else {
                                http_response_code(400);
                                die(json_encode(["message" => "Drone doesnt exists! You really want a ban for that?"]));
                            }
                        } else {
                            foreach ($DRONES as $DRONE) {
                                if (($DRONES_USAGE[$DRONE['ID']] < $DRONE['SLOTS'] && $ITEM['CATEGORY'] != 'drone_design') ||
                                    ($ITEM['CATEGORY'] == 'drone_design' && $DRONES_DESIGN[$DRONE['ID']] < 1 )) {
                                    if (
                                    $ITEM_OBJ->moveToEquipment(
                                        $System->User->Hangars->CURRENT_HANGAR->ID,
                                        $CONFIG,
                                        [
                                            'target' => $DISPLAY,
                                            'droneID' => $DRONE['ID'],
                                        ]
                                    )
                                    ) {
                                        if ($ITEM['CATEGORY'] == 'drone_design') {
                                            $DRONES_DESIGN[$DRONE['ID']]++;
                                        } else {
                                            $DRONES_USAGE[$DRONE['ID']]++;
                                        }
                                    } else {
                                        http_response_code(400);
                                        die(json_encode(["message" => "Something went wrong while moveing the Item!"]));
                                    }
                                }
                            }
                        }
                    }
                    break;
                case 'pet':
                    $IDENTIFIER = 'ON_PET_' . $CONFIG;

                    $SLOT_TYPES = [
                        "LASER"     => [
                            "MAX"    => 0,
                            "IN_USE" => 0,
                        ],
                        "GEAR"     => [
                            "MAX"    => 0,
                            "IN_USE" => 0,
                            "ITEMS"  => [],
                            "TYPES"  => [],
                        ],
                        "GENERATOR" => [
                            "MAX"    => 0,
                            "IN_USE" => 0,
                        ],
                        "PROTOCOLS"     => [
                            "MAX"    => 0,
                            "IN_USE" => 0,
                        ],
                    ];

                    foreach ($INVENTORY['PET']['SLOTS']['CONFIG_' . $CONFIG] as $SLOT_TYPE => $MAX_SLOTS) {
                        $SLOT_TYPES[$SLOT_TYPE]['MAX'] = (int) $MAX_SLOTS;
                    }

                    foreach ($INVENTORY['CONFIG_' . $CONFIG][$IDENTIFIER] as $ITEM) {
                        $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['IN_USE']++;
                        if ($ITEM->CATEGORY == 'gear') {
                            $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['ITEMS'][$ITEM->LOOT_ID] = $ITEM->LOOT_ID;
                            $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['TYPES'][$ITEM->TYPE]    = $ITEM->TYPE;
                        }
                    }

                    foreach ($ITEMS as $ITEM) {
                        $ITEM = $System->User->Inventory->getItem($ITEM['ID']);

                        if (
                            isset($SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['ITEMS'][$ITEM->LOOT_ID]) ||
                            isset($SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['TYPES'][$ITEM->TYPE])
                        ) {
                            continue;
                        }

                        if (
                            $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['MAX'] >
                            $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['IN_USE']
                        ) {
                            if (
                            $ITEM->moveToEquipment(
                                $System->User->Hangars->CURRENT_HANGAR->ID,
                                $CONFIG,
                                ['target' => $DISPLAY]
                            )
                            ) {
                                $SLOT_TYPES[strtoupper($ITEM->CATEGORY)]['IN_USE']++;
                            } else {
                                http_response_code(400);
                                die(json_encode(["message" => "Something went wrong while moveing the Item!"]));
                            }
                        } else {
                            return;
                        }
                    }
                    break;
                default:
                    die(json_encode(["message" => "No idea what just happened."]));
            }

            //NO ERROR OCCURED
            die(json_encode(["message" => "Success!"]));
        } else {
            if ($TO == 'inv') {
                foreach ($ITEMS as $ITEM) {
                    $ITEM = $System->User->Inventory->getItem($ITEM['ID']);

                    if ($ITEM) {
                        if ($ITEM->moveToInventory($System->User->Hangars->CURRENT_HANGAR->ID, $CONFIG)) {
                            continue;
                        } else {
                            http_response_code(400);
                            die(json_encode(["message" => "Something went wrong while moveing an item!"]));
                        }
                    } else {
                        http_response_code(400);
                        die(
                        json_encode(
                            ["message" => "The requested ITEM to move doesnt exists in your Inventory... try that again and get banned!"]
                        )
                        );
                    }
                }

                //NO ERROR OCCURED
                die(json_encode(["message" => "Success!"]));
            } else {
                http_response_code(400);
                die(json_encode(["message" => "No idea what just happened."]));
            }
        }
    }

    public function exec_change_pet_name() {
        global $System;
        $NEW_NAME = $this->params['NEW_PET_NAME'];
        if (sizeof($NEW_NAME) > 15) {
            http_response_code(400);
            die(json_encode(["message" => "Name too long."]));
        }
        $System->User->changePetName($NEW_NAME);
        die(json_encode(
            [
                "message" => "Name changed.",
                "new_name" => $NEW_NAME,
            ]
        ));
    }
}
