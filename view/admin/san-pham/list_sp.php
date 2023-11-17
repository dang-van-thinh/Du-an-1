<div class="col-10 float_right">
    <h3 class="my-4">Danh sách sản phẩm</h3>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th><input type="checkbox" class="item_checkbox" id="checkAll"></th>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>
                    <a href="?ad=add_sp" class="btn btn-success hover_item">Thêm mới</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sp as $key=>$item):
                extract($item);
            ?>
            <tr>
                <td><input type="checkbox" name="check_sp" class="item_checkbox"></td>
                <td><?= $id_sp?></td>
                <td><?= $ten_sp?></td>
                <td>
                    <img src="<?= $img?>" alt="" class="img_sp">
                </td>
                <td><?= $gia_sp?></td>
                <td><?= $so_luong?></td>
                <td>
                    <a href="?ad=del_sp&id_sp=<?= $id_sp?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này ?')" class="btn btn-danger hover_item">Xóa</a>
                    <a href="?ad=ct_sp&id_sp=<?= $id_sp?>" class="btn btn-warning hover_item">Sửa</a>
                </td>
            </tr>
            <?php endforeach?>
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

                <?php for ($i=1; $i <= $page; $i++):?>
                    <li class="page-item"><a class="page-link" href="?ad=list_sp&curent_page=<?=$i?>"><?=$i?></a></li>
                <?php endfor ?>
                
                
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