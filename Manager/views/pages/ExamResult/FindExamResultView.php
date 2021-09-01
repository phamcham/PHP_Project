<?php
require_once('anhThuConnect.php');

?>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<div style="background-color: #fff;">
    <h3 style="color:black; text-align:center">Bảng điểm sau khi tìm kiếm </h3>
    <br>
    <table class="table table-bordered" style="color: chocolate">
        <thead>
            <tr>
                <th>Ngữ văn</th>
                <th>Toán </th>
                <th>Ngoại ngữ</th>
                <th>Vật lý</th>
                <th>Hóa học</th>
                <th>Sinh học</th>
                <th>Lịch sử</th>
                <th>Địa lý</th>
                <th>GDCD</th>
                <th>Điểm cộng </th>
                <th>Tổng điểm </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($_POST)) {
                if (isset($_POST['id'])) {
                    $idApplication = $_POST['id'];
                }
                $idExamResult = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `Application` WHERE `idApplication` = $idApplication"))['idExamResult'];
                $sql = "SELECT * from ExamResult where idExamResult = $idExamResult";
                $sq = mysqli_query($conn, $sql);
                if(mysqli_errno($conn))
                {
                    $link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/ExamResult";
                    $alert = "Nhập lại SBD cần tìm  ";
                    echo '<script>alert("' . $alert . '");'
                    . 'location = "' . $link . '"' . '</script>';
                }
                else 
                {
                    while ($std = mysqli_fetch_array($sq)) {
                    $tong = $std['nguVan'] + $std['toan'] + $std['ngoaiNgu'] + $std['vatLy'] + $std['hoaHoc'] + $std['sinhHoc'] + $std['lichSu'] + $std['diaLy'] + $std['gdcd'] + $std['diemCong'];
                    echo '<tr>
                        <td>' . $std['nguVan'] . '</td>
                        <td>' . $std['toan'] . '</td>
                        <td>' . $std['ngoaiNgu'] . '</td>
                        <td>' . $std['vatLy'] . '</td>
                        <td>' . $std['hoaHoc'] . '</td>
                        <td>' . $std['sinhHoc'] . '</td>
                        <td>' . $std['lichSu'] . '</td>
                        <td>' . $std['diaLy'] . '</td>
                        <td>' . $std['gdcd'] . '</td>
                        <td>' . $std['diemCong'] . '</td>
                        <td>' . $tong . '</td>
                    </tr>';
                    }
                }
            }
            ?>
        </tbody>
    </table>


    <button class="btn btn-success" onclick="window.location ='/PHP_Project/Manager/ExamResult' ">Trở về </button>
</div>
