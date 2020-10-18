<?php
    require_once('ketnoi.php');
    $abc="SELECT * FROM tt_cuahang";
    $quey=mysqli_query($new,$abc);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
        }
        table{
            width: 100%;
            text-align: center;
        }
        .id{
            width: 3%;
        }
        .logo{
            width: 20%;
        }
        .email{
            width: 15%;
        }
        .phone{
            width: 10%;
        }
        .logo img{
            width: 100px;
        }
        .bca{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="bca">
    <h1>Thông Tin Cửa Hàng </h1>
    <h5><a href="?page=them_ttch"> Thêm </a></h5>
    </div>
   
    <table border="1">
    <tr>
        <td class="id">id</td>
        <td class="phone">name</td>
        <td class="logo">logo</td>
        <td class="logo"> Địa Chỉ </td>
        <td class="email">Email </td>
        <td class="phone"> Phone</td>
        <td class="id">xóa</td>
        <td class="id">sửa </td>
    </tr>
    <?php while($row=mysqli_fetch_assoc($quey)){   ?>
        <tr>
        <td class="id"><?=$row['id']?></td>
        <td class="id"><?=$row['name']?></td>
        <td class="logo"><img src="../upload_img/img_logo/<?=$row['logo']?>" alt=""></td>
        <td class="phone"><?=$row['diachi']?></td>
        <td class="logo"> <?=$row['email']?> </td>
        <td class="email"><?=$row['phone']?> </td>
      
        <td class="id"><a href="xoa_tt.php?id=<?=$row['id']?>"> xóa</a></td>
        <td class="id"><a href="sua_tt_cuahang.php?id=<?=$row['id']?>"> sửa</a></td>
       
    </tr>
    <?php }?>
    </table>
</body>
</html>