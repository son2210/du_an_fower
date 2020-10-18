<?php
$sanpham = "SELECT * FROM product inner join trademark on  product.ma_sp=trademark.id_trademark ORDER by id DESC";
$query = mysqli_query($new, $sanpham);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sub_menu {
            list-style: none;
            background: red;
            width: 10%;
            height: 30px;
            border-radius: 10px;
            box-shadow: 1px 1px 5px black;
            text-align: center;
            margin-top: 2px;
            padding: 0px;
        }

        .sub_menu a {
            color: white;
            font-size: 20px;
        }

        .sub_menu a:hover {
            text-decoration: none;
        }

        .abc {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 99%;
            text-align: center;
            margin: 0px 10px 0px 10px;
        }

        #id {
            width: 2.8%;
            max-width: 2.8%;
        }

        #img {
            width: 20%;
        }

        #img img {
            width: 100px;
            height: 100px;
        }

        #name {
            width: 13%;
            max-width: 13%;
        }

        #thuong_hieu {
            width: 12%;
            max-width: 10%;
        }
        button {
            border-radius: 8px;
            padding: 2px;
            background-color: red;
            outline: none;
            border: none;
        }

        button a:hover {
            color: white;
            text-decoration: none;
        }

        button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav>
        <ul class="sub_menu">
            <li><a href="./index.php?page=all_trademark"> Thương Hiệu </a></li>
        </ul>
    </nav>
    <div class="abc">
        <h2> Sản Phẩm </h2>
        <a href="./index.php?page=them_product"> Thêm Sản Phẩm </a>
    </div>
    <table border="1">
        <tr>
            <td id="id">ID</td>
            <td id="name">name_SP</td>
            <td id="img">img_sp</td>
            <td id="thuong_hieu">Thương Hiệu </td>
            <td id="thuong_hieu">price 15ml </td>
            <td id="thuong_hieu">price 150ml </td>
            <td id="thuong_hieu">Price_old</td>
            <td id="id">Loại </td>
            <td> Setting </td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td id="id"><?=$row['id']?></td>
                <td id="name"><?=$row['name']?></td>
                <td id="img"><img src="./src/public/upload_img/img_product/<?=$row['image']?>" alt=""></td>
                <td id="thuong_hieu"><?=$row['name_trademark']?> </td>
                <td id="thuong_hieu"><?=$row['price_15ml']?> </td>
                <td id="thuong_hieu"><?=$row['price_150ml']?>  </td>
                <td id="thuong_hieu"><?=$row['price_old']?> </td>
                <td id="id"><?=$row['gioitinh']?>  </td>
                <td> <button> <a href="./index.php?page=delete_product&id=<?=$row['id']?>"> Delete</a></button>
                    <button> <a href="./index.php?page=update_product&id=<?=$row['id']?>"> Update </a></button>
                </td>
            </tr>

        <?php } ?>
    </table>
</body>

</html>