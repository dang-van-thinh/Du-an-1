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
            }

            include '../view/client/page/detail_sp.php';
            break;
        case 'product':
            if (isset($_GET['id_dm'])) {
                $id_dm = $_GET['id_dm'];
                $sp = load_sp_dm($id_dm);
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
                    if (add_hoa_don($id_user, $date,$pay) == true) {
                        $id_hd = load_id_hd($id_user);
                        // check độ dài giá trị bằng  nhau xong sẽ adđ vào đơn hàng

                        if (count($price) == count($quanity)) {
                            foreach ($id_sp as $key => $id) {
                                add_order_ct($id, $id_hd, $price[$key], $quanity[$key], $color[$key], $size[$key]);
                            }
                            update_tong_sp_hd(count($id_sp),$id_hd);
                        }
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
        // case 'ordered':
        //     $hd = load_one_hd();
        //     extract($hd);
        //         $sp = load_ct_hd($id_hd);
        //         include '../view/client/page/ordered.php';
        //     break;
        case 'infor_user':
            include '../view/client/page/lienhe.php';
            break;
        case 'infor_order':
            include '../view/client/page/lienhe.php';
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