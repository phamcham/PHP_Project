<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">
<link rel="stylesheet" href="/PHP_Project/public/lib/font-awesome-5/css/all.css">

<div class="trg-style">
    <div class="container h-100">
        <div class="row h-100">
            <div class="content-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h3 class="text-center fa-2x mb-4">QUẢN LÝ TÀI KHOẢN</h3>


                        <div class="container">
                            <p class="mb-3" style="color: #0d4e96; font-weight: bold; font-size: initial;">THÔNG TIN TÀI KHOẢN</p>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group input-group mb-3">
                                        <label for="name">Tên người dùng</label>
                                        <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                        <input id="name" type="text" class="form-control" name="name" disabled value="<?php echo $data['account']['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group input-group mb-3">
                                        <label for="phoneNumber">Số điện thoại</label>
                                        <span class="input-group-text icon-text"><i class="fas fa-phone-alt"></i></span>
                                        <input id="phoneNumber" type="text" class="form-control" name="phoneNumber" disabled value="<?php echo $data['account']['phoneNumber'] ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group input-group mb-3">
                                        <label for="role">Vai trò</label>
                                        <span class="input-group-text icon-text"><i class="fas fa-user-check"></i></span>
                                        <input id="role" type="text" class="form-control" name="role" disabled value="<?php echo $data['account']['role'] ?>">
                                    </div>
                                </div>
                            </div>

                            <p class="mb-3 mt-3" style="color: #0d4e96; font-weight: bold; font-size: initial;">THAO TÁC</p>

                            <div class="col-4">
                                <div class="form-group input-group">
                                    <input type="button" class="btn btn-info btn-toolbar" value="Thay đổi thông tin cá nhân" onclick="jsChangeAccountInfo()">
                                    <script>
                                        function jsChangeAccountInfo() {
                                            window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                                                "/PHP_Project/Manager/Account/UpdateAccountInfo";

                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group input-group">
                                    <input type="button" class="btn btn-danger btn-toolbar" value="Đổi mật khẩu" onclick="jsChangeAccountPassword()">
                                </div>
                                <script>
                                    function jsChangeAccountPassword() {
                                        window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                                            "/PHP_Project/Manager/Account/UpdateAccountPassword";
                                    }
                                </script>
                            </div>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>