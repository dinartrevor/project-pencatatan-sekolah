<?php
session_start();

require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $id = $_GET['id'];
        global $conn;
        $sql = "SELECT * from dataipad WHERE id_apple = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        $response = [
            "message" => "Data Berhasil",
            "status" => true,
            "data" => $user,
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