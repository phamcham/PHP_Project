<?php
require_once('anhThuConnect.php');
?>
<div class="trg-style">
    <div class="container" style="background-color: #fff;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 style="color:chocolate;  text-align:center; font-weight: bold; padding-top: 20px;">Quản lý điểm tuyển sinh</h3>
                <div class="col-md-12 head">
                    <div class="float-right">
                        <a href="ExamResult/Export" class="btn btn-success">
                            <i class="dwm"></i>
                            Export
                        </a>
                    </div>
                </div>
                <br>
                <form method="POST">
                    <input type="text" name="id" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm điểm tuyển sinh theo số báo danh">
                    <button class="btn btn-success">Search
                    </button>
                    <br>
                    <? $visibility = isset($_POST['id']) ? 'visible' : 'collapse' ?>
                    <table class="table table-bordered" style="color: burlywood; visibility:<? echo $visibility ?>;">
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
                            if (isset($_POST['id'])) {
                                $id = $_POST['id'];
                                $id2 = mysqli_fetch_array(mysqli_query($conn, "SELECT idExamResult FROM `Application` WHERE idApplication = $id"))['idExamResult'];
                                $sql = "select * from ExamResult where idExamResult = '$id2' ";
                                $sq = mysqli_query($conn, $sql);
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
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã số báo danh</th>
                            <th>Mã số bảng điểm</th>
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
                            <th width="60px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        $sql = "SELECT `Application`.`idApplication`,`Application`.`idExamResult`,nguVan,toan,ngoaiNgu,vatLy,hoaHoc,sinhHoc,lichSu,diaLy,gdcd,diemCong
							from `ExamResult` inner join `Application` on `Application`.`idExamResult` = `ExamResult`.`idExamResult`";
                        $sq = mysqli_query($conn, $sql);
                        while ($std = mysqli_fetch_array($sq)) {
                            echo '<tr>
										<td>' . ($index++) . '</td>
										<td>' . $std['idApplication'] . '</td>
										<td>' . $std['idExamResult'] . '</td>
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
										<td><button class="btn btn-warning" onclick=\'window.open("ExamResult/Update/' . $std['idExamResult'] . '","_self")\'>Sửa</button></td>
									</tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>
    <div class="mycart" style="text-align:right;padding-right:10px"></div>
</div>