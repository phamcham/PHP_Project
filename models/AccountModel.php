<?php

namespace Models;
use Core\Model;

class AccountModel extends Model{
    public const MODEL = "Account";

    public function GetAccount($username, $password){
        $sql = "SELECT * FROM Account WHERE username = :username AND password = :password";
        $db = $this->GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":username", $username);
        $st->bindParam(":password", $password);

        if ($st->execute()){
            return $st->fetchAll()[0];
        }
    }

    public function GetAll(){
        $sql = "SELECT * FROM Account";
        $db = $this->GetDB();
        $st = $db->prepare($sql);

        if ($st->execute()){
            return $st->fetchAll();
        }
    }
}

?>