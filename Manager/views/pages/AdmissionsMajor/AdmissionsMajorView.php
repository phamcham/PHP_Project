<?php
require_once('anhThuConnect.php');
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<div class="trg-style">
    <div class="container" style="background-color: #fff;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 style="text-align:center; color: chocolate; padding-top: 20px;">QUẢN LÝ NGÀNH TUYỂN SINH<h3>
                <form method="POST" action="/PHP_Project/Manager/AdmissionsMajor/Find">
                    <input type="text" name="name" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo năm tuyển sinh">
                    <button class="btn btn-success">Search</button>
                </form>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Năm tuyển sinh</th>
                            <th>Ngành tuyển sinh</th>
                            <th>Chỉ tiêu </th>
                            <th>Nhóm ngành tuyển sinh</th>
                            <th>Điều kiện </th>
                            <th width="60px"></th>
                            <th width="60px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        $sql = "SELECT * from AdmissionsMajor "; //where  `enabled` = 1 
                        $sq = mysqli_query($conn, $sql);

                        while ($rs = mysqli_fetch_array($sq)) {
                            $nam = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM AdmissionsYear WHERE idAdmissionsYear = " . $rs['idAdmissionsYear']))['valueAdmissionsYear'];
                            $nganh = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Majors WHERE idMajors = " . $rs['idMajors']))['nameMajors'];
                            echo '<tr>
                                    <td>' . ($index++) . '</td>
                                    <td >' . $nam . '</td>
                                    <td >' . $nganh . '</td>
                                    <td>' . $rs['numberOf'] . '</td>
                                    <td>' . $rs['groups'] . '</td>
                                    <td>' . $rs['condition'] . '</td>
                                    <td><button class="btn btn-warning" onclick=updateM(' . $rs['idMajors'] . ',' . $rs['idAdmissionsYear'] . ')>Sửa</button></td>
                                    <td><button class="btn btn-danger" onclick="deleteM(' . $rs['idMajors'] . ',' . $rs['idAdmissionsYear'] . ')">Xóa
                                    </button></td>
                                </tr>';
                        }

                        ?>
                    </tbody>
                </table>
                <button class="btn btn-success" onclick="window.location = '/PHP_Project/Manager/AdmissionsMajor/Add'">Thêm ngành tuyển sinh</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deleteM(idMajors, idAdmissionsYear) {
        console.log(idMajors + " " + idAdmissionsYear);
        location = "/PHP_Project/Manager/AdmissionsMajor/Delete/" + idMajors + "/" + idAdmissionsYear;
    }
    function updateM(idMajors, idAdmissionsYear) {
        console.log(idMajors + " " + idAdmissionsYear);
        location = "/PHP_Project/Manager/AdmissionsMajor/Update/" + idMajors + "/" + idAdmissionsYear;
    }
</script>