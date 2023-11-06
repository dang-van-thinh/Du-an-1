<?php
session_start();
ob_start();
require_once '../model/PDO.php';
?>
<?php
if(isset($_SESSION['id_user']) && $_SESSION['role'] != 0){
    setcookie('toasct_f','Bạn đang đăng nhập bằng tài khoản admin !',time()+5,'/');
    header('location: admin.php');
}
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            # code...
            break;
        case 'home':
            # code...
            break;
        case 'home':
            # code...
            break;
        case 'logout':
            unset($_SESSION['id_user'],$_SESSION['role']);
            header('location: login.php');
            break;
        default:
            # code...
            break;
    }
}

?>