<?php

require_once 'function.php';
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;

$sql = "SELECT guru.id_guru, guru.nama_guru, guru.nik_guru, guru.mapel, guru.pendidikan_terakhir,
            guru.jenis_kelamin, guru.nomor_handphone, guru.jabatan,  guru.status, guru.tempat, guru.tanggal_lahir,
            guru.agama, guru.image, guru.kelas_id, kelas.name as nama_kelas, jenjang.id as jenjang_id, jenjang.name as nama_jenjang
            FROM guru
            INNER JOIN kelas ON guru.kelas_id = kelas.id
            INNER JOIN jenjang ON kelas.jenjang_id = jenjang.id";
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
$header = ['No', 'Nama Guru', 'NIK', 'Tempat Lahir', 'Tanggal Lahir', 'Agama', 'No. Handphone', 'Mata Pelajaran','Pendidikan Terakhir', 'Jenjang', 'Kelas', 'Jabatan', 'Jenis Kelamin', 'Status', 'Wali Kelas']; // Contoh header, sesuaikan dengan kolom tabel Anda
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
    $rowDataToWrite[] = $row['nama_guru'];
    $rowDataToWrite[] = $row['nik_guru'];
    $rowDataToWrite[] = $row['tempat'];
    $rowDataToWrite[] = date('d-m-Y', strtotime($row['tanggal_lahir']));
    $rowDataToWrite[] = $row['agama'];
    $rowDataToWrite[] = $row['nomor_handphone'];
    $rowDataToWrite[] = $row['mapel'];
    $rowDataToWrite[] = $row['pendidikan_terakhir'];
    $rowDataToWrite[] = $row['nama_jenjang'];
    $rowDataToWrite[] = $row['nama_kelas'];
    $rowDataToWrite[] = $row['jabatan'];
    $rowDataToWrite[] = $row['jenis_kelamin'];
    $rowDataToWrite[] = $row['status'];
    $rowDataToWrite[] = $row['is_wali_kelas'] ?? 'Tidak';
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
$filename = 'Data_Guru_' . date('YmdHis') . '.xlsx';

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
