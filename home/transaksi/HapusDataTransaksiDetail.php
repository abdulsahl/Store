<?php
require_once("../../koneksi.php");
if (isset($_POST["hapus"])) {
    $idtr = $_POST['idtr'];
    $idbr = $_POST['idbr'];
    $harga = $_POST['harga'];
        $delete = "DELETE FROM transaksi_detail WHERE transaksi_id=$idtr AND barang_id =$idbr";
        $update ="UPDATE transaksi SET total = total - $harga WHERE id=$idtr";
        mysqli_query($conn, $update);
        mysqli_query($conn, $delete);
        echo "<script>alert('Transaksi detail berhasil dihapus');</script><br>";
            header("refresh:0; url=index.php");
            exit();
    
}
?>