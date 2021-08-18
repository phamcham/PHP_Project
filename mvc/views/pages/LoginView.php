<link href="public/css/login-page.css" rel="stylesheet">
<div class="login-page">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h3 class="card-title">Đăng nhập</h3>
                        <form method="GET" novalidate="">
                            <div class="form-group input-group mb-3">
                                <label for="user">Tên đăng nhập</label>
                                <span class="input-group-text icon-text">@</span>
                                <input id="user" type="text" class="form-control" name="username" value="" required autofocus>
                            </div>

                            <div class="form-group input-group mb-3">
                                <label for="password">Mật khẩu</label>
                                <span class="input-group-text icon-text">@</span>
                                <input id="password" type="password" class="form-control" name="password" required data-eye>
                            </div>

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