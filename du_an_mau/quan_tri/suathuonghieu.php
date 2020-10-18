<?php
require_once('ketnoi.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $lay = "SELECT * FROM sanpham where id=$id";
    $quey = mysqli_query($new, $lay);
    $row = mysqli_fetch_assoc($quey);
    if (isset($_POST['btn_sua'])) {
        $name = $_POST['name_th'];
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $capnhat = "UPDATE `sanpham` SET `thuong_hieu_sp`='$name' WHERE id=$id";
        $bien = mysqli_query($new, $capnhat);
        if ($bien) {
            header("location:quantri.php?page=thuonghieu");
        } else {
            $result = 'thất bại !';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }
        .capnhat{
           
            margin-top: 10px;
            margin-bottom: 50px;
        }
        .capnhat button{
            padding: 3px 10px;
            border-radius: 10px;
            background: #e7a511;
            color: white;
            border:none;
            outline: none;
        }
        .capnhat a {
            color: white;
            background: #fc1105;
            padding: 4px 4px;
            border-radius: 10px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="bca">
        <h2> Cập Nhật Thương hiệu </h2>
        <?php global $result;
        echo $result; ?>
    </div>
    <form action="" method="post">
        <p>Name Thương Hiệu <input type="text" name="name_th" value="<?= $row['thuong_hieu_sp'] ?>"></p>
        <div class="capnhat">
            <button name="btn_sua"> cập nhật </button>
            <a href="quantri.php?page=thuonghieu"> Quay Lại </a>
        </div>


    </form>
</body>

</html>