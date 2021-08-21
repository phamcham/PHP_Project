<?php

namespace Client\Controllers;
use Core\Controller;

abstract class _ClientController extends Controller{

    // dung cho get model
    public const PER_CLIENT = "Client";
    public const MODEL_HOME = "Home";
    public const MODEL_FINDADMISSIONRESULT = "FindAdmissionsResult";
    public const MODEL_FINDEXAMRESULT = "FindExamResult";
    public const MODEL_LOGIN = "Login";

    public function RenderView($view, $data=[]){
        $this->RenderViewPermission(self::PER_CLIENT, $view, $data);
    }
}

?>