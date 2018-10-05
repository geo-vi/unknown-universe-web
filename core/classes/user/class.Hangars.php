<?php
use DB\MySQL;

class Hangars
{
    /** @var User */
    private $user;
    /** @var MySQL */
    private $mysql;

    /** @var  Hangar */
    public $CURRENT_HANGAR;

    function __construct($user)
    {
        $this->user = $user;
        $this->mysql = $this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);

        //SET CURRENT HANGAR
        $this->refreshCurrentHangar();
    }

    /**
     * refreshCurrentHangar
     * refreshs Data of Current Hangar in use
     *
     */
    public function refreshCurrentHangar(){
        $hangar_data = $this->mysql->QUERY(
            'SELECT * FROM player_hangar WHERE USER_ID = ? AND PLAYER_ID = ? AND ACTIVE = 1',
            array($this->user->USER_ID, $this->user->PLAYER_ID)
        )[0];
        $this->CURRENT_HANGAR = new Hangar($hangar_data);
    }

    /**
     * setDesign Function
     * sets Ship Design in Current Hangar
     *
     * @param $Design
     * @return bool
     */
    public function setDesign($Design){
        if($this->mysql->QUERY('UPDATE player_hangar SET SHIP_DESIGN = ? WHERE USER_ID = ? AND PLAYER_ID = ? AND ACTIVE = 1', array($Design, $this->user->USER_ID, $this->user->PLAYER_ID))){
            $this->refreshCurrentHangar();
            return true;
        }else{
            return false;
        }
    }

    /**
     * getHangars
     * gets all Hangars from current user
     *
     * @param $ReturnCnt
     * @return array(Object Hangar)|int
     *
     */
    public function getHangars($ReturnCnt = false){
        $results = $this->mysql->QUERY(
            'SELECT * FROM player_hangar WHERE USER_ID = ? AND PLAYER_ID = ?',
            array($this->user->USER_ID, $this->user->PLAYER_ID)
        );

        if(!$ReturnCnt){
            $HANGARS = [];
            foreach ($results as $result){
                $HANGARS[] = new Hangar($result);
            }
            return $HANGARS;
        }else{
            return count($results);
        }
    }

    /**
     * setHangar Function
     * set Hangar by ID
     *
     * @param $ID
     * @return array|bool|null
     */
    public function setHangar($ID){
        $oldhangar = $this->CURRENT_HANGAR->ID;

        if(is_numeric($ID) && $ID != $oldhangar && $this->hasHangar($ID)){

            if($this->mysql->QUERY("UPDATE player_hangar SET ACTIVE = 1 WHERE PLAYER_ID = ? AND USER_ID = ? AND ID  = ?",array($this->user->PLAYER_ID, $this->user->USER_ID, $ID))){

                if($this->mysql->QUERY("UPDATE player_hangar SET ACTIVE = 0 WHERE PLAYER_ID = ? AND USER_ID = ? AND ID  = ?",array($this->user->PLAYER_ID,$this->user->USER_ID,$oldhangar))){
                    $this->refreshCurrentHangar();
                    $this->mysql->QUERY('UPDATE player_ship_config SET HANGAR_ID = ? WHERE PLAYER_ID = ? AND USER_ID = ?', array($this->CURRENT_HANGAR->ID, $this->user->PLAYER_ID, $this->user->USER_ID));
                    return true;
                }else{
                    return false;
                }

            }else {
                return false;
            }

        }else {
            return false;
        }
    }

    /**
     * hasFreeHangar Function
     * checks if user has a Free Hangar
     *
     * @return bool
     */
    public function hasFreeHangar(){
        if($this->getHangars(true) < 10){
            return true;
        }else {
            return false;
        }
    }

    /**
     * hasHangar Function
     * checks if user owns Hangar by $ID
     *
     * @param $ID
     * @return bool
     */
    public function hasHangar($ID){
        $hangar = $this->mysql->QUERY(
            'SELECT ID FROM player_hangar WHERE USER_ID = ? AND PLAYER_ID = ? AND ID = ?',
            array($this->user->USER_ID, $this->user->PLAYER_ID, $ID)
        );

        if(isset($hangar[0])){
            return true;
        }else{
            return false;
        }
    }

}

class Hangar {

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
        $this->ID = $DATA['ID'];
        $this->COUNT = $DATA['HANGAR_COUNT'];
        $this->SHIP_ID = $DATA['SHIP_ID'];
        $this->ACTIVE = (bool) $DATA['ACTIVE'];
        $this->SHIP_DESIGN = $DATA['SHIP_DESIGN'];
        $this->SHIP_HP = $DATA['SHIP_HP'];
        $this->SHIP_NANO = $DATA['SHIP_NANO'];
        $this->SHIP_MAP_ID = $DATA['SHIP_MAP_ID'];
        $this->SHIP_X = $DATA['SHIP_X'];
        $this->SHIP_Y = $DATA['SHIP_Y'];
        $this->IN_EQUIPMENT_ZONE = (bool) $DATA['IN_EQUIPMENT_ZONE'];
    }
}