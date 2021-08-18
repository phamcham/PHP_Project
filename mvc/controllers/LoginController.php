<?php

class LoginController extends Controller{
    function Index(){
        $this->SetView(Controller::MASTER_PAGE, Controller::LOGIN);
    }

    function Verify($username, $password){
        
    }
}

?>