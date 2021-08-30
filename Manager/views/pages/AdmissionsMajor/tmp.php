<?php
    require_once ('connect.php');
    $sql = "select * from AdmissionsMajor";
    $sq = mysqli_query($conn,$sql);
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

        if(!empty($_POST['idAdmissionsYear'])) {
			$value = $_POST['idAdmissionsYear'];
			$sql1 = "select idAdmissionsYear from AdmissionsYear where valueAdmissionsYear = '$value'";
			$sq = mysqli_query($conn,$sql1);
			while($rows = mysqli_fetch_array($sq)){
				$ad_idY = $rows['idAdmissionsYear'];
			}}
            
        $sql2 = "UPDATE  AdmissionsMajor set  `numberOf` = $ad_chitieu, `groups` = '$ad_tohop', `condition` = $ad_dieukien where idAdmissionsYear = $ad_idY ";        
        mysqli_query($conn, $sql2);

		if(mysqli_error($conn))
		{
			$link = "http://" . $_SERVER['HTTP_HOST'] . "/PHP_Project/BTL/QLDiem.php";
			$alert = "Lỗi nhập liệu ";
			echo '<script>alert("' . $alert . '");'
			.'location = "'.$link.'"'.'</script>'; 
		}
		else {
			header('Location: QLDiem.php');
		}      
    }  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form sửa</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa ngành tuyển sinh</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="">
                    <div class="form-group">
					<label for="id">Mã năm tuyển sinh:</label>
					<input type="text" name="id"  style="display: none;">
                    <select required="true" class="form-control"  name="idAdmissionsYear" >
					<?php
						$sql = "select valueAdmissionsYear from AdmissionsYear";
						$sq = mysqli_query($conn,$sql);
						while($rows = mysqli_fetch_array($sq)){							
					?>
						<option value="<?php echo $rows['valueAdmissionsYear'];?>"><?php echo $rows['valueAdmissionsYear'];?></option>
					<?php
					}	
					?>
                    </select>
					</div> 
                    <div class="form-group">
					  <label for="id">Mã ngành tuyển sinh:</label>
					  <input required="true" type="text" class="form-control"  name="idMajors" value="<?php echo $rs['idMajors'];?>">
					</div>

					<div class="form-group">
					  <label for="chitieu">Chỉ tiêu :</label>
					  <input required="true" type="text" class="form-control"  name="numberOf" value="<?php echo $rs['numberOf'];?>">
					</div>

					<div class="form-group">
					  <label for="tohop">Tổ hợp:</label>
					  <input type="text" class="form-control"  name="groups" value="<?php echo $rs['groups'];?>">
					</div>

					<div class="form-group">
					  <label for="dieukien">Điều kiện:</label>
					  <input type="text" class="form-control"  name="condition" value="<?php echo $rs['condition'];?>">
					</div>

					<button class="btn btn-success">Lưu</button>
					<button class="btn btn-success" onclick="window.open('QLDiem.php')">Trở về </button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>