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
    $fields = array('idExamResult','nguVan' , 'toan' , 'ngoaiNgu', 'vatLy' , 'hoaHoc' , 'sinhHoc' , 'lichSu' , 'diaLy' , 'gdcd' , 'diemCong' );

    // display colum names as file row
    $excelData = implode("\t",array_values($fields))."\n";

    // fetch record form database

    $sql = "select * from ExamResult  ";
	$sq = mysqli_query($conn,$sql);
    if($sq)
    {
        //output each of the data
        while($std = mysqli_fetch_array($sq))
        {
            $lineData = array($std['idExamResult'],$std['nguVan'],$std['toan'],$std['ngoaiNgu'],$std['vatLy'],$std['hoaHoc'],$std['sinhHoc'],$std['lichSu'],$std['diaLy'],$std['gdcd'],$std['diemCong']);
            array_walk($lineData,'filData');
            $excelData .= implode("\t",array_values($lineData))."\n";

        }
    }
    else 
    {
        $excelData .="No records found"."\n";
    }
    header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    // render excel data
    echo $excelData;
    exit;
?>