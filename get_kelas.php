<?php
session_start();

require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $id = $_GET['jenjang_id'];
        global $conn;


        $sql = "SELECT * from kelas WHERE kelas.jenjang_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $dataKelas = [];
        while ($row = $result->fetch_assoc()) {
            $dataKelas[] = $row;
        }

        $response = [
            "message" => "Data Berhasil",
            "status" => true,
            "data" => $dataKelas,
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