<?php

namespace shop;

use DB\MySQL;
use User;
use Utils;

class Shop
{

    public $CATEGORIES = [
        "SHIPS"      => [
            "type"  => "shop\Ship",
            "table" => "ships",
            "id"    => "ship_id",
            "where" => [
                "inShop" => 1,
            ],
        ],
        "EQUIPABLES" => [
            "type"  => "shop\Item",
            "table" => "items",
            "id"    => "ID",
            "where" => [
                "CATEGORY" => [
                    'glue'      => 'OR',
                    'operation' => '=',
                    'items'     => [
                        "'laser'",
                        "'heavy'",
                    ],
                ],
                "LOOT_ID"  => [
                    'glue'      => 'AND',
                    'operation' => '!=',
                    'items'     => [
                        "'equipment_weapon_laser_lf-4'",
                        "''",
                    ],
                ],
            ],
            "order" => "CATEGORY DESC,ID DESC",
        ],
        "EXTRAS"     => [
            "type"  => "shop\Item",
            "table" => "items",
            "id"    => "ID",
            "where" => [
                "CATEGORY" => "'extra'",
                "LOOT_ID"  => [
                    'glue'      => 'AND',
                    'operation' => '!=',
                    'items'     => ["''"],
                ],
            ],
        ],
        "GENERATOR"  => [
            "type"  => "shop\Item",
            "table" => "items",
            "id"    => "ID",
            "where" => [
                "CATEGORY" => "'generator'",
            ],
        ],
        "DRONES"     => [
            "type"  => "shop\Drone",
            "table" => "items",
            "id"    => "ID",
            "where" => [
                "LOOT_ID" => [
                    "'drone_iris'",
                    "'drone_flax'",
                    "'drone_formation_f-01-tu'",
                    "'drone_formation_f-02-ar'",
                    "'drone_formation_f-03-la'",
                    "'drone_formation_f-04-st'",
                    "'drone_formation_f-05-pi'",
                    "'drone_formation_f-06-da'",
                    "'drone_formation_f-07-di'",
                    "'drone_formation_f-08-ch'",
                    "'drone_formation_f-09-mo'",
                    "'drone_formation_f-10-cr'",
                    "'drone_formation_f-11-he'",
                    "'drone_formation_f-12-ba'",
                    "'drone_formation_f-13-bt'",
                ],
            ],
            "order" => "CATEGORY ASC,ID DESC",
        ],
        "AMMO"       => [
            "type"  => "shop\Ammo",
            "table" => "items",
            "id"    => "ID",
            "where" => [
                "CATEGORY" => "'ammo'",
            ],
        ],
        "BOOSTER"    => [
            "type"  => "shop\Booster",
            "table" => "items",
            "id"    => "ID",
            "where" => [
                "CATEGORY" => "'booster'",
            ],
        ],
        "PET"        => [
            "type"  => "shop\PET",
            "table" => "items",
            "id"    => "ID",
            "where" => [
                "CATEGORY" => [
                    "'pet'",
                    "'pet_fuel'",
                    "'gear'",
                    "'protocols'",
                ],
            ],
        ],
        "DESIGNS"    => [
            "type"  => "shop\Design",
            "table" => "ships_designs",
            "id"    => "ID",
            "where" => [
                "inShop" => 1,
            ],
        ],
        "ADMINITEM"  => [
            "type"  => "shop\Item",
            "table" => "items",
            "id"    => "ID",
            "where" => [
                "LOOT_ID" => [
                    'glue'      => 'OR',
                    'operation' => '=',
                    'items'     => [
                        "'drone_designs_hercules'",
                        "'drone_designs_havoc'",
                        "'equipment_weapon_laser_lf-4'",
                        "'drone_apis'",
                        "'drone_zeus'",
                        "'ammunition_laser_rsb-75'",
                        "'ammunition_laser_ucb-100'",
                    ],
                ],
            ],
            "order" => "CATEGORY DESC,ID DESC",
        ],
        "ADMINSHIP"  => [
            "type"  => "shop\Ship",
            "table" => "ships",
            "id"    => "ship_id",
            "where" => [
                "ship_id" => [
                    "'98'",
                ],
            ],
        ],
    ];
    /** @var User */
    private $User;
    /** @var MySQL */
    private $mysql;

    function __construct($user)
    {
        $this->User  = $user;
        $this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);
    }

    /**
     * getItem Function
     *
     * @param $CATEGORY
     * @param $ID
     *
     * @return null|Item
     */
    public function getItem($CATEGORY, $ID)
    {
        $QUERY_PARAMS = $this->CATEGORIES[$CATEGORY];
        if (isset($QUERY_PARAMS['order'])) {
            unset($QUERY_PARAMS['order']);
        }
        $QUERY     = $this->buildQuery($QUERY_PARAMS);
        $ITEM_DATA = $this->mysql->QUERY($QUERY . ' AND ' . $QUERY_PARAMS['id'] . ' =  ?', [$ID]);

        if (isset($ITEM_DATA[0]) && !empty($ITEM_DATA[0])) {
            $ITEM_TYPE = $this->CATEGORIES[$CATEGORY]['type'];

            return new $ITEM_TYPE($ITEM_DATA[0], $this->mysql);
        } else {
            return null;
        }
    }

    /**
     * buildQuery Function
     * used to build the MySQL Queries used to get stuff from the Database
     *
     * @param array $PARAMS
     *
     * @return string
     */
    private function buildQuery(array $PARAMS)
    {

        $QUERY = "SELECT * FROM server_" . $PARAMS['table'];

        if (isset($PARAMS['where'])) {
            $QUERY .= " WHERE ";

            $first = true;
            foreach ($PARAMS['where'] as $FIELD => $CASE) {
                if ( !$first) {
                    $QUERY .= ' AND ';
                }
                $QUERY .= '(';
                if (is_array($CASE)) {
                    if (isset($CASE['glue'])) {
                        if (isset($CASE['operation'])) {
                            $QUERY .= $FIELD . ' ' . $CASE['operation'] . ' ' . implode(
                                    ' ' . $CASE['glue'] . ' ' . $FIELD . ' ' . $CASE['operation'] . ' ',
                                    $CASE['items']
                                );
                        } else {
                            $QUERY .= $FIELD . " = " . implode(
                                    ' ' . $CASE['glue'] . ' ' . $FIELD . ' = ',
                                    $CASE['items']
                                );
                        }
                    } else {
                        $QUERY .= $FIELD . " = " . implode(' OR ' . $FIELD . ' = ', $CASE);
                    }
                } else {
                    $QUERY .= $FIELD . " = " . $CASE;
                }
                $QUERY .= ')';
                $first = false;
            }
        }
        if (isset($PARAMS['order'])) {
            $QUERY .= " ORDER BY " . $PARAMS['order'];
        }

        return $QUERY;
    }

    public function getItemInfo($id)
    {
        $items = $this->mysql->QUERY('SELECT * FROM server_items WHERE ID = ?', [$id]);

        return $items;
    }

    public function getItemData($ID)
    {
        $do = $this->mysql->QUERY('SELECT * FROM server_items WHERE ID = ?', [$ID]);

        return $do[0]['NAME'];
    }

    public function getCategoryIDs($category)
    {
        $query = $this->mysql->QUERY('SELECT ID FROM server_items WHERE CATEGORY = ' . $category);

        $ids = [];
        foreach ($query as $row) {
            $ids[] = (int) $row['ID'];
        }

        return $ids;
    }

    /**
     * Returns a special list of items for the shop
     *
     * @param $CATEGORY
     *
     * @return array
     */
    public function getShopItems($CATEGORY)
    {
        $QUERY_PARAMS = $this->CATEGORIES[$CATEGORY];
        $QUERY        = $this->buildQuery($QUERY_PARAMS);
        $ITEMS_RAW    = $this->mysql->QUERY($QUERY);
        $ITEM_ARR     = [];

        /** @var  Item $ITEM_TYPE */
        $ITEM_TYPE = $this->CATEGORIES[$CATEGORY]['type'];
        foreach ($ITEMS_RAW as $ITEM_DATA) {
            $ITEM_ARR[] = new $ITEM_TYPE($ITEM_DATA, $this->mysql);
        }

        return $ITEM_ARR;
    }

    /**
     * Returns all items on the server
     *
     * @return array|bool
     */
    public function getServerItems()
    {
        $items = $this->mysql->QUERY('SELECT * FROM server_items ORDER BY ID ASC');

        return $items;
    }

    /**
     * Returns all unique item categories
     *
     * @return array|bool
     */
    public function getItemCategories()
    {
        $items = $this->mysql->QUERY('SELECT DISTINCT CATEGORY FROM server_items');

        return $items;
    }

    // +-----------------------------------------------------------------------+
    // + Auction                                                               +
    // +-----------------------------------------------------------------------+

    public function checkTime()
    {
        $Today       = time();
        $Time        = $this->getAuctionTime();
        $PremiumDate = strtotime($Time);

        if ($PremiumDate < $Today) {
            print $PremiumDate;
            echo '<br>';
            print $Today;
            $this->updateAuction();
        } else {
            print $PremiumDate;
            echo '<br>';
            print $Today;
        }
    }

    public function getAuctionTime()
    {
        $hour = $this->mysql->QUERY('SELECT * FROM server_auctions_settings WHERE ID = 1');

        return $hour[0]['LAST_HOURLY'];
    }

    public function updateAuction()
    {
        $update = $this->mysql->QUERY(
            'UPDATE server_auctions_settings SET LAST_HOURLY = DATE_ADD(LAST_HOURLY, INTERVAL 1 HOUR)'
        );

        return $update;
    }

    public function addAuctionItem($item_id, $item_name, $item_desc, $item_quantity, $type)
    {
        return $this->mysql->QUERY(
            'INSERT INTO server_auctions (ITEMID, ITEMNAME, ITEMQ, ITEM_DESC, TYPE, AUCTION_TYPE, MAX_BID, BID_USER_ID)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $item_id,
                $item_name,
                $item_quantity,
                $item_desc,
                $type,
                1,
                0,
                0,
            ]
        );
    }

    public function getAllAuctions()
    {
        $auction = $this->mysql->query("SELECT * FROM server_auctions ORDER BY ID ASC");

        return $auction;
    }

    public function submitBid($item_id, $bid)
    {
        if ($bid > $this->User->__get('CREDITS') || $this->User->__get('CREDITS') <= 0) {
            http_response_code(400);
            Utils::dieM('You do not have enough credits for this!');
        } else {
            $this->mysql->QUERY(
                "UPDATE player_data SET CREDITS = CREDITS - ? WHERE USER_ID = ?",
                [
                    $bid,
                    $this->User->__get('USER_ID'),
                ]
            );
            $submit = $this->mysql->query(
                "UPDATE server_auctions SET MAX_BID = ?, BID_USER_ID = ? WHERE ID = ?",
                [
                    $bid,
                    $this->User->__get('USER_ID'),
                    $item_id,
                ]
            );

            if ($submit) {
                Utils::dieM('Successfully placed bid!');
            } else Utils::dieS(400, 'Something went wrong, try again.');
        }
    }

    /*
    ********** VOUCHER CODE SYSTEM START ************
    */

    /**
     * Gets special items in the voucher reward category
     *
     * @return array|bool
     */
    public function getSpecialRewards()
    {
        // TYPE 0: laser, TYPE 1: ammo
        // ID 22: LF-2, ID 23: MP-1, ID 24: LF-1
        $items = $this->mysql->QUERY(
            'SELECT ID, NAME FROM server_items WHERE TYPE IN (0, 12) AND ID NOT IN (22, 23, 24) ORDER BY ID ASC'
        );

        return $items;
    }

    /*
    ********** VOUCHER CODE SYSTEM END************
    */
}
