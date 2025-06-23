<?php
include_once("../../cek-login.php");
require_once('../../koneksi.php');
require_once('validate.inc');

$select_barang = "SELECT * FROM barang";
$result_barang = mysqli_query($conn, $select_barang);
$barang_data = [];
while ($row = mysqli_fetch_assoc($result_barang)) {
    $barang_data[] = $row;
}

$select_transaksi = "SELECT transaksi.id, pelanggan.nama FROM transaksi, pelanggan WHERE transaksi.pelanggan_id = pelanggan.id";
$result_transaksi = mysqli_query($conn, $select_transaksi);

if (isset($_GET['transaksi_id'])) {
    $transaksi_id = $_GET['transaksi_id'];
}

if (isset($_POST["submit"])) {
    $error = [];
    $transaksi = isset($_POST['transaksi']) ? $_POST['transaksi'] : '';
    $barang_list = isset($_POST['barang']) ? $_POST['barang'] : [];
    $qty_list = isset($_POST['qty']) ? $_POST['qty'] : [];

    foreach ($barang_list as $index => $barang) {
        $qty = isset($qty_list[$index]) ? $qty_list[$index] : '';

        if (!$barang || !$transaksi || !$qty) {
            $error[] = 'Semua field harus diisi';
            continue;
        }

        $detailtransaksi = "SELECT * FROM transaksi_detail WHERE transaksi_id = $transaksi AND barang_id = $barang";
        $result_detailtransaksi = mysqli_query($conn, $detailtransaksi);
        if (mysqli_num_rows($result_detailtransaksi) > 0) {
            echo "<script>alert('Barang ini sudah ada dalam detail transaksi');</script>";
        } else {
            $barang_id = "SELECT * FROM barang WHERE id = $barang";
            $harga = mysqli_query($conn, $barang_id);
            $value = mysqli_fetch_assoc($harga);
            $hasil = intval($value['harga']) * intval($qty);
            $hasill = $value['harga'];
            $avaible = $value['stok']-$qty;
            if($value['stok']>0 && $avaible >0){
            $insert = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty, sub_total) VALUES ($transaksi, $barang, $hasill, $qty, $hasil)";
            if (mysqli_query($conn, $insert)) {
                $update = "UPDATE transaksi SET total = total + $hasil WHERE id = $transaksi";
                $stok = "UPDATE barang SET stok = stok - $qty WHERE id = $barang";
                mysqli_query($conn, $update);
                mysqli_query($conn, $stok);
                echo "<script>alert('Data transaksi detail berhasil ditambahkan');</script><br>";
            }
        }else{
            echo "<script>alert('Maaf stok ".$value['nama_barang']." tersisa ".$value['stok']."');</script><br>";
        }
        }
    }

    if (!empty($error)) {
        $errorr = implode("\\n", $error);
        echo "<script>alert('$errorr');</script><br>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SISTEM PENJUALAN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        form {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
        }

        #formContainer {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 0 1 calc(33.33% - 20px);
            box-sizing: border-box;
            padding: 25px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        select, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .form-group {
                flex: 0 1 calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .form-group {
                flex: 0 1 100%;
            }
        }
    </style>
    <script>
    let formCount = 1;
    const barangData = <?php echo json_encode($barang_data); ?>;

    function addForm() {
        const formContainer = document.getElementById('formContainer');
        const newFormDiv = document.createElement('div');
        newFormDiv.classList.add('form-group');
        newFormDiv.setAttribute('id', 'form_' + formCount);

        const selectedBarang = Array.from(document.querySelectorAll('select[name="barang[]"]'))
            .map(select => select.value);

        newFormDiv.innerHTML = `
            <label for="barang_${formCount}">Pilih Barang</label><br>
            <select name="barang[]" id="barang_${formCount}">
                <option value="">Pilih barang</option>
                ${barangData
                    .filter(barang => !selectedBarang.includes(barang.id.toString()))
                    .map(barang => `<option value="${barang.id}">${barang.nama_barang}</option>`)
                    .join('')}
            </select><br><br>

            <label for="qty_${formCount}">Quantity</label>
            <input type="number" name="qty[]" id="qty_${formCount}" placeholder="Masukkan jumlah barang"><br><br>

            <button type="button" onclick="removeForm(${formCount})">Hapus Form</button>
        `;
        formContainer.appendChild(newFormDiv);
        formCount++;
    }

    function removeForm(formId) {
        const formDiv = document.getElementById('form_' + formId);
        formDiv.remove();
    }
</script>

</head>
<body>
    

    <form action="" method="post">
        <?php if(!isset($_GET['transaksi_id'])):?>
        <div class="form-group">
            <label for="transaksi_0">Nama Pelanggan</label>
            <select name="transaksi" id="transaksi_0">
                <option value="">Pilih Pelanggan</option>
                <?php while ($row = mysqli_fetch_assoc($result_transaksi)): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <?php else:?>
        <input type="hidden" name="transaksi" id="transaksi_0" value="<?=$_GET['transaksi_id']?>">
        <?php endif ?>
        <div id="formContainer">
            <div class="form-group">
                <label for="barang_0">Pilih Barang</label>
                <select name="barang[]" id="barang_0">
                    <option value="">Pilih barang</option>
                    <?php foreach ($barang_data as $row): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama_barang'] ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="qty_0">Quantity</label>
                <input type="number" name="qty[]" id="qty_0" placeholder="Masukkan jumlah barang">
            </div>
        </div>
        <button type="button" onclick="addForm()">Tambah Form</button>
        <button type="submit" name="submit" value="true">Tambah Detail Transaksi</button>
    </form>
    <a href="index.php" class="btn-back">Kembali</a>
</body>
</html>
