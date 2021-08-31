<?php

namespace Manager\Controllers;

use Models\AccountModel;
use Models\AdmissionsMajorModel;
use Models\AdmissionsYearModel;
use Models\ApplicationModel;
use Models\MajorsModel;

class HomeController extends _ManagerController{

    public const VIEW_HOME = "Home/Home";

    public AccountModel $accountModel;
    public ApplicationModel $applicationModel;
    public AdmissionsYearModel $admissionsYearModel;
    public AdmissionsMajorModel $admissionsMajorModel;

    public function __construct() {
        $this->accountModel = $this->GetModel("Account");
        $this->applicationModel = $this->GetModel("Application");
        $this->admissionsYearModel = $this->GetModel("AdmissionsYear");
        $this->admissionsMajorModel = $this->GetModel("AdmissionsMajor");
    }

    function Index(){
        // model TODO
        $years = $this->admissionsYearModel->GetAll();
        $maxYear = $years[0];
        for ($i = 0; $i < count($years); $i++) {
            if ($years[$i]['valueAdmissionsYear'] > $maxYear['valueAdmissionsYear']) {
                $maxYear = $years[$i];
            }
        }

        $account = $this->accountModel->GetAccountWithoutPassword($_SESSION['username']);
        
        $applications = $this->applicationModel->GetAll();
        $applications = array_filter($applications, function($app) use ($maxYear){
            return $app['idAdmissionsYear'] == $maxYear['idAdmissionsYear'];
        });

        $majors = $this->admissionsMajorModel->GetByYearID($maxYear['idAdmissionsYear']);

        // view

        $this->RenderView(self::VIEW_HOME, [
            'account' => $account,
            'nApplications' => count($applications),
            'nMajors' => count($majors),
            'year' => $maxYear
        ]);
    }
}

?>