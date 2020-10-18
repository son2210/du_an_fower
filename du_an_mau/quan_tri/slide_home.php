<?php
    require_once('ketnoi.php');
    $abc="SELECT * FROM slide_home";
    $them=mysqli_query($new,$abc);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin-left: 10%;
            width: 80%;
            text-align: center;
        }
        .img img{
            width: 30%;
        }
        .id{
            width: 10%;
        }
        .img{
            width: 50%;
        }
        .name{
            width: 30%;
        }
        .bca{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="bca">
    <h2>Slide ảnh </h2> 
    <a href="?page=them_slide_home"> Thêm Slide </a>
    </div>

   
    <table border="1">
        <tr>
            <td class="id">ID</td>
            <td class="img">img_slide</td>
            <td class="name" >name_slide</td>
            <td>Acouni</td>
        </tr>
        <?php while($row=mysqli_fetch_assoc($them)){?>
            <tr>
            <td><?=$row['id']?></td>
            <td class="img"><img src="../upload_img/img_slide_home/<?=$row['img_slide']?>" alt=""></td>
            <td><?=$row['name_slide']?></td>
            <td>
                <button> <a href="xoa_slide.php?id=<?=$row['id']?>"> xóa </a> </button>
                <button> <a href="sua_slide.php?id=<?=$row['id']?>"> sửa </a> </button>
                 
            </td>
        </tr>
        <?php } ?>
    
    </table>
</body>
</html>