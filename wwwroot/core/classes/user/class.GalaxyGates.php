<?php


use DB\MySQL;

class GalaxyGates
{
    /** @var User */
    private $user;
    /** @var MySQL */
    private $mysql;

    public $GATE_PARTS = [
        "ALPHA_PARTS"            => 32,
        "BETA_PARTS"             => 48,
        "GAMMA_PARTS"            => 82,
        "DELTA_PARTS"            => 128,
        "EPSILON_PARTS"          => 99,
        "ZETA_PARTS"             => 111,
        "KAPPA_PARTS"            => 120,
        "LAMBDA_PARTS"           => 45,
        "HADES_PARTS"            => 45,
    ];

    function __construct($user)
    {
        $this->user = $user;
        $this->mysql = $this->mysql = new MySQL(MYSQL_IP, $user->SERVER_DB, MYSQL_USER, MYSQL_PW);
    }

    function getParts($id) {
        $PARTS = array();
        $query = $this->mysql->QUERY("SELECT * FROM player_galaxy_gates WHERE USER_ID = ? AND PLAYER_ID = ?",
            [
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID'),
            ]
        )[0];
        $gateName = $this->getEquivalentGate($id);
        if (isset($query[$gateName])) {
            $PARTS = json_decode($query[$gateName]);
        }
        return $PARTS;
    }

    function performClick($times, $selectedGG, $multiplierActive) {
        $ITEMS = [
            "RESULT" => [],
            "URIDIUM" => 0,
            "GG_ENERGY" => 0,
            "MULTIPLIER" => $this->getMultiplier()
        ];

        $RESULT = array();

        $URIDIUM = $this->user->__get('URIDIUM');
        $GGENERGY = $this->user->__get('GG_ENERGY');
        $MULTIPLY = $this->getMultiplier();

        if ($MULTIPLY <= 1) {
            $multiplierActive = false;
        }
        if ($times > $GGENERGY) {
            $uncoveredEnergyCost = $times - $GGENERGY;
            $uridiumCost = $uncoveredEnergyCost * 100;
            if ($URIDIUM < $uridiumCost) {
                return $ITEMS;
            }
            $this->tax($GGENERGY, $uridiumCost);
        }
        else {
            $this->tax($times, 0);
        }

        for ($i = 0; $i < $times; $i++) {
            $PROBABILITY = rand(0, 100);
            if (!$multiplierActive && $PROBABILITY % 6 == 0 || $multiplierActive && $PROBABILITY % (7 - $MULTIPLY) == 0 ) {
                $this->addGGPart($selectedGG);
                $RESULT = $this->addItemsToResult($RESULT, 'GG PART', 1);
            } else if ($PROBABILITY % 5 == 0) {
                $this->addAmmo('UBR_100', 15);
                $RESULT = $this->addItemsToResult($RESULT, 'UBR 100', 15);
            } else if ($PROBABILITY % 4 == 0) {
                $this->addAmmo('UCB_100', 65);
                $RESULT = $this->addItemsToResult($RESULT, 'UCB 100', 65);
            } else if ($PROBABILITY % 3 == 0) {
                $this->addAmmo('MIN_100', 3);
                $RESULT = $this->addItemsToResult($RESULT, 'MIN 01', 3);
            } else if ($PROBABILITY % 2 == 0) {
                $this->addAmmo('MCB_25', 125);
                $RESULT = $this->addItemsToResult($RESULT, 'MCB 25', 125);
            } else {
                $this->addAmmo('PLT_2021', 180);
                $RESULT = $this->addItemsToResult($RESULT, 'PLT 2021', 18);
            }
        }

        if ($multiplierActive) {
            $this->removeMultiplier();
        }

        $ITEMS['RESULT'] = $RESULT;
        $ITEMS['URIDIUM'] = $this->user->__get('URIDIUM');
        $ITEMS['GG_ENERGY'] = $this->user->__get('GG_ENERGY');
        $ITEMS['MULTIPLIER'] = $this->getMultiplier();
        return $ITEMS;
    }

    function addItemsToResult($RESULT, $ITEM_NAME, $AMOUNT) {
        for ($i = 0; $i < sizeof($RESULT); $i++) {
            $result = $RESULT[$i];
            if ($result['NAME'] == $ITEM_NAME) {
                $amount = $result['AMOUNT'] + $AMOUNT;
                $RESULT[$i]['AMOUNT'] = $amount;
                return $RESULT;
            }
        }

        $RE =
            [
                "NAME" => $ITEM_NAME,
                "AMOUNT" => $AMOUNT,
            ];

        array_push($RESULT, $RE);
        return $RESULT;
    }

    function addGGPart($selectedGate) {
        if ($selectedGate == 1 || $selectedGate == 2 || $selectedGate == 3) {
            $selectedGate = rand(1,3);
        }

        $gateQuery = $this->getEquivalentGate($selectedGate);

        $CURRENT_GG_PARTS = $this->mysql->QUERY('SELECT * FROM player_galaxy_gates WHERE USER_ID = ? AND PLAYER_ID = ?',
            [$this->user->__get('USER_ID'), $this->user->__get('PLAYER_ID')])[0];

        $GGPART = $CURRENT_GG_PARTS[$gateQuery];
        $PARTS = array();
        if (isset($GGPART) && $GGPART != "null") {
            $PARTS = json_decode($GGPART);
        }
        $MAX_PARTS = $this->GATE_PARTS[$gateQuery];

        $PART_ID = rand(1,$MAX_PARTS);
        if (in_array($PART_ID, $PARTS)) {
            if ($CURRENT_GG_PARTS['MULTIPLIER'] < 5) {
                $this->mysql->QUERY('UPDATE player_galaxy_gates SET MULTIPLIER = MULTIPLIER + 1 WHERE USER_ID = ? AND PLAYER_ID = ?', [
                    $this->user->__get('USER_ID'),
                    $this->user->__get('PLAYER_ID')
                ]);
            }
        }
        else {
            array_push($PARTS, $PART_ID);
            $PARTS_JSON = json_encode($PARTS);
            $this->mysql->QUERY("UPDATE player_galaxy_gates SET ".$gateQuery." = '". $PARTS_JSON ."' WHERE USER_ID = ? AND PLAYER_ID = ?", [
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID'),
            ]);
        }
    }

    function getEquivalentGate($id) {
        switch($id) {
            case 1:
                $gateQuery = "ALPHA_PARTS";
                break;
            case 2:
                $gateQuery = "BETA_PARTS";
                break;
            case 3:
                $gateQuery = "GAMMA_PARTS";
                break;
            case 4:
                $gateQuery = "DELTA_PARTS";
                break;
            case 5:
                $gateQuery = "EPSILON_PARTS";
                break;
            case 6:
                $gateQuery = "ZETA_PARTS";
                break;
            case 7:
                $gateQuery = "KAPPA_PARTS";
                break;
            case 8:
                $gateQuery = "LAMBDA_PARTS";
                break;
            case 13:
                $gateQuery = "HADES_PARTS";
                break;
        }
        return $gateQuery;
    }

    function addAmmo($ammoType, $amount) {
        $this->mysql->QUERY('UPDATE player_ammo SET '.$ammoType.' = '.$ammoType.' + ? WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $amount,
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID')
            ]);
    }

    function addResource($resource, $amount) {

    }

    function tax($ggEnergy, $uridium) {
        $this->mysql->QUERY('UPDATE player_data SET URIDIUM = URIDIUM - ? WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $uridium,
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID')
            ]);
        $this->mysql->QUERY('UPDATE player_extra_data SET GG_ENERGY = GG_ENERGY - ? WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $ggEnergy,
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID')
            ]);
    }

    function getGatePrepared($id) {
        $equalGate = $this->getEquivalentGate($id);
        $gatePrepared = str_replace('PARTS', 'PREPARED', $equalGate);
        $data = $this->mysql->QUERY('SELECT * FROM player_galaxy_gates WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID')
            ])[0];
        return $data[$gatePrepared] == 1;
    }

    function getGateLives($id) {
        $equalGate = $this->getEquivalentGate($id);
        $gateLives = str_replace('PARTS', 'LIVES', $equalGate);
        $data = $this->mysql->QUERY('SELECT * FROM player_galaxy_gates WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID')
            ])[0];
        return $data[$gateLives];
    }

    function getGateWave($id) {
        $equalGate = $this->getEquivalentGate($id);
        $gateWave = str_replace('PARTS', 'WAVE', $equalGate);
        $data = $this->mysql->QUERY('SELECT * FROM player_galaxy_gates WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID')
            ])[0];
        return $data[$gateWave];
    }

    function getMultiplier() {
        $data = $this->mysql->QUERY('SELECT * FROM player_galaxy_gates WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID')
            ])[0];
        return $data['MULTIPLIER'];
    }

    function removeMultiplier() {
        $this->mysql->QUERY('UPDATE player_galaxy_gates SET MULTIPLIER = 1 WHERE USER_ID = ? AND PLAYER_ID = ?', [
            $this->user->__get('USER_ID'),
            $this->user->__get('PLAYER_ID')
        ]);
    }

    function prepareGate($id) {
        $equalGate = $this->getEquivalentGate($id);
        if (count($this->getParts($id)) >= $this->GATE_PARTS[$equalGate]) {
            $gateLives = str_replace('PARTS', 'LIVES', $equalGate);
            $gateWave = str_replace('PARTS', 'WAVE', $equalGate);
            $gatePrepared = str_replace('PARTS', 'PREPARED', $equalGate);
            $this->mysql->QUERY('UPDATE player_galaxy_gates SET ' . $gatePrepared . ' = 1, ' . $equalGate . ' = NULL, ' . $gateLives . ' = 5, ' . $gateWave . ' = 1 WHERE USER_ID = ? AND PLAYER_ID = ?',
                [
                    $this->user->__get('USER_ID'),
                    $this->user->__get('PLAYER_ID')
                ]);
        }
    }

    function buyLife($id) {
        $this->tax(0, 10000);
        $equalGate = $this->getEquivalentGate($id);
        $gateLives = str_replace('PARTS', 'LIVES', $equalGate);
        $this->mysql->QUERY('UPDATE player_galaxy_gates SET '.$gateLives.' = '.$gateLives.' + 1 WHERE USER_ID = ? AND PLAYER_ID = ?',
            [
                $this->user->__get('USER_ID'),
                $this->user->__get('PLAYER_ID')
            ]);
    }
}