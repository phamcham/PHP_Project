<?php

namespace Manager\Controllers;

use Models\MajorsModel;

class MajorsController extends _ManagerController{

    public const VIEW_MAJORS = "Majors/Majors";
    public const VIEW_ADD_MAJORS = "Majors/AddMajors";
    public const VIEW_UPDATE_MAJORS = "Majors/UpdateMajors";
    public const VIEW_DELETE_MAJORS = "Majors/DeleteMajors"; // fake view cua Toan

    function Index(){

        // view
        $this->RenderView(self::VIEW_MAJORS);
    }

    function Add(){
        $this->RenderView(self::VIEW_ADD_MAJORS);
    }

    function Update($id){
        $this->RenderView(self::VIEW_UPDATE_MAJORS, [
            "id" => $id
        ]);
    }

    function Delete($id){
        $this->RenderView(self::VIEW_DELETE_MAJORS,[
            'id' => $id
        ]);
    }
}

?>