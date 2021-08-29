<?php

use Core\Utility;

require "vanToanConnect.php";

$id = $data['id'];
$sql = "UPDATE Majors SET `enabled` = 0 WHERE idMajors = $id";
mysqli_query($conn, $sql);

if (mysqli_error($conn)){
    $link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/Majors";
    $alert = "Ngành $id đã được sử dụng";
    echo '<script>alert("' . $alert . '");'
        .'location = "'.$link.'"'.'</script>';

}
else{
    $link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/Majors";
    $alert = "Xoá ngành $id thành công!";
    echo '<script>alert("' . $alert . '");'
        .'location = "'.$link.'"'.'</script>';
}

?>