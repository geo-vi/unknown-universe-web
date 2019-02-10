<?php

namespace DB;

use PDO;
use PDOException;

class MySQL
{

    protected $connection;

    function __construct($ip, $db, $user, $pass)
    {
        try {
            $con = new PDO("mysql:host=$ip;dbname=$db;charset=utf8", $user, $pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, (DEBUG == false) ? PDO::ERR_NONE : PDO::ERRMODE_EXCEPTION);
            $this->connection = $con;
        } catch (PDOException $e) {
            if (DEBUG) {
                var_dump($e);
            }
        }
    }

    public function isType($type, $sql)
    {
        return preg_match("/^" . $type . "/i", $sql);
    }

    /**
     * @param $sql
     * @param null $options
     * @return bool|array
     */
    public function QUERY($sql, $options = null)
    {
        $con = $this->connection;
        if ($con == null) {
            return false;
        }
        $sth = $con->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result = null;
        if ($this->isType("SELECT", $sql)) {
            if ($options !== null && is_array($options)) {
                $sth->execute($options);
            } else {
                $sth->execute();
            }
            $result = $sth->fetchAll();
            return $result;
        } elseif ($this->isType("INSERT", $sql) || $this->isType("UPDATE", $sql) || $this->isType("DELETE", $sql)) {
            try {
                if ($sth->execute($options)) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                return false;
            }
        }
        return false;
    }

    function lastID() {
        return $this->QUERY('SELECT LAST_INSERT_ID()')[0]['LAST_INSERT_ID()'];
    }

    function __destruct()
    {
        $this->connection = null;
    }
}
