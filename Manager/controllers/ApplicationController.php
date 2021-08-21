<?php

namespace Manager\Controllers;

use Models\AdmissionsMajorModel;
use Models\AdmissionsYearModel;
use Models\ApplicationModel;
use Models\MajorsModel;
use Models\ExamResultModel;

class ApplicationController extends _ManagerController
{
    // dinh nghia cac man hinh rieng cua application, 
    public const VIEW_APPLICATION = "Application/Application";
    public const VIEW_ADD_APPLICATION = "Application/AddApplication";
    public const VIEW_DETAIL_APPLICATION = "Application/DetailApplication";
    public const VIEW_UPDATE_APPLICATION = "Application/UpdateApplication";

    public AdmissionsYearModel $admissionsYearModel;
    public ApplicationModel $applicationModel;
    public MajorsModel $majorsModel;
    public ExamResultModel $examResultModel;
    public AdmissionsMajorModel $admissionsMajorModel;

    public function __construct()
    {
        //$this->admissionsYearModel = $this->GetModel(AdmissionsYearModel::MODEL);
        $this->admissionsYearModel = $this->GetModel("AdmissionsYear");
        $this->applicationModel = $this->GetModel("Application");
        $this->majorsModel = $this->GetModel("Majors");
        $this->examResultModel = $this->GetModel("ExamResult");
        $this->admissionsMajorModel = $this->GetModel("admissionsMajor");
    }

    function Index($idYear = -1, $searchVal = "")
    {
        // nam hien tai mac dinh la nam moi nhat
        $years = $this->admissionsYearModel->GetAll();
        $maxYear = $years[0];
        if ($idYear == -1) {
            for ($i = 0; $i < count($years); $i++) {
                if ($years[$i]['valueAdmissionsYear'] > $maxYear['valueAdmissionsYear']) {
                    $maxYear = $years[$i];
                }
            }
            $idYear = $maxYear['idAdmissionsYear'];
        } else {
            $maxYear = $this->admissionsYearModel->GetYear($idYear);
        }

        // PHP_8 but i am using PHP 7 :<<
        if (!function_exists('str_contains')) {
            function str_contains(string $haystack, string $needle): bool
            {
                return '' === $needle || false !== strpos($haystack, $needle);
            }
        }
        // hien bang ho so here
        $applications = $this->applicationModel->GetAll();

        foreach ($applications as &$application) {
            $application += ['nameMajors' => $this->majorsModel->GetByID($application['idMajors'])['nameMajors']];
        }
        unset($application);

        // loc theo ten va theo nam

        $applications = array_filter($applications, function ($value, $key) use ($idYear, $searchVal) {
            //echo $value['idAdmissionsYear'] . " " . $idYear . "<br>";
            if ($value['idAdmissionsYear'] != $idYear) return false;
            return str_contains($value['idApplication'], $searchVal) ||
                str_contains($value['name'], $searchVal) ||
                str_contains($value['phoneNumber'], $searchVal) ||
                str_contains($value['nameMajors'], $searchVal);
        }, ARRAY_FILTER_USE_BOTH);

        // view
        $this->RenderView(self::VIEW_APPLICATION, [
            "admissionsYear" => $maxYear,
            "years" => $years,
            "applications" => $applications,
            "search" => $searchVal
        ]);
    }

    function Delete($id)
    {
        if ($this->applicationModel->Delete($id)) {
            // xoa thanh cong
        } else {
            // xoa that bai
        }
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/Application/Index");
    }

    // hien man hinh add applicaion
    function Add($idYear = -1)
    {
        // nam hien tai mac dinh la nam moi nhat
        $years = $this->admissionsYearModel->GetAll();
        $curYear = $years[0];
        if ($idYear == -1) {
            foreach ($years as $year) {
                if ($year['valueAdmissionsYear'] > $curYear['valueAdmissionsYear']) {
                    $curYear = $year;
                }
            }
            $idYear = $curYear['idAdmissionsYear'];
        } else {
            $curYear = $this->admissionsYearModel->GetYear($idYear);
        }

        $this->RenderView(self::VIEW_ADD_APPLICATION, [
            "admissionsYear" => $curYear
        ]);
    }

    function Detail($id)
    {
        $appl = $this->applicationModel->Get($id);
        $year = $this->admissionsYearModel->GetYear($appl['idAdmissionsYear']);
        //$major = $this->majorsModel->GetByID($appl['idMajors']); // 
        $admissionsMajors = $this->admissionsMajorModel->GetByYearID($year['idAdmissionsYear']); // nganh tuyen sinh trong nam hoc do
        foreach ($admissionsMajors as &$major) {
            $nameMajor = $this->majorsModel->GetByID($major['idMajors'])['nameMajors'];
            $major['nameMajors'] = $nameMajor;
        }
        unset($major);
        
        //$exam = self::$examResultModel->GetByID();

        $this->RenderView(self::VIEW_DETAIL_APPLICATION, [
            "application" => $appl,
            //"major" => $major,
            "admissionsMajors" => $admissionsMajors,
            "admissionsYear" => $year
            //"examResult" => $exam
        ]);
    }
}
