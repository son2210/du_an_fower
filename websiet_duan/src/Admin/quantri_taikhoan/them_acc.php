<?php
if(isset($_POST['btn_dangky'])){
    $name=$_POST['name_kh'];
    $email=$_POST['email'];
    $phone=$_POST['sdt'];    
    $password=$_POST['password'];
    $nhaplai=$_POST['nhaplai'];
    $diachi=$_POST['diachi'];
    $quantri=1;
    // kiểm tra email 
    $account="SELECT * FROM admin";
    $acc=mysqli_query($new,$account);
    $data=mysqli_fetch_array($acc);
    $bien=$data['email'];
    if($bien==$email){
        $result ="Email đã tồn tại";
    }else{
        $them="INSERT INTO `admin`( `name`, `email`, `password`, `phone`, `diachi`, `level`) VALUES ('$name','$email','$password','$phone','$diachi','$quantri')";
        $query=mysqli_query($new,"$them");
        
        if($query){
            header("location:index.php?page=all_account");
        }else{
            $result ="Đăng Ký Thất Bại !";
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
        .abc {
            text-align: center;
            margin-top: 15px;
        }

        form {
            margin-left: 360px;
        }
        .box{
        display: grid;
        grid-template-columns: 25% 50%;

        }
        .box_text{
          
            text-align: right;
            margin-right: 20px;
        }
        .box_input{
            width: 80%;
        }
        .box_input input{
            width: 100%;
            border: none;
            outline: none;
            border-radius: 10px;
            box-shadow: 1px 1px 5px #532c2c;
            margin:6px 0px;
        }
            /* buttton dưới */
        .box_button {
            /* text-align: center; */
            margin-top: 10px;
            margin-bottom: 50px;
            margin-left: 350px;
        }

        .box_button button {
            padding: 1px 10px;
            border-radius: 10px;
            background: #e7a511;
            color: white;
            outline: none;
            margin-top: 5px;
        }

        .box_button a {
            color: white;
            background: #fc1105;
            padding: 4px 4px;
            border-radius: 10px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="abc">
       <h3> Thêm Tài Khoản </h3>
    
      <?php
      global $result; echo $result;  
      ?>
    </div>
    <form action="" method="post" onsubmit=" return kiemtra();">
        <div class="box">
            <div class="box_text">
                <p> Name  </p>
                <p>Email </p>
                <p>PassWrod </p>
                <p>Nhập Lại </p>
                <p>Số Điện Thoại </p>
               
                <p>Địa Chỉ </p>
            </div>
            <div class="box_input"> 
                <input type="text" placeholder="name" name="name_kh" value="<?php global $name ;echo $name;?>"> 
                <input type="email" placeholder="abc@gmail.com" name="email" value="<?php global $email ;echo $email;?>">
                <input type="password" placeholder="PassWrod" name="password" value="<?php global $password ;echo $password;?>">
                <input type="password" placeholder="Nhập lại pass" name="nhaplai" value="<?php global $nhaplai ;echo $nhaplai;?>">
                <input type="number" placeholder="0123456789" name="sdt" value="<?php global $phone ;echo $phone;?>"> 
                <input type="text" name="diachi" placeholder="Địa CHỉ " value="<?php global $diachi ;echo $diachi;?>">
            </div>           
        </div>
        
        <div class="box_button">
        <b></b> <br>
        <button type="submit" name="btn_dangky" >Đăng Ký </button>
        <a href="./index.php?page=all_account"> quay lại </a>
        </div>
      


    </form>
</body>
   
        <script src="./src/Admin/quantri_taikhoan/check.js"></script>
       
       
</html>