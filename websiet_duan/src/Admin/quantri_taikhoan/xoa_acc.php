<?php
    require_once('./src/Admin/ketnoi.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $xoa="DELETE FROM admin  where id='$id'";
        $query=mysqli_query($new,$xoa);
        header('location:./index.php?page=all_account');
    }

