<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'] ?? '';

    $sql = "DELETE FROM mahasiswa WHERE id = '$id'";

    if ($con->query($sql) === TRUE) {
        http_response_code(200);
        echo json_encode(array("message" => "Data deleted successfully"));
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
