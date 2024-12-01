<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'] ?? '';
    $judul_tugas = $_POST['judul_tugas'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';
    $status = $_POST['status'] ?? '';
    $user_id = $_POST['user_id'] ?? '';

    $sql = "UPDATE tugas SET judul_tugas='$judul_tugas', deskripsi='$deskripsi', tanggal='$tanggal', status='$status', user_id='$user_id' WHERE id='$id'";

    if ($con->query($sql) === TRUE) {
        http_response_code(200);
        echo json_encode(array("message" => "Data updated successfully"));
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Error: " . $con->error));
    }
} else {
   
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}

$con->close();

?>
