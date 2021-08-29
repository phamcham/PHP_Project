<!-- used by admin -->
<p class="mb-3 mt-4" style="color: #0d4e96; font-weight: bold; font-size: initial;">QUẢN LÝ TÀI KHOẢN BAN TUYỂN SINH</p>

<table class="table table-bordered table-striped" style="margin-top: 20px;">
    <thead class=" position-sticky" style="top: 80px;">
        <tr style="color: black; background-color: #92b5ff;">
            <th scope="col">Tên tài khoản</th>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Vai trò</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thao tác...</th>
        </tr>
    </thead>
    <tbody>
        <!-- <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr> -->
        <?php
        foreach ($data['accounts'] as $acc) {
            echo '<tr>';
            echo '<th scope="row">' . $acc['username'] . '</th>';
            echo '<td>' . $acc['name'] . '</td>';
            echo '<td>' . $acc['phoneNumber'] . '</td>';
            echo '<td>' . $acc['role'] . '</td>';
            echo '<td>' . ($acc['status'] == 1 ? '<b style="color: green">Hoạt động</b>' : '<b style="color: red">Vô hiệu hoá</b>') . '</td>';
            // buttons
            echo '<td>';
            // button 
            echo '<button class="btn btn-danger btn-toolbar d-inline-block mr-md-2"';
            echo 'name = "' . $acc['username'] . '" onclick="jsDeleteAccountClicked(this)">Xoá</button>';
            // button 
            echo '<button class="btn btn-info btn-toolbar d-inline-block"';
            echo 'name = "' . $acc['username'] . '" onclick="jsChangeAccountStatusClicked(this)">Trạng thái</button>';

            echo '</td>';
            echo '</tr>';
        }
        unset($appl);
        ?>
        <script>
            function jsDeleteAccountClicked(content) {
                if (confirm("Xoá tài khoản?")) {
                    window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                        "/PHP_Project/Manager/Account/DeleteAnAccount/" + content.name;
                }
            }

            function jsChangeAccountStatusClicked(content) {
                window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                    "/PHP_Project/Manager/Account/UpdateStatusAnAccount/" + content.name;
            }
        </script>
    </tbody>
</table>

<div class="justify-content-end d-flex">
    <input type="button" class="btn btn-success btn-toolbar" value="Thêm mới tài khoản" onclick="jsAddAccount()">
    <script>
        function jsAddAccount() {
            window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                "/PHP_Project/Manager/Account/Add";
        }
    </script>
</div>