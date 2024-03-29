<?php
session_start();
ob_start();
require_once '../model/PDO.php';
require_once '../model/Insert.php';
require_once '../model/GetDB.php';
require_once '../model/Edit.php';
require_once '../func/check_form.php';
?>
<?php
if (isset($_SESSION['id_user']) && $_SESSION['role'] != 0) {
    setcookie('toasct_f', 'Bạn đang đăng nhập bằng tài khoản admin !', time() + 3, '/');
    header('location: admin.php');
}
require_once '../view/client/component/head.php';
$dm_parent = load_dm_type(0);

include '../view/client/component/header.php';

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            $sp = load_all_sp(0, 0, 10);

            include '../view/client/page/home.php';
            break;
        case 'cart':
            include '../view/client/page/cart.php';
            break;
        case 'detail_sp':
            if (isset($_GET['id_sp'])) {
                $one_sp = load_one_sp($_GET['id_sp']);
                extract($one_sp);
                $sp = load_all_sp(0, 0, 5);
                $comment = load_comment_sp($_GET['id_sp']);
                
            }
            if(isset($_POST['comment']) && $_POST['comment'] ){ 
                $noi_dung = $_POST['noi_dung'];
                $id_sp = $_POST['id_sp'];
                $id_user = $_SESSION['id_user'];
                // Định dạng và hiển thị thời gian trong một vùng thời gian cụ thể
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngay_cm = date('Y-m-d H:i:s');

                add_comment($id_sp,$id_user,$noi_dung,$ngay_cm);
                header("location: ?act=detail_sp&id_sp=$id_sp");
            }

            include '../view/client/page/detail_sp.php';
            break;
        case 'product':
           
            if (isset($_GET['id_dm'])) {
                $id_dm = $_GET['id_dm'];
                $sp = load_sp_dm($id_dm);
                $max_gia = price_sp_max($id_dm);
                extract($max_gia);
                // var_dump($max_gia);
            }
            if (isset($_POST['search'])) {
                $search = $_POST['search_product'];
                $sp = load_search($search);
                $max_gia = price_sp_max(0, $search);
                extract($max_gia);
            }
            if(isset($_POST['loc'])){
                $id_dm = $_POST['id_dm'];
                $search = $_POST['searched'];
                $price = $_POST['price_filter'];        
                $sp = filter_sp($price,$search,$id_dm);
                $max_gia = price_sp_max();
                extract($max_gia);
            }
            include '../view/client/page/product.php';
            break;
        
        case 'gioithieu':
            include '../view/client/page/gioithieu.php';
            break;
        case 'order':
            if (isset($_SESSION['id_user'])) {
                $user = load_one_tk($_SESSION['id_user']);
                extract($user);
            }
            include '../view/client/page/order.php';

            break;
        case 'order_action':
            if (isset($_POST['dat_hang']) && $_POST['dat_hang']) {
                $name_order = $_POST['user_name_order'];
                $number_phone_order = $_POST['number_phone_order'];
                $address_order = $_POST['address_order'];
                $email_order = $_POST['email_order'];
                $pay = $_POST['pay'];
                $ghi_chu = $_POST['ghi_chu'];
                // tatast cả được lấy theo mảng
                $id_sp = $_POST['id_sp'];
                $price = $_POST['gia'];
                $quanity = $_POST['quanity'];
                $color = $_POST['color'];
                $size = $_POST['size'];

                


                $error = check_form_order($name_order, $number_phone_order, $address_order, $email_order);
                if (isset($_SESSION['id_user'])) {
                    $id_user = $_SESSION['id_user'];
                }
                if ($error == '') {
                    // Định dạng và hiển thị thời gian trong một vùng thời gian cụ thể
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    // echo $date;
                    if (add_hoa_don($id_user, $date,$pay,$name_order,$number_phone_order,
                    $address_order,$email_order,$ghi_chu) == true) {
                        $id_hd = load_id_hd($id_user);
                        // check độ dài giá trị bằng  nhau xong sẽ adđ vào đơn hàng

                        if (count($price) == count($quanity)) {
                            foreach ($id_sp as $key => $id) {
                                add_order_ct($id, $id_hd, $price[$key], $quanity[$key], $color[$key], $size[$key]);
                            }
                            update_tong_sp_hd(count($id_sp),$id_hd);
                        }
                        
                        if($pay == 2){
                           

                            include '../func/pay_momo.php';
                        }
                        // Gửi thông báo về trình duyệt
                        echo "<script>window.localStorage.removeItem('toCart')</script>";
                        setcookie('toasct_s','Mua hàng thành công !',time()+3,'/');
                        $hd = load_one_hd();
                        extract($hd);
                            $sp = load_ct_hd($id_hd);
                            include '../view/client/page/ordered.php';
                    }
                } else {
                    setcookie('alert_f', $error, time() + 3, '/');
                    header('location: ?act=order');
                }
            }else{
                setcookie('toasct_f','Thực hiện luồng mua hàng !',time()+3,'/');
                header('location: ?act=home');
            }
            break;
        case 'ordered_online':
                // Gửi thông báo về trình duyệt
                echo "<script>window.localStorage.removeItem('toCart')</script>";
                setcookie('toasct_s','Mua hàng thành công !',time()+3,'/');
                $hd = load_one_hd();
                extract($hd);
                    $sp = load_ct_hd($id_hd);
                    include '../view/client/page/ordered.php';
            break;
        case 'infor_user':
            if(isset($_GET['id_user'])){
                $tk = load_one_tk($_GET['id_user']);
                extract($tk);
               
            }
            if(isset($_POST['edit_user'])){
                $name_user = $_POST['name_user'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $id_user = $_POST['id_user'];
                    
                    $address_user = $_POST['address_user'];
                    $number_phone = $_POST['number_phone'];

                    $anh_user = $_FILES['anh_user_2']['name'];
                    $img = '';


                    if (check_form_user(
                        $name_user,
                        $email,
                        $password,
                        0,
                        $address_user,
                        $number_phone) == "") {
                        if ($anh_user != "") {
                            $folder = '../upload/user/';
                            $img = $folder . basename($anh_user);
                            $anh_tmp = $_FILES['anh_user_2']['tmp_name'];
                            move_uploaded_file($anh_tmp, $img);
                        } else {
                            $img = $_POST['anh_user'];
                        }
                        //
                        edit_user($id_user, $name_user, $email, $password, 0, $address_user, $number_phone, $img);
                        //
                        setcookie('toasct_s', 'Thay đổi thông tin người dùng thành công !', time() + 5, '/');
                        header('location: index.php?act=home');
                    } else {
                        $error = check_form_user($name_user, $email, $password, 0, $address_user, $number_phone);
                        setcookie('toasct_f', $error, time() + 5, '/');
                    }
            }
            include '../view/client/page/ct_tk.php';
            
            break;
        case 'infor_order':
            if(isset($_GET['id_user'])){
                $id_user = $_GET['id_user'];
                $sp = load_hd_user($id_user);
                // var_dump($sp);
                include '../view/client/page/user_dh.php';
            }
            break;
        case 'detail_order':
                if(isset($_GET['id_hd'])){
                    $id_hd = $_GET['id_hd'];
                    $sp = load_ct_hd($id_hd);
                    $hd= load_one_hd($id_hd);
                    extract($hd);
                    include '../view/client/page/detail_order.php';
                }
            break;
        case 'lienhe':
            include '../view/client/page/lienhe.php';
            break;
        case 'login':
            header('location: login.php');
            break;
        case 'sigin':
            header('location: login.php?lg=sigin');
            break;
        case 'logout':
            unset($_SESSION['id_user'], $_SESSION['role']);
            setcookie('toasct_s', 'Đăng xuất thành công !', time() + 5, '/');
            header('location: index.php');
            break;
        default:
        $sp = load_all_sp(0, 0, 10);
            include '../view/client/page/home.php';
            break;
    }
} else {
    $sp = load_all_sp(0, 0, 10);
    include '../view/client/page/home.php';
}
include '../view/client/component/footer.php';
include '../view/client/component/script.php';

?>