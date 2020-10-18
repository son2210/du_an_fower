<?php
        require_once('ketnoi.php');
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $xoa="DELETE FROM `taikhoan` WHERE id=$id";
            $query=mysqli_query($duan_mau,$xoa);
            header('location:quantri.php?page=taikhoan');
        }
?>