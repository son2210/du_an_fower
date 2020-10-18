<?php
session_start();
if (isset($_SESSION['user'])) {
    $admin = $_SESSION["user"];
    $data=$admin['name'];
    $dangxuat = " <span> <a href='dangxuat.php'> Đăng Xuất </a> </span>  ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .header {
            height: 100px;
            background-color: rgba(34, 34, 54, 0.274);
            text-align: center;
            padding: 0px;

        }

        .logo {
            padding: 0px;
        }

        .quantri {
            padding: 0px;
        }

        .quantri h3 {
            text-align: center;
            line-height: 100px;
            color: white;

        }

        .hello {
            padding: 0px;
        }

        .hello a {
            text-decoration: none;
            color: yellow;
            font-size: 20px;
            line-height: 80px;

        }

        .menu {
            height: 70px;
            background-color: rgb(3, 0, 0);
            list-style: none;
            text-align: center;

        }

        .menu li {
            display: inline-table;
            line-height: 70px;
            padding: 0px 30px;
            position: relative;
        }

        .menu li a {
            color: red;
            text-decoration: none;
        }

        .menu li ::before {
            content: " ";
            position: absolute;
            bottom: 15px;
            left: 0px;
            width: 0%;
            height: 1%;
            left: 0px;
            background: yellow;
        }

        .menu li:hover ::before {
            width: 100%;
            transition: 2s;
        }

        #header {
            background: black;
            color: white;
            height: 100px;
            display: grid;
            grid-template-columns: 33% 33% 33%;
            width: 100%;
            max-height: 100px;
            text-align: center;
        }

        #logo {
            width: 100%;
            text-align: center;
        }

        .tieude h3 {
            line-height: 110px;
        }

        #quantri p {
            font-size: 5px;
        }

        #tieude {
            position: relative;
            padding-top: 37px;
        }

        #tieude ul {
            list-style: none;
        }

        #quantri {
            position: absolute;
            right: 134px;
            text-align: center;
            width: 200px;
            display: none;
        }

        #quantri li {
            color: white;
            width: 100%;
        }

        #quantri li:hover {
            background: red;
            transition: 1.3s;
        }

        #quantri li a {
            text-decoration: none;
            color: white;
        }

        #tieude ul:hover #quantri {
            display: block;
            transition: 2s;
        }
    </style>
</head>

<body>
    <header id="header">
        <div id="logo">
            <span> <a class="" href="quantri.php"> <img src="../img/img_logo/logo2.png" width="90px" alt=""> <br> OSCS CHANNEL</a></span>
        </div>
        <div class="tieude">
            <h3> Quản Trị </h3>
        </div>
        <div class="tieude" id="tieude">
            <ul>
                <li>
                    <h5> Xin Chào </h5> <?php global $data;
                                        echo $data;   ?>
                    <ul id="quantri">
                        <li> <a href="../trang/index.php"> Trang web </a> <br></li>
                        <li> <a href="dangxuat.php"> Đăng Xuất </a> <br></li>
                    </ul>
                </li>
            </ul>


            <p> </p>


        </div>

    </header>

    <!-- menu  -->
    <nav class="container-fulid">
        <ul class="menu">
            <li>
                <a href="?page=taikhoan"> Tài Khoản </a>
            </li>
            <li>
                <a href="?page=sanpham"> Sản Phẩm </a>
            </li>
            <li>
                <a href="?page=tt_cuahang"> TT Cửa Hàng </a>
            </li>
            <li>
                <a href="?page=slide_home"> Slie ảnh </a>
            </li>
            <li>
                <a href=""> Bình Luận </a>
            </li>
        </ul>
    </nav>
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'taikhoan':
                include('taikhoan.php');
                break;
            case 'dangky':
                include('dangky.php');
                break;
            case 'sanpham':
                include('sanpham.php');
                break;
            case 'themsanpham':
                include('themsp.php');
                break;
            case 'tt_cuahang':
                include('tt_cuahang.php');
                break;
            case 'them_ttch':
                include('them_ttch.php');
                break;
            case 'tatca':
                include('tatcasp.php');
                break;
            case 'thuonghieu':
                include('thuong_hieu.php');
                break;
          
            case 'slide_home':
                include('slide_home.php');
                break;
            case 'them_slide_home':
                include('them_slide_home.php');
                break;
            default;
        }
    }
    else
    {
        echo "ERROR !";
    }
    ?>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>