<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sản Phẩm </h1>
    <table border="1">
        <tr>
            <td>id </td>
            <td>name_sp</td>
            <td>img_sp</td>
            <td>giá gốc</td>
            <td>giá Sale</td>
            <td>Dành cho </td>
            <td>ma_SP</td>
        </tr>
        <?php while($row=mysqli_fetch_assoc($query) ){?> 
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['name_sp']?></td>
                <td><img src="../image/img_sp/<?=$row['img_sp']?>" alt=""></td>
                <td><?=$row['price']?></td>
                <td><?=$row['price_sale']?></td>
                <td><?=$row['gioitinh']?></td>
                <td><?=$row['ma_sp']?></td>
            </tr>

        <?php }?>
    </table>
</body>
</html>