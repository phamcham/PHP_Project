<?php

namespace Manager\Controllers;

use Client\Controllers\_ClientController;

class LogoutController extends _ManagerController{
    function Index(){
        // model TODO
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        // view
        $this->RenderViewPermission(_ClientController::PER_CLIENT, _ClientController::CLIENT_HOME);
        header("Location: http://". $_SERVER['HTTP_HOST']. "/PHP_Project/Client/Home");
    }
}

?>