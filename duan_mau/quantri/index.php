<?php
session_start();
require_once("ketnoi.php");
if (isset($_POST['btnlogin'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    if ($name == "" || $pass == "") {
        $result = "<span> k được  </span>";
    } else {
        $dangnhap = "SELECT * FROM taikhoan WHERE name_login ='$name' AND password ='$pass' AND lever=0 ";
        $query = mysqli_query($duan_mau, $dangnhap);
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['user'] = $_POST['name'];
            $_SESSION['pass'] = $_POST['pass'];
            //  setcookie("user",$_POST['name'],time()+300);
            //  setcookie("pass",$_POST['pass'],time()+300);
            header('location:quantri.php');
        } else {
            $result = "Mật Khẩu Hoặc Tài Khoản Không Chính Xác !";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập </title>
    <style>
        body {
            background-size: cover;
            background-image: url('../imgae/abc.jpg');
        }

        form {
            text-align: center;
        }

        input {
            width: 15em;
            margin-left: 0.5rem;
            outline: none;
        }

        h1 {
            text-align: center;

        }

        button {
            padding: 0.3rem;
            background-color: #26e7b7;
            border: none;
            margin-left: 0.4em;
            margin-bottom: 0.8em;
        }

        .erro {
            border-radius: 5px;   
           border: red solid 2px;
        }
        h2{
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="" method="post" onsubmit=" return login();">
        <h1>Đăng Nhập </h1>
        <p>Tài Khoản <input id="name" type="text" name="name"></p>
        <p>Mật Khẩu <input id="pass" type="password" name="pass"></p>
        <button type="submit" name="btnlogin">Đăng Nhập </button> <br>
        <button> <a href="dangky.php"> Đăng ký </a></button>
        <p id="text"> </p>
        <?php global $result;
        echo $result; ?>
    </form>
  <h2> OSCS CHANER XIN CHÀO QUÝ KHÁCH </h2>
</body>
<script src="../js/check_form.js"></script>
<script>
    
</script>

</html>