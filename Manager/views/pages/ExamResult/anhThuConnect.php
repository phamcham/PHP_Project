<?php

use Core\DBConfig;

$conn = mysqli_connect(DBConfig::DB_HOST,DBConfig::DB_USER,DBConfig::DB_PASSWORD,DBConfig::DB_NAME);
    if(!$conn)
    {
        echo "loi ket noi";
        exit();
    }
    mysqli_query($conn,"set names utf8");
    
?>