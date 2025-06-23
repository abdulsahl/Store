<?php
include_once("../../cek-login.php");
include_once("../../cek-admin.php");
require_once("../../koneksi.php");
$result = mysqli_query($conn,"SELECT * FROM user");
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
    <a href="TambahDataUser.php"><button>Tambah User</button></a>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Level</th>
            <th>Tindakan</th>
        </tr>
        <?php foreach($result as $i => $row):?>
            <tr>
                <td><?=$i+1?></td>
                <td><?=htmlspecialchars($row['username'])?></td>
                <td><?=htmlspecialchars($row['nama'])?></td>
                <td><?=htmlspecialchars($row['level']== "1" ? "Owner" : "Kasir")?></td>
                <td>
                    <form action="EditDataUser.php" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?=$row['id_user']?>">
                        <input type="hidden" name="username" value="<?=$row['username']?>">
                        <input type="hidden" name="nama" value="<?=$row['nama']?>">
                        <input type="hidden" name="alamat" value="<?=$row['alamat']?>">
                        <input type="hidden" name="hp" value="<?=$row['hp']?>">
                        <input type="hidden" name="level" value="<?=$row['level']?>">
                        <button type="submit" name="edit" >Edit</button>
                    </form>
                    <form action="HapusDataUser.php" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?=$row['id_user']?>">
                        <button type="submit" name="hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach?>
    </table>
</body>
</html>


