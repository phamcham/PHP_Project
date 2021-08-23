<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">
<link rel="stylesheet" href="/PHP_Project/public/lib/font-awesome-5/css/all.css">
<div class="trg-style">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h3 class="card-title">Đăng nhập</h3>
                        <form action="/PHP_Project/Client/Login/Verify" method="POST" novalidate="">
                            <div class="form-group input-group mb-3">
                                <label for="user">Tên đăng nhập</label>
                                <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                <input id="user" type="text" class="form-control" name="username"
                                    value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" required autofocus>
                            </div>

                            <div class="form-group input-group mb-3">
                                <label for="password">Mật khẩu</label>
                                <span class="input-group-text icon-text"><i class="fas fa-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" required data-eye>
                            </div>

                            <?php
                                if (isset($data['reasonFailed'])){
                                    echo '<span class="alert alert-danger d-block" role="alert">';
                                    echo $data['reasonFailed'];
                                    echo '</span>';
                                }
                            ?>
                            
                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Đăng nhập
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>