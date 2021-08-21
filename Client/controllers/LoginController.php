<?php
namespace Client\Controllers;
use Manager\Controllers\_ManagerController;
require_once "./Manager/controllers/HomeController.php";
use Manager\Controllers\HomeController;
use Models\LoginModel;

class LoginController extends _ClientController{
    // dinh nghia cac man hinh o day
    public const VIEW_LOGIN = "Login/Login";

    // khai bao model dung 1 lan de k phai get lai
    public LoginModel $loginModel;

    public function __construct() {
        $this->loginModel = $this->GetModel("Login");
    }

    function Index(){
        $this->RenderView(self::VIEW_LOGIN);
    }

    function Verify(){
        if ((!isset($_POST['username']) || trim($_POST['username']) == "") and
        (!isset($_POST['password']) || trim($_POST['password']) == "")){
            $this->RenderView(self::VIEW_LOGIN);
        }
        if (!isset($_POST['username']) || trim($_POST['username']) == ""){
            $this->RenderView(self::VIEW_LOGIN, [
                "reasonFailed" => "Tên đăng nhập không được để trống"
            ]);
        }
        else if (!isset($_POST['password']) || trim($_POST['password']) == ""){
            $this->RenderView(self::VIEW_LOGIN, [
                "reasonFailed" => "Mật khẩu không được để trống"
            ]);
        }
        else{
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            // xoa du lieu di
            unset($_POST['username']);
            unset($_POST['password']);
            
            // lay database o model de so sanh
            $result = $this->loginModel->Verify($username, $password);
            // sau do tra data ra view
            if ($result == 1){
                // dang nhap thanh cong
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $this->RenderViewPermission(_ManagerController::PER_MANAGER, HomeController::VIEW_HOME);
                
                header("Location: http://". $_SERVER['HTTP_HOST']. "/PHP_Project/Manager/Home");
            }
            else{
                // dang nhap that bai
                $this->RenderView(self::VIEW_LOGIN, [
                    "reasonFailed" => "Tên đăng nhập hoặc mật khẩu không chính xác"
                ]);
            }
        }
    }
}

?>