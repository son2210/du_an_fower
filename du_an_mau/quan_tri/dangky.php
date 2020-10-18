<?php
require_once('ketnoi.php');
if(isset($_POST['btn_dangky'])){
    $name=$_POST['name_kh'];
    $email=$_POST['email'];
    $number=$_POST['sdt'];    
    $password=$_POST['password'];
    $nhaplai=$_POST['nhaplai'];
    $quantri=$_POST['check'];
    $diachi=$_POST['diachi'];
    // $password=md5($password);
     $them="INSERT INTO `taikhoan`( `name`, `email`, `passwrod`, `sdt`, `diachi`, `lever`) VALUES 
                                    ('$name','$email','$password','$number','$diachi','$quantri')";
     $query=mysqli_query($new,"$them");
     if(!$query){
         header("location:quantri.php?page=taikhoan");
     }else{
         $result ="Đăng Ký Thất Bại !";
     }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- check from  -->

    <style>
        body{
            text-align:center;
        }
        
        form {
            margin-left: 360px;
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
        #diachi {
            width: 240px;
            height: 40px;
            border-radius: 7px;
            outline: none;
        }
        .erro{
            border: 2px solid red;
        }
        #ten{
            margin-left: -250px;
        }
        #check{
            width: 15%;
        }
        .bca{
            text-align: center;
        }
        .capnhat{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 50px;
            margin-left: -150px;
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
        <h1>Thêm Tài Khoản</h1>
        <span> <?php global $result;echo $result;?> </span>
        </div>
       
        <form action="" method="post" onsubmit=" return  kiemtra();">
            <div class="row name">
                <div class="col-3">
                    <p>Tên Khách Hàng </p>
                    <p>Email </p>
                    <p>PassWrod </p>
                    <p>Nhập Lại  </p>
                    <p>Số Điện Thoại </p>
                    <p>Là Quản Trị viên   </p>
                    <p>Địa Chỉ </p>
                </div>
                <div class="col-4 the">
                    <input type="text" placeholder="name" name="name_kh">
                    <input type="email" placeholder="abc@gmail.com" name="email">
                    <input type="password" placeholder="PassWrod" name="password">
                    <input type="password" placeholder="Nhập lại pass" name="nhaplai">
                         <input type="number" placeholder="0123456789" name="sdt">
                    <input type="radio" id="check" name="check" value="0" checked> Đúng 
                    <input type="radio" id="check" name="check" value="1" > sai 
                    <textarea name="diachi" id="diachi" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="capnhat">
            <button type="submit" name="btn_dangky">Đăng Ký </button>
            <a href="quantri.php?page=taikhoan"> Quay lại </a>
            </div>
            
          
        </form>
    </div>
</body>
<script src="check_from.js"></script>
</html>