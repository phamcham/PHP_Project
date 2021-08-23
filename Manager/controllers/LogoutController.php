<?php

namespace Manager\Controllers;

use Client\Controllers\_ClientController;
use Client\Controllers\HomeController;
use Core\Utility;

class LogoutController extends _ManagerController{
    function Index(){
        // model TODO
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        // view
        $this->RenderViewPermission(_ClientController::PER_CLIENT, HomeController::VIEW_HOME);
        Utility::Redirect("Client", "Home");
    }
}

?>