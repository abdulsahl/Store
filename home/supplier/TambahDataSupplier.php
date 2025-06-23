<?php
include_once("../../cek-login.php");
include_once("../../cek-admin.php");
require_once('../../koneksi.php');
require_once('validate.inc');
$error = [];

if (isset($_POST["simpan"])) {
    validateNama($_POST, 'nama', $error);
    validateTelp($_POST, 'telp', $error);
    validateAlamat($_POST, 'alamat', $error);
    
    if (empty($error)) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO supplier (nama,telp,alamat) VALUES ('$nama',$telp,'$alamat')";
        mysqli_query($conn, $query);
        echo "<script>alert('Data supplier berhasil ditambahkan');</script><br>";
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
echo "<h2>Tambah Data Master Supplier Baru</h2>";
    require_once('form.inc')
?>
