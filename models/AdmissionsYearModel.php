<?php

namespace Models;
use Core\Model;
use PDO;

class AdmissionsYearModel extends Model{
    public const MODEL = "AdmissionsYear";

    public function GetAll(){
        $sql = "select * from AdmissionsYear";
        $db = static::GetDB();
        
        $result = $db->query($sql);
        $rows = $result->fetchAll();
        return $rows;
    }

    public function GetYear($idYear){
        $sql = "SELECT * from AdmissionsYear where idAdmissionsYear = :id";
        $db = static::GetDB();
        
        $st = $db->prepare($sql);
        $st->bindParam(":id", $idYear);
        $st->execute();

        $rowCount= $st->rowCount();
        if ($rowCount == 1){
            return $st->fetch();
        }
        else{
            echo "bugggggggggggggg";
            return $st->fetchAll()[0];
        }
    }
}

?>