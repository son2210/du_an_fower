<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['page'])){
        $page=$_GET['page'];
        switch($page){
            case 'taikhoan': 
             include_once('taikhoan.php');
            break;
            case 'colen': 
                include_once('abc.php');
               break;
          
        }
    }
    ?>
    <a href="?page=taikhoan"> tài khoản </a>
    <a href="?page=colen"> cô lên </a>
</body>
</html>