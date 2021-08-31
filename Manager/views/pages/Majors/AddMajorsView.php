<?php

use Core\Utility;

require "vanToanConnect.php";
$sql = "SELECT* FROM majors";
$query = mysqli_query($conn, $sql);

$ErrEmpty = "Không được để trống các trường !!!";
$ErrId = "Mã ngành học phải là số nguyên !";
$ErrIdExist = "Mã ngành này đã tồn tại ! Vui lòng nhập mã ngành khác !";

if (isset($_POST['submit'])) {
    //Kiểm tra các trường có rỗng không
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['description'])) {
        echo "<script type='text/javascript'>alert('$ErrEmpty');</script>";
    } else {
        //Kiểm tra trường mã ngành học có là số nguyên
        if (!ctype_digit($_POST['id'])) {
            echo "<script type='text/javascript'>alert('$ErrId');</script>";
        } else {
            //Kiểm tra idMajor người dùng nhập vào đã tồn tại trong db chưa
            $count = 0;
            while ($row = mysqli_fetch_assoc($query)) {
                if ($row["idMajors"] == (int)$_POST['id']) {
                    $count++;
                }
            }

            if ($count != 0) {
                echo "<script type='text/javascript'>alert('$ErrIdExist');</script>";
            } else {
                $idMajor = (int)$_POST['id'];
                $nameMajor = $_POST['name'];
                $descriptionMajor = $_POST['description'];
                $enabled = 1;

                //Thêm dữ liệu vào bảng majors
                $sql_insert = "INSERT INTO majors(idMajors,nameMajors,descriptionMajors,enabled) 	VALUES($idMajor,'$nameMajor','$descriptionMajor',$enabled)";
                mysqli_query($conn, $sql_insert);
                Utility::AlertRedirect("Thêm thành công", "Manager", "Majors");
            }
        }
    }
    mysqli_close($conn);

    
}

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm ngành học</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Mã ngành học</label>
                    <input type="text" name="id" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Tên ngành học</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" name="description" class="form-control">
                </div>

                <a class="btn btn-primary" href="/PHP_Project/Manager/Majors"> Quay lại </a>
                <button type="submit" class="btn btn-primary" name="submit" style="background-color: darkcyan;">
                    Thêm
                </button>
            </form>

        </div>
    </div>
</div>