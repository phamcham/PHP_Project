<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">

<div class="trg-style">
    <div class="container h-100">
        <div class="row h-100">
            <div class="content-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <!-- content begin -->

                        <img src="/PHP_Project/public/images/banner.png" alt="" class="mb-3">

                        <div style="font-size: large; font-weight: bold;">Xin chào, <? echo $data['account']['name'] ?></div>

                        <div class="d-flex align-items-center" style="flex-flow: column;">
                            <div style="margin-top: 10px; color: #0d4e96;font-size: 30px;line-height: 30px;text-transform: uppercase;">
                                THỐNG KÊ TUYỂN SINH <?echo $data['year']['valueAdmissionsYear']?>
                            </div>
                            <hr style="width: 300px;border: 1px solid #0d4e96;">
                        </div>

                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 align-items-center d-flex" style="flex-flow: column;">
                                        <div style="font-size: x-large;">Hồ sơ đã nộp</div>
                                        <hr style="width: 100px;border: 1px solid #0d4e96;">
                                        <div style="font-size: 80px; line-height: 80px;"><?echo $data['nApplications']?></div>
                                    </div>
                                    <div class="col-6 align-items-center d-flex" style="flex-flow: column;">
                                        <div style="font-size: x-large;">Số ngành tuyển sinh</div>
                                        <hr style="width: 100px;border: 1px solid #0d4e96;">
                                        <div style="font-size: 80px;line-height: 80px;"><?echo $data['nMajors']?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- content end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>