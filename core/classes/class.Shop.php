<?php

namespace shop;

use DB\MySQL;

class Shop
{

    /** @var User */
    private $User;
    /** @var MySQL */
    private $mysql;

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
                    'items'     => ["'laser'", "'generator'", "'heavy'", "'extra'"],
                ],
                "LOOT_ID"  => [
                    'glue'      => 'AND',
                    'operation' => '>',
                    'items'     => ["''"],
                ],
            ],
            "order" => "CATEGORY DESC,ID DESC",
        ],
        "DRONES"     => [
            "type"  => "shop\Drone",
            "table" => "items",
            "id"    => "ID",
            "where" => [
                "CATEGORY" => ["'drone'"],
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
                //"CATEGORY" => ["'pet'","'pet_fuel'","'pet_gear'"]
                "CATEGORY" => ["''"],
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
    ];

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
     * getItems Function
     *
     * @param $CATEGORY
     *
     * @return array
     */
    public function getItems($CATEGORY)
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
                if (!$first) {
                    $QUERY .= ' AND ';
                }
                $QUERY .= '(';
                if (is_array($CASE)) {
                    if (isset($CASE['glue'])) {
                        if (isset($CASE['operation'])) {
                            $QUERY .= $FIELD . ' ' . $CASE['operation'] . ' ' . implode(' ' . $CASE['glue'] . ' ' . $FIELD . ' ' . $CASE['operation'] . ' ',
                                    $CASE['items']);
                        } else {
                            $QUERY .= $FIELD . " = " . implode(' ' . $CASE['glue'] . ' ' . $FIELD . ' = ',
                                    $CASE['items']);
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
}