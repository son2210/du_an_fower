//  thêm trademark 
function  kiemtra(){
   var  name = document.getElementsByName('name')[0];
   if(name.value==""){
       name.focus();
       name.style.border="2px solid red";
       return false
   }
   name.style.border="none"
   var  img = document.getElementsByName('img')[0];
   if(img.value==""){
    img.focus();
    img.style.border="2px solid red";
       return false
   }
   img.style.border="none"
   return true
}
//  update trademark 
function  update(){
    var name = document.getElementsByName('name')[0];
    if(name.value==""){
        name.focus();
        name.style.border="2px solid red";
        return false
    }
    name.style.border="none" 
    return true
 }
//   kiêm  tra product 
function product() {    
    //   name    
    var name=document.getElementsByName('name_sp')[0];
    if( name.value==""){
        name.focus();
        name.style.border="2px solid red"
        return false;
    }
    name.style.border="none"
    //   img    
    var img=document.getElementsByName('img')[0];
    if( img.value==""){
        img.focus();
        img.style.border="2px solid red"
        return false;
    }
    img.style.border="none"
    // thuong hieu 
    var thuong_hieu = document.getElementsByName('thuong_hieu')[0]
    if(thuong_hieu.value==""){
        thuong_hieu.focus();
        thuong_hieu.style.border="2px solid red";
        return false
    }
    thuong_hieu.style.border="1px soli black";
//  mui huong 
    var mui_huong=document.getElementsByName('mui_huong')[0];
    if( mui_huong.value==""){
        mui_huong.focus();
        mui_huong.style.border="2px solid red"
        return false;
    }
    mui_huong.style.border="none"
//  phongcach
    var phongcach=document.getElementsByName('phongcach')[0];
    if( phongcach.value==""){
        phongcach.focus();
        phongcach.style.border="2px solid red"
        return false;
    }
    phongcach.style.border="none"
//  nong_no
    var nong_no=document.getElementsByName('nong_no')[0];
    if( nong_no.value==""){
        nong_no.focus();
        nong_no.style.border="2px solid red"
        return false;
    }
    nong_no.style.border="none"
//  nam_ph
    var nam_ph=document.getElementsByName('nam_ph')[0];
    if(nam_ph.value.length !=4){
        nam_ph.focus();
        nam_ph.style.border="2px solid red"
        return false;
    }else if(!isNaN(nam_ph)){
        nam_ph.focus();
        nam_ph.style.border="2px solid red"
        return false;
    }
    nam_ph.style.border="none"
//  xuat_su
    var xuat_su=document.getElementsByName('xuat_su')[0];
    if( xuat_su.value==""){
        xuat_su.focus();
        xuat_su.style.border="2px solid red"
        return false;
    }
    xuat_su.style.border="none"
//  price_old
    var price_old=document.getElementsByName('price_old')[0];
    if(price_old.value==""){
        price_old.focus();
        price_old.style.border="2px solid red"
        return false;
    }
    price_old.style.border="none"
//  price_15ML
    var price_15ML=document.getElementsByName('price_15ML')[0];
    if( price_15ML.value==""){
        price_15ML.focus();
        price_15ML.style.border="2px solid red"
        return false;
    }
    price_15ML.style.border="none"
  
//  price_50ML
    var price_50ML=document.getElementsByName('price_50ML')[0];
    if(price_50ML.value==""){
        price_50ML.focus();
        price_50ML.style.border="2px solid red"
        return false;
    }
    price_50ML.style.border="none"
//  price_100ML
    var price_100ML=document.getElementsByName('price_100ML')[0];
    if( price_100ML.value==""){
        price_100ML.focus();
        price_100ML.style.border="2px solid red"
        return false;
    }
    price_100ML.style.border="none"
    //  price_150ML
    var price_150ML=document.getElementsByName('price_150ML')[0];
    if(price_150ML.value==""){
        price_150ML.focus();
        price_150ML.style.border="2px solid red"
        return false;
    }
    price_150ML.style.border="none";
    //  mota
    return true
}
//  ipdate product 
function update_product(){  
        //   name    
        var name=document.getElementsByName('name_sp')[0];
        if( name.value==""){
            name.focus();
            name.style.border="2px solid red"
            return false;
        }
        name.style.border="none"
        
        // thuong hieu 
        var thuong_hieu = document.getElementsByName('thuong_hieu')[0]
        if(thuong_hieu.value==""){
            thuong_hieu.focus();
            thuong_hieu.style.border="2px solid red";
            return false
        }
        thuong_hieu.style.border="none";
    //  mui huong 
        var mui_huong=document.getElementsByName('mui_huong')[0];
        if( mui_huong.value==""){
            mui_huong.focus();
            mui_huong.style.border="2px solid red"
            return false;
        }
        mui_huong.style.border="none"
    //  phongcach
        var phongcach=document.getElementsByName('phongcach')[0];
        if( phongcach.value==""){
            phongcach.focus();
            phongcach.style.border="2px solid red"
            return false;
        }
        phongcach.style.border="none"
    //  nong_no
        var nong_no=document.getElementsByName('nong_no')[0];
        if( nong_no.value==""){
            nong_no.focus();
            nong_no.style.border="2px solid red"
            return false;
        }
        nong_no.style.border="none"
    //  nam_ph
        var nam_ph=document.getElementsByName('nam_ph')[0];
        if(nam_ph.value==""){
            nam_ph.focus();
            nam_ph.style.border="2px solid red"
            return false;
        }
        nam_ph.style.border="none"
    //  xuat_su
        var xuat_su=document.getElementsByName('xuat_su')[0];
        if( xuat_su.value==""){
            xuat_su.focus();
            xuat_su.style.border="2px solid red"
            return false;
        }
        xuat_su.style.border="none"
    //  price_old
        var price_old=document.getElementsByName('price_old')[0];
        if(price_old.value==""){
            price_old.focus();
            price_old.style.border="2px solid red"
            return false;
        }
        price_old.style.border="none"
    //  price_15ML
        var price_15ML=document.getElementsByName('price_15ML')[0];
        if( price_15ML.value==""){
            price_15ML.focus();
            price_15ML.style.border="2px solid red"
            return false;
        }
        price_15ML.style.border="none"
      
    //  price_50ML
        var price_50ML=document.getElementsByName('price_50ML')[0];
        if(price_50ML.value==""){
            price_50ML.focus();
            price_50ML.style.border="2px solid red"
            return false;
        }
        price_50ML.style.border="none"
    //  price_100ML
        var price_100ML=document.getElementsByName('price_100ML')[0];
        if( price_100ML.value==""){
            price_100ML.focus();
            price_100ML.style.border="2px solid red"
            return false;
        }
        price_100ML.style.border="none"
        //  price_150ML
        var price_150ML=document.getElementsByName('price_150ML')[0];
        if(price_150ML.value==""){
            price_150ML.focus();
            price_150ML.style.border="2px solid red"
            return false;
        }
        price_150ML.style.border="none";
        //  mota
      
        return true
    
}