<?php
include_once("../../cek-login.php");
include_once("../../cek-admin.php");
require_once('../../koneksi.php');
$query = "SELECT * FROM pelanggan";
$result = mysqli_query($conn, $query);
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
    <a href="TambahDataPelanggan.php"><button>Tambah Pelanggan</button></a>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php foreach($result as $i => $row): ?>
            <tr>
                <td><?=$i+1?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['jenis_kelamin'] == "L" ? "Laki-laki" : "Perempuan"?></td>
                <td><?=$row['telp']?></td>
                <td><?=$row['alamat']?></td>
                <td><form method='POST' style='display:inline' action='EditDataPelanggan.php'>
                <input type='hidden' name='id' value='<?=htmlspecialchars($row['id']) ?>'>
                <input type='hidden' name='nama' value='<?=htmlspecialchars($row['nama']) ?>'>
                <input type='hidden' name='kelamin' value='<?=htmlspecialchars($row['jenis_kelamin']) ?>'>
                <input type='hidden' name='telp' value='<?=htmlspecialchars($row['telp']) ?>'>
                <input type='hidden' name='alamat' value='<?=htmlspecialchars($row['alamat']) ?>'>
                <button type='submit' name='edit'>Edit</button></form>
                    <form action="HapusDataPelanggan.php" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <button type="submit" name="hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>