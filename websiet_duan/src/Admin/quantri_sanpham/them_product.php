<?php
$danhmuc = "SELECT * FROM trademark";
$abc = mysqli_query($new, $danhmuc);
//  kiemtra 
if (isset($_POST['btn_themsp'])) {
    $name=$_POST['name_sp'];
    $img=$_FILES['img']['name'];
    $thuonghieu=$_POST['thuong_hieu'];
    $price_old=$_POST['price_old'];
   // start chi tiết sản phẩm  
    $loai_nuoc_hoa = $_POST['loai_nuoc_hoa'];
    $mui_huong = $_POST['mui_huong'];
    $phong_cach = $_POST['phongcach'];
    $nong_no = $_POST['nong_no'];
    $nam_ph=$_POST['nam_ph'];
    $xuat_su=$_POST['xuat_su'];
    $price_15ML=$_POST['price_15ML'];
    $price_50ML=$_POST['price_50ML'];
    $price_100ML=$_POST['price_100ML'];
    $price_150ML=$_POST['price_150ML'];
    $mota=$_POST['mota'];
    if($name=="" || $img==""|| $thuonghieu==""){
        $result=" Không Được để trống !";
    }else{
        $them="INSERT INTO `product`( `name`, `thuong_hieu`, `image`, `gioitinh`, `mui_hương_chinh`, `phong_cach`, `nong_no`, `nam_ph`, `xuat_su`, `price_old`, `price_15ml`, `price_50ml`, `price_100ml`, `price_150ml`, `description`, `ma_sp`) VALUES
         ('$name','$thuonghieu','$img','$loai_nuoc_hoa','$mui_huong','$phong_cach','$nong_no','$nam_ph','$xuat_su','$price_old','$price_15ML','$price_50ML','$price_100ML','$price_150ML','$mota','$thuonghieu')";
    //  ijkdafavuhojnflvbiujlktfugynjmkuyhbj  
    $vao="INSERT INTO `product`(`name`, `thuong_hieu`, `image`, `gioitinh`, `mui_huong_chinh`, `phong_cach`, `nong_no`, `nam_ph`, `xuat_su`, `price_old`, `price_15ml`, `price_50ml`, `price_100ml`, `price_150ml`, `description`, `ma_sp`) VALUES
          ('$name','$thuonghieu','$img','$loai_nuoc_hoa','$mui_huong','$phong_cach','$nong_no','$nam_ph','$xuat_su','$price_old','$price_15ML','$price_50ML','$price_100ML','$price_150ML','$mota','$thuonghieu')";
         $query=mysqli_query($new,$vao);
         if(!empty($query)){
                $file_name=$_FILES['img']['name'];
                $file_tmp=$_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmp,"./src/public/upload_img/img_product/".$file_name);
             $result=" thành công !";
             header('location:./index.php?page=all_product');

         }else{
             $result="thất bại !";
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
            margin: 5.8px 0px;

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
        #thuonghieu{
       
            outline: none;
        }
    </style>
    
</head>

<body>
    <div class="abc">
        <h1> Thêm Sản Phẩm </h1>
        <?php global $result;
        echo $result; ?>
    </div>

    <form action="" method="post"  onsubmit=" return product();" enctype="multipart/form-data">
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

                <input type="text" name="name_sp" id="name" placeholder="tên sản phẩm ">
                <input type="file" name="img">

                <select name="thuong_hieu" id="thuonghieu">
                    <option value="">Thương Hiệu </option>
                    <?php while ($row = mysqli_fetch_assoc($abc)) { ?>
                        <option value="<?= $row['id_trademark'] ?>"> <?= $row['name_trademark'] ?> </option>
                    <?php } ?>

                </select> <br>
                <input type="radio" name="loai_nuoc_hoa" id="loai" checked value="nam"> Nước hoa nam
                <input type="radio" name="loai_nuoc_hoa" id="loai" value="nu"> Nước Hoa Nữ
                        <!--  muuif huong  -->
                <input type="text" name="mui_huong" id="loai2" placeholder="Mùi Hương ">
                <input type="text" name="phongcach" placeholder="Phong Cách ">
                <input type="text" name="nong_no" placeholder="Nồng Nộ ">
                <input type="text" name="nam_ph" placeholder="năm phát hành ">

                <input type="text" name="xuat_su" placeholder="xuất sứ ">
                <!--  giá  -->
                <input type="number" id="loai3" name="price_old" placeholder="giá cũ ">
                <input type="number" name="price_15ML" placeholder="giá 15ml">
                <input type="number" name="price_50ML" placeholder="giá 50ml">
                <input type="number" name="price_100ML" placeholder="giá 100ml">
                <input type="number" name="price_150ML" placeholder="giá 150ml">
                <textarea name="mota" id="mota" cols="30" rows="10"></textarea>

            </div>
        </div>
        <div class="box_button">
            <button type="submit" name="btn_themsp">Thêm Sản Phẩm </button>
            <a href="./index.php?page=all_product"> Quay Lại</a>
        </div>

    </form>
</body>
<script src="./src/Admin/quantri_sanpham/check.js"></script>
 

</html>