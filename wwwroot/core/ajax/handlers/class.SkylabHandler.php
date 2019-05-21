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
    }

    public function handle() : void
    {
        parent::handle();

        $function = 'exec_' . $this->action;
        $this->$function();
    }

    public function exec_load() {
        global $System;
        die(json_encode(
            [
                'PROMETIUM_COLLECTOR'   => $System->User->Skylab->moduleExists('PROMETIUM_COLLECTOR'),
                'ENDURIUM_COLLECTOR'    => $System->User->Skylab->moduleExists('ENDURIUM_COLLECTOR'),
                'TERBIUM_COLLECTOR'     => $System->User->Skylab->moduleExists('TERBIUM_COLLECTOR'),
                'PROMETID_COLLECTOR'    => $System->User->Skylab->moduleExists('PROMETID_COLLECTOR'),
                'DURANIUM_COLLECTOR'    => $System->User->Skylab->moduleExists('DURANIUM_COLLECTOR'),
                'XENOMIT_MODULE'        => $System->User->Skylab->moduleExists('XENOMIT_MODULE'),
                'PROMERIUM_COLLECTOR'    => $System->User->Skylab->moduleExists('PROMERIUM_COLLECTOR'),
                'SEPROM_COLLECTOR'       => $System->User->Skylab->moduleExists('SEPROM_COLLECTOR')
            ]
        ));
    }
}
