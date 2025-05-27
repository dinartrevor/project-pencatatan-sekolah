<?php
session_start();

require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $id = $_GET['id'];
        global $conn;
        $sql = "SELECT * from kelas WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $kelas = $result->fetch_assoc();

        $sql = "SELECT * FROM jenjang";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $dataJenjang = [];
        while ($row = $result->fetch_assoc()) {
            $dataJenjang[] = $row;
        }

        $stmt->close();
        $response = [
            "message" => "Data Berhasil",
            "status" => true,
            "data" => ['jenjang' => $dataJenjang, 'kelas' => $kelas],
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