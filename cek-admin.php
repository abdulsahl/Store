<?php 
if(isset($_SESSION['level']) && $_SESSION['level']!==1){
    header("location: ../index.php");
    exit();
}?>