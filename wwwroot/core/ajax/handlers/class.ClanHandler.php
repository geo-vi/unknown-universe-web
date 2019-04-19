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
        $this->addAction('createClan', ['TAG', 'NAME', 'DESC']);
        $this->addAction('getMyClan');
        $this->addAction('acceptMemberRequest', ['USER_ID']);
        $this->addAction('cancelMemberRequest', ['USER_ID']);
        $this->addAction('joinRequest', ['CLAN_ID']);
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
        $CLAN_ARRAY = [];

        foreach ($CLANS as $clan) {
            $clan['MEMBERS'] = $System->Clan->getClanMembers($clan['ID']);
            array_push($CLAN_ARRAY, $clan);
        }

        die(
        json_encode(
            [
                "CLANS"  => $CLAN_ARRAY,
            ]
        )
        );
    }

    function exec_findClans() {
        global $System;
        $CLANS = $System->Clan->searchClan($this->params['PREFIX']);
        $JSON = [];

        foreach ($CLANS as $clan) {
            $clan['MEMBERS'] = $System->Clan->getClanMembers($clan['ID']);
            array_push($JSON, $clan);
        }

        die(
        json_encode($JSON)
        );
    }

    function exec_createClan() {
        global $System;

        $clanName = $this->params['NAME'];
        $clanTag = $this->params['TAG'];
        $clanDesc = $this->params['DESC'];
        $clan = $System->Clan->foundClan($clanName, $clanTag, $clanDesc);

        if ($clan == "Clan name or tag exists") {
            Utils::dieM('Clan name or tag exists!');
        }
        else {
            die(
            json_encode(
                [
                    "CLAN" => $clan,
                ]
            )
            );
        }
    }

    function exec_getMyClan() {
        global $System;
        $CLAN_ID = $System->User->__get('CLAN_ID');
        $clanMembers = $System->Clan->getClanMembers($CLAN_ID);
        $MEMBERS = array();
        foreach ($clanMembers as $member) {
            array_push($MEMBERS, $System->Clan->getClanMemberStatistic($member));
        }
        $joinRequests = $System->Clan->getJoinRequests($CLAN_ID);
        $REQUESTS = array();
        foreach ($joinRequests as $request) {
            array_push($REQUESTS, $System->Clan->getRequesterStatistics($request));
        }
        die(
            json_encode(
                [
                    "MEMBERS" => $MEMBERS,
                    "JOIN_REQUESTS" => $REQUESTS,
                ]
            )
        );
    }

    function exec_acceptMemberRequest() {
        global $System;
        $id = $this->params['USER_ID'];
        $System->Clan->acceptMemberRequest($id);
    }

    function exec_cancelMemberRequest() {
        global $System;
        $id = $this->params['USER_ID'];
        $System->Clan->cancelMemberRequest($id);
    }

    function exec_joinRequest() {
        global $System;
        $id = $this->params['CLAN_ID'];
        $System->Clan->submitJoinRequest($id);
    }
}
