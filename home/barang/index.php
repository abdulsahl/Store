<?php
include_once("../../cek-login.php");
include_once("../../cek-admin.php");
require_once('../../koneksi.php');
$querybarang = "SELECT barang.supplier_id,barang.id AS barang_id,barang.kode_barang,barang.nama_barang,barang.harga,barang.stok,supplier.nama FROM barang,supplier WHERE barang.supplier_id = supplier.id";
$resultbarang = mysqli_query($conn, $querybarang);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM PENJUALAN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once("../../navbar.php"); ?>
    <a href="TambahDataBarang.php"><button>Tambah Barang</button></a>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Nama Supplier</th>
            <th>Tindakan</th>
        </tr>
        <?php foreach($resultbarang as $i => $row): ?>
            <tr>
                <td><?=$i+1?></td>
                <td><?=$row['kode_barang']?></td>
                <td><?=$row['nama_barang']?></td>
                <td><?=$row['harga']?></td>
                <td><?=$row['stok']?></td>
                <td><?=$row['nama']?></td>
                <td><form method='POST' style='display:inline' action='EditDataBarang.php'>
                <input type='hidden' name='id' value='<?=htmlspecialchars($row['barang_id']) ?>'>
                <input type='hidden' name='kode' value='<?=htmlspecialchars($row['kode_barang']) ?>'>
                <input type='hidden' name='nama' value='<?=htmlspecialchars($row['nama_barang']) ?>'>
                <input type='hidden' name='harga' value='<?=htmlspecialchars($row['harga']) ?>'>
                <input type='hidden' name='stok' value='<?=htmlspecialchars($row['stok']) ?>'>
                <input type='hidden' name='supplier' value='<?=htmlspecialchars($row['supplier_id']) ?>'>
                <button type='submit' name='edit'>Edit</button></form>
                    <form action="HapusDataBarang.php" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?=$row['barang_id']?>">
                        <button type="submit" name="hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>