<?php

namespace Client\Controllers;

use Core\Utility;
use Manager\Controllers\_ManagerController;

use Manager\Controllers\HomeController;
use Models\AccountModel;

class LoginController extends _ClientController
{
    // dinh nghia cac man hinh o day
    public const VIEW_LOGIN = "Login/Login";

    // khai bao model dung 1 lan de k phai get lai
    public AccountModel $accountModel;

    public function __construct()
    {
        $this->accountModel = $this->GetModel("Account");
    }

    function Index()
    {
        $this->RenderView(self::VIEW_LOGIN);
    }

    function Verify()
    {
        if ((!isset($_POST['username']) || trim($_POST['username']) == "") and
            (!isset($_POST['password']) || trim($_POST['password']) == "")
        ) {
            $this->RenderView(self::VIEW_LOGIN);
        }
        if (!isset($_POST['username']) || trim($_POST['username']) == "") {
            $this->RenderView(self::VIEW_LOGIN, [
                "reasonFailed" => "Tên đăng nhập không được để trống"
            ]);
        } else if (!isset($_POST['password']) || trim($_POST['password']) == "") {
            $this->RenderView(self::VIEW_LOGIN, [
                "reasonFailed" => "Mật khẩu không được để trống"
            ]);
        } else {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            // xoa du lieu di
            unset($_POST['username']);
            unset($_POST['password']);

            // lay database o model de so sanh
            $account = $this->accountModel->GetAccount($username, $password);
            // sau do tra data ra view
            if ($account != null) {
                if ($account['status'] == 1) {
                    // dang nhap thanh cong
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $this->RenderViewPermission(_ManagerController::PER_MANAGER, HomeController::VIEW_HOME);

                    Utility::Redirect("Manager", "Home");
                }
                else{
                    $this->RenderView(self::VIEW_LOGIN, [
                        "reasonFailed" => "Tài khoản tạm thời bị vô hiệu hoá: " . $username
                    ]);
                }
            } else {
                // dang nhap that bai
                $this->RenderView(self::VIEW_LOGIN, [
                    "reasonFailed" => "Tên đăng nhập hoặc mật khẩu không chính xác"
                ]);
            }
        }
    }
}
