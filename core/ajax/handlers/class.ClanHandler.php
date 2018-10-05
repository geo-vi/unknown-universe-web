<?php
class ClanHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('getClans');
        $this->addAction('createClan',['CLAN_TAG'], ['CLAN_NAME'], ['CLAN_DESC']);
    }
}
