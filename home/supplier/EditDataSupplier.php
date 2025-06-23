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
            $id = $_POST['id'];

            $query = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id = $id";
            mysqli_query($conn, $query);
            echo "<script>alert('Data supplier berhasil diedit');</script><br>";
            header("refresh:0; url=index.php");
            exit();
        } else {
            $errorr = implode("\\n", $error);
            echo "<script>alert('$errorr');</script><br>";
        }
    } elseif (isset($_POST["batal"])) {
        header("location: index.php");
        exit();
    }
    echo "<h2>Edit Data Master Supplier</h2>";

    
    require_once('form.inc');
?>
