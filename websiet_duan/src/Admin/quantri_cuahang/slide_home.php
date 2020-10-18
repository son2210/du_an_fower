<?php
$slide = "SELECT * FROM slide_home ";
$query = mysqli_query($new, $slide);


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
        }

        table {
            width: 60%;
            text-align: center;
            margin-left: 300px;
        }

        #id {
            width: 3%;
        }

        #name {
            width: 25%;
        }

        #img {
            width: 50%;
        }

        #img img {
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
            text-decoration: none;
        }

        button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="abc">
        <h2> Slie Home </h2>
        <a href="./index.php?page=them_slide"> Thêm Slide</a>
    </div>
    <table border="1">
        <tr>
            <td id="id">ID</td>
            <td id="name">Name </td>
            <td id="img">Image</td>
            <td id="setting">Setting </td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td id="id"><?= $row['id'] ?></td>
                <td id="name"><?= $row['name'] ?> </td>
                <td id="img"><img src="./src/public/upload_img/img_store/<?= $row['img'] ?>" alt=""></td>
                <td id="setting">
                    <button> <a onclick="return confirm('bạn có muốn xóa ') " href="./index.php?page=delete_slide&id=<?= $row['id'] ?>"> Delete</a></button>
                    <button> <a href="./index.php?page=update_slide&id=<?= $row['id'] ?>"> Update </a></button>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>