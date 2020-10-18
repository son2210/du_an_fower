<?php
require_once("../quan_tri/ketnoi.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
  
    $select = "SELECT  * FROM sanpham inner join chi_tiet_sp on sanpham.id=chi_tiet_sp.ma_sp where chi_tiet_sp.id='$id' ";
    $query = mysqli_query($new, $select);
    $row_list = mysqli_fetch_assoc($query);
}
$thongtin="SELECT * FROM tt_cuahang";
$abc=mysqli_query($new,$thongtin);
$row = mysqli_fetch_assoc($abc);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sản phâm </title>
    <link rel="stylesheet" href="sanpham.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!--  heder -->
    <?php
    require_once('./header.php');
    ?>

    <!--  menu 2 -->
    <?php
    require_once('./menu2.php');

    ?>
    <div class="container">
        <!--  bên trái  -->
        <div id="sanpham">
            <div class="sanpham-left">
                <div class=" sanpham-left-img">
                    <img src="../upload_img/img_sanpham/<?= $row_list['img_sp'] ?>" alt="">
                    <!-- <div class="img-mota">
                        <img src="../upload_img/img_sanpham/<?= $row_list['img_sp'] ?>" alt="">
                        <img src="../upload_img/img_sanpham/<?= $row_list['img_sp'] ?>" alt="">
                        <img src="../upload_img/img_sanpham/<?= $row_list['img_sp'] ?>" alt="">
                    </div> -->
                </div>
                <div class="sanpham-left-text">
                    <div class="text-tensanpham">
                        <h4><?= $row_list['ten_sp'] ?> </h4>
                    </div>
                    <div class="thongso">
                        <table>
                            <tr>
                                <td class="tieude">Thương Hiệu </td>
                                <td class="chitiet"> <?= $row_list['thuong_hieu_sp'] ?> </td>
                            </tr>
                            <tr>
                                <td class="tieude">Loại Nước Hoa </td>
                                <td class="chitiet"> <?= $row_list['loai_nuoc_hoa'] ?> </td>
                            </tr>
                            <tr>
                                <td class="tieude"> Mùi Hương Chính </td>
                                <td class="chitiet"> <?= $row_list['mui_huong_chinh'] ?> </td>
                            </tr>
                            <tr>
                                <td class="tieude">Phong Cách </td>
                                <td class="chitiet"><?= $row_list['phong_cach'] ?> </td>
                            </tr>
                            <tr>
                                <td class="tieude">Nồng Nộ </td>
                                <td class="chitiet"><?= $row_list['nong_no'] ?></td>
                            </tr>
                            <tr>
                                <td class="tieude">Năm Phát Hành </td>
                                <td class="chitiet"> <?= $row_list['nam_phat_hanh'] ?> </td>
                            </tr>
                            <tr>
                                <td class="tieude">Xuất Xứ </td>
                                <td class="chitiet"> <?= $row_list['xuat_su'] ?> </td>
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
                            <td id="gia"> <?= $row_list['price_15ML'] ?></td>
                            <td id="giohang"><button> <a href="#"> Thêm Vào Giỏ</a> </button></td>

                        </tr>

                        <tr id="abc">

                            <td id="mll">50ML</td>
                            <td id="gia"> <?= $row_list['price_50ML'] ?></td>
                            <td id="giohang"><button> <a href="#"> Thêm Vào Giỏ</a> </button></td>
                        </tr>
                        <tr id="abc">

                            <td id="mll">100ML</td>
                            <td id="gia"> <?= $row_list['price_100ML'] ?></td>
                            <td id="giohang"><button> <a href="#"> Thêm Vào Giỏ</a> </button></td>
                        </tr>
                        <tr id="abc">

                            <td id="mll">150ML</td>
                            <td id="gia"> <?= $row_list['price_150ML'] ?></td>
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
                        HotLine <?=$row['phone']?>
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
            <div class="menu-mota">
                <ul>
                    <li><a class="nav-link" href=""> Mô tả </a></li>
                    <li><a class=" nav-link" href="">Cam Kết Từ OSCSCHANEL</a></li>
                    <li><a class=" nav-link" href=""> Bảo Hành Đổi Chả </a></li>
                </ul>
            </div>
            <div class="mieuta">
                <div class="mieuta-img">
                <img src="../upload_img/img_sanpham/<?= $row_list['img_sp'] ?>" alt="">
                </div>
                <div class="mieuta-text">
                    <p>
                        <?=$row_list['mo_ta']?>
                    </p>
                </div>
            </div>
            <!-- bình luận -->
            <div class="">
                <h4>Bình Luận ! </h4>
                <div class="comment">
                    <form action="#" method="post">
                        <input type="text" placeholder="Bình Luận !"> <button> <i class="fa fa-commenting" aria-hidden="true"></i></button>
                    </form>
                    <div class="noidung">
                        <!-- thành viên coment -->
                        <div class="thanhvien">
                            <p> Tên Tài Khoản </p>
                            <span> Nội Dung Comment !</span>
                            <ul class="menu-coment">
                                <li><button class="like"> <i class="fa fa-thumbs-o-up" aria-hidden="true"> like</i></button></li>
                                <li> <button class="traloi"> Trả lời </button></li>
                                <li><button class="sua"> Sửa</button></li>
                            </ul>
                        </div>
                        <!-- commetn trả lời  -->
                        <div class="comment-redly">
                            <p> Tên Tài Khoản &nbsp;<span style="font-size: 10px; background-color: yellowgreen; padding: 0px;"> Quản Trị viên </span> </p>
                            <span> Nội Dung Comment !</span>
                            <ul class="menu-coment-redly">
                                <li><button class="like"> <i class="fa fa-thumbs-o-up" aria-hidden="true"> like</i></button></li>
                                <li> <button class="traloi"> Trả lời </button></li>
                                <li><button class="sua"> Sửa</button></li>
                            </ul>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ? -->
    <!--  -->
    <!--  foooter  -->
    <?php
    require_once('./footer.php');

    ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</html>