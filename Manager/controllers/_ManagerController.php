<?php

namespace Manager\Controllers;
use Core\Controller;

abstract class _ManagerController extends Controller{
    public const PER_MANAGER = "Manager";

    // $view tự định nghĩa tại các controller riêng
    // $data dùng cho lớp view html
    public function RenderView($view, $data=[]){
        $this->RenderViewPermission(self::PER_MANAGER, $view, $data);
    }
}

?>