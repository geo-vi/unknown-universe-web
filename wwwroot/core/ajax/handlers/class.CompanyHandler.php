<?php

/**
 * Class CompanyHandler
 */
class CompanyHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('choose', ['FACTION']);
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
        $FACTION = (int)$this->params['FACTION'];

        if ($System->User->setFaction($FACTION)) {
            $System->logging->addLog(
                $System->User->__get('USER_ID'),
                $System->User->__get('PLAYER_ID'),
                $System->User->__get('SERVER_DB'),
                "You successfully joined " . $System->User->getFactionName($FACTION) . "!"
            );
            die(json_encode(['message' => 'Company successfully chosen!']));
        } else {
            http_response_code(400);
            die(json_encode(['message' => 'Failed to write to database.']));
        }
    }
}
