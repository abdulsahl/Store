<?php
include_once("../../cek-admin.php");
include_once("../../cek-login.php");
require_once('../../koneksi.php');
require_once('validate.inc');
$error = [];

if (isset($_POST["simpan"])) {
    validateKode($_POST, 'kode', $error);
    validateNama($_POST, 'nama', $error);
    validateNumeric($_POST, 'harga', $error);
    validateNumeric($_POST, 'stok', $error);
    validateRequired($_POST, 'supplier', $error);
    
    if (empty($error)) {
        $id = $_POST['id'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $supplier = $_POST['supplier'];

        $query = "UPDATE barang SET kode_barang='$kode',nama_barang='$nama',harga=$harga,stok=$stok,supplier_id=$supplier WHERE id=$id";
        mysqli_query($conn, $query);
        echo "<script>alert('Data barang berhasil diupdate');</script><br>";
        header("refresh:0; url=index.php");
        exit();
    } else {
        $errorr = implode("\\n",$error);
        echo "<script>alert('$errorr');</script><br>";
    }
}elseif (isset($_POST["batal"])) {
    header("location: index.php");
    exit();
}
$result = mysqli_query($conn,"SELECT * FROM barang JOIN supplier ON barang.supplier_id=supplier.id");
echo "<h2>Tambah Data Master Barang Baru</h2>";
    require_once('form.inc')
?>

