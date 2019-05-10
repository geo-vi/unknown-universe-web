<?php

/**
 * Class CompanyHandler
 */
class CompanyHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('choose', ['faction']);
    }

    public function handle() : void
    {
        parent::handle();

        $function = 'exec_' . $this->action;
        $this->$function();
    }

    public function exec_choose()
    {
        global $System;
        $faction = (int)$this->params['faction'];

        if ($System->User->setFaction($faction)) {
            $System->logging->addLog(
                $System->User->__get('USER_ID'),
                $System->User->__get('PLAYER_ID'),
                $System->User->__get('SERVER_DB'),
                "You successfully joined " . $System->User->getFactionName($faction) . "!"
            );
            Utils::dieM('Company successfully chosen!');
        } else {
            Utils::dieS(500, 'Failed to write to database.');
        }
    }
}
