<?php
require_once("ketnoi.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
  
 $xoa="DELETE FROM `sanpham` WHERE id=$id";
 $query=mysqli_query($new,$xoa);

   header("location:quantri.php?page=thuonghieu");
}

?>