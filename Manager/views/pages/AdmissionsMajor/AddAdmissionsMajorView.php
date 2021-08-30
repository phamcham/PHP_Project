<?php
require_once('anhThuConnect.php');

$ad_chitieu = $ad_tohop = $ad_dieukien = $ad_idM = $ad_id = '';
if (!empty($_POST)) {
	$ad_idY = '';

	if (isset($_POST['idMajors'])) {
		$value = $_POST['idMajors'];
		$sql = "SELECT idMajors from Majors WHERE `enabled` = 1";
		$sq = mysqli_query($conn, $sql);
		while ($rows = mysqli_fetch_array($sq)) {
			$ad_idM = $rows['idMajors'];
		}
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

	if (!empty($_POST['idAdmissionsYear'])) {
		$value = $_POST['idAdmissionsYear'];
		$sql = "select idAdmissionsYear from AdmissionsYear where valueAdmissionsYear = '$value'";
		$sq = mysqli_query($conn, $sql);
		while ($rows = mysqli_fetch_array($sq)) {
			$ad_idY = $rows['idAdmissionsYear'];
		}
	}



	$sql2 = "INSERT into AdmissionsMajor(`idAdmissionsYear`,`idMajors`,`numberOf`,`groups`,`condition`) values ($ad_idY,$ad_idM, '$ad_chitieu', '$ad_tohop',$ad_dieukien)" or die("lỗi thêm dữ liệu");

	if (mysqli_query($conn, $sql2)) {
		echo "thêm thành công  thành công";
	} else {
		echo "thêm  thất bại: " . mysqli_error($conn);
	}
	// //echo $sql2;
	$link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/Manager/AdmissionsMajor";
	$alert = "Thêm nghành thành công ";
	echo '<script>alert("' . $alert . '");'
		. 'location = "' . $link . '"' . '</script>';
}


?>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<div class="trg-style">
	<div class="container" style="background-color: #fff;">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm nghành tuyển sinh</h2>
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
								<option value="<?php echo $rows['valueAdmissionsYear']; ?>"><?php echo $rows['valueAdmissionsYear']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="id">Mã nghành tuyển sinh:</label>
						<select required="true" class="form-control" name="idMajors">
							<?php
							$sql = "SELECT nameMajors from Majors WHERE `enabled` = 1";
							$sq = mysqli_query($conn, $sql);

							while ($rows = mysqli_fetch_array($sq)) {
							?>
								<option id="<?php echo $rows['idMajors']; ?>">

									<?php echo $rows['nameMajors']; ?>

								</option>
							<?php
							}
							?>
						</select>

					</div>

					<div class="form-group">
						<label for="chitieu">Chỉ tiêu :</label>
						<input required="true" type="text" class="form-control" name="numberOf">
					</div>

					<div class="form-group">
						<label for="tohop">Tổ hợp:</label>
						<input type="text" class="form-control" name="groups">
					</div>

					<div class="form-group">
						<label for="dieukien">Điều kiện:</label>
						<input type="text" class="form-control" name="condition">
					</div>

					<button class="btn btn-success">Lưu</button>

				</form>
			</div>
		</div>
	</div>
</div>