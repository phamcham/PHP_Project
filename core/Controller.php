<?php

namespace Core;
abstract class Controller{

    // $model = tên lớp của model, vd: Login, Application
    // dùng định nghĩa hoặc truyền chuỗi vào đều đc
    public function GetModel($model){
        require_once "./core/Model.php";
        require_once "./models/" . $model . "Model.php";
        $model = "\\Models\\" . $model . "Model";
        return new $model;
    }

    // $permission = MANAGER | CLIENT
    public function RenderViewPermission($permission, $view, $data=[]){
        $view = $view . "View";
        require_once "./" . $permission . "/views/pages/Master.php";
    }
}

?>