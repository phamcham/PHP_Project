<?php

use Core\Utility;

require "vanToanConnect.php";

$id = $data['id'];
$sql = "UPDATE Majors SET `enabled` = 0 WHERE idMajors = $id";
mysqli_query($conn, $sql);

if (mysqli_error($conn)){
    Utility::AlertRedirect("Ngành $id đã được sử dụng", "Manager", "Majors");
}
else{
    Utility::AlertRedirect("Xoá ngành $id thành công!", "Manager", "Majors");
}

?>