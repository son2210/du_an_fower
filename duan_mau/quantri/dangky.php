<?php
// đăng ký tài khoản

require_once('ketnoi.php');
if (isset($_POST['btnthem'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $name_login = $_POST['name_login'];
    $pass = $_POST['password'];
    $nhaplai = $_POST['nhaplai'];
    $lever = $_POST['quantri'];
    if ($name == "" || $pass == "" || $nhaplai != $pass || $sdt == "" || $email == "" || $name_login == "") {
        $result = "<p>Hãy Nhập Chính Xác! <p>";
    } else {
        // $nhaplai = md5($nhaplai);
        $them="INSERT INTO `taikhoan`(`name`, `email`, `sdt`, `name_login`, `password`, `lever`) VALUES ('$name','$email','$sdt','$name_login','$nhaplai','$lever' ) ";
        $query = mysqli_query($duan_mau, $them);
        if ($query) {
            header("location:quantri.php?page=taikhoan");
        } else {
            $result = "<p> Đăng Ký Thất Bại ! <p>";
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

        input {
            margin: 0.35em 0em;
        }

        button {
            margin-top: 1em;
            padding: 0.1em 0.6em;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <h4>THÊM TÀI KHOẢN </h4>
    <form action="" method="post">
        <div class="row">
            <div style=" text-align: right; padding:0;" class="col-5 ">
                <p>Tên Khách</p>
                <p>email </p>
                <p>Số Điện Thoại </p>
                <p>Tên tài Khoản </p>
                <p>password</p>
                <p>Nhập Lại </p>
                <p>Quản Trị </p>
            </div>
            <div style="text-align: left;" class="col-3 ">
                <input type="text" name="name">
                <input type="email" name="email">
                <input type="number" name="sdt" id="">
                <input type="text" name="name_login" id="">
                <input type="password" name="password" id="">
                <input type="password" name="nhaplai"> <br>
                <input type="radio" name="quantri" checked="checked" value="0">Quản Trị Viên <br>
                <input type="radio" name="quantri" value="1">Không Là Quản Trị
            </div>
        </div>
        <button name="btnthem"> Đăng Ký</button>
        <?php global $result;
        echo $result ?>
    </form>

</body>

</html>