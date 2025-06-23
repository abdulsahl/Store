<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "store";
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) {
        echo "<script>alert('Koneksi gagal : " . mysqli_connect_error()."');";
    }
?>