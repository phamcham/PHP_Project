<?php

namespace Manager\Controllers;

class ApplicationController extends _ManagerController{
    function Index($idYear = -1){
        // nam hien tai mac dinh la nam moi nhat
        $ayModel = $this->GetModel(_ManagerController::MANAGER_ADMISSIONSYEAR);
        $years = $ayModel->GetAll();
        $maxYear = $years[0];
        if ($idYear == -1) {
            for ($i = 0; $i < count($years); $i++) {
                if ($years[$i]['valueAdmissionsYear'] > $maxYear['valueAdmissionsYear']) {
                    $maxYear = $years[$i];
                }
            }
        }
        else{
            $maxYear = $ayModel->GetYear($idYear);
        }

        // hien bang ho so here
        $applicationModel = $this->GetModel(_ManagerController::MANAGER_APPLICATION);
        $applications = $applicationModel->GetAllByYear($maxYear);

        $majorModel = $this->GetModel(_ManagerController::MANAGER_MAJORS);
        for ($i = 0; $i < count($applications); $i++){
            $applications[$i] += ['nameMajors' => $majorModel->GetMajorByID($applications[$i]['idAdmissionsMajor'])['nameMajors']];
        }


        // view
        $this->RenderView(_ManagerController::MANAGER_APPLICATION, [
            "admissionsYear" => $maxYear,
            "years" => $years,
            "applications" => $applications
        ]);
    }
}
