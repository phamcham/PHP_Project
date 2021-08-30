<?php
    include('anhThuConnect.php');
    function filData($str)
    {
        $str = preg_replace("/\t/","\\t",$str);
        $str = preg_replace("/\r?n/","\\n",$str);
        if(strstr($str,'"')){
            $str = '"'.str_replace('"','""',$str).'"';
        }
    }

    // execl file name for dowload
    $filename = "diem-data" . date('Y-m-d').".xls";

    // colum names
    $fields = array('Mã bảng điểm','Ngữ Văn' , 'Toán' , 'Ngoại Ngữ', 'Vật Lý' , 'Hóa Học' , 'Sinh Học' , 'Lịch Sử' , 'Địa Lý' , 'Giáo dục công dân' , 'Điểm Cộng' );

    // display colum names as file row
    $excelData = implode("\t",array_values($fields))."\n";

    // fetch record form database

    $sql = "SELECT * from ExamResult  ";
	$sq = mysqli_query($conn,$sql);
        //output each of the data
        while($std = mysqli_fetch_array($sq))
        {
            $lineData = array($std['idExamResult'],$std['toan'],$std['ngoaiNgu'],$std['vatLy'],$std['hoaHoc'],$std['sinhHoc'],$std['lichSu'],$std['diaLy'],$std['gdcd'],$std['diemCong']);
            array_walk($lineData,'filData');
            $excelData .= implode("\t",array_values($lineData))."\n";

        }
    
    header("content-type: application/vnd.ms-excel");
    header("content-disposition: attachment; filname=\"$filename\"");

    // render excel data
    echo chr(255).chr(254).mb_convert_encoding($excelData, "UTF-16LE","UTF-8");
    exit;
?>