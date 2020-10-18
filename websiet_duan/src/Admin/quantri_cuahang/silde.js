//  insert silde 
function kiemtra() {
    var name = document.getElementById('ktra_name');
    if (name.value=="") {
        name.focus();
        name.style.border=" 2px solid red";
      
        return false
    }
    name.style.border="none";

    var the_img = document.getElementById('ktra_img')
    if (the_img.value == "") {
        the_img.focus();
        the_img.style.border=" 2px solid red";
        return false
    }
    the_img.style.border="none";
    return true
}
//  upadate silde 
function update() {
    var name = document.getElementById('ktra_name');
    if (name.value=="") {
        name.focus();
        name.style.border=" 2px solid red";
      
        return false
    }
    name.style.border="none";
    return true
}