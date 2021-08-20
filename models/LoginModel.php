<?php

namespace Models;
use Core\Model;

class LoginModel extends Model{
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

class LoginEntity{
    public $username;
    public $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
}

?>