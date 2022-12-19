<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] != null){
    unset($_SESSION['username']);
    echo'Bạn đã đăng xuất thành công';
     header('location: trangchu.php');

}
?>