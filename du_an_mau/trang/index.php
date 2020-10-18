<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trang chủ </title>
    <link rel="stylesheet" href="index.css?p=2">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    require_once('./header.php');

    //nội dung thay đổi
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'home': {
                    require_once './trangchu.php';
                    break;
                }
            case 'nuochoanam':
                require_once('./menu2.php');
                include_once('./nuochoanam.php');
                break;
            case 'nuochoanu':
                require_once('./menu2.php');
                include_once('./nuochoanu.php');
                break;
            case 'thuonghieu':
                require_once('./menu2.php');
                include_once('./thuonghieu.php');
                break;
            case 'sanphamkhac':
                require_once('./menu2.php');
                include_once('./sanphamkhac.php');
                break;
            default;
        }
    } else {
        require_once './trangchu.php';
    }
    require_once('./footer.php');
    ?>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</html>