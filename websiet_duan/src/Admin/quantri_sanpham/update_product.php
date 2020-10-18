<?php
require_once('./src/Admin/ketnoi.php');
$trademark = "SELECT * FROM trademark";
$query = mysqli_query($new, $trademark);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = "SELECT * FROM product inner join trademark on product.ma_sp=trademark.id_trademark where id=$id";
    $data = mysqli_query($new, $product);
    $row_list = mysqli_fetch_assoc($data);
    //  update
    if (isset($_POST['btn_themsp'])) {
        $name = $_POST['name_sp'];
        $img = $_FILES['img']['name'];
        $thuonghieu = $_POST['thuong_hieu'];
        $price_old = $_POST['price_old'];
        // start chi tiết sản phẩm  
        $loai_nuoc_hoa = $_POST['loai_nuoc_hoa'];
        $mui_huong = $_POST['mui_huong'];
        $phong_cach = $_POST['phongcach'];
        $nong_no = $_POST['nong_no'];
        $nam_ph = $_POST['nam_ph'];
        $xuat_su = $_POST['xuat_su'];
        $price_15ML = $_POST['price_15ML'];
        $price_50ML = $_POST['price_50ML'];
        $price_100ML = $_POST['price_100ML'];
        $price_150ML = $_POST['price_150ML'];
        $mota = $_POST['mota'];
        if($img == "") {
            $img = $row_list['image'];
            $update = "UPDATE `product` SET `name`='$name',`thuong_hieu`='$thuonghieu',`image`='$img',`gioitinh`='$loai_nuoc_hoa',`mui_huong_chinh`='$mui_huong',`phong_cach`='$phong_cach',`nong_no`='$nong_no',`nam_ph`='$nam_ph',`xuat_su`='$xuat_su',`price_old`='$price_old',`price_15ml`='$price_15ML',`price_50ml`='$price_50ML',`price_100ml`='$price_100ML',`price_150ml`='$price_150ML',`description`='$mota',`ma_sp`='$thuonghieu' WHERE product.id='$id'";
            $bien = mysqli_query($new, $update);
            if (!empty($bien)) {
                $file_name = $_FILES['img']['name'];
                $file_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmp, "./src/public/upload_img/img_product/" . $file_name);
                header('location:./index.php?page=all_product');
            } else {
                $result = "thất bại";
            }
        } else {
            $update = "UPDATE `product` SET `name`='$name',`thuong_hieu`='$thuonghieu',`image`='$img',`gioitinh`='$loai_nuoc_hoa',`mui_huong_chinh`='$mui_huong',`phong_cach`='$phong_cach',`nong_no`='$nong_no',`nam_ph`='$nam_ph',`xuat_su`='$xuat_su',`price_old`='$price_old',`price_15ml`='$price_15ML',`price_50ml`='$price_50ML',`price_100ml`='$price_100ML',`price_150ml`='$price_150ML',`description`='$mota',`ma_sp`='$thuonghieu' WHERE product.id='$id'";
            $bien = mysqli_query($new, $update);
            if (!empty($bien)) {
                $file_name = $_FILES['img']['name'];
                $file_tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmp, "./src/public/upload_img/img_product/" . $file_name);
                header('location:./index.php?page=all_product');
            } else {
                $result = "thất bại";
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
        #mota {
            height: 30px;
            width: 100%;
        }

        #loai {
            width: 5%;
            margin-top: 25px;

        }

        #loai2 {
            margin-top: 15px;
        }

        #loai3 {
            margin-top: 15px;
        }

        .box {
            display: grid;
            grid-template-columns: 30% 50%;
        }

        .box_text {
            text-align: right;
            margin-right: 20px;
        }

        .box_input input {
            width: 100%;
            border: none;
            outline: none;
            border-radius: 10px;
            box-shadow: 1px 1px 5px #532c2c;
            margin: 6.3px 0px;

        }

        .abc {
            text-align: center;
            margin: 15px 0px;
        }

        .box_button {
            /* text-align: center; */
            margin-top: 10px;
            margin-bottom: 50px;
            text-align: center;
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
        <h1> Cập Nhật Sản Phẩm </h1>
        <?php global $result;
        echo $result; ?>
    </div>

    <form action="" method="post"  onsubmit=" return  update_product();" enctype="multipart/form-data">
        <div class="box">
            <div class="box_text">
                <p>tên sản phẩm </p>
                <p>Ảnh </p>
                <p>Thương Hiệu </p>
                <p> Loại Nước Hoa</p>
                <p>Mùi Hương chính </p>
                <p>Phong cách </p>
                <p>Nồng Nộ </p>
                <p>năm Phát Hành </p>
                <p>Xuất Sứ </p>
                <p>price old </p>
                <p>Price_15ML </p>
                <p>Price_50ML </p>
                <p>Price_100ML </p>
                <p>Price_150ML </p>
                <p>Mô Tả </p>
            </div>
            <div class="box_input">

                <input type="text" name="name_sp" id="" value="<?= $row_list['name'] ?>">
                <input type="file" name="img">

                <select name="thuong_hieu" id="">
                    <option value="<?= $row_list['id_trademark'] ?>"> <?= $row_list['name_trademark'] ?> </option>
                    <!--  thương hiệu  -->
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?= $row['id_trademark'] ?>"> <?= $row['name_trademark'] ?></option>
                    <?php } ?>
                </select> <br>
                <?php
                // 
                if ($row_list['gioitinh'] === 'nu') {
                    echo ' <input type="radio" name="loai_nuoc_hoa" id="loai"  value="nam"> Nước hoa nam
                       <input type="radio" checked name="loai_nuoc_hoa" id="loai" value="nu"> Nước Hoa Nữ';
                } else {
                    echo ' <input checked type="radio" name="loai_nuoc_hoa" id="loai"  value="nam"> Nước hoa nam
                    <input type="radio" name="loai_nuoc_hoa" id="loai" value="nu"> Nước Hoa Nữ';
                }
                ?>

                <input type="text" name="mui_huong" id="loai2" value="<?= $row_list['mui_huong_chinh'] ?>">
                <input type="text" name="phongcach" value="<?= $row_list['phong_cach'] ?> ">
                <input type="text" name="nong_no" value="<?= $row_list['nong_no'] ?> ">
                <input type="text" name="nam_ph" value="<?= $row_list['nam_ph'] ?> ">

                <input type="text" name="xuat_su" value="<?= $row_list['xuat_su'] ?> ">
                <!--  giá  -->
                <input type="text" id="loai3" name="price_old" value="<?= $row_list['price_old'] ?>">
                <input type="text" name="price_15ML" value="<?= $row_list['price_15ml'] ?>">
                <input type="text" name="price_50ML" value="<?= $row_list['price_50ml'] ?>">
                <input type="text" name="price_100ML" value="<?= $row_list['price_100ml'] ?>">
                <input type="text" name="price_150ML" value="<?= $row_list['price_150ml'] ?>">
                <textarea name="mota" id="mota" cols="30" rows="10"> <?= $row_list['description'] ?></textarea>

            </div>
        </div>
        <div class="box_button">
            <button type="submit" name="btn_themsp"> Cập Nhật </button>
            <a href="./index.php?page=all_product"> Quay Lại</a>
        </div>

    </form>
</body>
                <script src="./src/Admin/quantri_sanpham/check.js"></script>
</html>