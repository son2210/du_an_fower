// đăng nhập 
function login() {
   var name = document.getElementById('name');
   var pass = document.getElementById('pass');
    var theP=document.getElementById('text');
    if (name.value =="" && pass.value=="") {
        name.focus();
        name.classList.add('erro');
        theP.innerHTML='Hãy Nhập Đầy Đủ !';
        return false;
    }
    name.classList.remove('erro');
    theP.innerHTML='';
    if(pass.value==""){
        pass.focus();
        pass.classList.add('erro');
        theP.innerHTML='Hãy Nhập Đầy Đủ !';
        return false;
    }
    pass.classList.remove('erro');
    theP.innerHTML='';
    return true;
}