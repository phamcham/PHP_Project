<link href="/PHP_Project/public/css/menu-header.css" rel="stylesheet">
<nav class="navbar border-bottom fixed-top header">
    <div class="col-md-3 col-sm-12">
        <div class="logo-top">
            <a href="/PHP_Project/Client/Home">
                <img src="/PHP_Project/public/images/logo.png" alt="tuyen sinh HaUI" style="width: 255px;"></a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="mainmenu-area pull-right">
            <div class="mainmenu hidden-sm hidden-xs">
                <nav>
                    <ul id="nav">
                        <li id="Home">
                            <a <?php if ($view == "HomeView") echo 'class="active"' ?>
                            href="/PHP_Project/Client/Home">Trang chủ</a></li>
                        <li id="FindExamResult">
                            <a <?php if ($view == "FindExamResultView") echo 'class="active"' ?>
                            href="/PHP_Project/Client/FindExamResult">Tra cứu điểm thi</a></li>
                        <li id="FindAdmissionsResult">
                            <a <?php if ($view == "FindAdmissionsResultView") echo 'class="active"' ?>
                            href="/PHP_Project/Client/FindAdmissionsResult">Tra cứu điểm tuyển sinh</a></li>
                        <li id="Login">
                            <a <?php if ($view == "LoginView") echo 'class="active"' ?>
                            href="/PHP_Project/Client/Login">Đăng nhập</a></li>

                        <!-- neu co thang dang nhap thanh cong thi them icon here -->
                        

                        <!-- <li class="active"><a class="active" href="/login">Đăng nhập</a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</nav>