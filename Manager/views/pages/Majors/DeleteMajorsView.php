<?php

use Core\Utility;

require "vanToanConnect.php";

$id = $data['id'];
$sql = "DELETE FROM Majors WHERE idMajors = $id";
mysqli_query($conn, $sql);
mysqli_close($conn);

if ($conn->error != null || $conn->error == ""){
    Utility::AlertRedirect("Ngành $id đã được sử dụng", "Manager", "Majors");
}
else{
    Utility::AlertRedirect("Xoá ngành $id thành công!", "Manager", "Majors");
}
?>