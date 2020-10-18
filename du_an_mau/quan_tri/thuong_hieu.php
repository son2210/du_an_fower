<?php
require_once("ketnoi.php");
$danhmuc = "SELECT * FROM sanpham";
$abc = mysqli_query($new, $danhmuc);
$i=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 60%;
            text-align: center;
            margin-left: 300px;
        }
        #id{
            width: 3%;
        }
        #thuonghieu{
            width: 80%;
        }
        #icon a{
            background-color: #000000;
            color: wheat;
            border:  red 2px solid;
            border-radius: 5px;
            padding: 1px 5px;
            text-decoration: none;
        }
        #icon a:hover{
            background-color:  red;
        }
        .bca{
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="bca">
    <h1 > Thương Hiệu </h1>
    <a href="ehhhlo.php"> Thêm Thương Hiệu </a>
    </div>
    
    <table border="1">
        <tr>
            <td id="id">ID</td>
            <td id="thuonghieu">Thương Hiệu</td>
            <td> ACOUSIN</td>
            
        </tr>
        <?php while ($row = mysqli_fetch_assoc($abc)) { ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['thuong_hieu_sp']?></td>
                <td id="icon">
                 <a id="a" href="xoathuonghieu.php?id=<?=$row['id']?>">Xóa </a>
                 <a onclick="return confirm(bạn có muốn xóa!)" id="b" href="suathuonghieu.php?id=<?=$row['id']?>"> Sửa</a>
                </td>

            </tr>
        <?php } ?>
    </table>
</body>

</html>