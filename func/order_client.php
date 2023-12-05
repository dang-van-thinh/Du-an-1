<?php
require_once '../model/Edit.php';
if(isset($_POST['status'])){
    $status = $_POST['status'];
    $idOrder = $_POST['idOrder'];

    echo "Thay đổi thành công !";

    update_tt_dh($idOrder,$status);
    
}else{
    echo 'Lỗi chưa nhận được thông tin';
}
?>