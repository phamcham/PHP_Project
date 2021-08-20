<?php

namespace Core;
use PDO;

abstract class Model{
    protected static function GetDB(){
        static $db = null;

        if ($db === null) {
            require_once "./core/DBConfig.php";
            $dsn = 'mysql:host=' . DBConfig::DB_HOST . ';dbname=' . DBConfig::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, DBConfig::DB_USER, DBConfig::DB_PASSWORD);

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}

?>