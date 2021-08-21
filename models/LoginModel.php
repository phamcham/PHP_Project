<?php

namespace Models;
use Core\Model;

class LoginModel extends Model{

    public const MODEL = "Login";

    function Add($username, $password){
        
    }

    function Delete($username){

    }

    function Verify($username, $password){
        $db = static::GetDB();
        $sql = "select * from account where username = :user and password = :pass";

        $st = $db->prepare($sql);
        $st->bindParam(':user', $username);
        $st->bindParam(':pass', $password);
        $st->execute();

        $result = $st->rowCount();
        if ($result == 1){
            return 1;
        }
        else{
            return 0;
        }
    }
}