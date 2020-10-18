<?php
        require_once('./src/Admin/ketnoi.php');
        if(isset($_GET['id'])){
            $id=$_GET['id'];   
            echo $id;     
            $xoa="DELETE FROM information_store  where id='$id'";
            $query=mysqli_query($new,$xoa);
            header('location:./index.php?page=information_store');
        }
    

?>
