<?php

namespace Client\Controllers;

class HomeController extends _ClientController{
    function Index(){
        // model j do tuy thich
    
        // view
        $this->RenderView(_ClientController::CLIENT_HOME);
    }
}

?>