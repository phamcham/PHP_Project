<?php

namespace Manager\Controllers;

class AdmissionsMajorController extends _ManagerController{

    public const VIEW_ADMISSIONSMAJOR = "AdmissionsMajor/AdmissionsMajor";
    public const VIEW_ADD_ADMISSIONSMAJOR = "AdmissionsMajor/AddAdmissionsMajor";
    public const VIEW_UPDATE_ADMISSIONSMAJOR = "AdmissionsMajor/UpdateAdmissionsMajor";

    function Index(){
        // model TODO
    
        // view
        $this->RenderView(self::VIEW_ADMISSIONSMAJOR);
    }

    function Add(){
        $this->RenderView(self::VIEW_ADD_ADMISSIONSMAJOR);
    }

    function Delete($idMajors, $idAdmissionsYear){
        $_POST['idMajors'] = $idMajors;
        $_POST['idAdmissionsYear'] = $idAdmissionsYear;
        require_once "./Manager/views/pages/AdmissionsMajor/DeleteAdmissionsMajor.php";
    }

    function Update($idMajors, $idAdmissionsYear){
        $_POST['idMajors'] = $idMajors;
        $_POST['idAdmissionsYear'] = $idAdmissionsYear;
        $this->RenderView(self::VIEW_UPDATE_ADMISSIONSMAJOR);
    }
}

?>