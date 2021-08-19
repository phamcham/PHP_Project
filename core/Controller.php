<?php

namespace Core;
abstract class Controller{

    public function GetModel($model){
        require_once "./core/Model.php";
        require_once "./models/" . $model . "Model.php";
        $model = "\\Models\\" . $model . "Model";
        return new $model;
    }

    public function RenderViewPermission($permission, $view, $data=[]){
        $view = $view . "View";
        require_once "./" . $permission . "/views/pages/Master.php";
    }
}

?>