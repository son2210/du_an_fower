<?php
require_once("ketnoi.php");
$taikhoan = "SELECT * FROM taikhoan";
$query = mysqli_query($new, $taikhoan);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bca {
            text-align: center;
        }
        table {
            width: 100%;
            text-align: center;
        }

        #id {
            width: 1.8%;
        }

        #name {
            width: 13%;
        }

        #pass {
            width: 10%;
        }

        #diachi {
            width: 20%;
            max-width: 20%;
        }

        #them {
            width: 5%;
        }
    </style>
</head>

<body>
    <div class="bca">
        <h2>Tài Khoản </h2>
        <p><a href="?page=dangky">Thêm Tài Khoản</a></p>
    </div>

    <table border="1">
        <tr>
            <td id="id">ID</td>
            <td id="name"> Tên khách Hàng </td>
            <td id="name"> email</td>
            <td id="pass"> password</td>
            <td id="pass">Số điện thoại </td>
            <td id="diachi">Địa Chỉ </td>
            <td id="id"> Lever </td>
            <td id="them">Sửa TK </td>
            <td id="them">Xóa Tk </td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td id="id"><?= $row['id'] ?> </td>
                <td id="name"> <?= $row['name'] ?> </td>
                <td id="name"><?= $row['email'] ?> </td>
                <td id="pass"> <?= $row['passwrod'] ?></td>
                <td id="pass"><?= $row['sdt'] ?> </td>
                <td id="diachi"><?= $row['diachi'] ?></td>

                <td id="id"><?= $row['lever'] ?></td>
                <td id="them"><a href="suatk.php?id=<?= $row['id'] ?>">Sửa Tk </a> </td>
                <td id="them"><a onclick="return confirm('bạn có muốn xóa')" href="xoatk.php?id=<?= $row['id'] ?>">Xóa Tk </a> </td>

            </tr>
        <?php } ?>
    </table>
</body>

</html>