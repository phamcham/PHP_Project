<?php

namespace Manager\Controllers;

class AdmissionsMajorController extends _ManagerController{

    public const VIEW_ADMISSIONSMAJOR = "AdmissionsMajor/AdmissionsMajor";

    function Index(){
        // model TODO
    
        // view
        $this->RenderView(self::VIEW_ADMISSIONSMAJOR);
    }
}

?>