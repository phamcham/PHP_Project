<?php
require_once('anhThuConnect.php');
$sql = "select * from AdmissionsMajor";
$sq = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($sq);
$ad_chitieu = $ad_tohop = $ad_dieukien = $ad_idM = $ad_id = '';
if (!empty($_POST)) {
    $ad_idY = '';

    if (isset($_POST['idMajors'])) {
        $ad_idM = $_POST['idMajors'];
    }

    if (isset($_POST['numberOf'])) {
        $ad_chitieu = $_POST['numberOf'];
    }

    if (isset($_POST['groups'])) {
        $ad_tohop = $_POST['groups'];
    }

    if (isset($_POST['condition'])) {
        $ad_dieukien = $_POST['condition'];
    }

    $ad_idY = $_POST['idAdmissionsYear'];
    // if (!empty($_POST['idAdmissionsYear'])) {
    //     $value = $_POST['idAdmissionsYear'];
    //     $sql1 = "select idAdmissionsYear from AdmissionsYear where valueAdmissionsYear = '$value'";
    //     $sq = mysqli_query($conn, $sql1);
    //     while ($rows = mysqli_fetch_array($sq)) {
    //         $ad_idY = $rows['idAdmissionsYear'];
    //     }
    // }

    $sql2 = "UPDATE AdmissionsMajor set `idMajors` = $ad_idM, `numberOf` = '$ad_chitieu', `groups` = '$ad_tohop', `condition` = $ad_dieukien where `idAdmissionsYear` = $ad_idY" or die("lỗi thêm dữ liệu");
    echo $sql2;
    if (mysqli_query($conn, $sql2)) {
        echo "sửa  thành công  thành công";
    } else {
        echo " thất bại: " . mysqli_error($conn);
    }
    //echo $sql;

    //header('Location: QLDiem.php');

}


?>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<div class="trg-style">
    <div class="container" style="background-color: #fff;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Sửa nghành tuyển sinh</h2>
            </div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="id">Mã năm tuyển sinh:</label>
                        <input type="text" name="id" style="display: none;">
                        <select required="true" class="form-control" name="idAdmissionsYear">
                            <?php
                            $sql = "select valueAdmissionsYear from AdmissionsYear";
                            $sq = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_array($sq)) {
                            ?>
                                <option value="<?php echo $rows['idAdmissionsYear']; ?>"><?php echo $rows['valueAdmissionsYear']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id">Mã nghành tuyển sinh:</label>
                        <input required="true" type="text" class="form-control" name="idMajors" value="<?php echo $rs['idMajors']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="chitieu">Chỉ tiêu :</label>
                        <input required="true" type="text" class="form-control" name="numberOf" value="<?php echo $rs['numberOf']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="tohop">Tổ hợp:</label>
                        <input type="text" class="form-control" name="groups" value="<?php echo $rs['groups']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="dieukien">Điều kiện:</label>
                        <input type="text" class="form-control" name="condition" value="<?php echo $rs['condition']; ?>">
                    </div>

                    <button class="btn btn-success">Lưu</button>

                </form>
            </div>
        </div>
    </div>
</div>