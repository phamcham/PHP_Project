<?php
include("anhThuConnect.php");

if (isset($_POST['idMajors'])) {
    $idM = $_POST['idMajors'];
}
if (isset($_POST['idAdmissionsYear'])) {
    $idY = $_POST['idAdmissionsYear'];
}
$sql = "DELETE from AdmissionsMajor where idMajors = $idM and idAdmissionsYear = $idY";
//$sql = "UPDATE AdmissionsMajor set `enabled` = 0 where `idMajors` = $idM and `idAdmissionsYear` = $idY";

if (mysqli_query($conn, $sql)) {
    $link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/AdmissionsMajor";
    $alert = "Xóa nghành thành công ";
    echo '<script>alert("' . $alert . '");'
        . 'location = "' . $link . '"' . '</script>';
} else {
    echo "xóa thất bại: " . mysqli_error($conn);
}

            // $link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/BTL/QLDiem.php";
            // $alert = "Xóa nghành thành công ";
            // echo '<script>alert("' . $alert . '");'
            // .'location = "'.$link.'"'.'</script>';  
