<?php

namespace Manager\Controllers;

class ExamResultController extends _ManagerController{
    public const VIEW_EXAMRESULT = "ExamResult/ExamResult";
    function Index(){
        // model TODO
    
        // view
        $this->RenderView(self::VIEW_EXAMRESULT);
    }
}

?>