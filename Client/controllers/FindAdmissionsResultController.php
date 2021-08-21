<?php

namespace Client\Controllers;

class FindAdmissionsResultController extends _ClientController{
    public const VIEW_FINDADMISSIONRESULT = "FindAdmissionsResult/FindAdmissionsResult";
    function Index(){
        // model j do tuy thich
    
        // view
        $this->RenderView(self::VIEW_FINDADMISSIONRESULT);
    }
}

?>