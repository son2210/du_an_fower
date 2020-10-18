<?php
require_once("./src/Admin/ketnoi.php");
session_start();
//  sile - home 
$slide = "SELECT * FROM slide_home";
$slie_home = mysqli_query($new, $slide);
//  thương hiệu 
$trademark = "SELECT `id_trademark`, `name_trademark`, `image_trademark` FROM `trademark`";
$query_trademark = mysqli_query($new, $trademark);

if (isset($_SESSION['user'])) {
    $dataUser = $_SESSION['user'];
    $name = " <h5>" . $dataUser['email'] . "  </h5>";
    if ($dataUser['level'] == 0) {
        $result = ' <li>
           ' . $name . '
            <div id="menucon">
            <ul>
                <li><a href="./index.php?page=quantri"> Quản Trị  </a></li>
                <li><a href="./index.php?page=dangxuat"> Đăng Xuất  </a></li>
            </ul>
        </div>
        </li>
        ';
    } else {
        $result = ' <li>
        ' . $name . '
         <div id="menucon">
         <ul>
             <li><a href="./index.php?page=dangxuat"> Đăng Xuất  </a></li>
         </ul>
     </div>
     </li>
     ';
    }
} else {
    $result = ' 
       <ul id="sub_menu">
            <li><a href="index.php?page=dangky"> Đăng Ký </a></li>
            <li><a href="./index.php?page=dangnhap"> Đăng Nhập </a></li>
      </ul>
       ';
}
// information 
$informatuon_store = "SELECT * FROM information_store";
$store = mysqli_query($new, $informatuon_store);
$row_store = mysqli_fetch_assoc($store);
//  seach
if (isset($_GET['name'])) {
    $seach = $_GET['name'];
    $seach_product = "SELECT * FROM `product` WHERE `name` LIKE '%$seach%' ";
    $seach_query = mysqli_query($new, $seach_product);
    if ($seach_query) {
        if($seach){
            $product = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark  WHERE name LIKE '%$seach%' order by product.id DESC ";
            $query = mysqli_query($new, $product);
                //    seach nam 
                $product_nam = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark where gioitinh='nam'  order by product.id DESC limit 4";
                $query_nam = mysqli_query($new, $product_nam);
                   // seach nữ 
               $product_nu = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark where gioitinh='nu' ORDER BY product.id DESC limit 4";
               $query_nu = mysqli_query($new, $product_nu);
               if(mysqli_num_rows($query) <=0){
                $seach_notification="Sản Phẩm Bạn Tìm Không Tồn Tại !";
               }else{
               
               }
        }else{           
            $product = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark  order by product.id DESC limit 4 ";
            $query = mysqli_query($new, $product);
               //    seach nam 
            $product_nam = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark where gioitinh='nam' order by product.id DESC limit 8";
        $query_nam = mysqli_query($new, $product_nam);
           // seach nữ 
       $product_nu = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark where gioitinh='nu'  ORDER BY product.id DESC limit 8";
       $query_nu = mysqli_query($new, $product_nu);
 
        }  
    } 
}else {
    $product = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark  order by id DESC limit 4";
    $query = mysqli_query($new, $product);

    // $abc=mysqli_fetch_array($query);
    // pro nam 
    //count 12;
    //$totalProduct  = coutnt - 4
    $product_nam = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark where gioitinh='nam'  order by product.id DESC limit 3,8";
$query_nam = mysqli_query($new, $product_nam);
//  pro nữ 
$product_nu = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark where gioitinh='nu' ORDER BY product.id DESC limit 3,8";
$query_nu = mysqli_query($new, $product_nu);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trang chủ </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/public/css/home.css?p=5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body onload="onload();" >
    <!-- <div class="loader ">
        <span class="fa fa-snowflake-o spiner"> </span>
    </div> -->
    <!-- header -->
    <header class="container ">
        <a class="nav-link" href="index.php"> <img src="./src/public/upload_img/img_store/<?= $row_store['logo'] ?>" width="90px" alt=""> <br>
            <?= $row_store['name'] ?></a>
    </header>
    <nav class="container">
        <div class="menu1">
            <div class="logo-menu">
                <a href="index.php"> <img src="./src/public/upload_img/img_store/<?= $row_store['logo'] ?>" width="80px" alt=""> </a>
            </div>
            <div class="form-seach">
                <form action="" method="GET">
                    <input type="text" placeholder="seach !" name="name" value=" <?php global $seach;echo $seach; ?>">
                    <button type="submit"> seach</button>
                </form>
            </div>
            <div class="text_menu1">
                <ul class="nav-item">
                    <li><a class="nav-link" href="index.php"> Trang Chủ</a></li>
                    <li><a class="nav-link" href=""> Giới Thiệu </a></li>
                    <li><a class="nav-link" href=""> Giỏ Hàng </a></li>

                </ul>
            </div>
            <div class="dangky">
                <ul>
                    <?php
                    global $result;
                    echo $result;
                    ?>

                </ul>
            </div>
            <div>
            </div>

    </nav>
    <div class="container banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php $i++; ?>"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php $i++; ?>"></li>

            </ol>
            <div class="carousel-inner banner_img">
                <div class="carousel-item active">
                    <a href="#"> <img src="./src/public/img/anh2.jpg." class="d-block w-100" alt=""></a>
                </div>
                <?php while ($slide = mysqli_fetch_assoc($slie_home)) { ?>
                    <div class="carousel-item">
                        <img src="./src/public/upload_img/img_store/<?= $slide['img'] ?>" class="d-block w-100" alt="...">
                    </div>
                <?php } ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!--  menu 2  -->
    <section class="container menu-2-banner">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light menu-2">
                    <a class="nav-link" href="index.php"> Trang Chủ </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?page=nuochoanam">Nước Hoa Nam <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?page=nuochoanu">Nước Hoa Nữ</a>
                            </li>
                            <li class="nav-item cha_menu_trademark">
                                <a>Thương hiệu </a>
                                <!-- các thương hiệu  -->
                                <ul class="menu_trademark">
                                    <?php while ($row_trademark = mysqli_fetch_assoc($query_trademark)) { ?>

                                        <li><a href="./index.php?page=thuonghieu&id=<?= $row_trademark['id_trademark'] ?>"><?= $row_trademark['name_trademark'] ?></a></li>

                                    <?php } ?>

                                </ul>
                                <!-- end các thương  hiệu  -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=sanphamkhac">Sản Phẩm Khác </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <!--  sản phẩm  -->
    <section class="container">

        <div class="tieude">
            <h3> Sản Phẩm Mới Nhất </a> </h3>
            <?php global $seach_notification;echo $seach_notification; ?>
        </div>
        <div class="abc" id="onload">
            <!--  php -->
            <?php while ($row = mysqli_fetch_assoc($query)) {  ?>
                <div class="box1">
                    <a href="./index.php?page=sanpham&id=<?= $row['id'] ?>"> <img src="./src/public/upload_img/img_product/<?= $row['image'] ?>" alt="<?= $row['name'] ?>"></a>
                    <a href="./index.php?page=sanpham&id=<?= $row['id'] ?>">
                        <h4> <?= $row['name'] ?> </h4>
                    </a>
                    <a href="./index.php?page=sanpham&id=<?= $row['id'] ?>"> <label for=""><?= number_format($row['price_old'], 0, ",", ".") ?>đ</label></a>
                    <a href="./index.php?page=sanpham&id=<?= $row['id'] ?>">
                        <p><?= number_format($row['price_15ml'], 0, ",", ".") ?>đ ~ <?= number_format($row['price_150ml'], 0, ",", ".") ?>đ</p>
                    </a>
                </div>
            <?php } ?>
            <!-- php  -->

        </div>
        <!--  nước hoa nam  -->
        <div class="tieude">
            <h3><a href="./index.php?page=nuochoanam"> Sản Phẩm Nam</a> </h3>
        </div>
        <div class="abc" id="onload2">
            <!--  php -->
            <?php while ($row_nam = mysqli_fetch_assoc($query_nam)) {  ?>
                <div class="box1">
                    <a href="./index.php?page=sanpham&id=<?= $row_nam['id'] ?>"> <img src="./src/public/upload_img/img_product/<?= $row_nam['image'] ?>" alt="<?= $row_nam['name'] ?>"></a>
                    <a href="./index.php?page=sanpham&id=<?= $row_nam['id'] ?>">
                        <h4> <?= $row_nam['name'] ?> </h4>
                    </a>
                    <a href="./index.php?page=sanpham&id=<?= $row_nam['id'] ?>"> <label for=""><?= number_format($row_nam['price_old'], 0, ",", ".") ?>đ</label></a>
                    <a href="./index.php?page=sanpham&id=<?= $row_nam['id'] ?>">
                        <p><?= number_format($row_nam['price_15ml'], 0, ",", ".") ?>đ~ <?= number_format($row_nam['price_150ml'], 0, ",", ".") ?>đ</p>
                    </a>
                </div>
            <?php } ?>
            <!-- php  -->

        </div>
        <div class="tieude">
            <h3> <a href="./index.php?page=nuochoanu"> Sản Phẩm Nữ </a> </h3>
        </div>
        <div class="abc" id="onload3">
            <!--  php -->
            <?php while ($row_nu = mysqli_fetch_assoc($query_nu)) {  ?>
                <div class="box1">
                    <a href="./index.php?page=sanpham&id=<?= $row_nu['id'] ?>"> <img src="./src/public/upload_img/img_product/<?= $row_nu['image'] ?>" alt="<?= $row_nu['name'] ?>"></a>
                    <a href="./index.php?page=sanpham&id=<?= $row_nu['id'] ?>">
                        <h4> <?= $row_nu['name'] ?> </h4>
                    </a>
                    <a href="./index.php?page=sanpham&id=<?= $row_nu['id'] ?>"> <label for=""><?= number_format($row_nu['price_old'], 0, ",", ".") ?>đ</label></a>
                    <a href="./index.php?page=sanpham&id=<?= $row_nu['id'] ?>">
                        <p><?= number_format($row_nu['price_15ml'], 0, ",", ".") ?>đ~ <?= number_format($row_nu['price_150ml'], 0, ",", ".") ?>đ</p>
                    </a>
                </div>
            <?php } ?>
            <!-- php  -->

        </div>

        <!--  footer -->
        <footer class="container ">
            <div class="footer">
                <div class="row">
                    <div class="col-4">
                        <h3>Dịch Vụ Khách Hàng </h3>
                        <p>
                            Hotline <span> <?= $row_store['phone'] ?></span>
                        </p>
                        <p>
                            Tổng đài <span> <?= $row_store['phone'] ?></span>
                        </p>
                        <p>
                            Email : <span> <?= $row_store['email'] ?></span></p>
                        <p>
                            Địa Chỉ : <span> <?= $row_store['diachi'] ?> </span>
                        </p>
                    </div>
                    <div class="col-4">
                        <h3>Thông Tin</h3>
                        <a href="#"> <i class="fa icon-facebook fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="#"> <i class="fa icon-youtobe fa-youtube-play" aria-hidden="true"></i></a>
                        <a href="#"> <i class="fa icon-twiter fa-twitter" aria-hidden="true"></i></a>

                    </div>
                    <div class="col-4 footer-lef">
                        <h3>Chăm Sóc Khách Hàng </h3>
                        <a href=""> Chính sách bán hàng </a> <br>
                        <a href="">Chính sách bảo hành </a> <br>
                        <a href="">Chính sách giao hàng</a> <br>
                        <a href=""> Chính sách thanh toán</a> <br>
                        <a href=""> Chính sách bảo mật thanh toán</a> <br>
                        <a href="">Chính sách bảo mật và chia sẻ thông tin</a> <br>
                        <a href="">Điều kiện và điều khoản giao dịch</a> <br>

                    </div>
                </div>
            </div>
        </footer>
    </section>
</body>
<script src="./src/cores/jquery-3.5.0.min.js"></script>
<script src="./src/cores/check.js"></script>

<script>
    function onload() {
        var ok = document.getElementById('onload');
        ok.style.marginTop = "-10px"
        ok.style.transition = "3s"
        var ok2 = document.getElementById('onload2');
        ok2.style.marginTop = "-10px"
        ok2.style.transition = "3s"
        var ok3 = document.getElementById('onload3');
        ok3.style.marginTop = "-10px"
        ok3.style.transition = "3s";
    }
// $(window).on('load',function(){
//     $('.loader').delay(1000).fadeOut('fast');
// })
</script>

</html>