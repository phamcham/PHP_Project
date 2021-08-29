<link href="/PHP_Project/public/css/trg-style.css" rel="stylesheet">

<div class="trg-style">
    <div class="container h-100">
        <div class="row h-100">
            <div class="content-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <!-- content begin -->
                        <h3 class="text-center fa-2x">THÔNG TIN HỒ SƠ TUYỂN SINH NĂM <?php echo $curYear = $data['admissionsYear']['valueAdmissionsYear'] ?></h3>
                        <div class="d-flex justify-content-end align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <label for="select_year" style="margin: 0px 10px; font-size: medium; white-space: nowrap;">Chọn năm:</label>
                                <select class="form-control" id="select_year" name="select_year" required onchange="jsYearSelected(this)">
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
                                    function jsYearSelected(select) {
                                        window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                                            "/PHP_Project/Manager/Application/Index/" + select.options[select.selectedIndex].value;
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div style="font-size: medium;">
                                <button class="btn btn-success btn-toolbar" onclick="jsAddClicked()">Thêm hồ sơ</button>
                            </div>

                            <script>
                                function jsAddClicked() {
                                    window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                                        "/PHP_Project/Manager/Application/Add/" + <?php echo $data['admissionsYear']['idAdmissionsYear'] ?>;
                                }
                            </script>

                            <div class="d-flex align-items-center">
                                <input id="search" name="search" type="text" placeholder="Tìm kiếm" class="form-control" value="<?php echo $data['search']; ?>">
                                <button class="btn btn-info btn-toolbar ml-2" onclick="jsSearchClicked(this)">Tìm kiếm</button>
                                <script>
                                    function jsSearchClicked(content) {
                                        var inputVal = document.getElementById("search").value;
                                        // http://localhost:81/PHP_Project/Manager/Application/Index/25568/inputVal
                                        window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                                            "/PHP_Project/Manager/Application/Index/" +
                                            <?php echo $year['idAdmissionsYear']; ?> + "/" + inputVal;

                                    }
                                </script>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped" style="margin-top: 20px;">
                            <thead class=" position-sticky" style="top: 80px;">
                                <tr style="color: black; background-color: #92b5ff;">
                                    <th scope="col">STT</th>
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
                                $index = 1;
                                foreach ($data['applications'] as $appl) {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $index++ . '</th>';
                                    echo '<th scope="row">' . $appl['idApplication'] . '</th>';
                                    echo '<td>' . $appl['name'] . '</td>';
                                    echo '<td>' . ($appl['gender'] == 1 ? 'Nam' : 'Nữ') . '</td>';
                                    echo '<td>' . $appl['phoneNumber'] . '</td>';
                                    echo '<td>' . $appl['nameMajors'] . '</td>';
                                    // buttons
                                    echo '<td>';
                                    // button xem
                                    echo '<button class="btn btn-primary btn-toolbar d-inline-block mr-md-2"';
                                    echo 'name = "' . $appl["idApplication"] . '" onclick="jsDetailClicked(this)">Xem</button>';
                                    // btn xoa
                                    echo '<button class="btn btn-danger btn-toolbar d-inline-block"';
                                    echo 'name = "' . $appl["idApplication"] . '" onclick="jsDeleteClicked(this)">Xoá</button>';

                                    echo '</td>';
                                    // end row
                                    echo '</tr>';
                                }
                                unset($appl);
                                ?>

                                <script>
                                    function jsDeleteClicked(select) {
                                        if (confirm('Bạn có muốn xoá hồ sơ: ' + select.name + "?")) {
                                            window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                                                "/PHP_Project/Manager/Application/Delete/" + select.name; // truyen vao id application
                                        } else {
                                            // do nothing
                                        }
                                    }

                                    function jsDetailClicked(select) {
                                        window.location = "http://" + "<?php echo $_SERVER['HTTP_HOST'] ?>" +
                                            "/PHP_Project/Manager/Application/Detail/" + select.name; // truyen vao id application

                                    }
                                </script>

                            </tbody>
                        </table>
                        <a href="Application/ReportExcel/<?php echo $data['admissionsYear']['idAdmissionsYear']; ?>">
                            <div class="d-flex" style="font-size: medium;">
                                <button class="btn btn-secondary btn-toolbar">Xuất Excel</button>
                            </div>
                        </a>
                        <!-- content end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>