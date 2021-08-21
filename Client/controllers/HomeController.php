<?php

namespace Client\Controllers;

class HomeController extends _ClientController{
    public const VIEW_HOME = "Home/Home";

    function Index(){
        // model j do tuy thich
    
        // view
        $this->RenderView(self::VIEW_HOME);
    }
}

?>