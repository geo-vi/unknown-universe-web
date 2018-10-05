<?php

class CompanyHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('choose', ['FACTION']);
    }

    public function handle()
    {
        parent::handle();

        $function = 'exec_' . $this->action;
        $this->$function();
    }

    public function exec_choose()
    {
        global $System;
        $FACTION = (int)$this->params['FACTION'];

        if ($System->User->setFaction($FACTION)) {
            $System->logging->addLog(
                $System->User->USER_ID,
                $System->User->PLAYER_ID,
                $System->User->SERVER_DB,
                "You successfully joined " . $System->User->getFactionName($FACTION) . "!"
            );
            die(json_encode(['success' => true]));
        } else {
            die(json_encode(['success' => false]));
        }
    }
}