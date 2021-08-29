<?php

namespace Manager\Controllers;

use Core\Utility;
use Models\AccountModel;

class AccountController extends _ManagerController
{

    public const VIEW_ACCOUNT = "Account/Account";
    public const VIEW_ADD_ACCOUNT = "Account/AddAccount";
    public const VIEW_CHANGE_INFO = "Account/UpdateAccountInfo";
    public const VIEW_CHANGE_PASSWORD = "Account/UpdateAccountPassword";

    public AccountModel $accountModel;
    public function __construct()
    {
        $this->accountModel = $this->GetModel("Account");
    }

    function Index()
    {
        $account = $this->accountModel->GetAccount($_SESSION['username'], $_SESSION['password']);
        // view
        $accounts = $this->accountModel->GetAll();
        $accounts = array_filter($accounts, function ($value, $key) use ($account) {
            return $value['username'] != $account['username'];
        }, ARRAY_FILTER_USE_BOTH);

        $this->RenderView(self::VIEW_ACCOUNT, [
            "account" => $account,
            "accounts" => $accounts
        ]);
    }

    // use POST
    function UpdatePassword()
    {
        $account = $this->accountModel->GetAccount($_SESSION['username'], $_SESSION['password']);

        if ((isset($_POST['newPassword']) && trim($_POST['newPassword'])) && (isset($_POST['curPassword']) && trim($_POST['curPassword']))) {
            $newPassword = $_POST['newPassword'];
            $curPassword = $_POST['curPassword'];
            if ($curPassword != $account['curPassword']) {
                // thong bao nhap sai mk
            }

            if ($newPassword == "") {
                // hien man hinh chinh sua

                $this->RenderView(self::VIEW_CHANGE_PASSWORD, [
                    "account" => $account
                ]);
            } else {
                $account['password'] = md5($newPassword);
            }
        } else {
            $this->RenderView(self::VIEW_CHANGE_PASSWORD, [
                "account" => $account
            ]);
        }
    }

    // use post
    function UpdateAccountInfo()
    {
        if (isset($_POST['cancelUpdateAccountInfo']) && trim($_POST['cancelUpdateAccountInfo']) != "") {
            Utility::Redirect("Manager", "Account");
            unset($_POST['cancelUpdateAccountInfo']);
        } else if (isset($_POST['updateAccountInfo']) && trim($_POST['updateAccountInfo']) != "") {
            $account = $this->accountModel->GetAccount($_SESSION['username'], $_SESSION['password']);
            $account['name'] = $_POST['name'];
            $account['phoneNumber'] = $_POST['phoneNumber'];

            unset($_POST['updateAccountInfo']);
            unset($_POST['name']);
            unset($_POST['phoneNumber']);

            if ($this->accountModel->Update($account)) {
                Utility::AlertRedirect("Cập nhật thông tin tài khoản thành công", "Manager", "Account");
            } else {
                Utility::Redirect("Manager", "Account");
            }
        } else {
            $account = $this->accountModel->GetAccount($_SESSION['username'], $_SESSION['password']);
            $this->RenderView(self::VIEW_CHANGE_INFO, [
                "account" => $account
            ]);
        }
    }

    // use post
    function UpdateAccountPassword()
    {
        if (isset($_POST['cancelUpdateAccountPassword']) && trim($_POST['cancelUpdateAccountPassword']) != "") {
            Utility::Redirect("Manager", "Account");
            unset($_POST['cancelUpdateAccountPassword']);
        } else if (isset($_POST['updateAccountPassword']) && trim($_POST['updateAccountPassword']) != "") {
            unset($_POST['updateAccountPassword']);

            $account = $this->accountModel->GetAccount($_SESSION['username'], $_SESSION['password']);

            if (!isset($_POST['oldPass']) || !isset($_POST['newPass']) || !isset($_POST['newPass2'])) {
                $this->RenderView(self::VIEW_CHANGE_PASSWORD, [
                    'reasonFailed' => "Không để trống!"
                ]);
            } else {

                $oldPass = $_POST['oldPass'];
                $newPass = $_POST['newPass'];
                $newPass2 = $_POST['newPass2'];

                unset($_POST['oldPass']);
                unset($_POST['newPass']);
                unset($_POST['newPass2']);

                if (md5($oldPass) != $account['password']) {
                    $this->RenderView(self::VIEW_CHANGE_PASSWORD, [
                        'reasonFailed' => "Mật khẩu không chính xác!"
                    ]);
                } else if ($newPass != $newPass2) {
                    $this->RenderView(self::VIEW_CHANGE_PASSWORD, [
                        'reasonFailed' => "Mật khẩu nhập lại không chính xác!"
                    ]);
                } else {
                    $account['password'] = md5($newPass2);
                    if ($this->accountModel->Update($account)) {

                        $_SESSION['password'] = md5($newPass2);
                        Utility::AlertRedirect("Cập nhật mật khẩu thành công!", "Manager", "Account");
                    } else {
                        Utility::Redirect("Manager", "Account");
                    }
                }
            }
        } else {
            $account = $this->accountModel->GetAccount($_SESSION['username'], $_SESSION['password']);
            $this->RenderView(self::VIEW_CHANGE_PASSWORD, [
                "account" => $account
            ]);
        }
    }

    function UpdateStatusAnAccount($username)
    {
        // TODO: authentication???
        $account = $this->accountModel->GetAccountWithoutPassword($username);
        $account['status'] = ($account['status'] == 1 ? 0 : 1);
        $this->accountModel->Update($account);
        Utility::Redirect("Manager", "Account");
    }

    function DeleteAnAccount($username)
    {
        if ($this->accountModel->Delete($username)) {
            Utility::AlertRedirect("Xoá tài khoản thành công!", "Manager", "Account");
        } else {
            Utility::Redirect("Manager", "Account");
        }
    }

    // use post
    function Add()
    {
        if (isset($_POST['cancelAddAccount']) && trim($_POST['cancelAddAccount']) != "") {
            Utility::Redirect("Manager", "Account");
            unset($_POST['cancelAddAccount']);
        } else if (isset($_POST['addAccount']) && trim($_POST['addAccount']) != "") {
            unset($_POST['addAccount']);

            $username = $_POST['username'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if ($username == "" && $password == "" && $password2 == "") {
                $this->RenderView(self::VIEW_ADD_ACCOUNT);
            } else if ($username == "" || $password == "" || $password2 == "") {
                $this->RenderView(self::VIEW_ADD_ACCOUNT, [
                    "reasonFailed" => "Không được để trống thông tin"
                ]);
            } else {
                if ($this->accountModel->GetAccountWithoutPassword($username) != null) {
                    $this->RenderView(self::VIEW_ADD_ACCOUNT, [
                        "reasonFailed" => "Tên đăng nhập đã tồn tại"
                    ]);
                } else {
                    if ($password != $password2) {
                        $this->RenderView(self::VIEW_ADD_ACCOUNT, [
                            "reasonFailed" => "Mật khẩu nhập lại không khớp"
                        ]);
                    } else {
                        if ($this->accountModel->Add($username, md5($password))) {
                            Utility::AlertRedirect("Thêm tài khoản thành công", "Manager", "Account");
                        } else {
                            $this->RenderView(self::VIEW_ADD_ACCOUNT);
                        }
                    }
                }
            }
        } else {
            $this->RenderView(self::VIEW_ADD_ACCOUNT);
        }
    }
}
