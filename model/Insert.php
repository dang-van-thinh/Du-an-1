<?php
require_once 'PDO.php';

// thêm mới loại sản phẩm
function insert_loai($tenLoai,$type_dm){
    $sql = "INSERT INTO loai(ten_loai,type) VALUES ('$tenLoai','$type_dm')";
    pdo_excute($sql);
}

// thêm mới tk người dùng
function insert_user($name_user,$email,$password,$role=0,$address_user='',$number_phone = '',$anh_user = ''){
    $sql = "INSERT INTO user(user_name,email,password,role,address,number_phone,img) 
    VALUES ('$name_user','$email','$password','$role','$address_user','$number_phone','$anh_user')";
    pdo_excute($sql);
}
// thêm mới sản phẩm
function insert_sp($name_sp,$price_sp,$price_km,$loai_sp,$quanity_sp,$mota_sp,$date_sp,$img,$method_color,$method_size){
    $sql = "INSERT INTO san_pham(id_loai,ten_sp,gia_sp,gia_km,img,so_luong,ngay_nhap,mo_ta,method_color,method_size) 
    VALUES('$loai_sp','$name_sp','$price_sp','$price_km','$img','$quanity_sp','$date_sp','$mota_sp','$method_color','$method_size')";
    pdo_excute($sql);
}

?>