<?php

namespace Models;
use Core\Model;
use PDO;

class ApplicationModel extends Model{
    public function GetAllByYear($year){
        $sql = "select * from Application where idAdmissionsYear = :year";
        $db = static::GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":year", $year['idAdmissionsYear']);
        $st->execute();

        $rows = $st->fetchAll();
        return $rows;
    }

    public function Delete($id){
        // check quyen
        $sql = "delete from Application where idApplication = :id";
        $db = static::GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":id", $id);
        return $st->execute();
    }
}

?>