<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">
<link rel="stylesheet" href="/PHP_Project/public/lib/font-awesome-5/css/all.css">

<div class="trg-style">
    <div class="container h-100">
        <div class="row h-100">
            <div class="content-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h3 class="text-center fa-2x mb-4">THAY ĐỔI THÔNG TIN TÀI KHOẢN</h3>

                        <form method="POST" action="/PHP_Project/Manager/Account/UpdateAccountInfo">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="name">Tên người dùng</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="name" type="text" class="form-control" name="name" value="<?php echo $data['account']['name'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="phoneNumber">Số điện thoại</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-phone-alt"></i></span>
                                            <input id="phoneNumber" type="text" class="form-control" name="phoneNumber" value="<?php echo $data['account']['phoneNumber'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="justify-content-end d-flex">
                                    <input class="btn btn-danger btn-toolbar mr-3" type="submit" name="cancelUpdateAccountInfo" value="Huỷ">
                                    <input class="btn btn-success btn-toolbar" type="submit" name="updateAccountInfo" value="Lưu thay đổi">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>