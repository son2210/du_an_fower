<?php
require_once ('ketnoi.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
      
        $xoasp="DELETE FROM chi_tiet_sp where id =$id";
        $query=mysqli_query($new,$xoasp);
        header("location:quantri.php?page=tatca");
    }
?>