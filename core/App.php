<?php

namespace Core;
class App{

    protected $controller = "HomeController";
    protected $action = "Index";
    protected $params = [];

    public function __construct() {
        // http://localhost:81/PHP_Project/Permission/Controller/Action/....
        $arr = $this->UrlProcess();
        
        // xy ly quyen
        $permission = $arr[0]; 
        unset($arr[0]);
        if ($permission == "Client" || $permission == "Manager"){
            // xu ly Controller
            if (file_exists("./". $permission ."/controllers/" . $arr[1] . "Controller.php")){
                $this->controller = $arr[1] . "Controller";
                unset($arr[1]);
            }
            else{
                echo "controller not found: ./". $permission ."/controllers/" . $arr[1] . "Controller.php\n";
                exit();
            }

            require_once "./". $permission ."/controllers/" . $this->controller . ".php";

            // \Client\Controllers\HomeController
            // \\Manager\Controllers\ManagerController
            $this->controller = "\\" . $permission . "\\Controllers\\" . $this->controller;
            $this->controller = new $this->controller;

            // xu ly Action
            if (isset($arr[2])){
                if (method_exists($this->controller, $arr[2])){
                    $this->action = $arr[2];
                }
                else{
                    echo "page not found:";
                    exit();
                }
                unset($arr[2]);
            }

            // xu ly Params
            $this->params = $arr ? array_values($arr) : [];

            call_user_func_array([$this->controller, $this->action], $this->params);
        }
        else{
            echo "controller is wrong, mean Client of Manager?";
            exit();
        }
    }

    public function UrlProcess(){
        if (isset($_GET["url"])){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
        return array("Client", "Home");
    }
}

?>