<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $xoa = "SELECT* FROM slide_home  where id='$id'";
    $query = mysqli_query($new, $xoa);
    $row = mysqli_fetch_assoc($query);

    //post button 
    if (isset($_POST['btn_them'])) {
        $name = $_POST['name'];
        $logo = $_FILES['img_logo']['name'];
        if ($logo == "") {
          $logo=$row['img'];
          $slide = "UPDATE `slide_home` SET `name`='$name',`img`='$logo' where id='$id'";
          $query = mysqli_query($new, $slide);
          if ($query) {
              $file_name = $_FILES['img_logo']['name'];
              $file_tmp = $_FILES['img_logo']['tmp_name'];
              move_uploaded_file($file_tmp, "./src/public/upload_img/img_store/" . $file_name);
              header('location:./index.php?page=slide_home');
          } else {
              $result = " thất bại !";
          }
      }else {
            $slide = "UPDATE `slide_home` SET `name`='$name',`img`='$logo' where id='$id'";
            $query = mysqli_query($new, $slide);
            if ($query) {
                $file_name = $_FILES['img_logo']['name'];
                $file_tmp = $_FILES['img_logo']['tmp_name'];
                move_uploaded_file($file_tmp, "./src/public/upload_img/img_store/" . $file_name);
                header('location:./index.php?page=slide_home');
            } else {
                $result = " thất bại !";
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

        .box {
            display: grid;
            grid-template-columns: 25% 50%;

        }

        .box_text {

            text-align: right;
            margin-right: 20px;
        }

        .box_input {
            width: 80%;
           
        }

        .box_input input {
            width: 100%;
          border: none;
            outline: none;
            border-radius: 10px;
            box-shadow: 1px 1px 5px #532c2c;
            margin: 5.3px 0px;
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

        img {
            width: 90%;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="abc">
        <h3> Cập Nhật Slide </h3>
        <?php
        global $result;
        echo $result;
        ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit=" return  update();">
        <div class="box">
            <div class="box_text">
                <p> Name </p>
                <p>Logo </p>
            </div>
            <div class="box_input">
                <input type="text" placeholder="name" name="name" id="ktra_name" value="<?= $row['name'] ?>">
                <input type="file" name="img_logo" id="ktra_img">
                <img src="./src/public/upload_img/img_store/<?= $row['img'] ?> "  alt="">
            </div>
        </div>
        <div class="box_button">
            <button type="submit" name="btn_them"> Update Slide </button>
            <a href="./index.php?page=slide_home"> quay lại </a>
        </div>


</body>

<script src="./src/Admin/quantri_cuahang/silde.js"></script>

</html>