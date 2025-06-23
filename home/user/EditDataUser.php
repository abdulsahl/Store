<?php
include_once("../../cek-login.php");
    if(isset($_POST['simpan'])){
        require_once("validate.inc");
        $error=[];
        ValidateRequired($_POST,'username',$error);
        ValidateRequired($_POST,'nama',$error);
        ValidateRequired($_POST,'alamat',$error);
        Validatehp($_POST,'hp',$error);
        ValidateRequired($_POST,'level',$error);
        if(empty($error)){
            require_once("../../koneksi.php");
            $id = $_POST['id'];
            $username = $_POST['username'];
            $query = mysqli_query($conn,"SELECT * FROM user WHERE id_user =$id");
            $result = mysqli_fetch_assoc($query);
            if(empty($_POST['password'])){
                $password = $result['password'];
            }else{
                $password = md5($_POST['password']);
            }
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $hp = $_POST['hp'];
            $level = $_POST['level'];
            mysqli_query($conn,"UPDATE user SET username='$username',password='$password',nama='$nama',alamat='$alamat',hp=$hp,level=$level WHERE id_user= $id ");
            echo "<script>alert('Data User berhasil di Update')</script>";
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

echo"<h2>Edit Data User</h2>";
include "form.inc"
?>