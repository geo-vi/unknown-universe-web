<?php


class UserRefreshHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();

        //$this->addAction('refresh', ['TIMESTAMP']);
    }

    public function handle()
    {
        parent::handle();

        //$function = 'exec_'.$this->action;

        //$this->$function();
    }

    public function exec_refresh(){
        global $System;
        $TIMESTAMP  = (int) $this->params['TIMESTAMP'];

        if (isset($TIMESTAMP)) {
            session_write_close();
            while (strtotime($System->User->LAST_MODIFIED) <= $TIMESTAMP) {
                sleep(1);
                clearstatcache();
                $System->User->refresh();
            }
            die(json_encode(
                [
                    'URIDIUM' => number_format($System->User->URIDIUM, 0, '.', '.'),
                    'CREDITS' => number_format($System->User->CREDITS, 0, '.', '.'),
                    'EXP' => number_format($System->User->EXP, 0, '.', '.'),
                    'HONOR' => number_format($System->User->HONOR, 0, '.', '.'),
                    'LVL' => number_format($System->User->LVL, 0, '.', '.'),
                    'TIMESTAMP' => time(),
                ]
            ));
        }
    }
}