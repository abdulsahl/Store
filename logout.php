<?php
    session_start();
    session_unset();
    session_destroy();

    echo "<script>alert('Berhasil Logout');</script>";
    header("refresh:0;url= index.php");
    exit()
?>