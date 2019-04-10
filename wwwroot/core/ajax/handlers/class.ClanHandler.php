<?php

/**
 * Class ClanHandler
 */
class ClanHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('getClans');
        $this->addAction('findClans', ['PREFIX']);
        $this->addAction('createClan', ['CLAN_TAG', 'CLAN_NAME', 'CLAN_DESC']);
    }

    public function handle() : void
    {
        parent::handle();

        $function = 'exec_' . $this->action;
        $this->$function();
    }

    function exec_getClans()
    {
        global $System;
        $CLANS = $System->Clan->getClans();
        $JSON = [];

        foreach ($CLANS as $clan) {
            array_push($JSON, $clan);
        }

        die(
        json_encode($JSON)
        );
    }

    function exec_findClans() {
        global $System;
        $CLANS = $System->Clan->searchClan($this->params['PREFIX']);
        $JSON = [];

        foreach ($CLANS as $clan) {
            array_push($JSON, $clan);
        }

        die(
        json_encode($JSON)
        );
    }
}
