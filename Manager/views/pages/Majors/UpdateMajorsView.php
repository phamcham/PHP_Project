<?php

use Core\Utility;

require "vanToanConnect.php";
//Lấy dữ liệu id tren url
$id = $data['id'];
$sql_up = "SELECT* FROM majors WHERE idMajors= '$id'";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

$ErrEmpty = "Không được để trống các trường !!!";
$ErrId = "Mã ngành học phải là số nguyên !";
if (isset($_POST['submit']) && trim($_POST['submit']) == "") {
    unset($_POST['submit']);
    //Kiểm tra các trường có rỗng không
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['description'])) {
        echo "<script type='text/javascript'>alert('$ErrEmpty');</script>";
    } else {
        //Kiểm tra trường mã ngành học có là số nguyên
        if (!ctype_digit($_POST['id'])) {
            echo "<script type='text/javascript'>alert('$ErrId');</script>";
        } else {
            $idMajor = (int)$_POST['id'];
            $nameMajor = $_POST['name'];
            $descriptionMajor = $_POST['description'];
            $enabled = 1;

            $sql_edit = " UPDATE majors SET nameMajors='$nameMajor',descriptionMajors='$descriptionMajor',enabled=$enabled WHERE idMajors=$idMajor ";
            mysqli_query($conn, $sql_edit);
        }
    }
    mysqli_close($conn);
    Utility::AlertRedirect("Đã sửa thành công!", "Manager", "Majors");
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sửa ngành học</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Mã ngành học</label>
                    <input type="text" name="id" class="form-control" value="<?php echo $row_up['idMajors']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="">Tên ngành học</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row_up['nameMajors']; ?>">
                </div>

                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" name="description" class="form-control" value="<?php echo $row_up['descriptionMajors']; ?>">
                </div>

                <a class="btn btn-primary" href="/PHP_Project/Manager/Majors"> Quay lại </a>
                <button type="submit" class="btn btn-primary" name="submit" style="background-color: darkcyan;">
                    Sửa
                </button>
            </form>

        </div>
    </div>
</div>