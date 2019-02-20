<?php

/**
 * Class SkillTreeHandler
 */
class SkillTreeHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('upgrade', ['sID']);
        $this->addAction('exchange');
    }

    public function handle() : void
    {
        parent::handle();

        $function = 'exec_' . $this->action;
        $this->$function();
    }

    public function exec_upgrade()
    {
        global $System;
        $id = (int) $this->params['sID'];

        if ($System->User->SkillTree->upgrade($id)) {
            Utils::dieM('Successfully upgraded skill!');
        } else {
            Utils::dieS(500, 'Failed to upgrade skill, try again later');
        }
    }
}
