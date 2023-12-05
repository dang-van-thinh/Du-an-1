<?php
session_start();
ob_start();
require_once '../model/PDO.php';
require_once '../model/GetDB.php';
require_once '../model/Insert.php';
require_once '../model/Login.php';
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
                    setcookie('alert_f',$check,time()+3,'/');
                    header('location: ?lg=login');
                }
                
                
            }
            include '../view/client/login/login.php';
        break;
        case 'sigin':
            if(isset($_POST['signin']) && $_POST['signin']){
                $email_sigin = $_POST['email'];
                $user_sigin = $_POST['name_user'];
                $pw_sigin = $_POST['pw'];
                $phone_sigin = $_POST['number_phone'];
                $error = check_form_sigin($email_sigin,$user_sigin,$phone_sigin,$pw_sigin);
                if( $error != ''){
                    setcookie('alert_f',$error,time()+3,'/');
                    header("Location: ?lg=sigin");
                    
                }else{
                    if(check_sigin($email_sigin) == ''){ 
                        $img = "../upload/user/mac-dinh-user.jpg";
                        insert_user($user_sigin,$email_sigin,$pw_sigin,0,'',$phone_sigin,$img);
                        setcookie('toasct_s','Bạn đã đăng ký thành công tài khoản . Giờ hãy tiến hành đăng nhập nhé !',time()+3,'/');
                        header('location: ?lg=login');
                    }else{
                        setcookie('toasct_f','Email đã tồn tại !',time()+3,'/');
                        header('location: ?lg=sigin');
                    }
                   
                }

            }
            include '../view/client/login/signin.php';
        break;
        case 'forgot':
            if(isset($_POST['forgot'])){
                require_once '../model/quenmk.php';
                  $email = $_POST['email'];
                  if(check_sigin($email) == true){
                      $kh= check_sigin($email);
                      if(sendEmail($email,$kh['password'])){
                          setcookie('toasct_s','Gửi Email thành vui lòng vào email đã đăng ký để xem ',time()+5,'/');
                      }else{
                          setcookie('toasct_f','Gửi Email không thành công',time()+5,'/');
                      }
                      header('location: ?lg=login');
                  }else{
                      setcookie('toasct_f','Email bạn nhập không tồn tại trong hệ thống !',time()+5,'/');
                      header('location: ?lg=forgot');
                  }
              
                
              }
            include '../view/client/login/forgot.php';
        break;
        case 'index':
            header('location: index.php');
        break;
        default: include '../view/client/login/login.php';
        break;
    }
}else{
    include '../view/client/login/login.php';
}
?>