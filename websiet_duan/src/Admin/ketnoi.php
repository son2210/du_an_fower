<?php
    $new=mysqli_connect("localhost","root","","websiet_duan");
    if($new){
        mysqli_query($new ,"SET NAMES 'utf8'");     
    }else{
        $result="thất bại !";
        mysqli_connect_errno($new);
    }
?>
