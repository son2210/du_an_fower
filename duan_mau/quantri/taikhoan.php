<?php
        require_once ('ketnoi.php');
        $taikhoan= "SELECT * FROM taikhoan";
        $query= mysqli_query($duan_mau,$taikhoan);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2{
            text-align: center;
        }
        table{
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    
    <section class="container">
        <div>
            <h2> Tài Khoản </h2>
            <table border="1" class="table-admin">
                <tr>
                    <td> ID </td>
                    <td>tên </td>
                    <td>email</td>
                    <td>Số DT</td>
                    <td> name_login</td>
                    <td>password</td>
                    <td>lever</td>
                    <td>Sửa TK</td>
                    <td>Xóa TK</td>
                    <td> <a href="?page=themtk">Thêm TK</a></td>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?=$row['id']?> </td>
                        <td><?=$row['name']?> </td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['sdt']?></td>
                        <td><?=$row['name_login']?></td>
                        <td><?=$row['password']?></td>
                        <td><?=$row['lever']?></td>
                        <td><a href="suatk.php?id=<?=$row['id']?>"> Sửa</a></td>
                        <td><a onclick="return confirm ('bạn có muốn xóa')" href="xoatk.php?id=<?=$row['id']?>"> xóa </a></td>
                       
                    </tr>
                <?php } ?>
            </table>
        </div>
        
        </div>
      
    </section>
  

</body>

</html>