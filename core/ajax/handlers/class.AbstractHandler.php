<?php

abstract class AbstractHandler
{
    protected $actions = [];
    public $action = "";
    public $params = "";

    /**
     * AbstractHandler constructor.
     */
    function __construct()
    {

        if (isset($_POST['action']) && !empty($_POST['action'])) {
            $this->action = (string)$_POST['action'];
        } else {
            die(json_encode(['error' => true, "error_msg" => "Empty ajax action requested!"]));
        }

        //$this->action = "load";

        if (isset($_POST['params'])) {
            $this->params = json_decode($_POST['params'], true);
        }
    }


    /**
     * isValidAction
     * checks if requested action is valid
     *
     * @return bool
     *
     */
    public function isValidAction()
    {
        if (isset($this->actions[$this->action])) {

            $action = $this->actions[$this->action];

            if (isset($action['params'])) {

                if (empty($this->params) && $this->params != 0) {
                    die(json_encode(['error'     => true,
                                     "error_msg" => 'This action requires parameters, which arent given',
                    ]));
                }

                foreach ($action['params'] as $param) {
                    if (!isset($this->params[$param])) {
                        die(json_encode(['error'     => true,
                                         "error_msg" => 'This action requires parameters, which arent given',
                        ]));
                    }
                }
            }

            return true;

        } else {
            die(json_encode(['error' => true, "error_msg" => 'Requested Action doesnt exists!']));
        }
    }

    /**
     * addAction Functions
     * register new Action
     *
     * @param       $action
     * @param array $params
     */
    public function addAction($action, $params = [])
    {
        $this->actions[$action] = [];

        if (!empty($params)) {
            $this->actions[$action]['params'] = $params;
        }
    }

    /**
     * handle Function
     * handles current action
     */
    public function handle()
    {
        $this->isValidAction();
    }
}