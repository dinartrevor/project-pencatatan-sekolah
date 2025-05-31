<?php

require_once 'function.php';
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;

$jenjang = $_GET['type'];
$sql = "SELECT siswa.id_siswa, siswa.nama_siswa, siswa.nis, siswa.agama, siswa.tempat, siswa.tanggal_lahir, siswa.umur, siswa.jenis_kelamin, siswa.asal_sekolah,
        siswa.angkatan, siswa.kelas_id, siswa.nama_ayah, siswa.nama_ibu, siswa.pekerjaan_ayah, siswa.pekerjaan_ibu, siswa.no_handphone_ayah, siswa.no_handphone_ibu,
        siswa.anak_ke, siswa.jumlah_saudara, siswa.alamat_lengkap, siswa.photo, siswa.jenjang, kelas.name as nama_kelas, jenjang.name as jenjang_name
        FROM siswa
        INNER JOIN kelas ON siswa.kelas_id = kelas.id
        INNER JOIN jenjang ON kelas.jenjang_id = jenjang.id
        WHERE siswa.jenjang = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $jenjang);
$stmt->execute();
$result = $stmt->get_result();
$dataSiswa = [];
while ($row = $result->fetch_assoc()) {
    $dataSiswa[] = $row;
}

$stmt->close();
// Buat objek Spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Definisikan header kolom (Bahasa Indonesia)
$header = [
    'No',
    'Nama',
    'NIS',
    'Jenis Kelamin',
    'Tempat',
    'Tanggal Lahir',
    'Usia',
    'Agama',
    'Asal Sekolah',
    'Angkatan',
    'Jenjang',
    'Kelas',
    'Nama Ayah',
    'No Handphone Ayah',
    'Pekerjaan Ayah',
    'Nama Ibu',
    'No Handphone Ibu',
    'Pekerjaan Ibu',
    'Anak Ke',
    'Jumlah Saudara',
    'Alamat',
]; // Contoh header, sesuaikan dengan kolom tabel Anda
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
foreach ($dataSiswa as $key => $row) {
    $col = 'A';
    $rowDataToWrite = [];
    $rowDataToWrite[] = $key + 1;
    $rowDataToWrite[] = $row['nama_siswa'];
    $rowDataToWrite[] = $row['nis'];
    $rowDataToWrite[] = $row['jenis_kelamin'];
    $rowDataToWrite[] = $row['tempat'];
    $rowDataToWrite[] = $row['tanggal_lahir'] ? date('d-m-Y', strtotime($row['tanggal_lahir'])) : '-';
    $rowDataToWrite[] = $row['umur'];
    $rowDataToWrite[] = $row['agama'];
    $rowDataToWrite[] = $row['asal_sekolah'];
    $rowDataToWrite[] = $row['angkatan'];
    $rowDataToWrite[] = $row['jenjang_name'];
    $rowDataToWrite[] = $row['nama_kelas'];
    $rowDataToWrite[] = $row['nama_ayah'];
    $rowDataToWrite[] = $row['no_handphone_ayah'];
    $rowDataToWrite[] = $row['pekerjaan_ayah'];
    $rowDataToWrite[] = $row['nama_ibu'];
    $rowDataToWrite[] = $row['no_handphone_ibu'];
    $rowDataToWrite[] = $row['pekerjaan_ibu'];
    $rowDataToWrite[] = $row['anak_ke'];
    $rowDataToWrite[] = $row['jumlah_saudara'];
    $rowDataToWrite[] = $row['alamat_lengkap'];
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
$filename = 'Data_Siswa_'.$jenjang.'_' . date('YmdHis') . '.xlsx';

// Set header untuk mengunduh file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0'); // Tidak ada cache

// Buat objek Writer untuk format XLSX
$writer = new Xlsx($spreadsheet);

// Simpan file ke output (untuk diunduh oleh browser)
$writer->save('php://output');

exit;
?>