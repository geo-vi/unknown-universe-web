<?php

use DB\MySQL;

class SkillTree
{
    private $SKILL_LIST = [
        "SHIP_HULL"            => 0,
        "SHIP_HULL_2"          => 0,
        "ENGINEERING"          => 0,
        "SHIELD_ENGINEERING"   => 0,
        "EVASIVE_MANEUVERS"    => 0,
        "EVASIVE_MANEUVERS_2"  => 0,
        "SHIELD_MECHANICS"     => 0,
        "TACTICS"              => 0,
        "LOGISTICS"            => 0,
        "LUCK"                 => 0,
        "LUCK_2"               => 0,
        "CRUELTY"              => 0,
        "CRUELTY_2"            => 0,
        "TRACTOR_BEAM"         => 0,
        "TRACTOR_BEAM_2"       => 0,
        "GREED"                => 0,
        "DETONATION"           => 0,
        "DETONATION_2"         => 0,
        "EXPLOSIVES"           => 0,
        "HEAT_SEEKING_MISSLES" => 0,
        "BOUNTY_HUNTER"        => 0,
        "BOUNTY_HUNTER_2"      => 0,
        "ROCKET_FUSION"        => 0,
        "ALIEN_HUNTER"         => 0,
        "ELECTRO_OPTICS"       => 0,
    ];

    /** @var User */
    private $user;

    /** @var MySQL */
    private $mysql;

    function __construct($user)
    {
        $this->user  = $user;
        $this->mysql = $this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);

        // Populate skill list with current levels
        $this->refresh();
    }

    public function refresh()
    {
        $skills = $this->getPlayerSkills();
        foreach ($skills as $key => $value) {
            if (array_key_exists($key, $this->SKILL_LIST)) {
                $this->SKILL_LIST[$key] = (int) $value;
            }
        }
    }

    public function getPlayerSkills()
    {
        return $this->mysql->QUERY('SELECT * FROM player_skill_tree WHERE USER_ID = ? AND PLAYER_ID = ?',
                                   [
                                       $this->user->__get('USER_ID'),
                                       $this->user->__get('PLAYER_ID'),
                                   ]
        )[0];
    }

    /**
     * Magic getter
     *
     * @param $property
     *
     * @return mixed
     *
     */
    function __get($property)
    {
        if (isset($this->$property)) {
            return $this->$property;
        } else {
            if (isset($this->SKILL_LIST[$property])) {
                return $this->SKILL_LIST[$property];
            } else {
                return false;
            }
        }
    }

    public function getServerSkills()
    {
        return $this->mysql->QUERY('SELECT * FROM player_skills_max ORDER BY ID ASC');

    }

    public function getSkillName($id)
    {
        $done = $this->mysql->QUERY('SELECT SKILL_NAME FROM player_skills_max WHERE ID = ?', [$id]);

        if ($done[0]['SKILL_NAME']) {
            return $done[0]['SKILL_NAME'];
        } else return false;
    }

    public function getSkillMaxLevel($id)
    {
        $done = $this->mysql->QUERY('SELECT MAX_POINT FROM player_skills_max WHERE ID = ?', [$id]);

        return $done[0]['MAX_POINT'];
    }

    public function upgrade($id) : bool
    {
        $skillName = $this->getSkillName($id);
        $done = $this->mysql->QUERY('UPDATE player_skill_tree SET ? = ? WHERE USER_ID = ? AND PLAYER_ID = ?',
                                   [
                                        $skillName,
                                        $this->SKILL_LIST[$skillName] + 1,
                                        $this->user->__get('USER_ID'),
                                        $this->user->__get('PLAYER_ID')
                                   ]
        );

        $this->refresh();
        return $done;
    }

}
