<?php
require_once("ketnoi.php");
if (isset($_POST['btn_them'])) {
    $name = $_POST['name'];
    $logo = $_FILES['logo']['name'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    if ($name == "" || $logo == "" || $diachi == "" || $email == "" || $sdt == "") {
        $result = " không dc để trống !";
    } else {
        $file_name = $_FILES['logo']["name"];
        $flie_tmp = $_FILES['logo']["tmp_name"];
        move_uploaded_file($flie_tmp, "../upload_img/img_logo/" . $file_name);
        $them = "INSERT INTO `tt_cuahang`(`name`,`logo`, `diachi`, `email`, `phone`) VALUES ('$name','$logo','$diachi','$email','$sdt')";
        $query = mysqli_query($new, $them);
        if ($query) {
            header("location:quantri.php?page=tt_cuahang");
            echo "thành công !";
        } else {
            echo "thất bại !";
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
        form {
            margin-left: 150px;
            text-align: center;
        }

        .bca {
            text-align: center;
        }

        .box {
            display: grid;
            grid-template-columns: 35% 50%;
        }

        .box1 {
            text-align: right;
            margin-right: 20px;
        }

        .box2 {
            text-align: left;
        }

        .box2 input {
            width: 60%;
            border-radius: 10px;
            margin: 4px 0px;
        }

        .them {
            margin-left: -70px;
        }

        .them button {
            padding: 1px 10px;
            border-radius: 10px;
            background: #e7a511;
            color: white;
        }

        .them a {
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
        <h2>Thêm Thông Tin Cửa Hàng </h2>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="box">
            <div class="box1">
                <p> Name </p>
                <p> Logo </p>
                <p> Địa Chỉ </p>
                <p> Email </p>
                <p> Phone </p>
            </div>
            <div class="box2">
                <input type="text" name="name" id="">
                <input type="file" name="logo">
                <input type="text" name="diachi">
                <input type="email" name="email" id="">
                <input type="number" name="sdt">
            </div>
        </div>
        <div class="them">
            <button name="btn_them"> Thêm </button>
            <a href="quantri.php?page=tt_cuahang"> Quay lại </a>
        </div>

    </form>
    <?php
    global $result;
    echo $result;
    ?>
</body>

</html>