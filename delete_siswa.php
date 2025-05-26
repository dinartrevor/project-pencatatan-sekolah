<?php
session_start();

require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = $_POST['id'];
        $updateSql = "DELETE FROM siswa WHERE id_siswa=?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("i",$id);
        $updateStmt->execute();
        $updateStmt->close();


        $response = [
            "message" => "Data Berhasil",
            "status" => true,
        ];

        echo json_encode($response);
    } catch (Exception $e) {
        $response = [
            "message" => 'Error: ' . $e->getMessage(),
            "status" => false,
        ];
        echo json_encode($response);
    }
}