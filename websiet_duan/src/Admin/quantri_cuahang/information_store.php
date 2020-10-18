<?php 
    $information="SELECT * FROM information_store";
    $query=mysqli_query($new,$information);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .abc {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            text-align: center;
            width: 100%;
        }
        .id{
            width: 3%;
        }
        #name{
            width: 15%;
        }
        .email{
            width: 20%;
        }
        .phone{
            width: 10%;
        }
        .logo{
            width: 30%;
        }
        .logo img{
            width: 30%;
            
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
            /* text-decoration: none; */
        }

        button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="abc">
        <h2> Thông Tin Cửa Hàng</h2>
        <a href="./index.php?page=them_information"> Thêm </a>
    </div>
    <table border="1">
        <tr>
            <td class="id">ID</td>
            <td id="name"> Name  </td>
            <td class="logo">Logo</td>
            <td class="email">Email </td>
            <td class="phone" >Phone </td>
            <td class="phone" >Address </td>
            <td class="setting"> Setting</td>
        </tr>
        <?php while($row=mysqli_fetch_assoc($query)) { ?>
            <tr>
            <td class="id"><?=$row['id']?></td>
            <td id="name"><?=$row['name']?>   </td>
            <td class="logo"><img src="./src/public/upload_img/img_store/<?=$row['logo']?>" alt=""></td>
            <td class="email"><?=$row['email']?> </td>
            <td class="phone" ><?=$row['phone']?> </td>
            <td class="phone" ><?=$row['diachi']?> </td>
            <td class="setting"> 
                     <button> <a href="./index.php?page=delete_information&id=<?=$row['id']?>"> Delete</a></button>
                    <button> <a href="./index.php?page=update_information&id=<?=$row['id']?>"> Update </a></button>
            </td>
        </tr>
        <?php }?>
    </table>
 
</body>

</html>