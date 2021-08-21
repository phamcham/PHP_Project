<?php

namespace Models;
use Core\Model;

class AdmissionsMajorModel extends Model{
    public const MODEL = "AdmissionsMajor";

    public function GetByYearID($idYear){
        $sql = "SELECT * FROM AdmissionsMajor WHERE idAdmissionsYear = :idYear";
        $db = static::GetDB();
        
        $st = $db->prepare($sql);
        $st->bindParam(':idYear', $idYear);
        $st->execute();
        
        return $st->fetchAll();
    }
}

?>