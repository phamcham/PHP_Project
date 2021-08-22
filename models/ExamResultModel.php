<?php

namespace Models;
use Core\Model;
use PDO;

class ExamResultModel extends Model{
    public function GetByID($id){
        $sql = "SELECT * FROM examResult WHERE idExamResult = :id";

        $db = static::GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":id", $id);

        $st->execute();
        return $st->fetchAll()[0];
    }

    public function Add($examResult){
        $sql = "INSERT INTO examResult(`nguVan`, `toan`, `ngoaiNgu`, `vatLy`, `hoaHoc`, `sinhHoc`, `lichSu`, `diaLy`, `gdcd`, `diemCong`)
        VALUES(:nguVan, :toan, :ngoaiNgu, :vatLy, :hoaHoc, :sinhHoc, :lichSu, :diaLy, :gdcd, :diemCong);";
        $db = static::GetDB();
        $st = $db->prepare($sql);

        //$st->bindParam(":idExamResult", $examResult['idExamResult']);
        $st->bindParam(":nguVan", $examResult['nguVan']);
        $st->bindParam(":toan", $examResult['toan']);
        $st->bindParam(":ngoaiNgu", $examResult['ngoaiNgu']);
        $st->bindParam(":vatLy", $examResult['vatLy']);
        $st->bindParam(":hoaHoc", $examResult['hoaHoc']);
        $st->bindParam(":sinhHoc", $examResult['sinhHoc']);
        $st->bindParam(":lichSu", $examResult['lichSu']);
        $st->bindParam(":diaLy", $examResult['diaLy']);
        $st->bindParam(":gdcd", $examResult['gdcd']);
        $st->bindParam(":diemCong", $examResult['diemCong']);

        if ($st->execute()){
            return $db->lastInsertId();
        }
        else{
            $db->rollBack();
            return -1;
        }
    }
}

?>