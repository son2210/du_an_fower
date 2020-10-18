<?php
require_once ('ketnoi.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
      
        $xoatk="DELETE FROM taikhoan where id =$id";
        $query=mysqli_query($new,$xoatk);
        header("location:quantri.php?page=taikhoan");
    }
?>