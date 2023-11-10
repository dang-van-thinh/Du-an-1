<?php
// check form user
function check_form_user($name_user,$email,$password,$role,$address_user,$number_phone) {
    $error = '';
    if($name_user != "" && 
    $role != "" && $address_user != ""&&
    $email != "" &&$password != "" && $number_phone != ""
    ){
        if(strlen($password) < 6){
            $error=  "Mật khẩu phải lớn hơn 6 ký tự !";
        }elseif(is_numeric($number_phone)){
            if(strlen($number_phone) < 10 || strlen($number_phone) > 10){
                $error = "Kiểm tra lại số điện thoại";
            }
        }else{
            $error =  "Số điện thoại phải là số !";
        }

    }else{
        $error = "Kiểm tra lại các trường thông tin không được để trống !";
    }
return $error;
}


// check form login
function check_form_login($email,$password){
    $error = '';
    if($email == "" || $password == ""){
        $error = "Vui lòng không để trống Email hoặc Mật khẩu !";
    }else{
        if(strlen($password) < 6 ){
            $error = 'Mật khẩu phải lớn hơn 6 ký tự !';
        }
    }
    return $error;
}

// check add sp
function check_add_sp($name_sp,$price_sp,$price_km,$loai_sp,$quanity_sp,$mota_sp,$date_sp,$img){
    $error = "";
    if($name_sp == "" || $price_sp == "" || $price_km == "" || $loai_sp == "" || $quanity_sp == "" || $mota_sp == "" ||$date_sp == "" || $img == "" ){
        $error = "Không được để trống trường dữ liệu nào !";
    }
    return $error;
}
?>