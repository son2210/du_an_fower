<?php
$select = "SELECT * FROM trademark";
$data = mysqli_query($new, $select);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          .sub_menu{
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
        .sub_menu a{
            color: white;
            font-size: 20px;
        }
        .sub_menu a:hover{
            text-decoration: none;
        }
        table {
            width: 80%;
            text-align: center;
            margin-left: 180px;
        }

        .abc {
            text-align: center;
            margin: 15px;
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

        .trademark_id {
            width: 5%;
        }

        .trademark_name {
            width: 25%;
        }

        .trademark_image {
            width: 50%;
        }

        .trademark_image img {
            width: 30%;
        }
    </style>

</head>

<body>
<nav>
      <ul class="sub_menu">
          <li><a href="./index.php?page=all_product"> Sản Phẩm  </a></li>         
      </ul>
  </nav>
    <div class="abc">
        <h1> Trademark </h1>
        <a href="index.php?page=them_trademark"> Thêm Trademark</a>
    </div>
    <table border="1">
        <tr>
            <td class="trademark_id">ID</td>
            <td class="trademark_name">Name</td>
            <td class="trademark_image">Image</td>
            <td class="trademark_name">Setting </td>
        </tr>
        <tr>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <td  class="trademark_id"><?=$row['id_trademark']?></td>
                <td  class="trademark_name" ><?=$row['name_trademark']?></td>
                <td class="trademark_image"><img src="./src/public/upload_img/img_trademark/<?=$row['image_trademark']?>" alt=""></td>
                <td class="trademark_name">
                    <button><a href="./index.php?page=delete_trademark&id=<?=$row['id_trademark']?>"> Xóa </a></button>
                    <button><a href="./index.php?page=update_trademark&id=<?=$row['id_trademark']?>"> Cập Nhật </a></button>
                </td>
        </tr>
    <?php } ?>
    </table>
</body>

</html>