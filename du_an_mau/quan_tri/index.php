<?php
session_start();
require_once("ketnoi.php");
if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
    header('location:../trang/index.php');
}
else
{
    if (isset($_POST['btnlogin'])) {
        $email = $_POST['name'];
        $pass = $_POST['pass'];
        if ($email == "" || $pass == "") {
            $result = "<span>Hãy Nhập đầy đủ !  </span>";
        } else {
            $dangnhap = "SELECT * FROM taikhoan WHERE email ='$email' AND passwrod ='$pass'";
            $query = mysqli_query($new, $dangnhap);
            if (mysqli_num_rows($query)>0 ) {
                $query = mysqli_fetch_array($query);
                print_r($query);
                 $_SESSION['user'] = $query;
               header('location:../trang/index.php');
            
            } else {
                $result= " Mật Khẩu Hoặc Tài khoản Không chính xác !";
             
            }
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
            background-image: url('../img/img_baner/anh.jpg');
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
        <p>Tài Khoản <input id="name" type="email" name="name"></p>
        <p>Mật Khẩu <input id="pass" type="password" name="pass"></p>
        <button type="submit" name="btnlogin">Đăng Nhập </button> <br>
        <p id="text"> </p>
        <?php global $result;
        echo $result; ?>
    </form>
  <h2> OSCS CHANER XIN CHÀO QUÝ KHÁCH </h2>
</body>
</script>

</html>