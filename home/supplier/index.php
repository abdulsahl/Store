<?php
include_once("../../cek-login.php");
include_once("../../cek-admin.php");
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
            <a href="TambahDataSupplier.php"><button>Tambah Data</button></a>
            <table border ='1'>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Tindakan</th>
                </tr>
<?php
    require_once('validate.inc');
    require_once('../../koneksi.php');
    $query = "SELECT * FROM supplier";
    $result = mysqli_query($conn, $query);
        foreach ($result as $no => $row):?>
        <tr>
        <td><?=$no+1?></td>
        <td><?=htmlspecialchars($row['nama'])?></td>
        <td><?=htmlspecialchars($row['telp'])?></td>
        <td><?=htmlspecialchars($row['alamat'])?></td>
        <td><form method='POST' style='display:inline' action='EditDataSupplier.php'>
        <input type='hidden' name='id' value='<?=htmlspecialchars($row['id']) ?>'>
        <input type='hidden' name='nama' value='<?=htmlspecialchars($row['nama']) ?>'>
        <input type='hidden' name='telp' value='<?=htmlspecialchars($row['telp']) ?>'>
        <input type='hidden' name='alamat' value='<?=htmlspecialchars($row['alamat']) ?>'>
        <button type='submit' name='edit'>Edit</button>
        </form>
        <form method='POST' action='HapusDataSupplier.php' style='display:inline' >
        <input type='hidden' name='id' value='<?=$row['id'] ?>'>
        <button type='submit' name='hapus' onclick='return confirm("Apa anda yakin ingin menghapus data ini?")'>Hapus</button>
    </form></td>
</tr>
<?php endforeach; ?>
    </table>
</body>
</html>

