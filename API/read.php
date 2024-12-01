<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");

include "koneksi.php";

$sql = " SELECT * FROM tugas";
$result = $con-> query($sql);

if ($result->num_rows > 0) {
    $items = array();

    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    $response = [
        "data" => $items,
        "message" => "Berhasil",
        "status" => 200
    ];
    echo json_encode($response);
} else {
    $response = [
        "message" => "Gagal",
        "status" => 404
    ];
    http_response_code(404);
    echo json_encode($response);
}

$con->close();

?>