<?php

namespace Manager\Controllers;

class HomeController extends _ManagerController{

    public const VIEW_HOME = "Home/Home";

    function Index(){
        // model TODO
    
        // view
        $this->RenderView(self::VIEW_HOME);
    }
}

?>