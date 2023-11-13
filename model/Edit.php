<?php
require_once 'PDO.php';

// thay đổi tên loại hàng
function edit_dm($id_loai,$ten_loai, $parent_dm){
    $sql= "UPDATE loai SET ten_loai='$ten_loai',type=' $parent_dm' WHERE id_loai=$id_loai";
    pdo_excute($sql);
}

// thay đổi thông tin user
function edit_user($id_user,$name_user,$email,$password,$role,$address_user,$number_phone,$img){
    $sql = "UPDATE user SET user_name='$name_user',email='$email',
     password ='$password',role='$role',address='$address_user',
     number_phone='$number_phone',img='$img' WHERE id_user=$id_user";
     pdo_excute($sql);
}

// thay đổi sản phẩm
function edit_sp(
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
){
    $sql = "UPDATE san_pham SET 
    ten_sp='$name_sp',gia_sp='$price_sp',
    gia_km='$price_km',img='$img',so_luong='$quanity_sp',
    ngay_nhap='$date_sp',mo_ta='$mota_sp',
    method_color='$method_color',method_size='$method_size',id_loai='$loai_sp' WHERE id_sp='$id_sp'";
    pdo_excute($sql);
}
