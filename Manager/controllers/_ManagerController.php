<?php

namespace Manager\Controllers;
use Core\Controller;

abstract class _ManagerController extends Controller{
    public const PER_MANAGER = "Manager";
    public const HOME = "Home";
    public const MANAGER_APPLICATION = "Application";

    public function RenderView($view, $data=[]){
        $this->RenderViewPermission(self::PER_MANAGER, $view, $data);
    }
}

?>