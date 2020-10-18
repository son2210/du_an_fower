<?php

if(isset($_POST['btn_them'])){
    $name=$_POST['name'];
    $logo=$_FILES['img_logo']['name'];
    $email=$_POST['email'];
    $phone=$_POST['sdt'];    
    $diachi=$_POST['diachi'];
    $file_name=$_FILES['img_logo']['name'];
    $file_tmp=$_FILES['img_logo']['tmp_name'];
    move_uploaded_file($file_tmp,"./src/public/upload_img/img_store/". $file_name);
    $information= "INSERT INTO `information_store`(`name`, `logo`, `email`, `diachi`, `phone`) VALUES 
    ('$name','$logo','$email','$diachi','$phone')";
    $query=mysqli_query($new,$information);
    if($query){
        $file_name=$_FILES['img_logo']['name'];
        $file_tmp=$_FILES['img_logo']['tmp_name'];
        move_uploaded_file($file_tmp,"./src/public/upload_img/img_store/". $file_name);
       header('location:./index.php?page=information_store');

    }else{
        $result="thất bại !";
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
            margin:5.3px 0px;
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
       <h3> Thêm information_Store</h3> 
      <?php
      global $result; echo $result;  
      ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit=" return  kiemtra();">
        <div class="box">
            <div class="box_text">
                <p> Name  </p>
                <p>Logo </p>
                <p>Email </p>
                <p>Phone </p>
                <p>Địa Chỉ </p>
            </div>
            <div class="box_input">
                <input type="text" placeholder="name" name="name">
                <input type="file" name="img_logo">
                <input type="email" placeholder="abc@gmai.com" name="email">
                <input type="number" placeholder="0123456789" name="sdt">
                <input type="text" placeholder="Địa CHỉ"  name="diachi">
            </div>
        </div>
        <div class="box_button">
        <button type="submit" name="btn_them"> Thêm  </button>
        <a href="./index.php?page=information_store"> quay lại </a>
        </div>
      


    </form>
</body>

</html>