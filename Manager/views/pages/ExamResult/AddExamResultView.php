<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">
<link rel="stylesheet" href="/PHP_Project/public/lib/font-awesome-5/css/all.css">

<div class="trg-style">
    <div class="container h-100">
        <div class="row h-100">
            <div class="content-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <!-- content begin -->
                        <h3 class="text-center fa-2x mb-lg-5">THÊM ĐIỂM HỒ SƠ <?php echo $data['application']['idApplication'] ?> TUYỂN SINH NĂM <?php echo $data['admissionsYear']['valueAdmissionsYear'] ?></h3>

                        <div class="container">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group input-group mb-3">
                                            <label for="name">Họ và tên thí sinh</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="name" type="text" class="form-control" name="name" disabled value="<?php echo $data['application']['name'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="nguVan">Ngữ văn</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="nguVan" type="text" class="form-control" name="nguVan">
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="toan">Toán</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="toan" type="text" class="form-control" name="toan">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="ngoaiNgu">Ngoại ngữ</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="ngoaiNgu" type="text" class="form-control" name="ngoaiNgu">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="vatLy">Vật lý</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="vatLy" type="text" class="form-control" name="vatLy">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="hoaHoc">Hoá học</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="hoaHoc" type="text" class="form-control" name="hoaHoc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="sinhHoc">Sinh học</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="sinhHoc" type="text" class="form-control" name="sinhHoc">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="lichSu">Lịch sử</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="lichSu" type="text" class="form-control" name="lichSu">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="diaLy">Địa lý</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="diaLy" type="text" class="form-control" name="diaLy">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="gdcd">Giáo dục công dân</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="gdcd" type="text" class="form-control" name="gdcd">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group input-group mb-3">
                                            <label for="diemCong">Điểm cộng</label>
                                            <span class="input-group-text icon-text"><i class="fas fa-user"></i></span>
                                            <input id="diemCong" type="text" class="form-control" name="diemCong">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <input name="cancelAddExamResult" value="Huỷ" type="submit" class="btn btn-danger">
                                    <input name="addExamResult" value="Thêm" type="submit" class="btn btn-success">
                                </div>
                            </form>

                        </div>

                        <!-- content end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>