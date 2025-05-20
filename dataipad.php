<?php
// Koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "sisfoalazcabta");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Ambil data dari tabel data_ipad
$query = "SELECT * FROM dataipad";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data iPad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Data iPad</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Apple ID</th>
                <th>Password</th>
                <th>No HP</th>
                <th>Tipe iPad</th>
                <th>Konektivitas</th>
                <th>Storage</th>
                <th>Serial Number</th>
                <th>Kode Restriction</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_siswa']}</td>
                        <td>{$row['apple_id']}</td>
                        <td>{$row['password']}</td>
                        <td>{$row['no_handphone']}</td>
                        <td>{$row['tipe_ipad']}</td>
                        <td>{$row['konektivitas']}</td>
                        <td>{$row['storage']}</td>
                        <td>{$row['serial_number']}</td>
                        <td>{$row['kode_restrict']}</td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
