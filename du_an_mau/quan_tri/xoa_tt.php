<?php
require_once("ketnoi.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $xoa="DELETE FROM `tt_cuahang` WHERE id=$id";
    $query=mysqli_query($new,$xoa);
    header("location:quantri.php?page=tt_cuahang");
}

?>