<?php
require_once('./src/Admin/ketnoi.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];    
        echo  $id;
        $delete=" DELETE FROM coment where id_coment=$id ";
        $query=mysqli_query($new,$delete);
        header('location:index.php?page=all_coment&id=$id');
    }

?>