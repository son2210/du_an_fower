<?php
require_once('ketnoi.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM slide_home where id=$id";
    $abc = mysqli_query($new, $select);
    $row = mysqli_fetch_assoc($abc);
    if (isset($_POST['btn_sua'])) {
        $name = $_POST['name'];
        $img = $_FILES['img']['name'];
        if ($name == "" || $img == "") {
            $result = "hãy nhập đầy đủ !";
        } else {
            $capnhat = "UPDATE `slide_home` SET `img_slide`='$img',`name_slide`='$name' WHERE id=$id";
            $query = mysqli_query($new, $capnhat);
            if ($query) {
                $file_name = $_FILES['img']['name'];
                $file_tmnp = $_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmnp, "../upload_img/img_slide_home/" . $file_name);
                header("location:quantri.php?page=slide_home");
            } else {
                $result = "Thất Bại !";
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
        input {
            margin-bottom: 10px;
        }

        .bca {
            text-align: center;
        }

        form {
            text-align: center;
        }

        .box {
            display: grid;
            grid-template-columns: 40% 50%;
        }

        .box1 {
            text-align: right;
            margin-right: 50px;
        }

        .box2 {
            text-align: left;
        }

        .box2 input {
            width: 40%;
            border-radius: 10px;
            outline: none;
            margin-bottom: 5px;
        }

        .capnhat button {
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
 
    <div class="bca">
        <h2>cập Nhật Slide </h2>
        <?php
        global $result;
        echo $result;
        ?>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="box">
            <div class="box1">
                <p> Name Slide </p>
                <p> Img Slide </p>
            </div>
            <div class="box2">
                <input type="text" name="name" value="<?= $row['name_slide'] ?>"> <br>
                <input type="file" name="img">
            </div>
        </div>
        <div class="capnhat">
            <button name="btn_sua"> cập nhật </button>
            <a href="quantri.php?page=slide_home"> Quay lại </a>
        </div>


    </form>
</body>

</html>