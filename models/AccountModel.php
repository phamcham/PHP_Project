<?php

namespace Models;
use Core\Model;

class AccountModel extends Model{
    public const MODEL = "Account";

    public const ADMIN = "admin";
    public const USER = "user";

    public function GetAccount($username, $password){
        $sql = "SELECT * FROM Account WHERE username = :username AND password = :password";
        $db = $this->GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":username", $username);
        $st->bindParam(":password", $password);

        if ($st->execute() && $st->rowCount() > 0){
            return $st->fetchAll()[0];
        }
    }

    public function GetAccountWithoutPassword($username){
        $sql = "SELECT * FROM Account WHERE username = :username";
        $db = $this->GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":username", $username);

        if ($st->execute() && $st->rowCount() > 0){
            return $st->fetchAll()[0];
        }
    }

    public function Update($account){
        $sql = "UPDATE Account SET password = :password , name = :name, phoneNumber = :phoneNumber, status = :status
            WHERE username = :username";
        $db = $this->GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":username", $account['username']);
        $st->bindParam(":password", $account['password']);
        $st->bindParam(":name", $account['name']);
        $st->bindParam(":phoneNumber", $account['phoneNumber']);
        $st->bindParam(":status", $account['status']);

        return $st->execute();
    }

    public function Delete($username){
        $sql = "DELETE FROM Account WHERE username = :username";
        $db = $this->GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":username", $username);

        return $st->execute();
    }

    public function GetAll(){
        $sql = "SELECT * FROM Account";
        $db = $this->GetDB();
        $st = $db->prepare($sql);

        if ($st->execute()){
            return $st->fetchAll();
        }
    }

    public function Add($username, $password){
        $sql = "INSERT INTO Account (`username`, `password`, `role`, `status`)
                VALUES (:username, :password, :role, :status)";
        $db = $this->GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":username", $username);
        $st->bindParam(":password", $password);
        $role = "user";
        $st->bindParam(":role", $role);
        $status = 1;
        $st->bindParam(":status", $status);

        return $st->execute();
    }
}

?>