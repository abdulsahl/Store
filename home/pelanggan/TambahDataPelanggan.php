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
    validateRequired($_POST, 'kelamin', $error);
    
    if (empty($error)) {
        $nama = $_POST['nama'];
        $kelamin = $_POST['kelamin'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO pelanggan (nama,jenis_kelamin,telp,alamat) VALUES ('$nama','$kelamin',$telp,'$alamat')";
        mysqli_query($conn, $query);
        echo "<script>alert('Data pelanggan berhasil ditambahkan');</script><br>";
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
echo "<h2>Tambah Data Master Pelanggan Baru</h2>";
    require_once('form.inc')
?>
