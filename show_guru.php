<?php
session_start();

require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $id = $_GET['id'];
        global $conn;
        $sql = "SELECT guru.id_guru, guru.nama_guru, guru.nik_guru, guru.mapel, guru.pendidikan_terakhir,
            guru.jenis_kelamin, guru.nomor_handphone, guru.jabatan,  guru.status, guru.tempat, guru.tanggal_lahir, guru.is_wali_kelas,
            guru.agama, guru.image, guru.kelas_id, guru.tahun_ajaran, kelas.name as nama_kelas, jenjang.id as jenjang_id, jenjang.name as nama_jenjang
            FROM guru
            LEFT JOIN kelas ON guru.kelas_id = kelas.id
            LEFT JOIN jenjang ON kelas.jenjang_id = jenjang.id
            WHERE guru.id_guru = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        $sql = "SELECT * FROM jenjang";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $dataJenjang = [];
        while ($row = $result->fetch_assoc()) {
            $dataJenjang[] = $row;
        }

        $response = [
            "message" => "Data Berhasil",
            "status" => true,
            "data" => ['jenjang' => $dataJenjang, 'guru' => $user],
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