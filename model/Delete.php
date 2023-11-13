<?php
require_once 'PDO.php';

// xóa danh mục sản phẩm
function del_dm($id_dm){
    $sql = "DELETE FROM loai WHERE id_loai=$id_dm";
    pdo_excute($sql);
}

// xóa người dùng
function del_user($id_user){
    $sql = "DELETE FROM user WHERE id_user=$id_user";
    pdo_excute($sql);
}
// xóa sản phẩm
function  del_sp($id_sp){
    $sql = "DELETE FROM san_pham WHERE id_sp=$id_sp";
    pdo_excute($sql);
}
?>