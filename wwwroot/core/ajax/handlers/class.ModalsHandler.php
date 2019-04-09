<?php

/**
 * Class ModalsHandler
 */
class ModalsHandler extends AbstractHandler
{
    function __construct()
    {
        parent::__construct();
    }

    public function handle() : void
    {
        parent::handle();

        $function = 'exec_'.$this->action;

        $this->$function();
    }
}