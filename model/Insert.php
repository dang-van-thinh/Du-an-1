<?php
require_once 'PDO.php';

// thêm mới sản phẩm
function insert_sp(){
    $slq = "INSERT INTO san_pham";
}

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
?>