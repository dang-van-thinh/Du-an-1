<?php
session_start();
ob_start();
require_once '../model/PDO.php';
require_once '../model/Insert.php';
require_once '../model/GetDB.php';
require_once '../model/Edit.php';
require_once '../func/check_form.php';
require_once '../model/Delete.php';
?>
<?php
if(isset($_SESSION['id_user']) && $_SESSION['role'] != 0){
include '../view/admin/component/head.php';

include '../view/admin/component/header.php';
include '../view/admin/component/nav.php';

if(isset($_GET['ad'])){
    switch($_GET['ad']){
        //quản lý sản phẩm
        case 'home':
            include '../view/admin/san-pham/list_sp.php';
        break;
        case 'add_sp':
            $dm = load_dm_type(1);
            if(isset($_POST['add_sp']) && $_POST['add_sp']){
                $name_sp = $_POST['name_sp'];
                $price_sp = $_POST['price_sp'];
                $price_km = $_POST['price_km'];
                $img = $_FILES['img_sp']['name'];
                $date_sp = $_POST['date_sp'];
                $loai_sp = $_POST['loai_sp'];
                $quanity_sp = $_POST['quanity_sp'];
                $mota_sp = $_POST['mota_sp'];

                $method_color = [];
               
                if($_POST['method_color_blue'] != null){
                    array_push($method_color,$_POST['method_color_blue']);
                }
                if($_POST['method_color_white'] != null){
                    array_push($method_color,$_POST['method_color_white']);
                }
                if($_POST['method_color_red'] != null){
                    array_push($method_color,$_POST['method_color_red']);
                }
                $method_size = $_POST['method_size'];
            $check_sp = check_add_sp($name_sp,$price_sp,$price_km,$loai_sp,$quanity_sp,$mota_sp,$date_sp,$img);
                if($check_sp != ''){
                    setcookie('toasct_f',$check_sp,time()+3,'/');
                    header('location: ?ad=add_sp');
                }else{
                    echo 'okeeeee';
                }
            }
            include '../view/admin/san-pham/add_sp.php';
        break;
        case 'list_sp':
            $dm = load_all_dm();
           
            include '../view/admin/san-pham/add_sp.php';
        break;
        case 'ct_sp':
            $dm = load_all_dm();
           
            include '../view/admin/san-pham/add_sp.php';
        break;
        //quản lý tài khoản
        case 'list_tk':
            $pani = 1;
            if(isset($_GET['curent_page'])){ 
                $pani = $_GET['curent_page'];
            }
            $item_page =10;
            $curent = $pani - 1 ;
            $table = 'user';
            $total_item = count_item($table); // đếm có bao nhiêu danh mục để chia page
            $page = ceil($total_item / $item_page); // làm tròn số lên 
            $tk = load_all_tk($item_page,$curent);
            include '../view/admin/tai-khoan/list_tk.php';
        break;
        case 'add_tk':
            if(isset($_POST['add_tk']) && $_POST['add_tk']){ 
                $name_user = $_POST['name_user'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $role = $_POST['role'];
                $address_user = $_POST['address_user'];
                $number_phone = $_POST['number_phone'];
                $anh_user = $_FILES['anh_user']['name'];
                $img = '';
                

                if(check_form_user($name_user,$email,$password,
                $role,$address_user,$number_phone) == ""){
                    if($anh_user != ""){
                        $folder = '../upload/user/';
                   $img = $folder .basename($anh_user);
                    $anh_tmp = $_FILES['anh_user']['tmp_name'];
                    move_uploaded_file($img ,$anh_tmp);
                       
                    }else{
                        $img = "../upload/user/mac-dinh-user.jpg";
                    }
                    //
                    insert_user($name_user,$email,$password,$role,$address_user,$number_phone,$img);
                    //
                    setcookie('toasct_s','Thêm người dùng thành công !',time()+5,'/');
                    header('location: ?ad=list_tk');
                }else{
                    $error = check_form_user($name_user,$email,$password,$role,$address_user,$number_phone);
                    setcookie('toasct_f',$error,time()+5,'/');
                    header('location: ?ad=add_tk');
                }
            }
            include '../view/admin/tai-khoan/add_tk.php';
        break;
        case 'ct_tk':
            if(isset($_GET['id_user'])){
                $id_user = $_GET['id_user'];
                $tk = load_one_tk($id_user);
                extract($tk);
                include '../view/admin/tai-khoan/ct_tk.php';
            }
            if(isset($_POST['edit_tk'])){
                $name_user = $_POST['name_user'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $id_user = $_POST['id_user'];
                $role = $_POST['role'];
                $address_user = $_POST['address_user'];
                $number_phone = $_POST['number_phone'];

                $anh_user = $_FILES['anh_user_2']['name'];
                $img = '';
                

                if(check_form_user($name_user,$email,$password,
                $role,$address_user,$number_phone) == ""){
                    if($anh_user != ""){
                        $folder = '../upload/user/';
                   $img = $folder .basename($anh_user);
                    $anh_tmp = $_FILES['anh_user_2']['tmp_name'];
                    move_uploaded_file($anh_tmp,$img);
                       
                    }else{
                        $img = $_POST['anh_user'];
                    }
                    //
                    edit_user($id_user,$name_user,$email,$password,$role,$address_user,$number_phone,$img);
                    //
                    setcookie('toasct_s','Thay đổi thông tin người dùng thành công !',time()+5,'/');
                    header('location: ?ad=list_tk');
                }else{
                    $error = check_form_user($name_user,$email,$password,$role,$address_user,$number_phone);
                    setcookie('toasct_f',$error,time()+5,'/');
                     
                }
            }
        break;
        case 'del_tk':
            if(isset($_GET['id_user'])){
                $id_user = $_GET['id_user'];
                del_user($id_user);
               setcookie('toasct_s','Xóa tài khoản thành công !',time()+5,'/');
               header('location: ?ad=list_tk');
            }
        break;
        // quản lý danh mục sản phẩm
        case 'list_dm':
            $pani = 1;
            if(isset($_GET['curent_page'])){ 
                $pani = $_GET['curent_page'];
            }
            $item_page = 10;
            $curent = $pani - 1 ;
            $table = 'loai';
            $total_item = count_item($table); // đếm có bao nhiêu danh mục để chia page
            $page = ceil($total_item / $item_page); // làm tròn số lên 
            $dm = load_all_dm($item_page,$curent);
            include '../view/admin/danh-muc/list_dm.php';
        break;
        case 'ct_dm':
            if(isset($_GET['id_dm']) && $_GET['id_dm']){
                $id_dm = $_GET['id_dm'];
                $dm = load_one_dm($id_dm);
                $dm_type = load_dm_type($type=0);
                include '../view/admin/danh-muc/ct_dm.php';
            }
            if(isset($_POST['thay_doi']) && $_POST['thay_doi']){
                $id_loai = $_POST['id_loai'];
                $ten_loai = $_POST['name_dm'];
                $parent_dm = $_POST['parent_dm'];
                setcookie('toasct_s','Thay đổi danh mục thành công !',time()+5,'/');
                edit_dm($id_loai,$ten_loai, $parent_dm);
                header('location: ?ad=list_dm');
            }
        break;
        case 'del_dm':
            if(isset($_GET['id_dm'])){
                $id_dm = $_GET['id_dm'];
                del_dm($id_dm);
                setcookie('toasct_s','Xóa thành công danh mục sản phẩm !',time()+5,'/');
                header('location: ?ad=list_dm');
            }
        break;
        case 'add_dm':
            if(isset($_POST['add_dm']) && $_POST['add_dm']){
                $name_dm = $_POST['name_dm'];
                $type_dm = $_POST['parent_dm'];
                insert_loai($name_dm,$type_dm);
                setcookie('toasct_s','Thêm mới danh mục thành công !',time()+5,'/');
            }
            $dm_type = load_dm_type();
            include '../view/admin/danh-muc/add_dm.php';
        break;
        case 'logout':
            unset($_SESSION['id_user'],$_SESSION['role']);
            header('location: index.php');
        break;
        default: 
        include '../view/admin/san-pham/list_sp.php';
        break;
    }
}else{
    include '../view/admin/san-pham/list_sp.php';
}

include '../view/admin/component/script.php';
}else{
    setcookie('toasct_f','Bạn không có quyền truy cập , liên hệ với quản trị viên !',time()+5,'/');
    header('location: index.php');
}
?>