<?php
session_start();

require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $id = $_GET['kelas_id'];
        global $conn;


        $sql = "SELECT * from guru WHERE guru.kelas_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $dataGuru = [];
        while ($row = $result->fetch_assoc()) {
            $dataGuru[] = $row;
        }

        $sql = "SELECT * from siswa WHERE siswa.kelas_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $dataSiswa = [];
        while ($row = $result->fetch_assoc()) {
            $dataSiswa[] = $row;
        }

        $response = [
            "message" => "Data Berhasil",
            "status" => true,
            "data" => ["guru" => $dataGuru, "siswa" => $dataSiswa],
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