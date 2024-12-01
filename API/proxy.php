<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (isset($_GET['url'])) {

    $url = $_GET['url'];

    $response = file_get_contents($url);

    if ($response === false) {
        http_response_code(500);
        echo json_encode(array("message" => "Failed to fetch content from the specified URL."));
    } else {
        echo $response;
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Missing 'url' parameter"));
}

?>
