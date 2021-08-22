<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">
<link rel="stylesheet" href="/PHP_Project/public/lib/font-awesome-5/css/all.css">

<div class="trg-style">
    <div class="container h-100">
        <div class="row h-100">
            <div class="content-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <!-- content begin -->
                        <h3 class="text-center fa-2x mb-lg-5">THÊM HỒ SƠ TUYỂN SINH NĂM <?php echo $curYear = $data['admissionsYear']['valueAdmissionsYear'] ?></h3>

                        <div class="d-flex justify-content-start align-items-center justify-content-md-between mb-md-4">
                            <p style="color: #0d4e96; font-weight: bold; font-size: initial;">THÔNG TIN CÁ NHÂN CỦA THÍ SINH</p>
                        </div>

                        <div class="d-flex">
                            <img src="/PHP_Project/public/images/cardimage.png" alt="dummy card image" style="width: 150px; margin-left: 50px; margin-right: 70px;">
                            <div class="alert alert-warning flex-fill" style="height: fit-content;">
                                <p><b>Yêu cầu:</b></p>
                                <p>- Ảnh thẻ 3x4 ảnh chụp không quá 3 tháng</p>
                                <p>- Thí sinh phải nhập chính xác số căn cước công dân / chứng minh nhân dân</p>
                            </div>
                        </div>

                        <form action="/PHP_Project/Manager/Application/Add/<?php echo $data['admissionsYear']['idAdmissionsYear'] ?>" method="POST">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="name">Họ và tên khai sinh (Viết in hoa, có dấu)</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="name" type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="gender">Giới tính</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-venus-mars"></i></span>

                                            <select id="gender" class="form-control" name="gender">
                                                <option value="unknown">Chọn giới tính</option>
                                                <option value="male">Nam</option>
                                                <option value="female">Nữ</option>
                                            </select>
                                            <!-- <input id="gender" type="" class="form-control" name="name" required> // option -->
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="birthday">Ngày sinh</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-birthday-cake"></i></span>
                                            <input id="birthday" type="date" class="form-control" name="birthday"">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="birthplace">Nơi sinh (Tỉnh/TP)</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-bars"></i></span>
                                            <input id="birthplace" type="text" class="form-control" name="birthplace">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="ethnic">Dân tộc</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-bars"></i></span>
                                            <input id="ethnic" type="text" class="form-control" name="ethnic">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="phoneNumber">Số điện thoại</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-phone-alt"></i></span>
                                            <input id="phoneNumber" type="text" class="form-control" name="phoneNumber">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="identification">Số CMND/CCCD</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-id-card"></i></span>
                                            <input id="identification" type="text" class="form-control" name="identification">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="expiration">Ngày hết hạn CMND/CCCD</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-calendar-alt"></i></i></span>
                                            <input id="expiration" type="date" class="form-control" name="expiration">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="email">Email</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-at"></i></i></span>
                                            <input id="email" type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start align-items-center mb-md-3 mt-md-4" style="color: #0d4e96; font-weight: bold; font-size: initial;">
                                ĐỊA CHỈ THƯỜNG TRÚ (GHI THEO SỔ HỘ KHẨU)
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group input-group mb-3">
                                            <label for="address">Địa chỉ</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-map-marker-alt"></i></i></span>
                                            <input id="address" type="text" class="form-control" name="address">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start align-items-center mb-md-3 mt-md-4" style="color: #0d4e96; font-weight: bold; font-size: initial;">
                                THÔNG TIN NGÀNH HỌC
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="idMajors">Ngành học</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-map-marker-alt"></i></i></span>
                                            <select id="idMajors" class="form-control" name="idMajors">
                                                <option value="unknown">Chọn ngành học</option>
                                                <!-- <option value="male">Nam</option> -->
                                                <?php
                                                foreach ($data['admissionsMajors'] as $major) {
                                                    echo '<option value="' . $major['idMajors'] . '" ';
                                                    echo '>' . $major['nameMajors'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start align-items-center mb-md-3 mt-md-4" style="color: #0d4e96; font-weight: bold; font-size: initial;">
                                THÔNG TIN ĐIỂM THI
                            </div>

                            <!-- TODO -->
                            <div class="container ">
                                <div class="justify-content-end d-flex">
                                    <input class="btn btn-danger btn-toolbar mr-3" type="submit" name="cancelAddApplication" value="Huỷ">
                                    <input class="btn btn-success btn-toolbar" type="submit" name="addApplication" value="Thêm hồ sơ">
                                </div>
                            </div>
                        </form>
                        <!-- content end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>