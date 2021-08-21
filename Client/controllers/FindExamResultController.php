<?php

namespace Client\Controllers;

class FindExamResultController extends _ClientController{
    public const VIEW_FINDEXAMRESULT = "FindExamResult/FindExamResult";
    function Index(){
        // model j do tuy thich
    
        // view
        $this->RenderView(self::VIEW_FINDEXAMRESULT);
    }
}

?>