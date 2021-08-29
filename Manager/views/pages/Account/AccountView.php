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

                            <?php
                                if ($data['account']['role'] == 'admin'){
                                    require_once 'AccountManager.php';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>