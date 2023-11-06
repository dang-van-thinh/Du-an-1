<?php
require_once 'PDO.php';

// load all danh mục
function load_all_dm($item_page=0,$curent=0){
    $sql = "SELECT * FROM loai WHERE 1  ";
    if($item_page > 0){
        $sql.=" LIMIT $item_page";
    }
    if($curent > 0){
        $sql.=" OFFSET $curent";
    }
    return pdo_query($sql);
}
function count_item($table){
    $sql = "SELECT count(*) FROM $table ";
    return pdo_query_value($sql);
}
function load_one_dm($id_loai){
    $sql = "SELECT * FROM loai WHERE id_loai=$id_loai";
    return pdo_query_one($sql);
}

// load sản phẩm 


// load tk người dùng
function load_all_tk($item_page = 0,$curent = 0){
    $sql = "SELECT * FROM user WHERE 1 ";
    if($item_page > 0){
        $sql.= " LIMIT $item_page ";
    }
    if($curent > 0){
        $sql.= " OFFSET $curent";
    }
    return pdo_query($sql);
}
function load_one_tk($id_user){
    $sql = "SELECT * FROM user WHERE id_user = $id_user";
    return pdo_query_one($sql);
}

function check_login($email,$password){
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
   return pdo_query_one($sql);
}
?>