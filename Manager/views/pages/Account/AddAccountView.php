<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">
<link rel="stylesheet" href="/PHP_Project/public/lib/font-awesome-5/css/all.css">

<div class="trg-style">
    <div class="container h-100">
        <div class="row h-100">
            <div class="content-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h3 class="text-center fa-2x mb-4">THÊM TÀI KHOẢN</h3>
                        <form method="POST" action="/PHP_Project/Manager/Account/Add">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="username">Tên tài khoản</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="username" type="text" class="form-control" name="username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="password">Mật khẩu</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-lock"></i></span>
                                            <input id="password" type="password" class="form-control" name="password" data-eye>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-5">
                                            <label for="password2">Nhập lại mật khẩu</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-lock"></i></span>
                                            <input id="password2" type="password" class="form-control" name="password2" data-eye>
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

                            <div class="container">
                                <div class="justify-content-center d-flex">
                                    <input class="btn btn-danger btn-toolbar mr-3" type="submit" name="cancelAddAccount" value="Huỷ">
                                    <input class="btn btn-success btn-toolbar" type="submit" name="addAccount" value="Thêm tài khoản">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>