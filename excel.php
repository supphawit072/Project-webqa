<?php
// ใช้ไลบรารี PhpSpreadsheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_qa";

// สร้างการเชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// สร้าง Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// ตั้งค่าหัวตาราง
$sheet->setCellValue('A1', 'Form ID')
      ->setCellValue('B1', 'Curriculum')
      ->setCellValue('C1', 'Course Code')
      ->setCellValue('D1', 'Course Name')
      ->setCellValue('E1', 'Credits')
      ->setCellValue('F1', 'Groups')
      ->setCellValue('G1', 'A')
      ->setCellValue('H1', 'B+')
      ->setCellValue('I1', 'B')
      ->setCellValue('J1', 'C+')
      ->setCellValue('K1', 'C')
      ->setCellValue('L1', 'D+')
      ->setCellValue('M1', 'D')
      ->setCellValue('N1', 'E')
      ->setCellValue('O1', 'F')
      ->setCellValue('P1', 'F Percent')
      ->setCellValue('Q1', 'I')
      ->setCellValue('R1', 'W')
      ->setCellValue('S1', 'W Percent')
      ->setCellValue('T1', 'VG')
      ->setCellValue('U1', 'G')
      ->setCellValue('V1', 'S')
      ->setCellValue('W1', 'Total')
      ->setCellValue('X1', 'Instructor');

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT * FROM create_form ORDER BY form_id DESC";
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result && $result->num_rows > 0) {
    $rowIndex = 2; // เริ่มจากแถวที่ 2 เนื่องจากแถวแรกเป็นหัวตาราง
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $rowIndex, $row['form_id'])
              ->setCellValue('B' . $rowIndex, $row['curriculum'])
              ->setCellValue('C' . $rowIndex, $row['course_code'])
              ->setCellValue('D' . $rowIndex, $row['course_name'])
              ->setCellValue('E' . $rowIndex, $row['credits'])
              ->setCellValue('F' . $rowIndex, $row['groups'])
              ->setCellValue('G' . $rowIndex, $row['A'])
              ->setCellValue('H' . $rowIndex, $row['B_plus'])
              ->setCellValue('I' . $rowIndex, $row['B'])
              ->setCellValue('J' . $rowIndex, $row['C_plus'])
              ->setCellValue('K' . $rowIndex, $row['C'])
              ->setCellValue('L' . $rowIndex, $row['D_plus'])
              ->setCellValue('M' . $rowIndex, $row['D'])
              ->setCellValue('N' . $rowIndex, $row['E'])
              ->setCellValue('O' . $rowIndex, $row['F'])
              ->setCellValue('P' . $rowIndex, $row['F_percent'])
              ->setCellValue('Q' . $rowIndex, $row['I'])
              ->setCellValue('R' . $rowIndex, $row['W'])
              ->setCellValue('S' . $rowIndex, $row['W_percent'])
              ->setCellValue('T' . $rowIndex, $row['VG'])
              ->setCellValue('U' . $rowIndex, $row['G'])
              ->setCellValue('V' . $rowIndex, $row['S'])
              ->setCellValue('W' . $rowIndex, $row['total'])
              ->setCellValue('X' . $rowIndex, $row['instructor']);
        $rowIndex++;
    }

    
} else {
    echo "No records found";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();

// ตั้งค่าการดาวน์โหลดไฟล์ Excel
$filename = "data_export_" . date('Ymd') . ".xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// สร้างไฟล์ Excel และดาวน์โหลด
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();
?>
