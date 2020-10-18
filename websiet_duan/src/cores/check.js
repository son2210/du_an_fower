function login(){
    var name=document.getElementsByName('name')[0]
    if(name.value==""){
        name.focus();
        name.style.border="2px solid red"
        return false
    }
    name.style.border="none"
    var pass=document.getElementsByName('pass')[0]
    if(pass.value.length<8){
        pass.focus();
        pass.style.border="2px solid red"
        return false
    }
    pass.style.border="none"
    return true
}

//  đăng ký 
function kiemtra(){
    //  name 
    var the_b=document.getElementsByTagName('b')[0];
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
    //  nhâp lại  
    var nhaplai=document.getElementsByName('nhaplai')[0];
    if(nhaplai.value != pass.value ){
        nhaplai.focus();
        nhaplai.style.border=" 2px solid red"
        the_b.innerHTML=" Gồm 8 chữ số ";
        return false;
    }
    nhaplai.style.border="none";
    the_b.innerHTML="";
    //  sdt 
    var phone=document.getElementsByName('sdt')[0];
    var sdt = /^[0][0-9]{9}$/ ;
    
    if(sdt.test(phone.value) != true){
        phone.focus();
        phone.style.border=" 2px solid red";
        the_b.innerHTML=" Không Được Để Trống";
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
   return  true
}
//  conmet 
//  like 
function  like_coment(){
    alert ('ôk');
}
