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
    $sql .=" order by id_sp DESC";   
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

// tim san pham co gia tien cao nhat
function price_sp_max($id_loai = 0,$search=''){
    $sql = "SELECT MAX(sp.gia_sp) as max_gia FROM san_pham sp JOIN loai dm
    ON sp.id_loai = dm.id_loai
    where 1";
    if($id_loai > 0){
        $sql .= " AND sp.id_loai ='$id_loai'";
    }
    if($search != ''){
        $sql .= " AND sp.ten_sp like '$search%' 
        or dm.ten_loai like '$search%' ";
    }

    return pdo_query_one($sql);
}
//tìm kiếm sp haocjw theo loại
function load_search($search){
    $sql = "SELECT sp.*,loai.* FROM san_pham sp JOIN loai
    ON sp.id_loai = loai.id_loai
     WHERE loai.ten_loai like '$search%' or sp.ten_sp like '$search%'";
    return pdo_query($sql);
}
//lọc sản phẩm
function filter_sp($price,$search = '',$id_dm = 0){
    $sql = "SELECT sp.*,dm.* FROM san_pham sp JOIN loai dm
    ON sp.id_loai = dm.id_loai
    WHERE 1 ";
   
   if($id_dm > 0){
       $sql .= " AND sp.id_loai='$id_dm' ";
   }
    if($search != ''){
        $sql .= " AND ( sp.ten_sp LIKE '$search%' or dm.ten_loai LIKE '$search%' )";
    }
    $sql .= " AND sp.gia_sp <= $price ";
    var_dump($sql);
    // exit;
    return pdo_query($sql);
}

// lấy thông tin order
function load_id_hd($id_user){
    $sql = "SELECT * FROM hoa_don WHERE id_user ='$id_user' order by ngay_mua DESC";
    return pdo_query_value($sql);
}


// lấy thông tin ordered
function load_all_hd($item_page=0,$curent=0){
    $sql = "SELECT hd.*,ct.* FROM hoa_don hd JOIN ct_hd ct
    ON hd.id_hd = ct.id_hd group by hd.id_hd order by ngay_mua DESC";
     if($item_page > 0){
        $sql.= " LIMIT $item_page ";
    }
    if($curent > 0){
        $sql.= " OFFSET $curent";
    }
   
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
    $sql = "SELECT * FROM hoa_don hd 
     WHERE hd.id_user = '$id_user'";
    return pdo_query($sql);
}

//load comment
function load_comment_sp($id_sp){ 
    $sql = "SELECT cm.*,user.* FROM comment cm JOIN user 
    ON cm.id_user = user.id_user
    WHERE cm.id_sp = '$id_sp'
     order by cm.ngay_cm DESC";
    return pdo_query($sql);
}

function load_all_cm($item_page=0,$curent=0,$tt=0){
    $sql = "SELECT cm.*,sp.ten_sp,count(cm.id_sp) as sl FROM comment cm JOIN san_pham sp
    ON cm.id_sp = sp.id_sp
    WHERE 1 
    group by cm.id_sp
    ";
    
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
function load_cm_sp($id_sp){
$sql = "SELECT cm.*,user.user_name FROM comment cm JOIN user
ON cm.id_user = user.id_user
WHERE id_sp ='$id_sp'";



return pdo_query($sql);
}

?>