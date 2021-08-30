<?php
require_once('anhThuConnect.php');
?>

<div class="container" style="background-color: #fff;">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 style="color:chocolate;  text-align:center; ">Quản lý điểm tuyển sinh</h3>
				<div class="col-md-12 head">
					<div class="float-right">
						<a href="ExamResult/Export" class="btn btn-success">
							<i class="dwm"></i>
							Export
						</a>
					</div>

				</div>
				<br>
				<form method="POST" action="ExamResult/Find">
				<input type="text" name="id" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm điểm tuyển sinh theo số báo danh">
				<button class="btn btn-success" >Search</button>
				</form>
				
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
                            <th>STT</th>
							<th>Số báo danh</th>
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
                            $sql = "SELECT * from `Application`";
                            $sq = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($sq))
                            {
								$idExamResult = $row['idExamResult'];
								$std = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `ExamResult` WHERE `idExamResult` = $idExamResult"));
								echo '<tr>
										<td>'.($index++).'</td>
										<td>'.$row['idApplication'].'</td>
										<td>'.$std['nguVan'].'</td>
										<td>'.$std['toan'].'</td>
										<td>'.$std['ngoaiNgu'].'</td>
										<td>'.$std['vatLy'].'</td>
										<td>'.$std['hoaHoc'].'</td>
										<td>'.$std['sinhHoc'].'</td>
										<td>'.$std['lichSu'].'</td>
										<td>'.$std['diaLy'].'</td>
										<td>'.$std['gdcd'].'</td>
										<td>'.$std['diemCong'].'</td>
										<td><button class="btn btn-warning" onclick=\'window.open("ExamResult/Update/' . $std['idExamResult'] . '","_self")\'>Sửa</button></td>
										
									</tr>';
							}
						?>
					</tbody>
				</table>
				
			</div>

		</div>

	</div>