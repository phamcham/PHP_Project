<?php
require_once('anhThuConnect.php');

?>
<div style="background-color: #fff;">
<h3 style="color:black; text-align:center; padding-top: 20px;">Bảng ngành sau khi tìm kiếm </h3>
<br>
<table class="table table-bordered" style="color: chocolate">
    <thead>
        <tr>
            <th>Năm tuyển sinh</th>
            <th>Tên ngành tuyển sinh </th>
            <th>Chỉ tiêu</th>
            <th>Nhóm ngành tuyển sinh</th>
            <th>Điều kiện</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($_POST)) {
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
            }
            if ($mq = mysqli_query($conn, "SELECT * FROM AdmissionsYear WHERE valueAdmissionsYear = $name")){
                $id = mysqli_fetch_array($mq)['idAdmissionsYear'];
            }
            else{
                 $link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/AdmissionsMajor";
                 $alert = "Nhập lại năm cần tìm  ";
                 echo '<script>alert("' . $alert . '");'
                 . 'location = "' . $link . '"' . '</script>';
            }

            $sql = "SELECT * from AdmissionsMajor where idAdmissionsYear = '$id' ";
            $sq = mysqli_query($conn, $sql);
            $nam = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM AdmissionsYear WHERE idAdmissionsYear = " . $id))['valueAdmissionsYear'];

            if(mysqli_errno($conn))
                {
                    $link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/AdmissionsMajor";
                    $alert = "Nhập lại năm cần tìm  ";
                    echo '<script>alert("' . $alert . '");'
                    . 'location = "' . $link . '"' . '</script>';
                }
            else 
            {
                while ($std = mysqli_fetch_array($sq)) {
                $nganh = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Majors WHERE idMajors = " . $std['idMajors']))['nameMajors'];
                echo '<tr>
                    <td>' . $nam . '</td>
                    <td>' . $nganh . '</td>
                    <td>' . $std['numberOf'] . '</td>
                    <td>' . $std['groups'] . '</td>
                    <td>' . $std['condition'] . '</td>
                </tr>';
                }
            }
        }

        ?>
    </tbody>


</table>


<button class="btn btn-success" onclick="window.location = '/PHP_Project/Manager/AdmissionsMajor'">Trở về </button>
</div>
