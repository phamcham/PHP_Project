<?php

require "vanToanConnect.php";

$sql = "SELECT* FROM majors";
$query = mysqli_query($conn, $sql);

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Quản lý ngành học</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 50px;">STT</th>
                        <th>Mã ngành học</th>
                        <th style="width: 200px;">Tên ngành học</th>
                        <th>Mô tả</th>
                        <th style="text-align: center">Sửa</th>
                        <th style="text-align: center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        if ($row["enabled"] == 1) {
                    ?>
                            <tr>
                                <td style="text-align: center"><?php echo $i++; ?></td>
                                <td style="width: 200px;"><?php echo $row["idMajors"]; ?></td>
                                <td><?php echo $row["nameMajors"]; ?></td>
                                <td style="width: 650px;"><?php echo $row["descriptionMajors"]; ?></td>

                                <td style="text-align: center; width: 50px; ">
                                    <a class="btn btn-primary" href="/PHP_Project/Manager/Majors/Update/<?php echo $row["idMajors"]; ?> " style="background-color: forestgreen; border: 0px;border-radius: 10px;color: white;}">
                                        Sửa
                                    </a>
                                </td>
                                <td style="text-align: center; width: 50px;">
                                    <button onClick="Delete(<?php echo $row["idMajors"]; ?>);" class="btn btn-primary" style="background-color: red;border-radius: 10px;border: 0px;color: white;}">
                                        Xóa
                                    </button>
                                </td>
                            </tr>
                    <?php }
                    } ?>

                </tbody>
            </table>
            <a class="btn btn-primary" href="Majors/Add"> Thêm mới </a>
        </div>
    </div>
</div>
<script>
    function Delete(del) {
        if (confirm("Bạn muốn xóa ngành này không ?")) {
            location = "/PHP_Project/Manager/Majors/Delete/" + del;
            return true;
        }
    }
</script>