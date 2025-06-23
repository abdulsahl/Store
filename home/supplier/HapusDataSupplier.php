<?php
    require_once('../../koneksi.php');

    if(isset($_POST['hapus'])){
        $id = $_POST['id'];
        $barang = "SELECT * FROM barang WHERE supplier_id = $id";
        $result = mysqli_query($conn,$barang);
        if(mysqli_num_rows($result)>0){
            echo "<script>alert('Maaf terdapat barang yang mengambil supplier ini');</script>";
            header("refresh:0; url=index.php");
            exit();
        }else{
        $query = "DELETE FROM supplier WHERE id= $id";
        mysqli_query($conn,$query);
        echo "<script>alert('Data supplier berhasil dihapus');</script><br>";
        header("refresh:0; url=index.php");
        exit();
        }
    }
?>