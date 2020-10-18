<?php
require_once("ketnoi.php");
$danhmuc="SELECT * FROM sanpham";
$abc= mysqli_query($new,$danhmuc);
//  kiemtra 
if (isset($_POST['btn_themsp'])) {
    $name=$_POST['name_sp'];
    $img=$_FILES['img_sp']['name'];
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
    $mota = $_POST['mota'];
  
    if($name==""|| $img=="" || $thuonghieu==""){
        $result =" Hãy Nhập Đầy Đủ !";
    }else{
    $them="INSERT INTO `chi_tiet_sp`( `ten_sp`, `img_sp`, `thuong_hieu`, `loai_nuoc_hoa`, `mui_huong_chinh`, `phong_cach`, `nong_no`, `nam_phat_hanh`, `xuat_su`, `price_old`, `price_15ML`, `price_50ML`, `price_100ML`, `price_150ML`, `mo_ta`,`ma_sp`) VALUES 
    ('$name','$img','$thuonghieu','$loai_nuoc_hoa','$mui_huong','$phong_cach','$nong_no','$nam_ph','$xuat_su','$price_old','$price_15ML','$price_50ML','$price_100ML','$price_150ML','$mota','$thuonghieu')";
    $data=mysqli_query($new,$them);
    if($data){
        echo "thành công !0";
        $file_name=$_FILES['img_sp']['name'];
        $file_tmnp=$_FILES['img_sp']['tmp_name'];
        move_uploaded_file($file_tmnp,"../upload_img/img_sanpham/".$file_name);
        header("location:quantri.php?page=tatca");
    }else{
        $result ="thất bại !";
    }
}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- check from  -->
    <style>
        .bca{
            text-align: center;
        }
            .menu{
                text-align: center;
            }
      
        input {
            width: 100%;
            border-radius: 10px;
            margin: 6.1px 0px;
        }

        #mota {
            height: 30px;
            width: 100%;
            
        }

        #loai {
            width: 5%;
        }
        .capnhat{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 50px;
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
        .error{
            margin: 0px;
            font-size: 20px ;
            color:red;
            font-weight: 800;
        }
        
    </style>

</head>

<body>
    <div class="container heder">
  <div class="bca">
  <?php
                        global $result; 
                        echo $result;
                    ?>
        <h1>Thêm sản Phẩm </h1>
  </div>
        <form action="" method="post" enctype="multipart/form-data" onsubmit=" return  kiemtra();">
            <div class="row name">
                <div class="col-3 name">
                    <!-- chi tiết sản phẩm  -->
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
                <div class="col-9">
                    <input type="text" name="name_sp" id="" placeholder="tên sản phẩm ">
                    <input type="file" name="img_sp" id="">
                    <!--  thương hiệu  -->
                    <select name="thuong_hieu" id="">
                        <option value="">Thương Hiệu  </option>
                        <?php while($row=mysqli_fetch_assoc($abc)){ ?>
                            <option value="<?=$row['id']?>"><?=$row['thuong_hieu_sp']?></option>
                        <?php }?>
                    </select> <br>
                        <!-- loại nước hoa  -->
                    <input type="radio" name="loai_nuoc_hoa" id="loai" checked value="nam"> Nước hoa nam
                    <input type="radio" name="loai_nuoc_hoa" id="loai" value="nu"> Nước Hoa Nữ
                    <!-- end loaoij nước hoa  -->
                    <input type="text" name="mui_huong" placeholder="Mùi Hương ">
                    <input type="text" name="phongcach" placeholder="Phong Cách ">
                    <input type="text" name="nong_no" placeholder="Nồng Nộ ">
                    <input type="text" name="nam_ph" placeholder="năm phát hành ">
                    <!--  xuất sứ  -->
                    <input type="text" name="xuat_su" placeholder="xuất sứ ">
                    <input type="text" name="price_old" placeholder="giá cũ ">
                    <input type="text" name="price_15ML" placeholder="giá 15ml">
                    <input type="text" name="price_50ML" placeholder="giá 50ml">
                    <input type="text" name="price_100ML" placeholder="giá 100ml">
                    <input type="text" name="price_150ML" placeholder="giá 150ml">
                    <textarea name="mota" id="mota" cols="30" rows="10"></textarea>


                </div>
            </div>
        <div class="capnhat">
        <button type="submit" name="btn_themsp">Thêm Sản Phẩm </button> 
         <a href="quantri.php?page=tatca"> Quay Lại</a>
                  
        </div>
        
        </form>
    </div>  

</body>
<script src="check_from.js"></script>

</html>