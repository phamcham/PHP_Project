<?php

namespace Core;
class ExcelExporter
{
    public static function Export($fileName, $title, $fields, $dataTable)
    {
        // Excel file name for download 
        $fileName = $fileName . "_" . date('Y-m-d') . ".xls";

        // Column names 
        //$fields = array('ID', 'FIRST NAME', 'LAST NAME', 'EMAIL', 'GENDER', 'COUNTRY', 'CREATED', 'STATUS');

        // Display column names as first row 
        $excelData = $title . "\n";
        $excelData .= implode("\t", array_values($fields)) . "\n";

        // Fetch records from $dataTable
        for ($i = 0; $i < count($dataTable); $i++) {
            $lineData = $dataTable[$i];
            array_walk($lineData, function (&$str) {
                $str = preg_replace("/\t/", "\\t", $str);
                $str = preg_replace("/\r?\n/", "\\n", $str);
                if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
                $str .= " ";
            });
            $excelData .= implode("\t", array_values($lineData)) . "\n";
        }

        // Headers for download 
        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        // Render excel data 

        echo chr(255).chr(254).mb_convert_encoding($excelData, "UTF-16LE","UTF-8");

        exit;
    }
}
