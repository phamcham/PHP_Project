<?php

namespace Client\Controllers;
use Core\Controller;

abstract class _ClientController extends Controller{
    public const PER_CLIENT = "Client";
    public const CLIENT_HOME = "Home";
    public const CLIENT_FINDADMISSIONRESULT = "FindAdmissionsResult";
    public const CLIENT_FINDEXAMRESULT = "FindExamResult";
    public const CLIENT_LOGIN = "Login";

    public function RenderView($view, $data=[]){
        $this->RenderViewPermission(self::PER_CLIENT, $view, $data);
    }
}

?>