<?php
// 
require_once("./src/Admin/ketnoi.php");
session_start();
//  product 
if (isset($_GET['id'])) {
    $id = $_GET['id']; // id product 
    $product = "SELECT* FROM product inner join trademark on product.ma_sp= trademark.id_trademark where  id='$id'";
    $query = mysqli_query($new, $product);
    $row_product = mysqli_fetch_assoc($query);
    // sản phẩm liên quan 
    $lienquan = "SELECT* FROM product  where thuong_hieu='$row_product[thuong_hieu]' and id!=$row_product[id]  limit 4 ";
    $query_lienquan = mysqli_query($new, $lienquan);
    // coment 
    $lay_coment = "SELECT * FROM coment INNER JOIN admin ON coment.id_account = admin.id where id_procduct='$id' ";
    $data_coment = mysqli_query($new, $lay_coment);
    $coment_user = mysqli_fetch_all($data_coment);
 
    $more_coment = '';
    foreach ($coment_user as $key => $value) {
        if ($value[11] != 0) {
            $more_coment .= '
                        <div class="thanhvien">
                        <p> ' . $value[6] .'  </p>
                        <a> '.$value[4].'<a> <br>
                        <span> ' . $value[3] . '</span>                     
                        <ul class="menu-coment">
                            <li><button" ><i class="fa fa-thumbs-o-up" aria-hidden="true" id="like">like </i></button></li>
                            <li> <button > <a href="index.php?page=xoa_coment&id='." $value[0]" .'"> xóa </a> </button></li>                           
                            <li><button class="sua"> Sửa</button></li>
                            
                        </ul>
                        </div> 
                            
            ';
        } else {
            $more_coment .= '
                             <div class="thanhvien">
                                <p> ' . $value[6] . '  &nbsp;<span> Quản Trị viên </span> </p>
                                <a> '.$value[4].' </a> <br>
                                <span>' . $value[3] . '</span>
                                <ul class="menu-coment">
                                    <li><button> <i class="fa fa-thumbs-o-up" aria-hidden="true" id="like"> like</i></button></li>
                                    <li> <button >  <a href="index.php?page=xoa_coment&id='." $value[0]".'"> xóa </a></button></li>
                                    
                                    <li><button class="sua"> Sửa</button></li>
                                </ul>
    
                            </div>
            ';
        }
    }
    //  comment 
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if (isset($_POST['btn_coment'])) {
        //  ktra trước khi comengt 
        if (isset($_SESSION['user'])) {
            $coment_data = $_SESSION['user'];
            $id_account = $coment_data['id']; // id_account 
            // post coment
            $ngay_gio=date('y-m-d H:i:s');

            $name_coment = $_POST['text_coment'];
            $them_coment = "INSERT INTO `coment`( `id_account`, `id_procduct`, `text_coment`,`time_coment`) VALUES ('$id_account','$id','$name_coment','$ngay_gio')";
            $query_coment = mysqli_query($new, "$them_coment");
            if ($query_coment) {
                //  sellect coment 
                $text_comet = " ";
            } else {
                $text_comet = "";
            }
        } else {
            $text_comet = "Bạn Cận Đăng Nhập ! <a href='./index.php?page=dangnhap'> Đăng Nhập </a>";
        }
    }
}
//  ktra session 
if (isset($_SESSION['user'])) {
    $dataUser = $_SESSION['user'];
    //  header 
    $name = " <h5 >" . $dataUser['email'] . "  </h5>";
    if ($dataUser['level'] == 0) {
        $result = ' <li>
           ' . $name . '
            <div id="menucon">
            <ul>
                <li><a href="index.php?page=quantri"> Quản Trị  </a></li>
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
//  information_store
$informatuon_store = "SELECT * FROM information_store";
$store = mysqli_query($new, $informatuon_store);
$row = mysqli_fetch_assoc($store);
// tramdemark
$trademark = "SELECT `id_trademark`, `name_trademark`, `image_trademark` FROM `trademark`";
$query_trademark = mysqli_query($new, $trademark);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sản Phẩm </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/public/css/home.css?p=5">
    <link rel="stylesheet" href="./src/public/css/sanpham.css?p=6">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./jquery-3.5.0.min.js"></script>
    <!--  -->
    <style>

    </style>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
    <!--  heder -->
    <header class="container ">
        <a class="nav-link" href="index.php"> <img src="./src/public/upload_img/img_store/<?= $row['logo'] ?>" width="90px" alt=""> <br>
            <?= $row['name'] ?></a>
    </header>
    <nav class="container">
        <div class="menu1">
            <div class="logo-menu">
                <a href="index.php"> <img src="./src/public/upload_img/img_store/<?= $row['logo'] ?>" width="80px" alt=""></a>
            </div>
            <div class="form-seach">
                <form action="#" method="post">
                    <input type="text" placeholder="seach !">
                    <button> seach</button>
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

    </nav>

    <!--  menu 2 -->
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
                            <li class="nav-item cha_menu_trademark ">
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
    <!-- sản phâm  -->
    <div class="container">
        <!--  bên trái  -->
        <div id="sanpham">
            <div class="sanpham-left">
                <div class=" sanpham-left-img">
                    <p>
                        <img src="./src/public/upload_img/img_product/<?= $row_product['image'] ?>" alt="">
                    </p>
                    <!-- <img src="../upload_img/img_sanpham/<?= $row_list['img_sp'] ?>" alt=""> -->
                    <!-- <div class="img-mota">
                        <img src="../upload_img/img_sanpham/<?= $row_list['img_sp'] ?>" alt="">
                        <img src="../upload_img/img_sanpham/<?= $row_list['img_sp'] ?>" alt="">
                        <img src="../upload_img/img_sanpham/<?= $row_list['img_sp'] ?>" alt="">
                    </div> -->
                </div>
                <div class="sanpham-left-text">
                    <div class="text-tensanpham">
                        <h4> <?= $row_product['name'] ?> </h4>
                    </div>
                    <div class="thongso">
                        <table>
                            <tr>
                                <td class="pro_duct">Thương Hiệu </td>
                                <td class="chitiet"> <?= $row_product['name_trademark'] ?> </td>
                            </tr>
                            <tr>
                                <td class="pro_duct">Loại Nước Hoa </td>
                                <td class="chitiet"> <?= $row_product['gioitinh'] ?> </td>
                            </tr>
                            <tr>
                                <td class="pro_duct"> Mùi Hương </td>
                                <td class="chitiet"> <?= $row_product['mui_huong_chinh'] ?> </td>
                            </tr>
                            <tr>
                                <td class="pro_duct">Phong Cách </td>
                                <td class="chitiet"> <?= $row_product['phong_cach'] ?> </td>
                            </tr>
                            <tr>
                                <td class="pro_duct"> Nồng Nộ </td>
                                <td class="chitiet"><?= $row_product['nong_no'] ?></td>
                            </tr>
                            <tr>
                                <td class="pro_duct">Năm Phát Hành </td>
                                <td class="chitiet"> <?= $row_product['nam_ph'] ?> </td>
                            </tr>
                            <tr>
                                <td class="pro_duct">Xuất Xứ </td>
                                <td class="chitiet"> <?= $row_product['xuat_su'] ?> </td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
            <!--  bên phải  -->
            <div class="sanpham-right">
                <div class="dungtich">
                    <table>
                        <tr id="abc">
                            <td id="mll">15ML</td>
                            <td id="gia"> <?= number_format($row_product['price_15ml'], 0, ",", ".") ?>đ</td>
                            <td id="giohang"><button> <a href="#"> Thêm Vào Giỏ</a> </button></td>

                        </tr>

                        <tr id="abc">

                            <td id="mll">50ML</td>
                            <td id="gia"> <?= number_format($row_product['price_50ml'], 0, ",", ".") ?>đ</td>
                            <td id="giohang"><button> <a href="#"> Thêm Vào Giỏ</a> </button></td>
                        </tr>
                        <tr id="abc">

                            <td id="mll">100ML</td>
                            <td id="gia"><?= number_format($row_product['price_100ml'], 0, ",", ".") ?>đ</td>
                            <td id="giohang"><button> <a href="#"> Thêm Vào Giỏ</a> </button></td>
                        </tr>
                        <tr id="abc">

                            <td id="mll">150ML</td>
                            <td id="gia"> <?= number_format($row_product['price_150ml'], 0, ",", ".") ?>đ</td>
                            <td id="giohang"><button> <a href="#"> Thêm Vào Giỏ</a> </button></td>
                        </tr>
                    </table>
                </div>
                <hr>
                <div class="dichvu">
                    <button>
                        Tư Vấn Miễn Phí
                    </button>
                    <button>
                        HotLine <?= $row['phone'] ?>
                    </button>
                </div>
                <hr>
                <div class="camket">
                    <h5>Cam Kết & Ưu Đãi </h5>
                    <p>Bảo hành đến giọt cuối cùng </p>
                    <p>Giao Hàng Trong 24H</p>
                    <p>Miễn phí ship nội thành HD từ 800k</p>
                </div>
            </div>
        </div>
    </div>
    <!-- hết sản phâm  -->
    <!--  mô tả  -->
    <div class="container">
        <div class="mota">
            <span onclick="mota();" id="mota" class="active"> Mô tả </span> <span onclick="comitment();" id="camket"> Cam Kết </span>
        </div>
        <div class="mieuta">
            <div class="mieuta1 box_dep">
                <img src="./src/public/upload_img/img_product/<?= $row_product['image'] ?>" alt="">
                <p> <?= $row_product['description'] ?> </p>
            </div>
            <div class="mieuta2 box_dep ">
                <h1> Cam kết Hàng chất lượng </h1>
            </div>
        </div>
        <div class="comment ">
           <?php global $text_comet;
            echo $text_comet; ?>
            <h1> Bình luận </h1>
            <form action="" method="post">
                <input type="text" placeholder="Nhận Xét !" name="text_coment"> <button type="submit" name="btn_coment"> <i class="fa fa-commenting" aria-hidden="true"></i></button>
            </form>
            <?php global $more_coment;
            echo $more_coment; ?>
        </div>
        <div class="sanpham_lq">
            <h3> Sản Phẩm Liên Quan </h3>
            <div class="abc" id="onload">
                <!--  php -->
                <!-- hàng 1 -->
                <?php while ($row_lienquan = mysqli_fetch_assoc($query_lienquan)) { ?>
                    <div class="box1">
                        <a href="./index.php?page=sanpham&id=<?= $row_lienquan['id'] ?>"> <img src="./src/public/upload_img/img_product/<?= $row_lienquan['image'] ?>" alt="<?= $row_lienquan['name'] ?>"></a>
                        <a href="./index.php?page=sanpham&id=<?= $row_lienquan['id'] ?>">
                            <h4> <?= $row_lienquan['name'] ?> </h4>
                        </a>
                        <a href="./index.php?page=sanpham&id=<?= $row_lienquan['id'] ?>"> <label for=""><?= number_format($row_lienquan['price_old'], 0, ",", ".") ?>đ</label></a>
                        <a href="./index.php?page=sanpham&id=<?= $row_lienquan['id'] ?>">
                            <p><?= number_format($row_lienquan['price_15ml'], 0, ",", ".") ?>đ ~ <?= number_format($row_lienquan['price_150ml'], 0, ",", ".") ?>đ</p>
                        </a>
                    </div>
                <?php } ?>


                <!-- php  -->

            </div>


        </div>



    </div>

    <!--  foooter  -->
    <footer class="container ">
        <div class="footer">
            <div class="row">
                <div class="col-4">
                    <h3>Dịch Vụ Khách Hàng </h3>
                    <p>
                        Hotline : <span> <?= $row['phone'] ?></span>
                    </p>
                    <p>
                        Tổng đài : <span> <?= $row['phone'] ?></span>
                    </p>
                    <p>
                        Email : <span> <?= $row['email'] ?></span>
                    </p>
                    <p>
                        Địa Chỉ :<span> <?= $row['diachi'] ?></span>
                    </p>
                    <p>

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
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!--  comment -->
<div id="fb-root"></div>
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="DhCLNJ1C"></script> -->
<script>
    // function like_coment() {
    //     var the_like = document.getElementById("like");
    //     var ok=true;
    //     if (ok) {
    //         the_like.style.color = "red";
    //         ok = false;
    //     } else {
    //         like.style.background = "yellow";
    //         ok = true;
    //     }
    // }

    function comitment() {
        var mota = document.getElementById('mota');
        var camket = document.getElementById('camket');
        var bien;
        if (bien = true) {
            document.getElementsByClassName("mieuta1")[0].style.display = "none";
            document.getElementsByClassName("mieuta2")[0].style.display = "block";
            mota.classList.remove('active');
            camket.classList.add('active');
            return;
        }
    }

    function mota() {
        var mota = document.getElementById('mota');
        var camket = document.getElementById('camket');
        var bien;
        if (bien = true) {
            document.getElementsByClassName("mieuta1")[0].style.display = "block";
            document.getElementsByClassName("mieuta2")[0].style.display = "none";
            mota.classList.add('active');
            camket.classList.remove('active');
            return;
        }
    }

    $(function (){
        $('.menu-coment li button i').on('click',function(){
                $(this).toggleClass('like');
        })


    })
</script>

</html>