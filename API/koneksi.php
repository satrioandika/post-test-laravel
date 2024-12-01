<?php 
    $host = "localhost";
    $db = "post-test-laravel";
    $user = "root";
    $password = "";

    $con = mysqli_connect($host, $user, $password, $db);

    if (mysqli_connect_error()) {
        echo "Failed to connect MYQL: ", mysqli_connect_error();
    } else {
        echo "Koneksi berhasil";
    }
?>