<?php
include_once("../../cek-login.php");
require_once('../../koneksi.php');
$querytransaksi = "SELECT transaksi.id,transaksi.waktu_transaksi,transaksi.keterangan,pelanggan.nama,transaksi.total FROM transaksi,pelanggan WHERE transaksi.pelanggan_id = pelanggan.id";
$resulttransaksi = mysqli_query($conn, $querytransaksi);
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
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Waktu Transaksi</th>
            <th>Keterangan</th>
            <th>Total</th>
            <th>Nama Pelanggan</th>
            <th>Tindakan</th>
        </tr>
        <?php foreach($resulttransaksi as $i => $row): ?>
            <tr>
                <td><?=$i+1?></td>
                <td><?=$row['waktu_transaksi']?></td>
                <td><?=$row['keterangan']?></td>
                <td><?=$row['total']?></td>
                <td><?=$row['nama']?></td>
                <td>
                    <form action="TransaksiDetail.php" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <button type="submit" name="select">Lihat Detail</button>
                    </form>
                    <form action="HapusDataTransaksi.php" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <button type="submit" name="hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="TambahDataTransaksi.php"><button>Tambah Transaksi</button></a>
    <a href="TambahDataDetailTransaksi.php"><button>Tambah Transaksi Detail</button></a>
</body>
</html>