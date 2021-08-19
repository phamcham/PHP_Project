<?php

namespace Manager\Controllers;

class HomeController extends _ManagerController{
    function Index(){
        // model TODO
        $application = $this->GetModel(_ManagerController::MANAGER_APPLICATION);
        echo $application->GetApplication();
    
        // view
        $this->RenderView(_ManagerController::HOME);
    }
    function Fuck(){
       
    }
}

?>