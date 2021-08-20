<?php
namespace Client\Controllers;

use Manager\Controllers\_ManagerController;

class LoginController extends _ClientController{

    function Index(){
        $this->RenderView(_ClientController::CLIENT_LOGIN);
    }

    function Verify(){
        if ((!isset($_POST['username']) || trim($_POST['username']) == "") and
        (!isset($_POST['password']) || trim($_POST['password']) == "")){
            $this->RenderView(_ClientController::CLIENT_LOGIN);
        }
        if (!isset($_POST['username']) || trim($_POST['username']) == ""){
            $this->RenderView(_ClientController::CLIENT_LOGIN, [
                "reasonFailed" => "Tên đăng nhập không được để trống"
            ]);
        }
        else if (!isset($_POST['password']) || trim($_POST['password']) == ""){
            $this->RenderView(_ClientController::CLIENT_LOGIN, [
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
            $loginModel = $this->GetModel(_ClientController::CLIENT_LOGIN);
            $result = $loginModel->Verify($username, $password);
            // sau do tra data ra view
            if ($result == 1){
                // dang nhap thanh cong
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $this->RenderViewPermission(_ManagerController::PER_MANAGER, _ManagerController::HOME);
                
                header("Location: http://". $_SERVER['HTTP_HOST']. "/PHP_Project/Manager/Home");
            }
            else{
                // dang nhap that bai
                $this->RenderView(_ClientController::CLIENT_LOGIN, [
                    "reasonFailed" => "Tên đăng nhập hoặc mật khẩu không chính xác"
                ]);
            }
        }
    }
}

?>