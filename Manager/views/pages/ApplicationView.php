<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">

<div class="trg-style">
    <div class="container h-100">
        <div class="row h-100">
            <div class="content-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <!-- content begin -->
                        <h3 class="text-center">THÔNG TIN HỒ SƠ TUYỂN SINH NĂM <?php echo $curYear = $data['admissionsYear']['valueAdmissionsYear'] ?></h3>

                        <div style="display: flex; justify-content: flex-end;">
                            <div class="form-inline">
                                <label for="select_year" style="margin-right: 10px; font-size: medium;">Chọn năm:</label>
                                <select class="form-control" id="select_year" name="select_year" required onchange="jsFunction(this)">
                                    <?php
                                    $years = $data['years'];
                                    for ($i = 0; $i < count($years); $i++) {
                                        $year = $years[$i];
                                        echo '<option ';
                                        if ($year['valueAdmissionsYear'] == $curYear) echo 'selected ';
                                        echo 'value="' . $year['idAdmissionsYear'] . '">';
                                        echo $year['valueAdmissionsYear'] . '</option>';
                                    }

                                    ?>
                                    <!-- <option selected value="888">8888</option> -->
                                    <!-- <option value="2019">2019</option> -->
                                </select>
                                <script>
                                    function jsFunction(select) {
                                        window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                                            "/PHP_Project/Manager/Application/Index/" + select.options[select.selectedIndex].value;
                                    }
                                </script>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped" style="margin-top: 20px;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Mã hồ sơ</th>
                                    <th scope="col">Tên thí sinh</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Ngành xét tuyển</th>
                                    <th scope="col">Thao tác...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr> -->
                                    <?php
                                    $applist = $data['applications'];
                                    for ($i = 0; $i < count($applist); $i++) {
                                        $appl = $applist[$i];
                                        echo '<tr>';
                                        echo '<th scope="row">' . $appl['idApplication'] . '</th>';
                                        echo '<td>' . $appl['name'] . '</td>';
                                        echo '<td>' . ($appl['gender'] == 1 ? 'Nam' : 'Nữ') . '</td>';
                                        echo '<td>' . $appl['phoneNumber'] . '</td>';
                                        echo '<td>' . $appl['nameMajors'] . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                               
                            </tbody>
                        </table>

                        <!-- content end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>