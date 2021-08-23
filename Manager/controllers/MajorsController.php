<?php

namespace Manager\Controllers;

class MajorsController extends _ManagerController{

    public const VIEW_MAJORS = "Majors/Majors";

    function Index(){
        // model TODO
    
        // view
        $this->RenderView(self::VIEW_MAJORS);
    }
}

?>