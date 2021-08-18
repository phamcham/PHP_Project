<?php

class HomeController extends Controller{
    function Index(){
        // model TODO
        $application = $this->GetModel(Controller::APPLICATION);
        echo $application->GetApplication();
    
        // view
        $this->SetView(Controller::MASTER_PAGE, Controller::HOME);
    }
    function Fuck(){
       
    }
}

?>