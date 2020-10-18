<?php
    require_once ("../quan_tri/ketnoi.php");
    $select="SELECT * FROM sanpham inner join chi_tiet_sp on sanpham.id=chi_tiet_sp.ma_sp where loai_nuoc_hoa='nam' order by chi_tiet_sp.id DESC ";
    $query=mysqli_query($new,$select);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
 

    
  <div class="container">
    <div class="abc">
    <?php while($row=mysqli_fetch_assoc($query)){ ?>
        <div class="box1">
            <a href="sanpham.php?id=<?=$row['id']?>"> <img src="../upload_img/img_sanpham/<?=$row['img_sp']?>" alt=""></a>
            <a href="sanpham.php">
                <h4><?=$row['ten_sp']?> </h4>
            </a>
            <a href="sanpham.php?id=<?=$row['id']?>"> <label for=""><?=$row['price_old']?></label></a>
            <a href="sanpham.php?id=<?=$row['id']?>">
                <p><?=number_format($row['price_15ML'],0,",",".")?>đ ~<?=number_format($row['price_150ML'],0,",",".")?>đ </p>
            </a>
        </div>
        <?php  }?>
        <!-- box 1 -->
     
   
    </div>
 
    
</div>

  
</body>
</html>