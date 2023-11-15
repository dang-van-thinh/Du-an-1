<?php
session_start();
ob_start();
require_once '../model/PDO.php';
require_once '../model/Insert.php';
require_once '../model/GetDB.php';
require_once '../model/Edit.php';
?>
<?php
if(isset($_SESSION['id_user']) && $_SESSION['role'] != 0){
    setcookie('toasct_f','Bạn đang đăng nhập bằng tài khoản admin !',time()+3,'/');
    header('location: admin.php');
}
include '../view/client/component/head.php';
    $dm_parent = load_dm_type(0);
    
include '../view/client/component/header.php';

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            $sp = load_all_sp(0,0,10);
            
            include '../view/client/page/home.php';
            break;
        case 'cart':
            include '../view/client/page/cart.php';
            break;
        case 'login':
            header('location: login.php');
            break;
        case 'logout':
            unset($_SESSION['id_user'],$_SESSION['role']);
            setcookie('toasct_s','Đăng xuất thành công !',time()+5,'/');
            header('location: index.php');
            break;
        default:
        include '../view/client/page/home.php';
            break;
    }
}else{
    include '../view/client/page/home.php';
}
include '../view/client/component/footer.php';
include '../view/client/component/script.php';

?>