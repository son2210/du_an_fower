<?php
    $duan_mau=mysqli_connect("localhost", "root","","duan_mau");
    if($duan_mau){
      
        mysqli_query($duan_mau ,"SET NAMES 'utf8'");
    }else{
        echo "kết nối thất bại "; mysqli_connect_errno($duan_mau);
    }

?>