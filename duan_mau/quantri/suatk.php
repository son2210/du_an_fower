<?php
require_once('ketnoi.php');
// kiêm tra thẻ a
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $chinh = "SELECT *FROM taikhoan where id ='$id'";
    $quey = mysqli_query($duan_mau, $chinh);
    $row = mysqli_fetch_assoc($quey);
    // in tên tài khoản 
    if (isset($_POST['btnsua'])) {
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $lever=$_POST['check'];
        if ($name == "" || $pass == "") {
            $result = "<p>Hãy Nhập Chính Xác! <p>";
        } else {
            // $pass=md5($pass);
            $capnhat = "UPDATE `taikhoan` SET `name_login`='$name',`password`='$pass',lever='$lever' WHERE id='$id'";
            $ok = mysqli_query($duan_mau, $capnhat);
            if ($ok) {
                header("location:quantri.php?page=taikhoan");
            } else {
                $result = "<p>Cập  Nhật Thất Bại ! <p>";
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
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }

        input {
            width: 10%;
            margin-left: 0px;
        }

        button {

            padding: 0.3rem;
            background-color: #488d9f;
            color: white;
        }

        #check {
            width: 1%;
            margin-left: 1em;
        }
    </style>
</head>

<body>
    <h4>SỬA TÀI KHOẢN </h4>
    <form action="" method="post">

        <p>Tên Tài Khoản <input type="text" name="name" value="<?= $row['name_login']; ?>"></p>
        <p>Mật Khẩu Mới <input type="password" name="pass"> </p>
        <p>Quản Trị   <input id="check" type="radio" name="check" checked="checked" value="0"> <?= $row['name_login']; ?> quản trị viên <br>
        <input style="margin-left: 5em;" id="check" type="radio" name="check" value="1"> Không là quản trị <br>
        </p>
      
        <button name="btnsua"> Cập Nhật </button> <br>
        <?php global $result;
        echo $result ?>
        <a href="quantri.php"> Quay Lại</a>
    </form>
</body>

</html>