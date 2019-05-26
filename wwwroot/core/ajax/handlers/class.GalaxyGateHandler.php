<?php

/**
 * Class GalaxyGateHandler
 */
class GalaxyGateHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('load');
        $this->addAction('loadGate', ['GATE_ID']);
        $this->addAction('prepareGate', ['GATE_ID']);
        $this->addAction('click', ['AMOUNT', 'SELECTED_GG', 'USE_MULTIPLIER']);
        $this->addAction('buyLife', ['GATE_ID']);
    }

    public function handle(): void
    {
        parent::handle();

        $function = 'exec_' . $this->action;
        $this->$function();
    }

    public function exec_load() {
        global $System;
        die(
            json_encode(
                [
                    "GG_ENERGY"  => $System->User->__get('GG_ENERGY'),
                    "URIDIUM" => $System->User->__get('URIDIUM'),
                    "MULTIPLIER" => $System->User->GalaxyGates->getMultiplier()
                ]
            )
        );
    }

    public function exec_loadGate() {
        global $System;
        $gateId = $this->params['GATE_ID'];
        $gate = $System->User->GalaxyGates->getParts($gateId);
        $parts = count($gate);
        $total = $System->User->GalaxyGates->GATE_PARTS[$System->User->GalaxyGates->getEquivalentGate($gateId)];
        $prepared = $System->User->GalaxyGates->getGatePrepared($gateId);
        $lives = $System->User->GalaxyGates->getGateLives($gateId);
        $wave = $System->User->GalaxyGates->getGateWave($gateId);

        die(json_encode([
            "PARTS"     => $parts,
            "TOTAL"     => $total,
            "PREPARED"  => $prepared,
            "WAVE"      => $wave,
            "LIVES"     => $lives,
        ]));
    }

    public function exec_click() {
        global $System;
        $times = $this->params['AMOUNT'];
        $selectedGG = $this->params['SELECTED_GG'];
        $multiplier = $this->params['USE_MULTIPLIER'] == 1;
        $gates = $System->User->GalaxyGates->performClick($times,$selectedGG, $multiplier);
        die(json_encode($gates));
    }

    public function exec_prepareGate() {
        global $System;
        $id = $this->params['GATE_ID'];
        $System->User->GalaxyGates->prepareGate($id);
        die(json_encode([
            "PREPARED" => true,
        ]));
    }

    public function exec_buyLife() {
        global $System;
        $id = $this->params['GATE_ID'];
        if ($System->User->__get('URIDIUM') <= 10000) {
            $result = 'error';
            $msg = 'Insufficient amount of Uridium';
        }
        else {
            $System->User->GalaxyGates->buyLife($id);
            $result = 'success';
            $msg = 'Successfully bought a life!';
        }

        die(json_encode([
            "RESULT"    => $result,
            "MESSAGE"   => $msg,
            "LIVES"     => $System->User->GalaxyGates->getGateLives($id),
            "URIDIUM"   => $System->User->__get('URIDIUM'),
        ]));
    }
}