<?php

require_once 'function.php';
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;

$sql = "SELECT * FROM jenjang";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$stmt->close();

// Buat objek Spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Definisikan header kolom (Bahasa Indonesia)
$header = ['No', 'Nama Jenjang'];
$headerRow = 1; // Baris untuk header
    

// Tulis header kolom
$col = 'A';
foreach ($header as $h) {
    $sheet->setCellValue($col . $headerRow, $h);
    $sheet->getStyle($col . $headerRow)->getFont()->setBold(true); // Tebal untuk header
    $col++;
}

// Tulis data dari database, mulai dari baris setelah header
$rowNumber = $headerRow + 1; // Mulai setelah baris header
foreach ($data as $key => $row) {
    $col = 'A';
    $rowDataToWrite = [];
    $rowDataToWrite[] = $key + 1;
    $rowDataToWrite[] = $row['name'];
    foreach ($rowDataToWrite as $value) {
        $sheet->setCellValue($col . $rowNumber, $value);
        $col++;
    }
    $rowNumber++;
}

// Opsional: Atur lebar kolom agar otomatis
foreach (range('A', $sheet->getHighestColumn()) as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}


// Nama file Excel yang akan dihasilkan
$filename = 'Data_Jenjang_' . date('YmdHis') . '.xlsx';

// Set header untuk mengunduh file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0'); // Tidak ada cache

// Buat objek Writer untuk format XLSX
$writer = new Xlsx($spreadsheet);

// Simpan file ke output (untuk diunduh oleh browser)
$writer->save('php://output');

exit; // Penting: Hentikan eksekusi script setelah mengirim file
?>
