// check from đăng ký 
 function kiemtra(){     
     
     var name= document.getElementsByName('name_kh')[0];
     if(name.value.trim().length == ""){
         name.focus();
         name.classList.add('erro');
         return false;
     }
     name.classList.remove('erro');
     // check sđt 
     var email= document.getElementsByName('email')[0];
    // var check = /^[0]{0-9}[9]$/ ;
     if(email.value ==""){
        
        email.focus();
        email.classList.add('erro');
         return false;
     }
     email.classList.remove('erro');
     var sdt= document.getElementsByName('sdt')[0];
    var check = /^[0][0-9]{9}$/ ;
     if(sdt.value ==""){
         alert ("");
         sdt.focus();
         sdt.classList.add('erro');
         return false;
     }
     else
     {
         if(check.test(sdt) === true)
         {
             
         }
     }
     sdt.classList.remove('erro');
    //  check user 
     var user = document.getElementsByName('user')[0];
     if(user.value==""){
         user.focus();
         user.classList.add('erro');
         return false;
     }
     user.classList.remove('erro');
    //  check pass
     var pass = document.getElementsByName('password')[0];
     if(pass.value==""){
         pass.focus();
         pass.classList.add('erro');
         return false;
     }
     pass.classList.remove('erro');
     // chekc nhập lại 
     var nhaplai = document.getElementsByName('nhaplai')[0];
     if(nhaplai.value != pass.value){
        nhaplai.focus();
        nhaplai.classList.add('erro');
         return false;
     }
     nhaplai.classList.remove('erro');
    //  check địa chỉ 
     var diachi = document.getElementById('diachi')[0];
     if(diachi.value==""){
        diachi.focus();
        diachi.classList.add('erro');
         return false;
     }
     diachi.classList.remove('erro');
    return true;
 }