<?php
require_once('../quan_tri/ketnoi.php');
$thongtin = "SELECT * FROM tt_cuahang";
$abc = mysqli_query($new, $thongtin);
$row = mysqli_fetch_assoc($abc);
session_start();
if (isset($_SESSION['user'])) {
    $dataUser = $_SESSION['user'];
    if($dataUser['lever'] == 0)
    {
        $admin = '<li><a href = "../quan_tri/quantri.php" >Quản trị</a></li>';
    }
    else
    {
       $admin = "";
    }
   $result = "<ul>
      '".$admin."'
     <li><a href = '' >Đăng xuất</a></li>
   </ul>";
} else {
    header('location:../quan_tri/index.php');
}
?>
<header class="container ">
    <a class="nav-link" href="index.php"> <img src="../upload_img/img_logo/<?= $row['logo'] ?>" width="90px" alt=""> <br> <?= $row['name'] ?></a>
</header>
<nav class="container">
    <div class="menu">
        <div class="logo-menu">
            <a href="index.php"> <img src="../upload_img/img_logo/<?= $row['logo'] ?>" width="80px" alt=""></a>
        </div>
        <div class="form-seach">
            <form action="#" method="post">
                <input type="text" placeholder="seach !">
                <button> seach</button>
            </form>
        </div>
        <div class="text-menu">
            <ul class="nav-item">
                <li><a class="nav-link" href="index.php"> Trang Chủ</a></li>
                <li><a class="nav-link" href=""> Giới Thiệu </a></li>
                <li><a class="nav-link" href=""> Giỏ Hàng </a></li>
                <li><a class="nav-link" href=""> Đăng ký </a></li>
                <li><a class="nav-link" href=""> Đăng Nhập  </a></li>
            </ul>
        </div>
        <div >
        <ul class="quantri" >
            <?php
               echo $result;
            ?>
        </ul>
      </div>

</nav>