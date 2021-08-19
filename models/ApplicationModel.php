<?php

namespace Models;
use Core\Model;

class ApplicationModel extends Model{
    public function GetApplication(){
        // 
        //return "Thong tin application list";
    }
}

class ApplicationEntity{
    public $idApplication;
    public $idAdmissionsYear;
    public $avatar;
    public $name;

}

?>