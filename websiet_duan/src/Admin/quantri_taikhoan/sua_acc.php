<?php
require_once('./src/Admin/ketnoi.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
  $bien="SELECT * FROM admin where id=$id";
  $sua=mysqli_query($new,$bien);
  $row=mysqli_fetch_assoc($sua);

//   ktra butn 
if(isset($_POST['btn_dangky'])){
    $name=$_POST['name_kh'];
    $email=$_POST['email'];
    $phone=$_POST['sdt'];    
    $password=$_POST['password'];
    $diachi=$_POST['diachi'];
    $quantri=$_POST['check'];
    // cập nhật   
    $them="UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password',`phone`='$phone',`diachi`='$diachi',`level`='$quantri' WHERE id='$id'";
      $suatk=mysqli_query($new,$them);   
     if($suatk){
        
         header("location:index.php?page=all_account");
     }else{
         $result ="Cập nhật Thất Bại !";
     }
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .abc {
            text-align: center;
            margin-top: 15px;
        }

        form {
            margin-left: 360px;
        }
        .box{
        display: grid;
        grid-template-columns: 25% 50%;

        }
        .box_text{
          
            text-align: right;
            margin-right: 20px;
        }
        .box_input{
            width: 80%;
        }
        .box_input input{
            width: 100%;
            border: none;
            outline: none;
            border-radius: 10px;
            box-shadow: 1px 1px 5px #532c2c;
            margin:6px 0px;
        }
            /* buttton dưới */
        .box_button {
            /* text-align: center; */
            margin-top: 10px;
            margin-bottom: 50px;
            margin-left: 350px;
        }

        .box_button button {
            padding: 1px 10px;
            border-radius: 10px;
            background: #e7a511;
            color: white;
            outline: none;
        }

        .box_button a {
            color: white;
            background: #fc1105;
            padding: 4px 4px;
            border-radius: 10px;
            text-decoration: none;
        }
        #check{
            width: 5%;
            margin-top: 20px;
            padding: 0px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="abc">
       <h3> Thêm Tài Khoản </h3>
      <?php
      global $result; echo $result;  
      ?>
    </div>
    <form action="" method="post" onsubmit=" return  kiemtra();">
        <div class="box">
            <div class="box_text">
                <p> Name  </p>
                <p>Email </p>
                <p>PassWrod </p>
                <p>Số Điện Thoại </p>             
                <p>Quản Trị Viên </p>
                <p> Địa Chỉ </p>
            </div>
            <div class="box_input">
                <input type="text"  name="name_kh" value=" <?=$row['name']?>">
                <input type="email" name="email" value=" <?=$row['email']?>">
                <input type="password"  name="password" value="<?=$row['password']?>">
                <input type="number" name="sdt" value="<?=$row['phone']?>">
          <!--  quản trị  -->
          <?php 
          if($row['level']==0){
              echo '           
              <input type="radio" id="check" name="check" checked="checked" value="0"> Đúng 
              <input type="radio" id="check" name="check" value="1"> Sai
              ';
          }else{
              echo '
              <input type="radio" id="check" name="check"  value="0"> Đúng 
              <input type="radio" id="check" name="check" checked="checked" value="1"> Sai
              ';
          }           
                ?> 
             <!--  end quan trị  -->
              <input type="text" name="diachi" value="<?=$row['diachi']?>">
            </div>
        </div>
        <div class="box_button">
            <b></b> <br>
        <button type="submit" name="btn_dangky">Cập Nhật  </button>
        <a href="./index.php?page=all_account"> quay lại </a>
        </div>
      


    </form>
</body>
<script>
 var the_b=document.getElementsByTagName('b')[0];
function kiemtra(){
    //  name 
   
    var name=document.getElementsByName('name_kh')[0];
    if(name.value==""){
        name.focus();
        name.style.border=" 2px solid red";
       the_b.innerHTML=" Không Được Để Trống";
        return false;
    }
    name.style.border="none";
    the_b.innerHTML="";
    //  email 
    var email=document.getElementsByName('email')[0];
    if(email.value==""){
        email.focus();
        email.style.border=" 2px solid red";
        the_b.innerHTML=" Không Được Để Trống";
        return false;
    }
    email.style.border="none";
    the_b.innerHTML="";
    //  password 
    var pass=document.getElementsByName('password')[0];
    if(pass.value.length <8){
        pass.focus();
        pass.style.border=" 2px solid red";
        the_b.innerHTML=" Không Được Để Trống";
        return false;
    }
    pass.style.border="none";
    the_b.innerHTML="";
    // sdt 
    var phone=document.getElementsByName('sdt')[0];
    var sdt = /^[0][0-9]{9}$/ ;
    
    if(sdt.test(phone.value) != true){
        phone.focus();
        phone.style.border=" 2px solid red";
        the_b.innerHTML=" Không Đúng Định Dạng ";
        return false;
    }
    phone.style.border="none";
    the_b.innerHTML="";
    //  địa chỉ 
    var diachi=document.getElementsByName('diachi')[0];
    if(diachi.value==""){
        diachi.focus();
        diachi.style.border=" 2px solid red";
        the_b.innerHTML=" Không Được Để Trống";
        return false;
    }
    diachi.style.border="none";
    the_b.innerHTML="";
     //  nhâp lại  
    // var nhaplai=document.getElementsByName('nhaplai')[0];
    // if(nhaplai.value != pass.value ){
    //     nhaplai.focus();
    //     nhaplai.style.border=" 2px solid red"
    //     the_b.innerHTML=" Gồm 8 chữ số ";
    //     return false;
    // // }
    // nhaplai.style.border="none";
    // the_b.innerHTML="";
    //  sdt 
   return  true
}
</script>
</html>