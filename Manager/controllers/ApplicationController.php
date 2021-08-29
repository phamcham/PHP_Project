<?php

namespace Manager\Controllers;

use Core\Utility;
use Core\ExcelExporter;
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
        Utility::Redirect("Manager", "Application");
    }

    function Validate()
    {
        if (!isset($_POST['name']) || trim($_POST['name']) == "")
            return "Chưa nhập họ và tên";

        if ($_POST['gender'] == "unknown")
            return "Chưa chọn giới tính";

        if (!isset($_POST['birthday']) || trim($_POST['birthday']) == "")
            return "Chưa nhập ngày sinh";

        if (!isset($_POST['birthplace']) || trim($_POST['birthplace']) == "")
            return "Chưa nhập nơi sinh";

        if (!isset($_POST['ethnic']) || trim($_POST['ethnic']) == "")
            return "Chưa nhập dân tộc";

        if (!isset($_POST['phoneNumber']) || trim($_POST['phoneNumber']) == "")
            return "Chưa nhập số điện thoại";

        if (!isset($_POST['identification']) || trim($_POST['identification']) == "")
            return "Chưa nhập số CMND/CCCD";

        if (!isset($_POST['expiration']) || trim($_POST['expiration']) == "")
            return "Chưa nhập ngày hết hạn CMMD/CCCD";

        if (!isset($_POST['email']) || trim($_POST['email']) == "")
            return "Chưa nhập email";

        if (!isset($_POST['address']) || trim($_POST['address']) == "")
            return "Chưa nhập địa chỉ";

        if ($_POST['idMajors'] == "unknown")
            return "Chưa chọn ngành học";

        return null;
    }

    // hien man hinh add applicaion
    function Add($idYear)
    {
        if (isset($_POST['cancelAddApplication']) && $_POST['cancelAddApplication'] != "") {
            Utility::Redirect("Manager", "Application");
        } else if (isset($_POST['addApplication']) && $_POST['addApplication'] != "") {

            // =null la 
            if (($reasonFailed = $this->Validate()) != null) {
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
                    "admissionsYear" => $year,
                    "reasonFailed" => $reasonFailed
                ]);
            } else {
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
                        Utility::AlertRedirect("Thêm hồ sơ thành công", "Manager", "Application", "Detail", [$idApplication]);
                    } else {
                        echo '<script>alert("BUGGGGGGGGGGGGGGGGGG UPDATE APPLICATION!!!!!")</script>';
                    }
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

        $exam = null;
        if (isset($appl['idExamResult']) && trim($appl['idExamResult']) != "")
            $exam = $this->examResultModel->GetByID($appl['idExamResult']);

        $this->RenderView(self::VIEW_DETAIL_APPLICATION, [
            "application" => $appl,
            //"major" => $major,
            "admissionsMajors" => $admissionsMajors,
            "admissionsYear" => $year,
            "examResult" => $exam
        ]);
    }

    function Update($id)
    {
        if (isset($_POST['cancelUpdateApplication']) && $_POST['cancelUpdateApplication'] != "") {
            //header("Location: http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/Application/Detail/" . $id);
            Utility::Redirect("Manager", "Application", "Detail", [$id]);
        }
        if (isset($_POST['updateApplication']) && $_POST['updateApplication'] != "") {

            if (($reasonFailed = $this->Validate()) != null) {
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
                    "admissionsYear" => $year,
                    "reasonFailed" => $reasonFailed
                ]);
            } else {
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

                    Utility::AlertRedirect("Cập nhật thông tin thành công", "Manager", "Application", "Detail", [$id]);
                } else {
                    echo '<script>alert("BUGGGGGGGGGGGGGGGGGG UPDATE APPLICATION!!!!!")</script>';
                }
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

    function ReportExcel($idYear){
        //ExcelExporter::Export("hehe", ['a', 'b'], [[1, 2], [3, 4]]);
        $fileName = "Application";
        $title = "DANH SÁCH HỒ SƠ TUYỂN SINH NĂM " . $this->admissionsYearModel->GetYear($idYear)['valueAdmissionsYear'];
        $fields = ['STT', 'Mã hồ sơ', 'Họ và tên thí sinh', 'Giới tính', 'Ngày sinh', 'Nơi sinh',
            'Dân tộc', 'Số điện thoại', 'Số CMND/CCCD', 'Ngày hết hạn', 'Email', 'Địa chỉ', 'Ngành học'];

        $dataTable = array();
        $data = $this->applicationModel->GetAll();
        $data = array_filter($data, function ($value, $key) use ($idYear) {
            return ($value['idAdmissionsYear'] == $idYear);
        }, ARRAY_FILTER_USE_BOTH);


        for ($i = 0; $i < count($data); $i++){
            array_push($dataTable, [
                $i + 1,
                $data[$i]['idApplication'],
                $data[$i]['name'],
                $data[$i]['gender'],
                $data[$i]['birthday'],
                $data[$i]['birthplace'],
                $data[$i]['ethnic'],
                $data[$i]['phoneNumber'],
                $data[$i]['identification'],
                $data[$i]['expiration'],
                $data[$i]['email'],
                $data[$i]['address'],
                $this->majorsModel->GetByID($data[$i]['idMajors'])['nameMajors']
            ]);
        }
        
        ExcelExporter::Export($fileName, $title, $fields, $dataTable);
    }
}
