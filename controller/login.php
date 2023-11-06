<?php
session_start();
ob_start();
require_once '../model/PDO.php';
require_once '../model/GetDB.php';
require_once '../model/Insert.php';
require_once '../func/check_form.php';


?>
<?php
if(isset($_SESSION['id_user'])){
    setcookie('toasct_f','Bạn đã đăng nhập . Vui lòng đăng xuất trước !',time()+5,'/');
    header('location: admin.php');
}
include '../view/client/login/cp/head.php';

if(isset($_GET['lg'])){
    switch($_GET['lg']){
        case 'login':
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $check = check_form_login($email,$password);
                if( $check == ""){
                    $user = check_login($email,$password);
                    if($user == null){
                        setcookie('alert_f','Sai thông tin, Vui lòng kiểm tra lại email và mật khẩu !',time()+3,'/');
                        header('location: ?lg=login');
                    }else{
                        extract($user);
                        $_SESSION['id_user'] = $id_user;
                        $_SESSION['role'] = $role;
                        if($role == 0){
                            setcookie('toasct_s','Đăng nhập thành công !',time()+5,'/');
                            header('location: index.php');
                        }else{
                            setcookie('toasct_s','Đăng nhập thành công !',time()+5,'/');
                            header('location: admin.php');
                        }
                    }
                }else{
                    setcookie('toasct_f',$check,time()+3,'/');
                    header('location: ?lg=login');
                }
                
                
            }
            include '../view/client/login/login.php';
        break;
        case 'sigin':
            include '../view/client/login/signin.php';
        break;
        case 'forgot':
            include '../view/client/login/forgot.php';
        break;
        case 'index':
            include 'index.php';
        break;
        default: include '../view/client/login/login.php';
        break;
    }
}else{
    include '../view/client/login/login.php';
}
?>