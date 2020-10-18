<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['pass'])){
    $taikhoan = "Xin Chào: " . $_SESSION['user'] ."<a href='dangxuat.php'> Đăng Xuất </a>"; 
   
} else {
    $taikhoan ='<a href="index.php"> Đăng Nhập </a> ';
}
// if ( isset( $_COOKIE['user'])  && isset($_COOKIE['pass']) ){
//     $taikhoan = "Xin Chào: " . $_COOKIE['user'] ."<a href='dangxuat.php'> Đăng Xuất </a>"; 
   
// } else {
//     $taikhoan ='<a href="index.php"> Đăng Nhập </a> ';
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Quản Trị</title>
    <link rel="stylesheet" href="index.css?p=3">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="container header ">
        <div class="row">
            <div style="padding: 0px; text-align: right;" class="col">
                <h1>Quản Trị </h1>
                
            </div>
            <div id="tieude" class="col ">
                <h4><?php global $taikhoan; echo $taikhoan;?> 
              </h2>  
            </div>
        </div>
    </header>
    <section class="container content  ">
        <div class="row ">
            <div class="col-2 abc">
                <h3><a href="?page=taikhoan"></i> Tài Khoản </a> </h3>
            </div>
            <div class="col-2 abc">
                <h3><a href="?page=sanpham"></i>Sản Phẩm </a></h3>
            </div>
            <div class="col-2 abc">
                <h3><a href="?page=hoadon"></i> Hóa Đơn </a></h3>
            </div>
        </div>

    </section>
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'taikhoan':
                include('taikhoan.php');
                break;
            case 'sanpham':
                include('sanpham.php');
                break;
            case 'hoadon':
                include('hoadon.php');
                break;
            case 'themtk':
                include('dangky.php');
                break;
            case 'suattk':
                include('suatk.php');
                break;
            default:
                include('index.php');
                break;
        }
    }

    ?>
    </div>
    </div>

    </section>
</body>

</html>