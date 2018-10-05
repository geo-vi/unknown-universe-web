<?php
use DB\MySQL;

class SkillTree
{
    private $SKILL_LIST = [
        "SHIP_HULL" => 0,
        "ENGINEERING" => 0,
        "SHIELD_ENGINEERING" => 0,
        "EVASIVE_MANEUVERS" => 0,
        "SHIELD_MECHANICS" => 0,
        "TACTICS" => 0,
        "LOGISTICS" => 0,
        "LUCK" => 0,
        "CRUELTY" => 0,
        "TRACTOR_BEAM" => 0,
        "GREED" => 0,
        "DETONATION" => 0,
        "EXPLOSIVES" => 0,
        "HEAT_SEEKING_MISSLES" => 0,
        "BOUNTY_HUNTER" => 0,
        "ROCKET_FUSION" => 0,
        "ALIEN_HUNTER" => 0,
        "ELECTRO_OPTICS" => 0,
    ];

    /** @var User */
    private $user;
    /** @var MySQL */
    private $mysql;

    function __construct($user)
    {
        $this->user = $user;
        $this->mysql = $this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);
    }

    /**
     * Magic getter
     *
     * @param $property
     * @return mixed
     *
     */
    function __get($property)
    {
        if (isset($this->$property)) {
            return $this->$property;
        }
        else if(isset($this->SKILL_LIST[$property])) {
            return $this->SKILL_LIST[$property];
        }
        else{
            return false;
        }
    }

    public function refresh(){

    }

}