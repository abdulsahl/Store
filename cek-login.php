<?php session_start();
if(!isset($_SESSION['login']) && $_SESSION['login']!==true){
    echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    header("refresh:0;url = ../../index.php");
    exit();
}?>