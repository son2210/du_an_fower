<?php
session_start();
  session_destroy();
  
    // setcookie("user",$_POST['name'],time()-300);
    // setcookie("pass",$_POST['pass'],time()-300);
    header("location:index.php");
?>