<?php

namespace Manager\Controllers;
use Models\AccountModel;

class AccountController extends _ManagerController{

    public const VIEW_ACCOUNT = "Account/Account";
    public const VIEW_CHANGE_INFO = "Account/UpdateAccount";
    public const VIEW_CHANGE_PASSWORD = "Account/UpdatePasswordAccount";

    public AccountModel $accountModel;
    public function __construct() {
        $this->accountModel = $this->GetModel("Account");
    }

    function Index(){
        $account = $this->accountModel->GetAccount($_SESSION['username'], $_SESSION['password']);
        // view
        $accounts = $this->accountModel->GetAll();
        $accounts = array_filter($accounts, function($value, $key) use ($account){
            return $value['username'] != $account['username'];
        }, ARRAY_FILTER_USE_BOTH);

        $this->RenderView(self::VIEW_ACCOUNT,[
            "account" => $account,
            "accounts" => $accounts
        ]);
    }

    function UpdatePassword(){
        $account = $this->accountModel->GetAccount($_SESSION['username'], $_SESSION['password']);
    }

    function UpdateInfo(){
        $account = $this->accountModel->GetAccount($_SESSION['username'], $_SESSION['password']);
    }

    function Admin_UpdateStatus($username){

    }

    function Admin_DeleteAccount($username){

    }
}

?>