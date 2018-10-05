<?php

class Routing
{
    protected $routes_ = [];
    public $template = "e_404_template";
    public $login_req = false;
    public $includeNav = false;
    public $includeFooter = false;
    public $AdminLVL = 0;
    public $route = "";
    public $request = "";

    /**
     * add Function add's new Route to Routing-System
     * @param $uri
     * @param bool $needLogin
     *
     */
    public function add($uri, $template, $needLogin = false, $includeNav = true, $includeFooter = true, $AdminLVL = 0){
        $route = [
            "uri" => $uri,
            "template" => $template,
            "login" => $needLogin,
            "nav" => $includeNav,
            "footer" => $includeFooter,
            "AdminLVL" => $AdminLVL,
        ];
        array_push($this->routes_,$route);
    }

    /**
     * route Function
     *
     */
    public function route(){
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];
        }else{
            $action = "";
        }

        $action = str_replace("/","",$action);
        $this->route = $action;
        $this->request = $_SERVER['REQUEST_URI'];

        foreach ($this->routes_ as $route){
            if($route['uri'] == $action){
                $this->login_req = $route['login'];
                $this->includeNav = $route['nav'];
                $this->includeFooter = $route['footer'];
                $this->AdminLVL = $route['AdminLVL'];
                $this->template = $route['template'];
            }
        }
    }
}