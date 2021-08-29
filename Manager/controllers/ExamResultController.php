<?php

namespace Manager\Controllers;

use Core\Utility;
use Models\AdmissionsYearModel;
use Models\ApplicationModel;
use Models\ExamResultModel;

class ExamResultController extends _ManagerController
{
    public const VIEW_EXAMRESULT = "ExamResult/ExamResult";
    public const VIEW_ADD_EXAMRESULT = "ExamResult/AddExamResult";

    public ExamResultModel $examResultModel;
    public AdmissionsYearModel $admissionsYearModel;
    public ApplicationModel $applicationModel;

    public function __construct()
    {
        $this->examResultModel = $this->GetModel('ExamResult');
        $this->admissionsYearModel = $this->GetModel('AdmissionsYear');
        $this->applicationModel = $this->GetModel('Application');
    }

    function Index()
    {
        // model TODO

        // view
        $this->RenderView(self::VIEW_EXAMRESULT);
    }

    // use post
    function Add($idApplication)
    {  
        if (isset($_POST['addExamResult']) && trim($_POST['addExamResult']) != "") {
            unset($_POST['addExamResult']);
            $examResult = [
                $_POST['nguVan'],
                $_POST['toan'],
                $_POST['ngoaiNgu'],
                $_POST['vatLy'],
                $_POST['hoaHoc'],
                $_POST['sinhHoc'],
                $_POST['lichSu'],
                $_POST['diaLy'],
                $_POST['gdcd'],
                $_POST['diemCong']
            ];
            if (($idExamResult = $this->examResultModel->Add($examResult)) > 0){
                $app = $this->applicationModel->Get($idApplication);
                $app['idExamResult'] = $idExamResult;
                Utility::AlertRedirect("Thêm điểm thi thành công", "Manager", "Application", "Detail", [$idApplication]);
            }
            else{
                Utility::AlertRedirect("Có lỗi", "Manager", "Application", "Detail", [$idApplication]);
            }

        } else if (isset($_POST['cancelAddExamResult']) && trim($_POST['cancelAddExamResult']) != "") {
            unset($_POST['cancelAddExamResult']);
            Utility::Redirect("Manager", "Application", "Detail", [$idApplication]);
        } else {
            $app = $this->applicationModel->Get($idApplication);
            $idYear = $app['idAdmissionsYear'];
            $admissionsYear = $this->admissionsYearModel->GetYear($idYear);
            $this->RenderView(self::VIEW_ADD_EXAMRESULT, [
                'application' => $app,
                'admissionsYear' => $admissionsYear
            ]);
        }
    }
}
