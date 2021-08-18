<?php

class App{

    protected $controller = "HomeController";
    protected $action = "Index";
    protected $params = [];

    public function __construct() {
        $arr = $this->UrlProcess();
        
        // xu ly Controller
        if (file_exists("./mvc/controllers/" . $arr[0] . "Controller.php")){
            $this->controller = $arr[0] . "Controller";
            unset($arr[0]);
        }

        require_once "./mvc/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // xu ly Action
        if (isset($arr[1])){
            if (method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }


        // xu ly Params
        $this->params = $arr ? array_values($arr) : [];

        call_user_func_array([$this->controller, $this->action], $this->params);
        
    }

    public function UrlProcess(){
        if (isset($_GET["url"])){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
        return array("Home");
    }
}

?>