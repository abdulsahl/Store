<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']==true){
    echo "<script>alert('silahkan logout terlebih dahulu');</script>";
    header("refresh:0;url=home/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="proses-login.php" method="POST">
    <label for="username">USERNAME</label>
    <input type="text" name="username" id="username" placeholder="Enter the username"> <br><br>
    <label for="password">PASSWORD</label>
    <input type="password" name="password" id="password" placeholder="Enter the password"><br><br>
    <input type="submit" value="Login">
    </form>
</body>
</html>


