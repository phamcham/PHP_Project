<?php
require_once('anhThuConnect.php');
$sql = "SELECT * from AdmissionsMajor WHERE `idMajors` = " . $data['idMajors'] . " AND " . "`idAdmissionsYear` = " . $data['idAdmissionsYear'];
$sq = mysqli_query($conn, $sql);
//exit;

$rs = mysqli_fetch_array($sq);
$ad_chitieu = $ad_tohop = $ad_dieukien = $ad_idM = $ad_id = '';

if (!empty($_POST)) {
    $ad_idM = $data['idMajors'];

    if (isset($_POST['numberOf'])) {
        $ad_chitieu = $_POST['numberOf'];
    }

    if (isset($_POST['groups'])) {
        $ad_tohop = $_POST['groups'];
    }

    if (isset($_POST['condition'])) {
        $ad_dieukien = $_POST['condition'];
    }

    $ad_idY = $data['idAdmissionsYear'];
    // if (!empty($_POST['idAdmissionsYear'])) {
    //     $value = $_POST['idAdmissionsYear'];
    //     $sql1 = "select idAdmissionsYear from AdmissionsYear where valueAdmissionsYear = '$value'";
    //     $sq = mysqli_query($conn, $sql1);
    //     while ($rows = mysqli_fetch_array($sq)) {
    //         $ad_idY = $rows['idAdmissionsYear'];
    //     }
    // }

    $sql2 = "UPDATE AdmissionsMajor set `numberOf` = $ad_chitieu, `groups` = '$ad_tohop', `condition` = $ad_dieukien where `idAdmissionsYear` = $ad_idY and `idMajors` = $ad_idM";
    mysqli_query($conn, $sql2);

    if (mysqli_error($conn)) {
        $link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/AdmissionsMajor";
        $alert = "Lỗi nhập liệu ";
        echo '<script>alert("' . $alert . '");'
            . 'location = "' . $link . '"' . '</script>';
    } else {
       $link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/AdmissionsMajor/";
        $alert = "Sửa thành công  ";
        echo '<script>alert("' . $alert . '");'
            . 'location = "' . $link . '"' . '</script>';
    }
}


?>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<div class="container" style="background-color: #fff;">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Sửa ngành tuyển sinh</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="/PHP_Project/Manager/AdmissionsMajor/Update/<?echo$data['idMajors']?>/<?echo$data['idAdmissionsYear']?>">
                <div class="form-group">
                    <label for="id">Năm tuyển sinh:</label>
                    <select disabled required="true" class="form-control" name="idAdmissionsYear">
                        <?php
                        $sql = "SELECT * from AdmissionsYear";
                        $sq = mysqli_query($conn, $sql);
                        while ($rows = mysqli_fetch_array($sq)) {
                        ?>
                            <option <?echo $rows['idAdmissionsYear'] == $data['idAdmissionsYear'] ? 'selected' : ''?>
                            value="<?php echo $rows['idAdmissionsYear']; ?>"><?php echo $rows['valueAdmissionsYear']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id">Mã ngành tuyển sinh:</label>
                    <input disabled required="true" type="text" class="form-control" name="idMajors" value="<?php echo $rs['idMajors']; ?>">
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
            
            <button class="btn btn-success" onclick="window.location = '/PHP_Project/Manager/AdmissionsMajor'">Trở về </button>
        </div>
    </div>
</div>
