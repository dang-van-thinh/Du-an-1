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
if (isset($_SESSION['id_user']) && $_SESSION['role'] != 0) {
    include '../view/admin/component/head.php';

    include '../view/admin/component/header.php';
    include '../view/admin/component/nav.php';

    if (isset($_GET['ad'])) {
        switch ($_GET['ad']) {
                //quản lý sản phẩm
            case 'home':
                $tt_0 = load_tt_hd(1);
                $tt_3 = load_tt_hd(2);
                $user = count_item('user');
                $comment = count_item('comment');
                include '../view/admin/thong-ke/home.php';
                break;
            case 'add_sp':
                $dm = load_dm_type(1);
                if (isset($_POST['add_sp']) && $_POST['add_sp']) {
                    $name_sp = $_POST['name_sp'];
                    $price_sp = $_POST['price_sp'];
                    $price_km = $_POST['price_km'];
                    $img_sp = $_FILES['img_sp']['name'];
                    $date_sp = $_POST['date_sp'];
                    $loai_sp = $_POST['loai_sp'];
                    $quanity_sp = $_POST['quanity_sp'];
                    $mota_sp = $_POST['mota_sp'];
                    $method_color =array();
                    // xử lý dữ liệu color và size
                    if(!isset($_POST['color_no'])){
                        if (isset($_POST['value_color']) && isset($_POST['name_color'])) {
                            
                            $value_color = $_POST['value_color'];
                            // var_dump($value_color);
                            $name_color = $_POST['name_color'];
                            // var_dump($name_color);
                            
                            if (count($value_color) == count($name_color)) {
                                // Sử dụng vòng lặp để thêm từng cặp giá trị vào mảng liên hợp
                                for ($i = 0; $i < count($name_color); $i++) {
                                    $method_color["$name_color[$i]"] = "$value_color[$i]";
                                }
                            } else {
                                // Xử lý khi độ dài của hai mảng không bằng nhau
                                echo "Độ dài của hai mảng không bằng nhau.";
                            }
                            $method_color = json_encode($method_color,JSON_UNESCAPED_UNICODE); // chuyển đổi mảng liên kết thành dạng json, với ddidiefu kiện là kochuyeenr đổi mã hóa
                            // echo($method_color);
                        }
                    }else{
                        echo 'sp KO CÓ MÀU';
                        $method_color = implode(' ', $method_color); // vì nó ko có giá trị 
                    }
                    $method_size = $_POST['method_size'];

                    // xử lý dữ liệu ảnh
                    $folder ='../upload/sp/';
                    $img = $folder . basename($img_sp);
                    $img_tmp = $_FILES['img_sp']['tmp_name'];

                    // check validate
                    $check_sp = check_add_sp($name_sp, $price_sp, $price_km, $loai_sp, $quanity_sp, $mota_sp, $date_sp, $img);
                    if ($check_sp != '') {
                        setcookie('toasct_f', $check_sp, time() + 3, '/');
                        header('location: ?ad=add_sp');
                    } else {
                        // echo 'okeeeee';

                        move_uploaded_file( $img_tmp,$img);
                        insert_sp(
                            $name_sp,
                            $price_sp,
                            $price_km,
                            $loai_sp,
                            $quanity_sp,
                            $mota_sp,
                            $date_sp,
                            $img,
                            $method_color,
                            $method_size
                        );
                        
                    }
                    // var_dump(load_all_sp());
                }
                include '../view/admin/san-pham/add_sp.php';
                break;
            case 'list_sp':
                 // chia page
                 $pani = 1;
                 if (isset($_GET['curent_page'])) {
                     $pani = $_GET['curent_page'];
                 }
                 $item_page = 5;
                 $curent = $pani - 1;
                 $curent = $curent * $item_page;
                 $table = 'san_pham';
                 $total_item = count_item($table); // đếm có bao nhiêu danh mục để chia page
                 $page = ceil($total_item / $item_page); // làm tròn số lên 
                $sp = load_all_sp($item_page,$curent);
                include '../view/admin/san-pham/list_sp.php';
                break;
            case 'ct_sp':
                if(isset($_GET['id_sp'])){
                    $id_sp = $_GET['id_sp'];
                    $sp=load_one_sp($id_sp);
                    extract($sp);
                    if($method_color != null){
                        $method_color = json_decode($method_color,true); // chuyển đổi trở lại thành mảng
                    }
                    // var_dump($method_color);
                    // xử lý dữ liệu color và size về mảng
                   
                    
                    $dm = load_dm_type(1);
                }

                include '../view/admin/san-pham/ct_sp.php';
                break;
            case 'edit_sp':
                if (isset($_POST['edit_sp']) && $_POST['edit_sp']) {
                    $name_sp = $_POST['name_sp'];
                    $price_sp = $_POST['price_sp'];
                    $price_km = $_POST['price_km'];
                    $img_sp = $_FILES['img_sp']['name'];
                    $date_sp = $_POST['date_sp'];
                    $loai_sp = $_POST['loai_sp'];
                    $quanity_sp = $_POST['quanity_sp'];
                    $mota_sp = $_POST['mota_sp'];
                    $id_sp=$_POST['id_sp'];
                    $method_color = [];
                    // xử lý dữ liệu color và size
                    if(!isset($_POST['color_no'])){
                        if (isset($_POST['value_color']) && isset($_POST['name_color'])) {
                            
                            $value_color = $_POST['value_color'];
                            // var_dump($value_color);
                            $name_color = $_POST['name_color'];
                            // var_dump($name_color);
                            
                            if (count($value_color) == count($name_color)) {
                                // Sử dụng vòng lặp để thêm từng cặp giá trị vào mảng liên hợp
                                for ($i = 0; $i < count($name_color); $i++) {
                                    $method_color["$name_color[$i]"] = "$value_color[$i]";
                                }
                            } else {
                                // Xử lý khi độ dài của hai mảng không bằng nhau
                                echo "Độ dài của hai mảng không bằng nhau.";
                            }
                            $method_color = json_encode($method_color,JSON_UNESCAPED_UNICODE); // chuyển đổi mảng liên kết thành dạng json, với ddidiefu kiện là kochuyeenr đổi mã hóa
                            echo($method_color);
                        }
                    }else{
                        echo 'KO CÓ MÀU';
                        $method_color = implode(' ', $method_color); // vì nó ko có giá trị 
                    }
                    $method_size = $_POST['method_size'];


                    // sử lý dữ liệu ảnh
                    if($img_sp == null){
                        $img = $_POST['img_sp2'];
                    }else{
                        $folder ='../upload/sp/';
                        $img = $folder . basename($img_sp);
                        $img_tmp = $_FILES['img_sp']['tmp_name'];
                    }
                    
                    // check validate
                    $check_sp = check_add_sp($name_sp, $price_sp, $price_km, $loai_sp, $quanity_sp, $mota_sp, $date_sp, $img);
                    if ($check_sp != '') {
                        setcookie('toasct_f', $check_sp, time() + 3, '/');
                        header('location: ?ad=add_sp');
                    } else {
                        // echo 'eeeokee';
                        move_uploaded_file( $img_tmp,$img);
                        edit_sp(
                            $name_sp,
                            $price_sp,
                            $price_km,
                            $loai_sp,
                            $quanity_sp,
                            $mota_sp,
                            $date_sp,
                            $img,
                            $method_color,
                            $method_size,
                            $id_sp
                        );
                        setcookie('toasct_s','Cập nhật thành công sản phẩm !',time()+3,'/');
                        header('location: ?ad=list_sp');
                        // var_dump(load_all_sp());
                    }
                }
                break;
            case 'del_sp':
                if(isset($_GET['id_sp'])){
                    $id_sp = $_GET['id_sp'];
                    del_sp($id_sp);
                    setcookie('toasct_s','Xóa thành công sản phẩm',time()+3,'/');
                    header('location: ?ad=list_sp');
                }
                break;
                //quản lý tài khoản
            case 'list_tk':
                // chia page
                $pani = 1;
                if (isset($_GET['curent_page'])) {
                    $pani = $_GET['curent_page'];
                }
                $item_page = 10;
                $curent = $pani - 1;
                $curent = $curent * $item_page;
                $table = 'user';
                $total_item = count_item($table); // đếm có bao nhiêu danh mục để chia page
                $page = ceil($total_item / $item_page); // làm tròn số lên 
                //load tk
                $tk = load_all_tk($item_page, $curent);
                include '../view/admin/tai-khoan/list_tk.php';
                break;
            case 'add_tk':
                if (isset($_POST['add_tk']) && $_POST['add_tk']) {
                    $name_user = $_POST['name_user'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $role = $_POST['role'];
                    $address_user = $_POST['address_user'];
                    $number_phone = $_POST['number_phone'];
                    $anh_user = $_FILES['anh_user']['name'];
                    $img = '';


                    if (check_form_user(
                        $name_user,
                        $email,
                        $password,
                        $role,
                        $address_user,
                        $number_phone
                    ) == "") {
                        if ($anh_user != "") {
                            $folder = '../upload/user/';
                            $img = $folder . basename($anh_user);
                            $anh_tmp = $_FILES['anh_user']['tmp_name'];
                            move_uploaded_file($anh_tmp,$img);
                        } else {
                            $img = "../upload/user/mac-dinh-user.jpg";
                        }
                        //
                        insert_user($name_user, $email, $password, $role, $address_user, $number_phone, $img);
                        //
                        setcookie('toasct_s', 'Thêm người dùng thành công !', time() + 5, '/');
                        header('location: ?ad=list_tk');
                    } else {
                        $error = check_form_user($name_user, $email, $password, $role, $address_user, $number_phone);
                        setcookie('toasct_f', $error, time() + 5, '/');
                        header('location: ?ad=add_tk');
                    }
                }
                include '../view/admin/tai-khoan/add_tk.php';
                break;
            case 'ct_tk':
                if (isset($_GET['id_user'])) {
                    $id_user = $_GET['id_user'];
                    $tk = load_one_tk($id_user);
                    extract($tk);
                    include '../view/admin/tai-khoan/ct_tk.php';
                }
                if (isset($_POST['edit_tk'])) {
                    $name_user = $_POST['name_user'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $id_user = $_POST['id_user'];
                    $role = $_POST['role'];
                    $address_user = $_POST['address_user'];
                    $number_phone = $_POST['number_phone'];

                    $anh_user = $_FILES['anh_user_2']['name'];
                    $img = '';


                    if (check_form_user(
                        $name_user,
                        $email,
                        $password,
                        $role,
                        $address_user,
                        $number_phone
                    ) == "") {
                        if ($anh_user != "") {
                            $folder = '../upload/user/';
                            $img = $folder . basename($anh_user);
                            $anh_tmp = $_FILES['anh_user_2']['tmp_name'];
                            move_uploaded_file($anh_tmp, $img);
                        } else {
                            $img = $_POST['anh_user'];
                        }
                        //
                        edit_user($id_user, $name_user, $email, $password, $role, $address_user, $number_phone, $img);
                        //
                        setcookie('toasct_s', 'Thay đổi thông tin người dùng thành công !', time() + 5, '/');
                        header('location: ?ad=list_tk');
                    } else {
                        $error = check_form_user($name_user, $email, $password, $role, $address_user, $number_phone);
                        setcookie('toasct_f', $error, time() + 5, '/');
                    }
                }
                break;
            case 'del_tk':
                if (isset($_GET['id_user'])) {
                    $id_user = $_GET['id_user'];
                    del_user($id_user);
                    setcookie('toasct_s', 'Xóa tài khoản thành công !', time() + 5, '/');
                    header('location: ?ad=list_tk');
                }
                break;
                // quản lý danh mục sản phẩm
            case 'list_dm':
                $pani = 1;
                if (isset($_GET['curent_page'])) {
                    $pani = $_GET['curent_page'];
                }
                $item_page = 10;
                $curent = $pani - 1;
                $curent = $curent * $item_page;
                $table = 'loai';
                $total_item = count_item($table); // đếm có bao nhiêu danh mục để chia page
                $page = ceil($total_item / $item_page); // làm tròn số lên 
                $dm = load_all_dm($item_page, $curent);
                include '../view/admin/danh-muc/list_dm.php';
                break;
            case 'ct_dm':
                if (isset($_GET['id_dm']) && $_GET['id_dm']) {
                    $id_dm = $_GET['id_dm'];
                    $dm = load_one_dm($id_dm);
                    $dm_type = load_dm_type($type = 0);
                    include '../view/admin/danh-muc/ct_dm.php';
                }
                if (isset($_POST['thay_doi']) && $_POST['thay_doi']) {
                    $id_loai = $_POST['id_loai'];
                    $ten_loai = $_POST['name_dm'];
                    $parent_dm = $_POST['parent_dm'];
                    setcookie('toasct_s', 'Thay đổi danh mục thành công !', time() + 5, '/');
                    edit_dm($id_loai, $ten_loai, $parent_dm);
                    header('location: ?ad=list_dm');
                }
                break;
            case 'del_dm':
                if (isset($_GET['id_dm'])) {
                    $id_dm = $_GET['id_dm'];
                    del_dm($id_dm);
                    setcookie('toasct_s', 'Xóa thành công danh mục sản phẩm !', time() + 5, '/');
                    header('location: ?ad=list_dm');
                }
                break;
            case 'add_dm':
                if (isset($_POST['add_dm']) && $_POST['add_dm']) {
                    $name_dm = $_POST['name_dm'];
                    $type_dm = $_POST['parent_dm'];
                    insert_loai($name_dm, $type_dm);
                    setcookie('toasct_s', 'Thêm mới danh mục thành công !', time() + 5, '/');
                }
                $dm_type = load_dm_type();
                include '../view/admin/danh-muc/add_dm.php';
                break;
            case 'comment':
                $pani = 1;
                if (isset($_GET['curent_page'])) {
                    $pani = $_GET['curent_page'];
                }
                $item_page = 10;
                $curent = $pani - 1;
                $curent = $curent * $item_page;
                $table = 'comment';
                $total_item = count_item($table); // đếm có bao nhiêu danh mục để chia page
                $page = ceil($total_item / $item_page); // làm tròn số lên 
                $comment = load_all_cm($item_page,$curent);
                include '../view/admin/binh-luan/comment.php';
            break;
            case 'ct_comment':
                if(isset($_GET['id_sp'])){
                   
                    $id_sp = $_GET['id_sp'];
                    $comment = load_cm_sp($id_sp);
                    include '../view/admin/binh-luan/comment_sp.php';
                }else{
                    header('location: ?ad=comment');
                }
                break;
            case 'del_cm':
                if(isset($_GET['id_cm'])){
                    $id_cm = $_GET['id_cm'];
                    del_cm($id_cm);
                    setcookie('toasct_s','Xóa bình luận thành công !',time()+3,'/');
                    header("location: ?ad=comment");
                }
                break;
            case 'thong_ke':
                $pani = 1;
                if (isset($_GET['curent_page'])) {
                    $pani = $_GET['curent_page'];
                }
                $item_page = 10;
                $curent = $pani - 1;
                $curent = $curent * $item_page;
                $table = 'hoa_don';
                $total_item = count_item($table); // đếm có bao nhiêu danh mục để chia page
                $page = ceil($total_item / $item_page); // làm tròn số lên 
                //load hd
                $hd = load_all_hd($item_page,$curent);
                // var_dump($hd);
                
                include '../view/admin/thong-ke/hoa_don.php';
            break;
            case 'infor_hd':
                if(isset($_GET['id_hd'])){
                    $hd = load_one_hd($_GET['id_hd']);
                    extract($hd);
                    $sp = load_ct_hd($id_hd);
                    include '../view/admin/thong-ke/infor_hd.php';
                }
                // if(isset($_POST['update_hd']) && $_POST['update_hd']){
                //     $id_hd = $_POST['id_hd'];
                //     $tt = $_POST['trang_thai'];
                //     update_tt_dh($id_hd,$tt);
                //     setcookie('toasct_s','Cập nhật thành công !',time()+3,'/');
                //     header('location: ?ad=thong_ke');
                // }
                break;
            case 'bieu_do':
                include '../view/admin/thong-ke/bieu_do.php';
            break;
            case 'doanh_thu':
                include '../view/admin/thong-ke/bieu_do.php';
            break;
            case 'logout':
                unset($_SESSION['id_user'], $_SESSION['role']);
                header('location: index.php');
                break;
            default:
            $tt_0 = load_tt_hd(1);
                $tt_3 = load_tt_hd(2);
                $user = count_item('user');
                $comment = count_item('comment');
                include '../view/admin/thong-ke/home.php';
                break;
        }
    } else {
        $tt_0 = load_tt_hd(1);
                $tt_3 = load_tt_hd(2);
                $user = count_item('user');
                $comment = count_item('comment');
        include '../view/admin/thong-ke/home.php';
    }

    include_once '../view/admin/component/script.php';
} else {
    setcookie('toasct_f', 'Bạn không có quyền truy cập , liên hệ với quản trị viên !', time() + 5, '/');
    header('location: index.php');
}
?>