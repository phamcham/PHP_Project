<?php

namespace Manager\Controllers;

class AccountController extends _ManagerController{

    public const VIEW_ACCOUNT = "Account/Account";

    function Index(){
        // model TODO
    
        // view
        $this->RenderView(self::VIEW_ACCOUNT);
    }
}

?>