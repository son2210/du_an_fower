<?php 
require_once('./src/Admin/ketnoi.php');
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    //  select comnet
    $sql=" SELECT coment.id_coment,admin.name,product.image,product.name,coment.text_coment, coment.time_coment,product.id FROM ((coment 
        inner join admin on coment.id_account =admin.id)
         inner join product on coment.id_procduct = product.id ) where coment.id_coment=$id
      ";
      $query=mysqli_query($new,$sql);
      $data=mysqli_fetch_all($query);
    //  mảng $data 
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
     foreach($data as $key=> $abc){
         if($abc[1] != $user['name']){
             $thongbao=" bạn k thể xóa !";
         }else{
             $delete_coment="DELETE FROM coment where id_coment=$id";
             $query_coment=mysqli_query($new,$delete_coment);
             header("location:index.php?page=sanpham&id=$abc[6]");
         }
     }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
    <?php
        global $thongbao; echo  $thongbao;
    ?>
</body>
</html>