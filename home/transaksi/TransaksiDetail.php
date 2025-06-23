<?php
include_once("../../cek-login.php");
require_once('../../koneksi.php');
if(isset($_POST['select'])){
    $id = $_POST['id'];
    
    $querydetail = "SELECT 
    transaksi_detail.sub_total,
    transaksi_detail.transaksi_id,
    transaksi_detail.barang_id,
    barang.nama_barang,
    transaksi_detail.qty,
    transaksi_detail.harga as detail_harga
FROM 
    transaksi_detail,barang WHERE transaksi_detail.barang_id = barang.id AND transaksi_id = $id";
    $resultdetail = mysqli_query($conn, $querydetail);
}
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
<a href="index.php" ><button>Kembali</button></a>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Sub_total</th>
            <th>Tindakan</th>
        </tr>
        <?php foreach($resultdetail as $i => $row): ?>
            <tr>
                <td><?=$i+1?></td>
                <td><?=$row['nama_barang']?></td>
                <td><?=$row['detail_harga']?></td>
                <td><?=$row['qty']?></td>
                <td><?=$row['sub_total']?></td>
                <td><form action="HapusDataTransaksiDetail.php" method="post" style="display: inline;">
                        <input type="hidden" name="idtr" value="<?=$row['transaksi_id']?>">
                        <input type="hidden" name="idbr" value="<?=$row['barang_id']?>">
                        <input type="hidden" name="harga" value="<?=$row['sub_total']?>">
                        <button type="submit" name="hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>