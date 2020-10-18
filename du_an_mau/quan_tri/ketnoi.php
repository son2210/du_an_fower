<?php
    $new=mysqli_connect("localhost","root","","duan_mau");
    if($new){
        mysqli_query($new ,"SET NAMES 'utf8'");
        
    }else{
        $result="thất bại !";
        mysqli_connect_errno($new);
    }
?>
