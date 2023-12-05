<div class="col-10 float_right">
    <h3 class="my-4">Danh sách hóa đơn</h3>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark" align="center">
            <tr>
                <th style="width: 40px;"><input type="checkbox" class="item_checkbox" id="checkAll">
                </th>
                <th style="width: 40px;">Mã hóa đơn</th>
                <th>Tên khách hàng</th>
                <th style="width:40px;">Số lượng đơn hàng</th>
                <th style="width:200px;">Ngày mua</th>
                <th style="width: 200px;">Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hd as $key => $item) :
                extract($item);
            ?>
            <form action="?ad=infor_hd" method="post">
                <tr>
                    <td><input type="checkbox" name="check_sp" class="item_checkbox"></td>
                    <td><?= $id_hd ?></td>
                    <input type="hidden" name="id_hd" value="<?= $id_hd ?>">
                    <td><?= load_one_tk($id_user)['user_name'] ?></td>
                    <td>
                        <span><?= $tong_dh ?></span>
                    </td>
                    <td>
                        <span><?= $ngay_mua ?></span>
                    </td>
                    <td>
                        <div <?= $trang_thai == 3 ? 'hidden':''?>>

                            <select name="trang_thai" id="trang_thai_<?=$id_hd ?>" onchange="changeStatusOrder(<?= $id_hd?>)">
                                <option <?= $trang_thai == 0? 'selected':'' ?> value="0">Hủy đơn hàng</option>
                                <option <?= $trang_thai == 1? 'selected':'' ?> value="1">Đang chờ duyệt</option>
                                <option <?= $trang_thai == 2? 'selected':'' ?> value="2">Đã duyệt - Đang giao</option>
                                <option disabled <?= $trang_thai == 3? 'selected':'' ?> value="3">Đã giao</option>
                            </select>
                        </div>
                    </td>
                    <td style="width: 250px">
                        <a href="?ad=infor_hd&id_hd=<?= $id_hd ?>" class="btn btn-outline-warning">Thông tin</a>
                        
                    </td>
                </tr>
            </form>
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
                <?php for ($i=1; $i <= $page; $i++):?>
                    <li class="page-item"><a class="page-link" href="?ad=thong_ke&curent_page=<?=$i?>"><?=$i?></a></li>
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
            <a href="#" class="btn btn-warning" id="selectAll">Chọn tất cả</a>
            <a href="#" class="btn btn-success" id="unSelectAll">Bỏ chọn tất cả</a>
            <a href="#" class="btn btn-danger" id="delSelect">Xóa theo các lựa chọn</a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
function changeStatusOrder(id_hd) { 
    let tt = document.getElementById(`trang_thai_${id_hd}`);
    // console.log(tt);
    $.ajax({
        type: "post",
        url: "../func/order_admin.php",
        data: {
            idOrder: id_hd,
            status: tt.value
        },
        success: function (response) {
            alert(response);
        },
        error: function (error) {
            console.log(error)
        }
    });
 }
</script>