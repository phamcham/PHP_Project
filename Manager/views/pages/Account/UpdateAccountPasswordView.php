<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">
<link rel="stylesheet" href="/PHP_Project/public/lib/font-awesome-5/css/all.css">

<div class="trg-style">
    <div class="container h-100">
        <div class="row h-100">
            <div class="content-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h3 class="text-center fa-2x mb-4">ĐỔI MẬT KHẨU</h3>

                        <form method="POST" action="/PHP_Project/Manager/Account/UpdateAccountPassword">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="oldPass">Mật khẩu cũ</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-lock"></i></span>
                                            <input id="oldPass" type="password" class="form-control" name="oldPass" data-eye>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="newPass">Mật khẩu mới</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-lock-open"></i></span>
                                            <input id="newPass" type="password" class="form-control" name="newPass" data-eye>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="newPass2">Mật khẩu mới</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-lock-open"></i></span>
                                            <input id="newPass2" type="password" class="form-control" name="newPass2" data-eye>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <?php
                                    if (isset($data['reasonFailed'])) {
                                        echo '<span class="alert alert-danger d-block" role="alert">';
                                        echo $data['reasonFailed'];
                                        echo '</span>';
                                    }
                                    ?>
                                </div>
                            </div>

                    </div>
                    <div class="container">
                        <div class="justify-content-end d-flex">
                            <input class="btn btn-danger btn-toolbar mr-3" type="submit" name="cancelUpdateAccountPassword" value="Huỷ">
                            <input class="btn btn-success btn-toolbar" type="submit" name="updateAccountPassword" value="Lưu thay đổi">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>