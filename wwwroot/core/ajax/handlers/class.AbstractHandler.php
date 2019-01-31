<?php

/**
 * Class AbstractHandler
 */
abstract class AbstractHandler
{
    public $action     = "";
    public $params     = "";
    public $isLoggedIn = true;

    protected $actions = [];

    /**
     * AbstractHandler constructor.
     */
    function __construct()
    {

        if (isset($_POST['action']) && !empty($_POST['action'])) {
            $this->action = (string) $_POST['action'];
        } else {
            die(json_encode([
                                'error'     => true,
                                "error_msg" => "Empty ajax action requested!",
                            ]
            )
            );
        }

        if (isset($_POST['params'])) {
            $this->params = json_decode($_POST['params'], true);
        }
    }

    /**
     * addAction
     *
     * Register new action with the specified parameters, if set
     *
     * @param string $action
     * @param array  $params
     */
    public function addAction($action, $params = []) : void
    {
        $this->actions[$action] = [];

        if ( !empty($params)) {
            $this->actions[$action]['params'] = $params;
        }
    }

    /**
     * handle
     *
     * Handles current action. Will first call {@link `isValidAction()`}
     */
    public function handle() : void
    {
        $this->isValidAction();
    }

    /**
     * isValidAction
     *
     * Checks if requested action is valid
     *
     * If the request fails, dies with response
     * code 400 and an appropriate message.
     */
    public function isValidAction() : bool
    {
        if (isset($this->actions[$this->action])) {

            $action = $this->actions[$this->action];

            if (isset($action['params'])) {

                if (empty($this->params) && $this->params != 0) {
                    http_response_code(400);
                    die(json_encode(["message" => 'This action requires parameters, which arent given']));
                }

                foreach ($action['params'] as $param) {
                    if ( !isset($this->params[$param])) {
                        http_response_code(400);
                        die(json_encode(["message" => 'This action requires parameters, which arent given']));
                    }
                }
            }

            return true;

        } else {
            http_response_code(400);
            die(json_encode(["message" => 'Requested Action doesnt exist: ' . $this->action]));
        }
    }
}
