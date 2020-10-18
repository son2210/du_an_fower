<?php
    require_once('ketnoi.php');
    $sanpham="SELECT * FROM sanpham inner join chi_tiet_sp on sanpham.id=chi_tiet_sp.ma_sp";
    $query =mysqli_query($new,$sanpham);
 $i=0;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bca{
            text-align: center;
        }
         table{
            width: 99%;
            text-align: center;
            margin: 0px 10px 0px 10px;
        }
        #id{
            width: 1.8%;
            max-width: 1.8%;
        }
        #img{
            width: 20%;
        }
        #img img{
            width:  100px;
            height: 100px;
        }
        #name{
            width: 13%;
            max-width: 13%;
        }
        #thuong_hieu{
            width: 12%;
            max-width: 10%;
        }
    </style>
</head>
<body>
    <div class="bca">
    <h3>Sản Phẩm </h3>
        <h4><a href="?page=themsanpham"> Thêm Sản Phẩm </a></h4>
    </div>

    <table border="1" >
        <tr>
            <td id="id" >ID</td>
            <td id="name">name_SP</td>
            <td id="img">img_sp</td>
            <td id="thuong_hieu">Thương  Hiệu </td>
            <td id="thuong_hieu">price bé nhất </td>
            <td id="thuong_hieu">price lớn nhất </td>
            <td id="thuong_hieu">Price_old</td>
            <td id="id">Loại </td>
            <td> Chi Tiết  </td>
            <td> Xóa Sp</td>
        </tr>
        <?php while($row=mysqli_fetch_assoc($query)){  ?>
           
            <tr>
            <td id="id"><?php echo $i++;?></td>
            <td id="name"><?=$row['ten_sp']?></td>
            <td id="img">  <img src="../upload_img/img_sanpham/<?=$row['img_sp']?>" alt=""> </td>
            <td id="thuong_hieu"><?=$row['thuong_hieu_sp']?> </td>
            <td id="thuong_hieu"><?=$row['price_15ML']?></td>
            <td id="thuong_hieu"><?=$row['price_150ML']?></td>
            <td id="thuong_hieu"><?=$row['price_old']?></td>
            <td id="id"><?=$row['loai_nuoc_hoa']?></td>            
            <td> <a href="suasp.php?id=<?=$row['id']?>"> sửa sp</a> </td>
            <td> <a href="xoasp.php?id=<?=$row['id']?>"> xóa sp</a> </td>
           
        </tr>
        <?php } ?>
    </table>
</body>
</html>