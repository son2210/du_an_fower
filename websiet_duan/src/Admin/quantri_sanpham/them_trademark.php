<?php
    if(isset($_POST['btn_themtrademark'])){
        $name=$_POST['name'];
        $img=$_FILES['img']['name'];
        if($name == "" || $img==""){
            $result=" Không Để Trống !";
        }else{
            $select="SELECT * FROM trademark";
            $data=mysqli_query($new,$select);
            $b = mysqli_fetch_array($data);           
            $bien=$b['name_trademark'];
            if($bien==$name){
                $result=" Thương Hiệu : " .$name."  Đã  Có !";
            }else{

            $trademark="INSERT INTO `trademark`( `name_trademark`, `image_trademark`) VALUES ('$name','$img')";
            $query=mysqli_query($new,$trademark);
            if($query){
                $file_name=$_FILES['img']['name'];
                $file_tmp=$_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmp,"./src/public/upload_img/img_trademark/".$file_name);
                header('location:index.php?page=all_trademark');
            }else{
                $result=" Thất bại ";
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
        .abc {
            text-align: center;
            margin-top: 15px;
        }

        form {
            margin-left: 300px;
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
            margin-left: 320px;
        }

        .box_button button {
            padding: 1px 10px;
            border-radius: 10px;
            background: #e7a511;
            color: white;
            outline: none;
            border: none;
        }

        .box_button a {
            color: white;
            background: #fc1105;
            padding: 2px 4px;
            border-radius: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
    <div class="abc">
        <h1> Thêm Trademark </h1>
        <?php
            global $result;
            echo $result;
        ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit=" return  kiemtra();" >
        <div class="box">
            <div class="box_text">
                <p> Name  </p>
                <p> Img  </p>
            </div>
            <div class="box_input">
                <input type="text" placeholder="name" name="name">
                <input type="file" name="img">
               
            </div>
        </div>
        <div class="box_button">
        <button type="submit" name="btn_themtrademark">Thêm Trademark</button>
        <a href="./index.php?page=all_trademark"> quay lại </a>
        </div>
    </form>
</body>
        <script src="./src/Admin/quantri_sanpham/check.js"></script>
</html>