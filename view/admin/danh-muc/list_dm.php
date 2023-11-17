<div class="col-10 float_right">
    <h3 class="my-4">Danh mục sản phẩm</h3>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th style="width: 40px;"><input type="checkbox" class="item_checkbox" id="checkAll"></th>
                <th style="width: 70px;">Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Thuộc danh mục cha</th>
                <th>
                    <a href="?ad=add_dm" class="btn btn-success hover_item">Thêm mới</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($dm as $key => $item):
                    extract($item);
            ?>
            <?php
            if($type != 0):
            ?>
            <tr>
                <td><input type="checkbox" name="check_sp" class="item_checkbox"></td>
                <td><?=  $id_loai ?></td>
                <td><?= $ten_loai ?></td>
                <td>
                    <?php $dm_type = load_dm_children($type);
                   echo $dm_type['ten_loai'];
                    ?>
                </td>
                <td style="width: 180px">
                    <a href="?ad=del_dm&id_dm=<?= $id_loai ?>" class="btn btn-danger hover_item" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này ?')">Xóa</a>
                    <a href="?ad=ct_dm&id_dm=<?= $id_loai ?>" class="btn btn-warning hover_item">Sửa</a>
                </td>
            </tr>
            <?php endif?>
        
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

                <?php for ($i=0; $i < $page ; $i++):?>
                <li class="page-item"><a class="page-link" href="?ad=list_dm&curent_page=<?=$i+1?>"><?=$i+1?></a></li>
                <?php endfor ;?>
                
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