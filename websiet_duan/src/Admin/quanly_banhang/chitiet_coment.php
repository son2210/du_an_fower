<?php
require_once('./src/Admin/ketnoi.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = " SELECT coment.id_coment,admin.name,product.image,product.name,coment.text_coment, coment.time_coment,product.id FROM ((coment 
        inner join admin on coment.id_account =admin.id)
         inner join product on coment.id_procduct = product.id ) where product.id=$id
      ";
    $query = mysqli_query($new, $sql);
    $data = mysqli_fetch_all($query);
    // mysqli_fetch_row()
    if ($data) {
        $bien = "";
        foreach ($data as $key => $abc) {
            $bien .= '
                <tr>
                <td> ' . $abc[0] . '  </td>
                <td id="name_coment"> ' . $abc[1] . '   </td>
                <td id="img_product"> <img src="./src/public/upload_img/img_product/' . $abc[2] . '"  alt="' . $abc[3] . '">  </td>
                <td id="name_product">  ' . $abc[3] . ' </td>
                <td id="moser_coment">  ' . $abc[4] . ' </td>
                <td id="time_coment">' . $abc[5] . ' </td>
                <td id="setting">
                 <button> <a href="index.php?page=delete_coment&id='. $abc[0].'"> xóa</a></button> 
                
                </td>
            </tr>
                ';
        }
     
    } else {
        $result = " <h5> Chưa Có Nhận Xét Cho Sản Phẩm Này  </h5>";
       
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chitiet coment</title>
    <style>
       .abc{
           text-align: center;
           margin: 20px 0px;
       }

        table {
            width: 100%;
            text-align: center;
        }

        #img_product img {
            width: 20%;
        }

        td#img_product {
            width: 25%;
        }

        td#name_produc {
            width: 20%;
        }

        td#moser_coment {
            width: 20%;
        }
        button{
            border-radius: 10px;
            box-shadow: 1px 1px 5px red;
            background-color: #ff6d1e;
            outline: none;
            border: none;
            
        }
        button a{
            color:white;
        }
        button a:hover{
            text-decoration: none;
            color: white ;
        }
        h5{
            color: red;
        }
    </style>
</head>

<body>
    <div class="abc">
    <h3> Coment Product </h3>
    <a href="index.php?page=all_coment"> Quay Lại </a> <br>
 
        <?php 
          global $result;
        echo $result;
        ?>
      
    </div>
    
    <table border="1">
        <tr>
            <td>ID</td>
            <td id="user_coment"> User Coment </td>
            <td id="img_product"> Img product </td>
            <td id="name_produc"> Name_produt </td>
            <td id="moser_coment"> Moser Coment</td>
            <td id="time_comet">Time Coment</td>
            <td > SetTing </td>
        </tr>

        <?php
      global $bien;
       echo  $bien;
        ?>

    </table>
</body>

</html>