<?php
require_once('../quan_tri/ketnoi.php');
$slide = "SELECT * FROM  slide_home";
$query = mysqli_query($new, $slide);
//  sản phẩm nữ 
$select="SELECT * FROM sanpham inner join chi_tiet_sp on sanpham.id=chi_tiet_sp.ma_sp where loai_nuoc_hoa='nu' order by chi_tiet_sp.id DESC limit 4";
$nuoc_hoa_nu=mysqli_query($new,$select);
//  sản phẩm nam 
$nuoc_hoa="SELECT * FROM sanpham inner join chi_tiet_sp on sanpham.id=chi_tiet_sp.ma_sp where loai_nuoc_hoa='nam' order by chi_tiet_sp.id DESC limit 4";
$nuoc_hoa_nam=mysqli_query($new,$nuoc_hoa);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body>
    <section class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner banner">
                <div class="carousel-item active">
                    <img src="../img/img_slider/anh1.jpg" class="d-block w-100" alt="...">
                </div>
                <?php while($row=mysqli_fetch_assoc($query)){  ?>
                <div class="carousel-item  ">
                    <img src="../upload_img/img_slide_home/<?=$row['img_slide']?>" class="d-block w-100" alt="...">
                </div>
                <?php }?>
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

    </section>
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
                                <a class="nav-link" href="index.php?page=nuochoanam">Nước Hoa Nam <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="trangchu.php?page=nuochoanu">Nước Hoa Nữ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Thương hiệu </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sản Phẩm Khác </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <div class="container">
        <!-- hàng 1 -->
        <div class="tieude">
            <h2>Sản Phẩm Mới Nhất </h2>
        </div>
        <div class="abc">
            <div class="box1">
                <a href="sanpham.php"> <img src="../img/img_sanpham/anh1.jpg" alt=""></a>
                <a href="sanpham.php">
                    <h4>tên sản phẩm dcdafsv dfvdf ÀECdvdv </h4>
                </a>
                <a href="sanpham.php"> <label for=""> 1.0000.0000</label></a>
                <a href="sanpham.php">
                    <p>1000.0000 ~ 2000..0000</p>
                </a>
            </div>
            <!-- box 1 -->
            <div class="box1">
                <a href="sanpham.php"> <img src="../img/img_sanpham/anh1.jpg" alt=""></a>
                <a href="sanpham.php">
                    <h4>tên sản phẩm dcdafsv dfvdf ÀECdvdv </h4>
                </a>
                <a href="sanpham.php"> <label for=""> 1.0000.0000</label></a>
                <a href="sanpham.php">
                    <p>1000.0000 ~ 2000..0000</p>
                </a>
            </div>
            <!-- box 1 -->
            <div class="box1">
                <a href="sanpham.php"> <img src="../img/img_sanpham/anh1.jpg" alt=""></a>
                <a href="sanpham.php">
                    <h4>tên sản phẩm dcdafsv dfvdf ÀECdvdv </h4>
                </a>
                <a href="sanpham.php"> <label for=""> 1.0000.0000</label></a>
                <a href="sanpham.php">
                    <p>1000.0000 ~ 2000..0000</p>
                </a>
            </div>
            <!-- box 1 -->
            <div class="box1">
                <a href="sanpham.php"> <img src="../img/img_sanpham/anh1.jpg" alt=""></a>
                <a href="sanpham.php">
                    <h4>tên sản phẩm dcdafsv dfvdf ÀECdvdv </h4>
                </a>
                <a href="sanpham.php"> <label for=""> 1.0000.0000</label></a>
                <a href="sanpham.php">
                    <p>1000.0000 ~ 2000..0000</p>
                </a>
            </div>
        </div>


        <!--  hàng 2 -->

        <div class="tieude">
            <h2>Nước Hoa Nam </h2>
        </div>
   
        <div class="abc">
        <?php while($row=mysqli_fetch_assoc($nuoc_hoa_nam)){ ?>
        <div class="box1">
            <a href="sanpham.php?id=<?=$row['id']?>"> <img src="../upload_img/img_sanpham/<?=$row['img_sp']?>" alt=""></a>
            <a href="sanpham.php">
                <h4><?=$row['ten_sp']?> </h4>
            </a>
            <a href="sanpham.php?id=<?=$row['id']?>"> <label for=""><?=$row['price_old']?></label></a>
            <a href="sanpham.php?id=<?=$row['id']?>">
                <p><?=number_format($row['price_15ML'],0,",",".")?>đ ~<?=number_format($row['price_150ML'],0,",",".")?>đ </p>
            </a>
        </div>
        <?php  }?>
            
            <!-- box 1 -->


        </div>

        <!--  hàng 3 -->

        <div class="tieude">
            <h2>Nước Hoa Nữ </h2>
        </div>
        <div class="abc">
        <?php while($row=mysqli_fetch_assoc($nuoc_hoa_nu)){ ?>
        <div class="box1">
            <a href="sanpham.php?id=<?=$row['id']?>"> <img src="../upload_img/img_sanpham/<?=$row['img_sp']?>" alt=""></a>
            <a href="sanpham.php">
                <h4><?=$row['ten_sp']?> </h4>
            </a>
            <a href="sanpham.php?id=<?=$row['id']?>"> <label for=""><?=$row['price_old']?></label></a>
            <a href="sanpham.php?id=<?=$row['id']?>">
                <p><?=number_format($row['price_15ML'],0,",",".")?>đ ~<?=number_format($row['price_150ML'],0,",",".")?>đ </p>
            </a>
        </div>
        <?php  }?>
            


        </div>
    </div>
</body>

</html>