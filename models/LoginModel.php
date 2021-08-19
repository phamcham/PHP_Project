<?php

namespace Models;
use Core\Model;

class LoginModel extends Model{
    function Add($username, $password){
        
    }

    function Delete($username){

    }

    function GetAll(){

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