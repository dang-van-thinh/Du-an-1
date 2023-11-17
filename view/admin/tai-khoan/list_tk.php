<div class="col-10 float_right">
    <h3 class="my-4">Danh sách người dùng</h3>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th><input type="checkbox" class="item_checkbox" id="checkAll"></th>
                <th style="width: 40px;">Mã</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
                <th>TT</th>
                <th>SĐT</th>
                <th>
                    <a href="?ad=add_tk" class="btn btn-success hover_item">Thêm mới</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tk as $key=>$item): 
                extract($item);
            ?>
            <tr>
                <td><input type="checkbox" name="check_sp" class="item_checkbox"></td>
                <td><?= $id_user?></td>
                <td><?= $user_name?></td>
                <td>
                    <img src="<?=$img?>" alt="" class="img_table">
                </td>
                <td><?= $address?></td>
                <td>
                    <?php
                    if($role == 0){
                        echo 'Khách hàng';
                    }elseif($role == 1){
                        echo 'Quản trị viên';
                    }elseif($role == 2){
                        echo 'Quản lý';
                    }
                    ?>
                </td>
                <td>
                    <p class="badge <?= $trang_thai == 0 ? 'text-danger':'text-success'?>">
                    <?= $trang_thai == 0 ? 'Chưa kích hoạt':'Đã kích hoạt'?>
                    </p>
                
                </td>
                <td><?= $number_phone?></td>
                <td>
                    <a href="?ad=del_tk&id_user=<?=$id_user?>" class="btn btn-danger hover_item" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này ? Tài khoản này sẽ bị xóa vĩnh viễn !')">Xóa</a>
                    <a href="?ad=ct_tk&id_user=<?=$id_user?>" class="btn btn-warning hover_item">Sửa</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <!-- panigation -->
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php for ($i=0; $i < $page; $i++) : ?>
                <li class="page-item"><a class="page-link" href="?ad=list_tk&curent_page=<?= $i+1?>"><?= $i+1?></a></li>
                <?php endfor?>
                
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- group input -->
    <div class="my-5">
        <div class="btn-group">
            <a href="#" class="btn btn-warning me-3" id="selectAll">Chọn tất cả</a>
            <a href="#" class="btn btn-success me-3" id="unSelectAll">Bỏ chọn tất cả</a>
            <a href="#" class="btn btn-danger me-3" id="delSelect">Xóa theo các lựa chọn</a>
        </div>
    </div>
</div>