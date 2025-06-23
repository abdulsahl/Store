<?php
require_once("../../koneksi.php");
if (isset($_POST["hapus"])) {
    $id = $_POST['id'];
    $select ="SELECT * FROM transaksi_detail WHERE transaksi_id=$id";
    $result = mysqli_query($conn, $select);
    if(!mysqli_num_rows($result) > 0) {
        $delete = "DELETE FROM transaksi WHERE id=$id";
        mysqli_query($conn, $delete);
        echo "<script>alert('Transaksi berhasil dihapus');</script><br>";
            header("refresh:0; url=index.php");
            exit();
    }else{
        echo "<script>alert('Transaksi tidak bisa dihapus karena digunakan dalam transaksi detail');</script><br>";
            header("refresh:0; url=index.php");
            exit();
    }
}
?>