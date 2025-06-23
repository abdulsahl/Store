<?php
if(isset($_POST['hapus'])){
        require_once("../../koneksi.php");
        $id = $_POST['id'];
        mysqli_query($conn,"DELETE FROM user WHERE id_user = $id ");
        echo "<script>alert('Data User berhasil dihapus)</script>";
        header("refresh:0;url=index.php");
        exit();
    }
?>
