<link href="/PHP_Project/public/css/menu-header.css" rel="stylesheet">
<nav class="navbar border-bottom fixed-top header">
    <div class="col-md-3 col-sm-12">
        <div class="logo-top">
            <a href="/PHP_Project/Manager/Home">
                <img src="/PHP_Project/public/images/logo.png" alt="tuyen sinh HaUI" style="width: 255px;"></a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="mainmenu-area d-flex justify-content-end">
            <div class="mainmenu hidden-sm hidden-xs">
                <nav>
                    <ul id="nav">
                        <li id="Home">
                            <a <?php if ($view == "Home/HomeView") echo 'class="active"' ?> href="/PHP_Project/Manager/Home">Trang chủ</a>
                        </li>
                        <li id="Application">
                            <a <?php if ($view == "Application/ApplicationView") echo 'class="active"' ?> href="/PHP_Project/Manager/Application">Hồ sơ</a>
                        </li>
                        <li id="ExamResult">
                            <a <?php if ($view == "ExamResult/ExamResultView") echo 'class="active"' ?> href="/PHP_Project/Manager/ExamResult">Điểm thi</a>
                        </li>
                        <li id="Majors">
                            <a <?php if ($view == "Majors/MajorsView") echo 'class="active"' ?> href="/PHP_Project/Manager/Majors">Ngành học</a>
                        </li>
                        <li id="AdmissionsMajor">
                            <a <?php if ($view == "AdmissionsMajor/AdmissionsMajorView") echo 'class="active"' ?> href="/PHP_Project/Manager/AdmissionsMajor">Ngành tuyển sinh</a>
                        </li>
                        <li id="Account">
                            <a <?php if ($view == "Account/AccountView") echo 'class="active"' ?> href="/PHP_Project/Manager/Account">Tài khoản</a>
                        </li>
                        <li id="Logout">
                            <a href="/PHP_Project/Manager/Logout">Đăng xuất</a>
                        </li>

                        <!-- neu co thang dang nhap thanh cong thi them icon here -->


                        <!-- <li class="active"><a class="active" href="/login">Đăng nhập</a></li> -->
                    </ul>
                </nav>
            </div>
            <ul class="header-search">

            </ul>
        </div>
    </div>
</nav>