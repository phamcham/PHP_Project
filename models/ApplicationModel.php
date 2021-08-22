<?php

namespace Models;

use Core\Model;

class ApplicationModel extends Model
{
    public function GetAll()
    {
        $sql = "SELECT * FROM Application";
        $db = static::GetDB();
        $st = $db->prepare($sql);
        $st->execute();
        $rows = $st->fetchAll();
        return $rows;
    }

    public function Get($id){
        $sql = "SELECT * FROM Application WHERE idApplication = :id";
        $db = static::GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":id", $id);
        $st->execute();
        $row = $st->fetchAll()[0];
        return $row;
    }

    public function Delete($id)
    {
        // check quyen
        $sql = "DELETE FROM Application WHERE idApplication = :id";
        $db = static::GetDB();
        $st = $db->prepare($sql);
        $st->bindParam(":id", $id);
        return $st->execute();
    }

    public function Add($application)
    {
        $sql = "INSERT INTO application (`avatar`, `name`, `gender`, `birthday`, `birthplace`, `ethnic`, `identification`, `expiration`, `phoneNumber`, `email`, `address`, `idExamResult`, `idAdmissionsYear`, `idMajors`) 
                VALUES (:avatar, :name, :gender, :birthday, :birthplace, :ethnic, :identification, :expiration, :phoneNumber, :email, :address, :idExamResult, :idAdmissionsYear, :idMajors);";
        $db = static::GetDB();
        $st = $db->prepare($sql);

        //$st->bindParam(":idApplication", $application['idApplication']);
        $st->bindParam(":avatar", $application['avatar']);
        $st->bindParam(":name", $application['name']);
        $st->bindParam(":gender", $application['gender']);
        $st->bindParam(":birthday", $application['birthday']);
        $st->bindParam(":birthplace", $application['birthplace']);
        $st->bindParam(":ethnic", $application['ethnic']);
        $st->bindParam(":identification", $application['identification']);
        $st->bindParam(":expiration", $application['expiration']);
        $st->bindParam(":phoneNumber", $application['phoneNumber']);
        $st->bindParam(":email", $application['email']);
        $st->bindParam(":address", $application['address']);
        $st->bindParam(":idExamResult", $application['idExamResult']);
        $st->bindParam(":idAdmissionsYear", $application['idAdmissionsYear']);
        $st->bindParam(":idMajors", $application['idMajors']);

        var_export($application);

        if ($st->execute()){
            return $db->lastInsertId();
        }
        else{
            $db->rollBack();
        }
        return -1;
    }

    public function Update($application)
    {
        $sql = "UPDATE `admissionsmanagement`.`application`
            SET
            `idApplication` = :idApplication,
            `avatar` = :avatar,
            `name` = :name,
            `gender` = :gender,
            `birthday` = :birthday,
            `birthplace` = :birthplace,
            `ethnic` = :ethnic,
            `identification` = :identification,
            `expiration` = :expiration,
            `phoneNumber` = :phoneNumber,
            `email` = :email,
            `address` = :address,
            `idResultExam` = :idResultExam,
            `idAdmissionsYear` = :idAdmissionsYear,
            `idMajors` = :idMajors
            WHERE `idApplication` = :idApplication;";
        $db = static::GetDB();
        $st = $db->prepare($sql);

        $st->bindParam(":avatar", $application['avatar']);
        $st->bindParam(":name", $application['name']);
        $st->bindParam(":gender", $application['gender']);
        $st->bindParam(":birthday", $application['birthday']);
        $st->bindParam(":birthplace", $application['birthplace']);
        $st->bindParam(":ethnic", $application['ethnic']);
        $st->bindParam(":identification", $application['identification']);
        $st->bindParam(":expiration", $application['expiration']);
        $st->bindParam(":phoneNumber", $application['phoneNumber']);
        $st->bindParam(":email", $application['email']);
        $st->bindParam(":address", $application['address']);
        $st->bindParam(":idResultExam", $application['idResultExam']);
        $st->bindParam(":idAdmissionsYear", $application['idAdmissionsYear']);
        $st->bindParam(":idMajors", $application['idMajors']);

        $st->bindParam(":idApplication", $application['idApplication']);

        return $st->execute();
    }
}
