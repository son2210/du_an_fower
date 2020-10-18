<?php
require_once("ketnoi.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // selcet 1 bảng 
    $thuonghieu = "SELECT * FROM sanpham";
    $abc = mysqli_query($new, $thuonghieu);
    //  selelct 2 bảng 
    $sanpham = "SELECT * FROM chi_tiet_sp inner join sanpham on chi_tiet_sp.ma_sp=sanpham.id where chi_tiet_sp.id=$id";
    $query = mysqli_query($new, $sanpham);
    $row = mysqli_fetch_array($query);
    //  kiemtra 
    if (isset($_POST['btn_capnhat'])) {
        $name = $_POST['name_sp'];
        $img = $_FILES['img_sp']['name'];
        $thuonghieu_sp = $_POST['thuong_hieu'];
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
        if ($img =="") {
            $result = "hãy nhập đầy đủ !";
        } else {
            $capnhat = "UPDATE `chi_tiet_sp` SET `ten_sp`='$name',`img_sp`='$img',`thuong_hieu`='$thuonghieu_sp',`loai_nuoc_hoa`='$loai_nuoc_hoa',`mui_huong_chinh`='$mui_huong',`phong_cach`='$mui_huong',`nong_no`='$nong_no',`nam_phat_hanh`='$nam_ph',`xuat_su`='$xuat_su',`price_old`='$price_old',`price_15ML`='$price_15ML',`price_50ML`='$price_50ML',`price_100ML`='$price_100ML',`price_150ML`='$price_150ML',`mo_ta`='$mota',`ma_sp`='$thuonghieu_sp' WHERE chi_tiet_sp.id=$id";
            $query = mysqli_query($new, $capnhat);
            if ($query) {
                $file_name = $_FILES['img_sp']['name'];
                $file_tmnp = $_FILES['img_sp']['tmp_name'];
                move_uploaded_file($file_tmnp, "../upload_img/img_sanpham/" . $file_name);
                header("location:quantri.php?page=tatca");
            } else {
                $result = "Thất Bại !";
            }
        }
        // chạy dc rôi 
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sửa Sản Phẩm </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- check from  -->
    <style>
        form{
            text-align: center;
        }
        .bca {
            text-align: center;
        }
        #loai{
            width: 5%;
        }
        #mota{
            width: 100%;
            height: 50px;
        }
        .box{
            display: grid;
            grid-template-columns: 30% 50%;
        }
        .box1{
            text-align: right;
            margin-right: 20px;
            margin-top: 5px;
        }
        .box2{
            text-align: left;
        }
        .box2 input{
            width: 100%;
            border-radius: 10px;
            outline: none;
            margin: 6.6px 0px;
        }
        .capnhat{
            text-align: center;
            margin-top: 10px;
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
            <h1> Cập Nhật Sản Phâm </h1>
            <?php
            global $result;
            echo $result;
            ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data" onsubmit=" return  kiemtra();">
            <div class="box">
                <div class=" box1" >
                    <p>tên sản phẩm </p>
                    <p>Ảnh </p>
                    <p class="img"> </p>
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
                <div class="box2">
                    <input type="text" name="name_sp" id="" value="<?= $row['ten_sp'] ?>">
                    <input type="file" name="img_sp" id="">
                    <!--  thương hiệu  -->
                    <select name="thuong_hieu" id="">
                        <option value="<?= $row['id'] ?>"> <?= $row['thuong_hieu_sp'] ?></option>
                        <?php while ($row_list = mysqli_fetch_assoc($abc)) {  ?>
                            <option value="<?= $row_list['id'] ?>"> <?= $row_list['thuong_hieu_sp'] ?></option>
                        <?php } ?>
                    </select> <br>
                    <!-- loại nước hoa  -->
                    <input type="radio" name="loai_nuoc_hoa" id="loai" checked value="nam"> Nước hoa nam
                    <input type="radio" name="loai_nuoc_hoa" id="loai" value="nu"> Nước Hoa Nữ
                    <!-- end loaoij nước hoa  -->
                    <input type="text" name="mui_huong" value="<?= $row['mui_huong_chinh'] ?>  ">
                    <input type="text" name="phongcach" value="<?= $row['phong_cach'] ?>  ">
                    <input type="text" name="nong_no" value="<?= $row['nong_no'] ?>">
                    <input type="text" name="nam_ph" value="<?= $row['nam_phat_hanh'] ?>">
                    <!--  xuất sứ  -->
                    <input type="text" name="xuat_su" value="<?= $row['xuat_su'] ?>">
                    <input type="text" name="price_old" id="" value="<?= $row['price_old'] ?>">
                    <input type="text" name="price_15ML" value="<?= $row['price_15ML'] ?>">
                    <input type="text" name="price_50ML" value="<?= $row['price_50ML'] ?>">
                    <input type="text" name="price_100ML" value="<?= $row['price_100ML'] ?>">
                    <input type="text" name="price_150ML" value="<?= $row['price_150ML'] ?>">
                    <textarea name="mota" id="mota" cols="30" rows="10"><?= $row['mo_ta'] ?></textarea>
                </div>
            </div>
    </div>
    <div class="capnhat">
        <button type="submit" name="btn_capnhat"> Cập Nhật </button> 
        <a href="quantri.php?page=tatca"> quay lại</a>
    </div>

    </form>
    </div>

</body>

</html>