<?php

/**
 * Class SkylabHandler
 */
class SkylabHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        $this->addAction('load');
        $this->addAction('build', ['MODULE_TYPE', 'INSTANT']);
        $this->addAction('buyRobot', ['COLLECTOR_TYPE', 'ROBOT_ID']);
        $this->addAction('instantFinishBuild', ['MODULE_TYPE']);
        $this->addAction('transferOres', ['ORE_ARRAY', 'INSTANT']);
        $this->addAction('instantFinishTransfer');
        $this->addAction('power', ['MODULE_TYPE']);
    }

    public function handle() : void
    {
        parent::handle();

        $function = 'exec_' . $this->action;
        $this->$function();
    }

    public function exec_load() {
        global $System;
        $System->User->Skylab->refresh();
        die(json_encode(
            [
                'PROMETIUM_COLLECTOR'   => ['READY' => $System->User->Skylab->moduleExists('PROMETIUM_COLLECTOR'),
                                            'ACTIVE' => $System->User->Skylab->getModuleActive('PROMETIUM_COLLECTOR') == 1],

                'ENDURIUM_COLLECTOR'    => ['READY' => $System->User->Skylab->moduleExists('ENDURIUM_COLLECTOR'),
                                            'ACTIVE' => $System->User->Skylab->getModuleActive('ENDURIUM_COLLECTOR') == 1],

                'TERBIUM_COLLECTOR'     => ['READY' => $System->User->Skylab->moduleExists('TERBIUM_COLLECTOR'),
                                            'ACTIVE' => $System->User->Skylab->getModuleActive('TERBIUM_COLLECTOR') == 1],

                'PROMETID_COLLECTOR'    => ['READY' => $System->User->Skylab->moduleExists('PROMETID_COLLECTOR'),
                                            'ACTIVE' => $System->User->Skylab->getModuleActive('PROMETID_COLLECTOR') == 1],

                'DURANIUM_COLLECTOR'    => ['READY' => $System->User->Skylab->moduleExists('DURANIUM_COLLECTOR'),
                                            'ACTIVE' => $System->User->Skylab->getModuleActive('DURANIUM_COLLECTOR') == 1],

                'XENOMIT_MODULE'        => ['READY' => $System->User->Skylab->moduleExists('XENOMIT_MODULE'),
                                            'ACTIVE' => $System->User->Skylab->getModuleActive('XENOMIT_MODULE') == 1],

                'PROMERIUM_COLLECTOR'    => ['READY' => $System->User->Skylab->moduleExists('PROMERIUM_COLLECTOR'),
                                            'ACTIVE' => $System->User->Skylab->getModuleActive('PROMERIUM_COLLECTOR') == 1],

                'SEPROM_COLLECTOR'       => ['READY' => $System->User->Skylab->moduleExists('SEPROM_COLLECTOR'),
                                            'ACTIVE' => $System->User->Skylab->getModuleActive('SEPROM_COLLECTOR') == 1]
            ]
        ));
    }

    public function exec_buyRobot() {
        global $System;
        $COLLECTOR_TYPE = $this->params['COLLECTOR_TYPE'];
        $ROBOT_ID = $this->params['ROBOT_ID'];
        $robotBuyer =  $System->User->Skylab->buyRobot($COLLECTOR_TYPE, $ROBOT_ID);
        $msg = $robotBuyer['msg'];
        $msgIsError = $robotBuyer['isError'];
        die(json_encode(['MESSAGE' => $msg,
            'IS_ERROR' => $msgIsError]));
    }

    public function exec_power() {
        global $System;
        $MODULE_TYPE = $this->params['MODULE_TYPE'];
        $result = $System->User->Skylab->powerModule($MODULE_TYPE);
        $msg = $result['msg'];
        $msgIsError = $result['isError'];
        die(json_encode(['MESSAGE' => $msg,
            'IS_ERROR' => $msgIsError]));
    }

    public function exec_build() {
        global $System;
        $MODULE_TYPE = $this->params['MODULE_TYPE'];
        $INSTANT = $this->params['INSTANT'];
        $upgrade =  $System->User->Skylab->tryUpgradeModule($MODULE_TYPE, false);
        $msg = $upgrade['msg'];
        $msgIsError = $upgrade['isError'];
        die(json_encode(['MESSAGE' => $msg,
            'IS_ERROR' => $msgIsError]));
    }
}
