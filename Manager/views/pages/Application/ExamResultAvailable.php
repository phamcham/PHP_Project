<div class="container">
    <table class="table table-bordered table-striped" style="margin-top: 20px;">
        <thead class=" position-sticky" style="top: 80px;">
            <tr style="color: black; background-color: #92b5ff;">
                <th scope="col">Ngữ văn</th>
                <th scope="col">Toán</th>
                <th scope="col">Ngoại ngữ</th>
                <th scope="col">Vật lý</th>
                <th scope="col">Hoá học</th>
                <th scope="col">Sinh học</th>
                <th scope="col">Lịch sử</th>
                <th scope="col">Địa lý</th>
                <th scope="col">GDCD</th>
                <th scope="col">Điểm cộng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $data['examResult']['nguVan'] ?></td>
                <td><?php echo $data['examResult']['toan'] ?></td>
                <td><?php echo $data['examResult']['ngoaiNgu'] ?></td>
                <td><?php echo $data['examResult']['vatLy'] ?></td>
                <td><?php echo $data['examResult']['hoaHoc'] ?></td>
                <td><?php echo $data['examResult']['sinhHoc'] ?></td>
                <td><?php echo $data['examResult']['lichSu'] ?></td>
                <td><?php echo $data['examResult']['diaLy'] ?></td>
                <td><?php echo $data['examResult']['gdcd'] ?></td>
                <td><?php echo $data['examResult']['diemCong'] ?></td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-success" onclick="jsUpdateExamResult(<? echo $data['examResult']['idExamResult'] ?>)">Cập nhật bảng điểm</button>
    <script>
        function jsUpdateExamResult(idExamResult){
            location = "/PHP_Project/Manager/ExamResult/Update/" + idExamResult;
        }
    </script>
</div>