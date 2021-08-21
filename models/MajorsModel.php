<?php

namespace Models;
use Core\Model;
use PDO;

class MajorsModel extends Model{
    public function GetByID($id){
        $sql = "select * from Majors where idMajors = :id";
        $db = static::GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":id", $id);
        $st->execute();

        $rows = $st->fetchAll()[0];
        return $rows;
    }
}

?>