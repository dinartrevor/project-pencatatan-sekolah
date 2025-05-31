<?php
session_start();

require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $id = $_GET['id'];
        global $conn;
        $sql = "SELECT siswa.id_siswa, siswa.nama_siswa, siswa.nis, siswa.agama, siswa.tempat, siswa.tanggal_lahir, siswa.umur, siswa.jenis_kelamin, siswa.asal_sekolah,
        siswa.angkatan, siswa.kelas_id, siswa.nama_ayah, siswa.nama_ibu, siswa.pekerjaan_ayah, siswa.pekerjaan_ibu, siswa.no_handphone_ayah, siswa.no_handphone_ibu,
        siswa.anak_ke, siswa.jumlah_saudara, siswa.alamat_lengkap, siswa.photo, siswa.jenjang, kelas.name as nama_kelas, jenjang.name as jenjang_name, jenjang.id as jenjang_id
        FROM siswa
        INNER JOIN kelas ON siswa.kelas_id = kelas.id
        INNER JOIN jenjang ON kelas.jenjang_id = jenjang.id
        WHERE siswa.id_siswa = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        $sql = "SELECT kelas.id, kelas.name, jenjang.name as jenjang_name FROM kelas INNER JOIN jenjang ON kelas.jenjang_id = jenjang.id WHERE jenjang.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user['jenjang_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $dataKelas = [];
        while ($row = $result->fetch_assoc()) {
            $dataKelas[] = $row;
        }
        $stmt->close();
        $response = [
            "message" => "Data Berhasil",
            "status" => true,
            "data" => ['siswa' => $user, "dataKelas" => $dataKelas],
        ];
        echo json_encode($response);
    } catch (Exception $e) {
        $response = [
            "message" => 'Error: ' . $e->getMessage(),
            "status" => false,
            "data" => [],
        ];
        echo json_encode($response);
    }
}