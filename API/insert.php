<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'] ?? '';
    $judul_tugas = $_POST['judul_tugas'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';
    $status = $_POST['status'] ?? '';
    $user_id = $_POST['user_id'] ?? '';

    $sql = "INSERT INTO tugas (id, judul_tugas, deskripsi, tanggal, status, user_id) VALUE ('$id', '$judul_tugas', '$deskripsi', '$tanggal', '$status', '$user_id')";

    if ($con->query($sql) === TRUE) {
        http_response_code(200);
        echo json_encode(array("message" => "Data berhasil ditambahkan"));
    }else {
        http_response_code(500);
        echo json_encode(array("message" => "Error: " . $con->error));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Method Not Allowed"));
}

?>