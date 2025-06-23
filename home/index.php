<?php 
session_start();
if(!isset($_SESSION['login']) && $_SESSION['login']!==true){
    echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    header("refresh:0;url = ../index.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM PENJUALAN</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .hero-section {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: #fff;
    text-align: center;
    padding: 100px 20px;
}
.hero-section h1 {
    font-size: 3rem;
    font-weight: bold;
}
.hero-section p {
    font-size: 1.2rem;
    margin-top: 15px;
}
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">SISTEM PENJUALAN</div>
        <ul class="navbar-links">
            <li><a href="">Home</a></li>
            <?php if(isset($_SESSION['level'])&& $_SESSION['level']== 1):?>
            <li class="dropdown">
                <a href="" class="dropdown-toggle">Data Master &#9662;</a>
                <ul class="dropdown-menu">
                    <li><a href="barang/index.php">Data Barang</a></li>
                    <li><a href="supplier/index.php">Data Supplier</a></li>
                    <li><a href="pelanggan/index.php">Data Pelanggan</a></li>
                    <li><a href="user/index.php">Data User</a></li>
                </ul>
            </li>
            <?php endif ?>
            <li><a href="transaksi/index.php">Transaksi</a></li>
            <li><a href="laporan/index.php">Laporan</a></li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle"><?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : '';?> &#9662;</a>
                <ul class="dropdown-menu">
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
        </ul>
    </nav>
    <div class="hero-section">
        <h1>Selamat Datang di Sistem Penjualan</h1>
        <p>Solusi modern untuk manajemen penjualan yang lebih efisien.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

