<?php
session_start();
require_once("koneksi.php");
$username = $_POST['username'];
$password = md5($_POST['password']);
$admin  = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password' AND level = 1");
$user  = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password' AND level = 2");
if(mysqli_num_rows($admin)>0){
    $_SESSION['login'] = true;
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['level'] = 1;
    echo "<script>alert('Berhasil Login');</script>";
    header("refresh:0;url= home/index.php");
    exit();
}elseif(mysqli_num_rows($user)>0){
    $_SESSION['login'] = true;
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['level'] = 2;
    echo "<script>alert('Berhasil Login');</script>";
    header("refresh:0;url= home/index.php");
    exit();
}else{
    echo "<script>alert('Username dan password salah. silahkan login kembali!')</script>";
    header("refresh:0;url=index.php");
    exit();
}
?>