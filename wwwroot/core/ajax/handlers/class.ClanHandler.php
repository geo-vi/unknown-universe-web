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
        $this->addAction('kickMember', ['USER_ID']);
        $this->addAction('makeLeader', ['USER_ID']);
        $this->addAction('leaveClan');
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
        $JOIN_REQUESTS = $System->Clan->getMyJoinRequests();
        $CLAN_ARRAY = [];
        $REQUESTS_ARRAY = [];

        foreach ($CLANS as $clan) {
            $clan['MEMBERS'] = $System->Clan->getClanMembers($clan['ID']);
            array_push($CLAN_ARRAY, $clan);
        }

        foreach ($JOIN_REQUESTS as $req) {
            array_push($REQUESTS_ARRAY, $req);
        }
        die(
        json_encode(
            [
                "CLANS"  => $CLAN_ARRAY,
                "JOIN_REQUESTS" => $REQUESTS_ARRAY,
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

        if (!(preg_match('/^[\w.-]*$/', $clanTag))) {
            Utils::dieM('No special characters or whitespaces allowed');
            return;
        }

        $clan = $System->Clan->foundClan($clanName, $clanTag, $clanDesc);

        switch ($clan) {
            case -2:
                Utils::dieM('Name shorter than 5 or longer than 20 characters!');
                break;
            case -1:
                Utils::dieM('Tag shorter than 3 or longer than 4 characters!');
                break;
            case 1:
                Utils::dieM('success');
                break;
            default:
                Utils::dieM('Unknown error occured');
                break;
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
        if ($System->Clan->memberIsLeader($System->User->__get('USER_ID'))) {
            $System->Clan->acceptMemberRequest($id);
        }
    }

    function exec_cancelMemberRequest() {
        global $System;
        $id = $this->params['USER_ID'];
        if ($System->Clan->memberIsLeader($System->User->__get('USER_ID'))) {
            $System->Clan->cancelMemberRequest($id);
        }
    }

    function exec_joinRequest() {
        global $System;
        $id = $this->params['CLAN_ID'];
        $System->Clan->submitJoinRequest($id);
    }

    function exec_kickMember() {
        global $System;
        $id = $this->params['USER_ID'];
        if ($System->Clan->memberIsLeader($System->User->__get('USER_ID'))) {
            $System->Clan->kick($id);
        }
    }

    function exec_makeLeader() {
        global $System;
        $targetId = $this->params['USER_ID'];
        $USER_ID = $System->User->__get('USER_ID');

        if ($System->Clan->memberIsLeader($USER_ID)) {
            $System->Clan->setLeader($targetId);
            $System->Clan->demote($USER_ID, 1);
        }
    }

    function exec_leaveClan() {
        global $System;
        $System->Clan->leave();
        die(json_encode(
            [
                "success" => true,
            ]
        ));
    }
}
