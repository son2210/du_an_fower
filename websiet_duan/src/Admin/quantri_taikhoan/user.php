<?php


$account = "SELECT * FROM admin";
$query = mysqli_query($new, $account);
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
            margin: 15px 0px;
        }

        table {
            text-align: center;
            width: 100%;
        }

        td {
            padding: 5px 3px;
        }

        .user_id {
            width: 2%;
        }

        .user_name {
            width: 15%;
        }

        .user_email {
            width: 20%;
        }

        .user_password {
            width: 13%;
        }

        .user_address {
            width: 20%;
        }

        button {
            border-radius: 8px;
            padding: 2px;
            background-color: red;
            outline: none;
            border: none;
        }
        button a:hover{
           color: white;
            text-decoration: none;
        }
        button a{
            color: white;
            text-decoration: none;
        }   
        
        
    </style>
</head>

<body>
    <div class="abc">
        <h1> Tài Khoản </h1>
        <a href="index.php?page=them_acc"> Thêm Tài Khoản </a>
    </div>
    <table border="1">
        <tr>
            <td class="user_id">ID</td>
            <td class="user_name">Name</td>
            <td class="user_email">Email</td>
            <td class="user_password">password</td>
            <td class="user_password">Phone</td>
            <td class="user_address">Address</td>
            <td class="user_id">Level</td>
            <td class="user_paswrod"> Setting</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td class="user_id"><?= $row['id'] ?></td>
                <td class="user_name"><?= $row['name'] ?></td>
                <td class="user_email"><?= $row['email'] ?></td>
                <td class="user_password"><?= $row['password'] ?></td>
                <td class="user_password"><?= $row['phone'] ?></td>
                <td class="user_address"><?= $row['diachi'] ?></td>
                <td class="user_id"><?= $row['level'] ?></td>
                <td class="user_paswrod">
                    <button><a onclick="return confirm('bạn có muốn xóa ')" href="index.php?page=xoa_acc&id=<?= $row['id'] ?>"> Xóa </a></button>
                    <button><a href="index.php?page=sua_acc&id=<?= $row['id'] ?>"> Cập Nhật </a></button>

                </td>
            </tr>

        <?php } ?>
    </table>
</body>

</html>