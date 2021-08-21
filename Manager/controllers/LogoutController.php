<?php

namespace Manager\Controllers;

use Client\Controllers\_ClientController;
require_once "./Client/controllers/HomeController.php";
use Client\Controllers\HomeController;

class LogoutController extends _ManagerController{
    function Index(){
        // model TODO
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        // view
        $this->RenderViewPermission(_ClientController::PER_CLIENT, HomeController::VIEW_HOME);
        header("Location: http://". $_SERVER['HTTP_HOST']. "/PHP_Project/Client/Home");
    }
}

?>