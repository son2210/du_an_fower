<?php 

require_once('./src/Admin/ketnoi.php');
    // $sql=" SELECT coment.id_coment,admin.name,product.image,product.name,coment.text_coment, coment.time_coment FROM ((coment 
    //     inner join admin on coment.id_account =admin.id)
    //      inner join product on coment.id_procduct = product.id )
    //   ";
    $sql="SELECT * FROM product  order by id desc";
      $query=mysqli_query($new,$sql);
    //   $data=mysqli_fetch_all($query);
    
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .abc{
            text-align: center;
            margin: 10px 0px;
        }
        table{
            width: 100%;
            text-align: center;
        }
        #name_coment{
            width: 15%;
        }
        #img_product{
            width: 40%;
        }
        #img_product img{
            width: 25%;
        }
        #name_product{
            width:30%;
        }
        #moser_coment{
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
    </style>
</head>
<body>
     <div class="abc">
         <h2> Quản lý  Comment </h2>
     </div>
     <table  border="1">
        <tr>
            <td> ID </td>
            <td id="img_product">  Img product  </td>
            <td id="name_product">  Name product  </td>
            <td> Setting
               </td>
        </tr>      
        <?php 

        while ($row=mysqli_fetch_array($query)){ ?>
            <tr>
                    <td> <?=$row['id']?></td>
                    <td  id="img_product"><img src="./src/public/upload_img/img_product/<?=$row['image']?>" alt=""> </td>
                    <td  id="name_product"><?=$row['name']?> </td>
                    <td>  <button><a href="index.php?page=chitiet_coment&id=<?=$row['id']?>"> chi tiết </a></button>  </td>
                   
            </tr>
       <?php  }?>
    
     </table>
</body>
</html>