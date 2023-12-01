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
function load_dm_type($type = 0,$status= true){
    $sql = "SELECT * FROM loai ";
    if($type != 0){
        if($status){
            $sql .=" WHERE type <> 0";
        }else{
            $sql .="WHERE type='$type'";
        }
        
    }else{
        $sql .=" WHERE type = 0  ";
    }
    return pdo_query($sql);
}
function load_dm_children($id_loai){
    $sql = "SELECT * FROM loai WHERE id_loai='$id_loai'";
    return pdo_query_one($sql);
}
function count_item($table){
    $sql = "SELECT count(*) FROM $table ";
    return pdo_query_value($sql);
}
function load_one_dm($id_loai){
    $sql = "SELECT * FROM loai WHERE id_loai=$id_loai";
    return pdo_query_one($sql);
}

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



// load sản phẩm
function load_all_sp($item_page=0,$curent=0,$tt=0){
    $sql = "SELECT * from san_pham WHERE 1 ";
    
    if($item_page > 0){
        $sql.= " LIMIT $item_page ";
    }
    if($curent > 0){
        $sql.= " OFFSET $curent";
    }
    if($tt > 0){
        $sql .=" LIMIT $tt";
    }
    
   
    return pdo_query($sql);
}
function load_one_sp($id_sp){
    $sql = "SELECT * FROM san_pham WHERE id_sp='$id_sp'";
    return pdo_query_one($sql);
}
function load_sp_dm($id_dm){
    $sql = "SELECT * FROM san_pham WHERE id_loai=$id_dm";
    return pdo_query($sql);
}
//tìm kiếm sp haocjw theo loại
function load_search($search){
    $sql = "SELECT sp.*,loai.* FROM san_pham sp JOIN loai
    ON sp.id_loai = loai.id_loai
     WHERE loai.ten_loai like '$search%' or sp.ten_sp like '$search%'";
    return pdo_query($sql);
}
//lọc sản phẩm
function filter_sp($price = null){
    $sql = "SELECT * FROM san_pham WHERE 1 ";
    // if($size != null){
    //     $sql .= " AND method_size='$size' ";
    // }
    // if($color != null){
    //     $sql .= " AND method_color='$color' ";
    // }
    if($price != null && $price > 0){
        $sql .= " AND gia_sp BETWEEN 0 AND '$price' ";
    }
    return pdo_query($sql);
}

// lấy thông tin order
function load_id_hd($id_user){
    $sql = "SELECT * FROM hoa_don WHERE id_user ='$id_user' order by ngay_mua DESC";
    return pdo_query_value($sql);
}


// lấy thông tin ordered
function load_all_hd(){
    $sql = "SELECT hd.*,ct.* FROM hoa_don hd JOIN ct_hd ct
    ON hd.id_hd = ct.id_hd group by hd.id_hd order by ngay_mua DESC";
    return pdo_query($sql);
}
function load_one_hd($id_hd =0 ){
    $sql = "SELECT * FROM hoa_don ";
    if($id_hd > 0){
        $sql .= " WHERE id_hd=$id_hd ";
    }else{
        $sql .= " WHERE 1 ";
    }
    $sql .= " order by id_hd desc limit 1 ";
    return pdo_query_one($sql);
}

function load_ct_hd ($id_hd){
    $sql = "SELECT * FROM ct_hd ct JOIN san_pham sp
    ON ct.id_sp = sp.id_sp
     WHERE ct.id_hd ='$id_hd' ";
    return pdo_query($sql);
}
// thống kê hóa đơn
// phần thóng kê home
function load_tt_hd($tt){
 $sql = "SELECT count(*) as sl FROM hoa_don where trang_thai='$tt'";
 return pdo_query_value($sql);
}

// load hóa đơn theo id user
function load_hd_user($id_user){
    $sql = "SELECT hd.* ,ct.*,sp.* FROM hoa_don hd JOIN ct_hd ct
    ON hd.id_hd = ct.id_hd JOIN san_pham sp 
    ON ct.id_sp = sp.id_sp
     WHERE hd.id_user = '$id_user'
     
      ";
    return pdo_query($sql);
}

?>