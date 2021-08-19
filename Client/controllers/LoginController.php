<?php

namespace Client\Controllers;

class LoginController extends _ClientController{

    function Index(){
        $this->RenderView(_ClientController::CLIENT_LOGIN);
    }

    function Vertify(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        echo $username;
        // lay database o model de so sanh
        
        // sau do tra data ra view
    }

    function Ahi(){
        echo "hahahahaha";
    }
}
