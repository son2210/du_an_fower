 <?php
    require_once('./src/Admin/ketnoi.php');
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $user = "<h5>Xin Chào:   " . $user['email'] . " <br>  <a href='./index.php'> Trang Web</a> </h5> ";
    }else{
        header('location:index.php');
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Quản Trị </title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <link rel="stylesheet" href="./src/public/css/quantri.css?p=4">
     <!-- JS, Popper.js, and jQuery -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>

 <body>
     <header class="container-fulid banner">
         <div class="danhmuc">
             <p><i class="fa fa-bars" aria-hidden="true"></i> Danh Mục </p>
         </div>
         <div class="quanly">
             <h2> Quản Lý Website </h2>
         </div>
         <div class="name"> <?php global $user;
                            echo $user; ?> </div>
     </header>
     <nav class="container-fuild menu">
        <ul>
            <li><a href="index.php?page=all_account">Tài Khoản </a></li>
            <li><a href="index.php?page=all_product"> Sản Phẩm </a>
            </li>
            <li><a href="index.php?page=information_store "> Thông Tin Cửa Hàng </a></li>
            <li><a href=" index.php?page=slide_home"> Slide Home</a>  </li>
            <li><a href=" index.php?page=all_coment">  Comment </a></li>
        </ul>
</nav>
 </body>

 </html>