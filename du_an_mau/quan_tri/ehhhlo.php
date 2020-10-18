<?php
    require_once('ketnoi.php');
    if(isset($_POST['btn_them'])){
        $name_th=$_POST['th'];
        if($name_th ==""){
            $result =" Hãy Nhập Đầy Đủ !";
        }else{
            $them="INSERT INTO `sanpham`( `thuong_hieu_sp`) VALUES ('$name_th')";
            $query=mysqli_query($new,$them);
            header("Location: quantri.php?page=thuonghieu");
        }
       
  
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thêm thương hiệu </title>
    <style>
        body{
            text-align:center;
        }
        .capnhat{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 50px;
        }
        .capnhat button{
            padding: 1px 10px;
            border-radius: 10px;
            background: #e7a511;
            color: white;
        }
        .capnhat a {
            color: white;
            background: #fc1105;
            padding: 4px 4px;
            border-radius: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
   <h1> Thêm Thương hiệu </h1>
   <?php global $result;  echo $result;?>
    <form action="" method="post">
        <p>Name Thương Hiệu  <input type="text" name="th"> </p>
        <div class="capnhat">
        <button type = "submit" name="btn_them">Thêm </button>
        <a href="quantri.php?page=thuonghieu"> Quay Lại </a>
        </div>
       
    </form>
</body>
</html>