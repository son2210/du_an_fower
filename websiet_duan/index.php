<?php 

if(isset($_GET['page'])){
    $page=$_GET['page'];
   
    switch($page){
        case 'nuochoanam':
            include_once('./src/cores/nuochoanam.php');
        break;
        case 'nuochoanu':
            include_once('./src/cores/nuochoanu.php');
        break;
        case 'sanpham':
            include_once('./src/cores/sanpham.php');
        break;
        case 'dangnhap':
            include_once('./src/cores/dangnhap.php');
        break;
        case 'dangxuat':
            include_once('./src/cores/dangxuat.php');
        break;
        case 'dangky':
            include_once('./src/cores/dangky.php');
        break;
        case 'quantri':
            include_once('./src/Admin/quantri.php');
        break;
        //  all tài khoản 
        case 'all_account':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_taikhoan/user.php');
        break;
        //  all sản phẩm 
        case 'all_product':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_sanpham/sanpham.php');
        break;
        case 'information_store':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_cuahang/information_store.php');
        break;
        case 'slide_home':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_cuahang/slide_home.php');
        break;
        //  coment 
        case 'all_coment':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quanly_banhang/coment.php');
        break;
        case 'delete_coment':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quanly_banhang/delete_coment.php');
        break;
        case 'chitiet_coment':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quanly_banhang/chitiet_coment.php');
        break;
        case'xoa_coment':      
            include_once ('./src/cores/xoa_coment.php');
        break;
        // tài khoản 
        case 'them_acc':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_taikhoan/them_acc.php');
        break;
        case 'xoa_acc':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_taikhoan/xoa_acc.php');
        break;
        case 'sua_acc':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_taikhoan/sua_acc.php');
        break;
          // thương hiệu 
          case 'all_trademark':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_sanpham/trademark.php');
        break;
          case 'them_trademark':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_sanpham/them_trademark.php');
        break;
          case 'delete_trademark':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_sanpham/xoa_trademark.php');
        break;
          case 'update_trademark':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_sanpham/sua_trademark.php');
        break;
           //  sản phẩm 
          case 'them_product':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_sanpham/them_product.php');
        break;
          case 'update_product':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_sanpham/update_product.php');
        break;
          case 'delete_product':
            require_once ('./src/Admin/quantri.php');
            include_once ('./src/Admin/quantri_sanpham/delete_product.php');
        break;
            //  tt cửa hàng 
            case 'them_information':
                require_once ('./src/Admin/quantri.php');
                include_once ('./src/Admin/quantri_cuahang/them_information.php');
            break;
            case 'delete_information':
                require_once ('./src/Admin/quantri.php');
                include_once ('./src/Admin/quantri_cuahang/delete_information.php');
            break;
            case 'update_information':
                require_once ('./src/Admin/quantri.php');
                include_once ('./src/Admin/quantri_cuahang/update_information.php');
            break;
            //  silde home 
            case 'them_slide':
                require_once ('./src/Admin/quantri.php');
                include_once ('./src/Admin/quantri_cuahang/them_slide.php');
            break;
            case 'delete_slide':
                require_once ('./src/Admin/quantri.php');
                include_once ('./src/Admin/quantri_cuahang/delete_slide.php');
            break;
            case 'update_slide':
                require_once ('./src/Admin/quantri.php');
                include_once ('./src/Admin/quantri_cuahang/update_slide.php');
            break;
        //  sp theo thương hiệu 
        case 'thuonghieu':
            include_once ('./src/cores/thuonghieu.php');
        break;
        default;
      
    }
}else{
    include_once ('./src/cores/home.php');
}


