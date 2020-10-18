<?php
    require_once('ketnoi.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        echo $id;
        $xoa="DELETE from slide_home where id=$id";
        $query=mysqli_query($new,$xoa);
        header("location:quantri.php?page=slide_home");
    }

?>