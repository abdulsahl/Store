<?php
include_once("../../cek-login.php");
include_once("../../cek-admin.php");
    if(isset($_POST['simpan'])){
        require_once("validate.inc");
        $error=[];
        ValidateRequired($_POST,'username',$error);
        ValidateRequired($_POST,'password',$error);
        ValidateRequired($_POST,'nama',$error);
        ValidateRequired($_POST,'alamat',$error);
        Validatehp($_POST,'hp',$error);
        ValidateRequired($_POST,'level',$error);
        if(empty($error)){
            require_once("../../koneksi.php");
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $hp = $_POST['hp'];
            $level = $_POST['level'];
            mysqli_query($conn,"INSERT INTO user (username,password,nama,alamat,hp,level) VALUES ('$username','$password','$nama','$alamat',$hp,$level) ");
            echo "<script>alert('Data User berhasil ditambahkan')</script>";
            header("refresh:0;url=index.php");
            exit();
        }else {
            $errorr = implode("\\n",$error);
            echo "<script>alert('$errorr');</script><br>";
        }
    }elseif(isset($_POST['batal'])){
        header("location:index.php");
        exit();
    }
echo"<h2>Tambah Data User</h2>";
include "form.inc"
?>
