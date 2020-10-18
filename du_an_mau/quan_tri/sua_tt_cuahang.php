<!-- <?php
        require_once('ketnoi.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $xoa = "SELECT *  FROM `tt_cuahang` WHERE id=$id";
            $query = mysqli_query($new, $xoa);
            $row = mysqli_fetch_assoc($query);
            // / 
            if (isset($_POST['btn_sua'])) {
                $name = $_POST['name'];
                $logo = $_FILES['logo']['name'];
                $diachi = $_POST['diachi'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                if ($name == "" || $logo == "" || $diachi == "" || $email == "" || $sdt == "") {
                    $result = " không dc để trống !";
                } else {
                    echo "<pre>";
                    print_r($_POST);
                    echo "</pre>";
                    $file_name = $_FILES['logo']["name"];
                    $flie_tmp = $_FILES['logo']["tmp_name"];
                    move_uploaded_file($flie_tmp, "../upload_img/img_logo/" . $file_name);
                    $upload = "UPDATE `tt_cuahang` SET  `name`='$name',`logo`='$logo',`diachi`='$diachi',`email`='$email',`phone`='$sdt' WHERE id='$id'";
                    $query = mysqli_query($new, $upload);
                    if ($query) {
                        header("location:quantri.php?page=tt_cuahang");
                    } else {
                        $result = "Cập Nhật Thất Bại !";
                    }
                }
            }
        }
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        input {
            width: 300px;
            margin-left: 30px;
        }

        a {
            box-shadow: -1px 0px 4px black;
            border: solid 1px black;
            padding: 3px;
            background: #78787c;
            color: white;
            font-size: 15px;
        }
        a:hover{
            text-decoration: none;
            color: white;
        }
        button{
            background: #78787c;
            color: white;
        }
    </style>
</head>

<body>
    <?php
        require_once('quantri.php');
    
    ?>
    <div class="container">
        <h2>Cập Nhật </h2>
        <form action="" method="post" enctype="multipart/form-data">
            <p>Logo <input type="file" name="logo" value="<?= $row['logo'] ?>"></p>
            <p>Name <input type="text" name="name" value="<?= $row['name'] ?>"> </p>
            <p>Địa Chỉ <input type="text" name="diachi" value="<?= $row['diachi'] ?>"></p>
            <p>Email <input type="email" name="email" value="<?= $row['email'] ?>"></p>
            <p>Phone <input type="number" name="sdt" value="<?= $row['phone'] ?>"></p>
            <button name="btn_sua"> Cập Nhật </button>
            <a href="quantri.php?page=tt_cuahang"> quay lại </a>
            <?php

            global $result;
            echo $result;
            ?>
        </form>
    </div>
</body>

</html>