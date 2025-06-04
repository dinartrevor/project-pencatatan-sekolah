<?php

require_once 'function.php';
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;


$sql = "SELECT * FROM sapras";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();

function getImageBase64Src($imageFileName) {
    $imageDir = __DIR__ . DIRECTORY_SEPARATOR;
    $imagePath = $imageDir . $imageFileName;
    if (!file_exists($imagePath)) {
        error_log("Warning: Gambar tidak ditemukan di path: " . $imagePath);
        return '';
    }

    $imageData = base64_encode(file_get_contents($imagePath));
    $imageMimeType = mime_content_type($imagePath);
    return 'data:' . $imageMimeType . ';base64,' . $imageData;

}

$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Sapras IT</title>
    <style>
        body { font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 10pt; line-height: 1.6; color: #333; }
        h1, h2 { text-align: center; color: #0056b3; margin-bottom: 15px; }
        h1 { font-size: 20pt; }
        h2 { font-size: 16pt; border-bottom: 2px solid #eee; padding-bottom: 5px; margin-top: 30px;}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; vertical-align: middle; } /* vertical-align: middle untuk gambar */
        th { background-color: #f8f8f8; color: #555; font-weight: bold; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .product-image { max-width: 60px; height: auto; border: 1px solid #eee; } /* Ukuran kecil untuk gambar di tabel */
        .footer { margin-top: 60px; text-align: right; font-size: 8pt; color: #777; border-top: 1px solid #eee; padding-top: 10px; }
    </style>
</head>
<body>
    <h1>Laporan Data Sapras IT</h1>
    <p style="text-align: center; color: #666;">Dibuat pada: ' . date('d F Y H:i:s') . '</p>

    <h2>Daftar Sapras IT</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>';

foreach ($data as $key => $item) {
    $item['image'] = 'uploads/'.$item['image'];

    $saprasImageSrc = getImageBase64Src($item['image']);

    $html .= '
            <tr>
                <td>' . $key + 1 . '</td>
                <td>';
    if (!empty($saprasImageSrc)) {
        $html .= '<img src="' . $saprasImageSrc . '" alt="Gambar Sapras" class="product-image">';
    } else {
        $html .= 'Gambar Tidak Tersedia'; // Teks placeholder jika gambar tidak ditemukan
    }
    $html .= '</td>
                <td>' . htmlspecialchars($item['nama_barang']) . '</td>
                <td>' . htmlspecialchars($item['merek']) . '</td>
                <td>' . htmlspecialchars($item['qty']) . '</td>
                <td>' . htmlspecialchars($item['keterangan']) . '</td>
            </tr>';
}

$html .= '
        </tbody>
    </table>

    <div class="footer">
        <p>Laporan ini dibuat secara otomatis oleh sistem.</p>
        <p>Halaman 1 dari 1</p>
    </div>
</body>
</html>';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'sans-serif');

$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('laporan_produk_dengan_gambar.pdf', ['Attachment' => 0]);

?>