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
    function Add($idYear)
    {
        if (isset($_POST['cancelAddApplication']) && $_POST['cancelAddApplication'] != "") {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/Application/Index");
        }
        else if (isset($_POST['addApplication']) && $_POST['addApplication'] != "") {
            $application = array();
            $dummyExamResult = [
                'idExamResult' => 1,
                'nguVan' => 0,
                'toan' => 0,
                'ngoaiNgu' => 0,
                'vatLy' => 0,
                'hoaHoc' => 0,
                'sinhHoc' => 0,
                'lichSu' => 0,
                'diaLy' => 0,
                'gdcd' => 0,
                'diemCong' => 0
            ];

            if (($application['idExamResult'] = $this->examResultModel->Add($dummyExamResult)) != -1) {
                //echo "aaaaaaaa: " . $application['idExamResult'];
                $application['avatar'] = isset($_POST['avatar']) ? $_POST['avatar'] : "";
                $application['name'] = $_POST['name'];
                $application['gender'] = $_POST['gender'] == "male" ? 1 : 0;
                $application['birthday'] = $_POST['birthday'];
                $application['birthplace'] = $_POST['birthplace'];
                $application['ethnic'] = $_POST['ethnic'];
                $application['identification'] = $_POST['identification'];
                $application['expiration'] = $_POST['expiration'];
                $application['phoneNumber'] = $_POST['phoneNumber'];
                $application['email'] = $_POST['email'];
                $application['address'] = $_POST['address'];

                $application['idAdmissionsYear'] = $idYear;
                $application['idMajors'] = $_POST['idMajors'];

                if (($idApplication = $this->applicationModel->Add($application)) != -1) {
                    // them thanh cong

                    //header("Location: http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/Application/Detail/" . $application['idApplication']);
                    echo '<script>alert("Thêm hồ sơ thành công");'
                        . 'location = "http://'
                        . $_SERVER['HTTP_HOST']
                        . '/PHP_Project/Manager/Application/Detail/'
                        . $idApplication . '"'
                        . '</script>';
                } else {
                    echo '<script>alert("BUGGGGGGGGGGGGGGGGGG UPDATE APPLICATION!!!!!")</script>';
                }
            }
        } else {
            // du lieu thi sinh
            $year = $this->admissionsYearModel->GetYear($idYear);

            // du lieu cbox
            $admissionsMajors = $this->admissionsMajorModel->GetByYearID($year['idAdmissionsYear']); // nganh tuyen sinh trong nam hoc do
            foreach ($admissionsMajors as &$m) {
                $nameMajor = $this->majorsModel->GetByID($m['idMajors'])['nameMajors'];
                $m['nameMajors'] = $nameMajor;
            }
            unset($m);

            $this->RenderView(self::VIEW_ADD_APPLICATION, [
                "admissionsMajors" => $admissionsMajors,
                "admissionsYear" => $year
                //"examResult" => $exam
            ]);
        }
        unset($_POST['addApplication']);
        unset($_POST['cancelAddApplication']);
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

    function Update($id)
    {
        if (isset($_POST['cancelUpdateApplication']) && $_POST['cancelUpdateApplication'] != "") {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/Application/Detail/" . $id);
        }
        if (isset($_POST['updateApplication']) && $_POST['updateApplication'] != "") {

            $application = array();

            $application['idApplication'] = $id;
            $application['avatar'] = isset($_POST['avatar']) ? $_POST['avatar'] : "";
            $application['name'] = $_POST['name'];
            $application['gender'] = $_POST['gender'] == "male" ? 1 : 0;
            $application['birthday'] = $_POST['birthday'];
            $application['birthplace'] = $_POST['birthplace'];
            $application['ethnic'] = $_POST['ethnic'];
            $application['identification'] = $_POST['identification'];
            $application['expiration'] = $_POST['expiration'];
            $application['phoneNumber'] = $_POST['phoneNumber'];
            $application['email'] = $_POST['email'];
            $application['address'] = $_POST['address'];
            $application['idExamResult'] = $this->applicationModel->Get($id)['idExamResult'];
            $application['idAdmissionsYear'] = $this->applicationModel->Get($id)['idAdmissionsYear'];
            $application['idMajors'] = $_POST['idMajors'];

            if ($this->applicationModel->Update($application)) {
                // cap nhat thanh cong

                //header("Location: http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/Application/Detail/" . $application['idApplication']);
                echo '<script>alert("Cập nhật thông tin thành công");'
                    . 'location = "http://'
                    . $_SERVER['HTTP_HOST']
                    . '/PHP_Project/Manager/Application/Detail/'
                    . $id . '"'
                    . '</script>';
            } else {
                echo '<script>alert("BUGGGGGGGGGGGGGGGGGG UPDATE APPLICATION!!!!!")</script>';
            }
        } else {
            // du lieu thi sinh
            $appl = $this->applicationModel->Get($id);
            $year = $this->admissionsYearModel->GetYear($appl['idAdmissionsYear']);
            $major = $this->majorsModel->GetByID($appl['idMajors']);

            // du lieu cbox
            $admissionsMajors = $this->admissionsMajorModel->GetByYearID($year['idAdmissionsYear']); // nganh tuyen sinh trong nam hoc do
            foreach ($admissionsMajors as &$m) {
                $nameMajor = $this->majorsModel->GetByID($m['idMajors'])['nameMajors'];
                $m['nameMajors'] = $nameMajor;
            }
            unset($m);

            $this->RenderView(self::VIEW_UPDATE_APPLICATION, [
                "application" => $appl,
                "major" => $major,
                "admissionsMajors" => $admissionsMajors,
                "admissionsYear" => $year
                //"examResult" => $exam
            ]);
        }
        unset($_POST['updateApplication']);
    }
}
