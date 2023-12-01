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

// thêm đơn hàng mới
function add_order_ct($id_sp,$id_hd,$price,$quanity,$color,$size){
    $sql = "INSERT INTO ct_hd(id_sp,id_hd,gia,sl_mua,color,size) 
    values('$id_sp','$id_hd','$price','$quanity','$color','$size')";
    pdo_excute($sql);
}

//thêm mới vào bảng hoa_don
function add_hoa_don($id_user,$date,$pay,$name_order,$number_phone_order,
$address_order,$email_order,$ghi_chu){
    $sql = "INSERT INTO hoa_don (id_user,ngay_mua,pay,ten_kh,sdt,dia_chi,email,ghi_chu) 
    values('$id_user','$date','$pay','$name_order','$number_phone_order','$address_order',
    '$email_order','$ghi_chu')";
    pdo_excute($sql);
    return true;
}


?>