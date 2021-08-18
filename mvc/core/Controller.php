<?php

class Controller{
    public const MASTER_PAGE = "Master";
    public const HOME = "Home";
    public const LOGIN = "Login";
    public const APPLICATION = "Application";
    public function GetModel($model){
        $model = $model . "Model";
        require_once "./mvc/models/" . $model . ".php";
        return new $model;
    }

    public function SetView($master_page, $view, $data=[]){
        $view = $view . "View";
        require_once "./mvc/views/" . $master_page . ".php";
    }
}

?>