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
?>