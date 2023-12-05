<div class="col-10 float_right">
    <h3 class="my-4">Danh sách bình luận</h3>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th style="width: 40px;"><input type="checkbox" class="item_checkbox" id="checkAll">
                </th>
                <th style="width: 40px;">STT</th>
                
                <th>Sản phẩm bình luận</th>
                <th>Tổng bình luận</th>
                <th>Thời gian</th>
                
                <th style="width: 200px;">

                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comment as $key => $cm) :
                extract($cm);
            ?>
                <tr>
                    <td><input type="checkbox" name="check_sp" class="item_checkbox"></td>
                    <td><?= $key + 1 ?></td>
                    
                    <td>
                        <?= $ten_sp ?>
                    </td>
                    <td>
                        <?= $sl?>
                    </td>
                    <td><?= $ngay_cm ?></td>
                    
                    <td>
                        <a href="?ad=ct_comment&id_sp=<?= $id_sp?>" class="btn btn-warning hover_item">Thông tin</a>
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
                <?php for ($i = 0; $i < $page; $i++) : ?>
                    <li class="page-item"><a class="page-link" href="?ad=comment&curent_page=<?= $i + 1 ?>"><?= $i + 1 ?></a></li>
                <?php endfor; ?>
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
            <a href="#" class="btn btn-warning" id="selectAll">Chọn tất cả</a>
            <a href="#" class="btn btn-success" id="unSelectAll">Bỏ chọn tất cả</a>
            <a href="#" class="btn btn-danger" id="delSelect">Xóa theo các lựa chọn</a>
        </div>
    </div>
</div>