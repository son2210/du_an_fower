<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $slect="SELECT *FROM trademark where id_trademark=$id";
        $data=mysqli_query($new,$slect);
        $row=mysqli_fetch_assoc($data);
        if(isset($_POST['btn_themtrademark'])){
            $name=$_POST['name'];
            $img=$_FILES['img']['name'];
            if($img ==""){ 
                $img=$row['image_trademark'];
                $update="UPDATE `trademark` SET `name_trademark`='$name',`image_trademark`='$img'WHERE id_trademark='$id'";
                $query=mysqli_query($new,$update);
                if($query){
                    $file_name=$_FILES['img']['name'];
                    $file_tmp=$_FILES['img']['tmp_name'];
                    move_uploaded_file($file_tmp,"./src/public/upload_img/img_trademark/".$file_name);
                    header('location:index.php?page=all_trademark');
                }else{
                    $result=" Thất bại ";
                }
            }else{
                $update="UPDATE `trademark` SET `name_trademark`='$name',`image_trademark`='$img'WHERE idtrademark ='$id'";
                $query=mysqli_query($new,$update);
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
        <h1> UPDATE Trademark </h1>
        <?php
            global $result;
            echo $result;
        ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit=" return  update();" >
        <div class="box">
            <div class="box_text">
                <p> Name  </p>
                <p> Img  </p>
            </div>
            <div class="box_input">
                <input type="text" placeholder="name" name="name" value="<?=$row['name_trademark']?>">
                <input type="file" name="img" value="<?=$row['image_trademark']?>">
               
            </div>
        </div>
        <div class="box_button">
        <button type="submit" name="btn_themtrademark">Cập Nhật  Trademark</button>
        <a href="./index.php?page=all_trademark"> quay lại </a>
        </div>
    </form>
</body>
<script src="./src/Admin/quantri_sanpham/check.js"></script>
</html>