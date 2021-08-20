<?php

namespace Manager\Controllers;

class AccountController extends _ManagerController{
    function Index(){
        // model TODO
    
        // view
        $this->RenderView(_ManagerController::MANAGER_ACCOUNT);
    }
}

?>