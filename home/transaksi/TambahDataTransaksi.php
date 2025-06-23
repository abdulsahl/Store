<?php
include_once("../../cek-login.php");
require_once('../../koneksi.php');
require_once('validate.inc');
$select ="SELECT * FROM pelanggan";
$result = mysqli_query($conn,$select);

if(isset($_POST["submit"])){
    $error=[];
    validateTanggal($_POST,'waktu',$error);
    validateKeterangan($_POST,'keterangan',$error);
    validateRequired($_POST,'pelanggan',$error);

    if(empty($error)){
        $waktu = $_POST['waktu'];
        $keterangan = $_POST['keterangan'];
        $total = $_POST['total'];
        $pelanggan = $_POST['pelanggan'];
        $insert ="INSERT INTO transaksi (waktu_transaksi,keterangan,total,pelanggan_id) VALUES ('$waktu','$keterangan',$total,$pelanggan)";
        mysqli_query($conn, $insert);
        $transaksi_id = mysqli_insert_id($conn);
        echo "<script>alert('Data trasaksi berhasil ditambahkan');</script>";
        header("refresh:0; url=TambahDataDetailTransaksi.php?transaksi_id=$transaksi_id");
        exit();
    }else {
        $errorr = implode("\\n",$error);
        echo "<script>alert('$errorr');</script><br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM PENJUALAN</title>
    <style>
        form {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 50px auto;
    font-family: Arial, sans-serif;
}

h2 {
    text-align: center;
    color: #222;
    font-size: 26px;
    margin-bottom: 20px;
}

label {
    font-size: 15px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
    display: block;
}

input[type="text"], input[type="email"], input[type="tel"], input[type="date"], input[type="number"], textarea, select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    font-size: 15px;
    color: #333;
    transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

input:focus, textarea:focus, select:focus {
    border-color: #007bff;
    box-shadow: 0 0 6px rgba(0, 123, 255, 0.5);
    outline: none;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

button:hover {
    background-color: #0056b3;
}

.error {
    color: red;
    font-size: 14px;
    margin-bottom: 15px;
    display: block;
}

option {
    font-size: 15px;
    color: #333;
    padding: 5px;
}

option:checked {
    background-color: #007bff;
    color: white;
}

    </style>
</head>
<body>
    <h2>Tambah Data Transaksi</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="waktu">Waktu Transaksi</label></td>
                    <td><input type="date" id="waktu" name="waktu" value="<?=isset($_POST['waktu']) ? htmlspecialchars($_POST['waktu']) : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="keterangan">Keterangan</label></td>
                    <td><textarea name="keterangan" id="keterangan"><?=isset($_POST['keterangan']) ? htmlspecialchars($_POST['keterangan']) : ''; ?></textarea><br><br></td>
                </tr>
                <tr>
                    <td><label for="total">Total</label></td>
                    <td><input type="number" name="total"  value="<?=isset($_POST['total']) ? htmlspecialchars($_POST['total']) : '0'; ?>"></td>
                </tr>
                <tr>
                    <td><label for="pelanggan">Pelanggan</label></td>
                    <td><select name="pelanggan" id="pelanggan">
                <option value="">Pilih Pelanggan</option>
                <?php foreach ($result as $row):?>
                    <option  value="<?=$row['id']?>" <?= isset($_POST['pelanggan']) && $_POST['pelanggan'] == $row['id'] ? 'selected' : ''; ?>><?=$row['nama']?></option>
                    <?php endforeach; ?>
            </select></td>
                </tr>

            </table>
            
            
            
            
            
            
            
            
            <button type="submit" name="submit">Tambah Transaksi</button>
        </form>
        <a href="index.php"><button>kembali</button></a>
</body>
</html>