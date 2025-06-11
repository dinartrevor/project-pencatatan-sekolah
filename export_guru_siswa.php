<?php

require_once 'function.php';
require_once 'vendor/autoload.php';
global $conn;

use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



$jenjang = $_GET['jenjang'];
$kelasId = $_GET['kelas'];
$sql = "SELECT kelas.id, kelas.name as nama_kelas, jenjang.name as nama_jenjang from kelas INNER JOIN jenjang ON kelas.jenjang_id = jenjang.id WHERE kelas.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $kelasId);
$stmt->execute();
$result = $stmt->get_result();
$kelas = $result->fetch_assoc();

$sqlGuru = "SELECT * from guru WHERE guru.kelas_id = ? AND is_wali_kelas = 'YA'";
$stmt = $conn->prepare($sqlGuru);
$stmt->bind_param("s", $kelasId);
$stmt->execute();
$result = $stmt->get_result();
$dataGuru = [];
while ($row = $result->fetch_assoc()) {
    $dataGuru[] = $row;
}

$sqlSiswa = "SELECT * from siswa WHERE siswa.kelas_id = ?";
$stmt = $conn->prepare($sqlSiswa);
$stmt->bind_param("s", $kelasId);
$stmt->execute();
$result = $stmt->get_result();
$dataSiswa = [];
while ($row = $result->fetch_assoc()) {
    $dataSiswa[] = $row;
}

if(empty($dataSiswa) && empty($dataGuru)){
    $_SESSION['message_error'] = 'Error: Data Siswa & Guru Tidak Ada';
    header("Location: index.php");
    exit();
}

// Buat objek Spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet()->setTitle("DATA SISWA & GURU");;
//　Title laporan
$sheet->getStyle("A1")->applyFromArray([
    'font' => [
        'size' => 16,
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
    ],
]);

$sheet->setCellValue('A'. 1, 'Laporan Data Siswa & Guru');
$sheet->mergeCells("A1:D1");

$sheet->getStyle('A'. 3)->getFont()->setBold(true);
$sheet->setCellValue('A'. 3, 'Jenjang');
$sheet->setCellValue('B'. 3, $kelas['nama_jenjang']);
//Kelas
$sheet->getStyle('A'. 4)->getFont()->setBold(true);
$sheet->setCellValue('A'. 4, 'Kelas');
$sheet->setCellValue('B'. 4, $kelas['nama_kelas']);

// Guru 
$sheet->getStyle('A'. 5)->getFont()->setBold(true);
$sheet->setCellValue('A'. 5, 'Guru');

$headerGuru = 5;
$tahunAjaran = "-";
foreach($dataGuru as $guru){
    $sheet->setCellValue('B'. $headerGuru, $guru['nama_guru']);
    $headerGuru++;
    $tahunAjaran = $guru['tahun_ajaran'];
}

$sheet->getStyle('A'. $headerGuru)->getFont()->setBold(true);
$sheet->setCellValue('A'. $headerGuru, 'Tahun Ajaran');
$sheet->setCellValue('B'. $headerGuru, $tahunAjaran);


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
    'Nama Ayah',
    'No Handphone Ayah',
    'Pekerjaan Ayah',
    'Nama Ibu',
    'No Handphone Ibu',
    'Pekerjaan Ibu',
    'Anak Ke',
    'Jumlah Saudara',
    'Alamat',
];
$headerRow = $headerGuru  + 1; // Baris untuk header
    

// // Tulis header kolom
$col = 'A';
foreach ($header as $h) {
    $sheet->setCellValue($col . $headerRow, $h);
    $sheet->getStyle($col . $headerRow)->getFont()->setBold(true);
    $sheet->getStyle($col . $headerRow)->getFill()->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('b4c6e7'); // Tebal untuk header
    $col++;
}

// // Tulis data dari database, mulai dari baris setelah header
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

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => '00000000'],
        ],
    ],
];

// Corrected line for applying borders
$lastColumn = $sheet->getHighestColumn();
$sheet->getStyle("A{$headerRow}:{$lastColumn}{$rowNumber}")->applyFromArray($styleArray);


// // Opsional: Atur lebar kolom agar otomatis
foreach (range('A', $sheet->getHighestColumn()) as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}


// Nama file Excel yang akan dihasilkan
$filename = 'Data_Siswa_Guru_' . date('YmdHis') . '.xlsx';

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
