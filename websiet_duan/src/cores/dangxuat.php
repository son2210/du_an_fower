<?php
    // require_once ("./src/Admin/ketnoi.php");
    session_start();
    session_destroy();
    header('location: ./index.php?page=dangnhap');

?>