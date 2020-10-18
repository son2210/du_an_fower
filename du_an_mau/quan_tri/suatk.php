<?php
require_once('ketnoi.php');
// ktra lấy dc id 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $bien = "SELECT * FROM taikhoan where id=$id";
    $query = mysqli_query($new, $bien);
    $row = mysqli_fetch_array($query);
    

    // ktra buttom 
    if (isset($_POST['btn_capnhat'])) {
        $name = $_POST['name_kh'];
        $email = $_POST['email'];
        $number = $_POST['sdt'];
        $password = $_POST['pass'];
        $quantri = $_POST['check'];
        $diachi = $_POST['diachi'];
        // $password=md5($password);
      $capnhat="UPDATE `taikhoan` SET `name`='$name',`email`='$email',`passwrod`='$password',`sdt`='$number',`diachi`='$diachi',`lever`='$quantri' WHERE id='$id'";
      $suatk=mysqli_query($new,$capnhat);
      if($suatk){
        header("location:quantri.php?page=taikhoan");
      }else{
          $result="cập nhật thất bại ";
      }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sưa Tài khoản</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .bca{
            text-align: center;
        }
      

        form {
            margin-left: 300px;
        }

        .name {
            text-align: left;
        }

        .name p {
            padding: 7px 0px;
            margin: 0px 0px 0px 40px;
        }

        .the {
            text-align: left;
        }

        .the input {
            border-radius: 15px;
            width: 100%;
            margin: 5px 0px 3px 10px;
            outline: none;
        }

        textarea {
            width: 240px;
            height: 30px;
            border-radius: 5px;
            outline: none;
        }
        #check {
            width: 10%;
        }
        .capnhat{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 50px;
            margin-left: -200px;
        }
        .capnhat button{
            padding: 1px 10px;
            border-radius: 10px;
            background: #e7a511;
            color: white;
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
    <div class="container heder">
        <div class="bca">
        <h1>Chỉnh Sửa </h1>
        <?php global $result;echo $result;?>
        </div>
      
        <form action="" method="post">
            <div class="row name">
                <div class="col-3">
                    <p>Tên Khách Hàng </p>
                    <p>Email </p>
                    <p>PassWrod </p>
                    <p>Số Điện Thoại </p>
                   
                    <p>Quản Trị Viên </p>
                    <p>Địa Chỉ </p>

                </div>
                <div class="col-4 the">
                    <input type="text" name="name_kh" value="<?= $row["name"] ?>">
                    <input type="email" name="email" value="<?= $row["email"] ?>">                 
                    <input type="password" " name="pass" value="<?= $row["passwrod"] ?>">
                    <input type="number" name="sdt" value="<?= $row["sdt"] ?>">
                    <input id="check" type="radio" name="check" checked value="0"> <span> Đúng</span>
                    <input id="check" type="radio" name="check" value="1"> sai
                    <textarea name="diachi" id="" cols="30" rows="10"> <?= $row["diachi"] ?> </textarea>
                </div>
            </div>
            <div class="capnhat">
            <button name="btn_capnhat">cập Nhật </button>
        
         <a href="quantri.php?page=taikhoan"> Quay lại </a>
            </div>
        
        </form>
    
      
    </div>
</body>
<script src="check_from.js"></script>

</html>