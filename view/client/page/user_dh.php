<div class="main-content">
    <!-- <div class="wrapper_ordered"> -->
    <h3>Hóa Đơn </h3>
    <div class="content_ordered">
        
        <div class="info_ordered">
            <h4>Chi tiết đơn hàng</h4>
            <div class="cart-content">

                <table class="cart-detail" border="1px">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>

                            <th>Tổng hóa đơn</th>
                            
                            <th>Trạng thái</th>
                            <th style="width: 300px">Hành động</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sp as $key => $item) :
                            extract($item);
                        ?>
                            <tr>
                                <td>
                                    <?= $id_hd?>
                                </td>
                                <td>
                                    <p><?= $ngay_mua ?></p>
                                    
                                </td>

                                <td>
                                    <span><?= $tong_dh ?></span>
                                </td>
                                
                                <td>
                                    <?= $trang_thai== 0? 'Đã hủy':'' ?>
                                    <?= $trang_thai== 1? 'Đang chờ người bán duyệt':'' ?>
                                    <?= $trang_thai== 2? 'Đang giao':'' ?>
                                    <?= $trang_thai== 3? 'Đã giao':'' ?>
                                </td>
                                <td >
                                    <div <?= $trang_thai == 3 || $trang_thai == 0 ? 'hidden':''?>>

                                        <label for="tt_0_<?= $id_hd?>">Hủy đơn hàng</label>
                                        <input type="radio" value="0" id="tt_0_<?= $id_hd?>" name="trang_thai_<?= $id_hd?>" onclick="changeStatusOrder(<?= $id_hd?>)" >
                                        <label for="tt_3_<?= $id_hd?>">Đã nhận hàng</label>
                                        <input type="radio" value="3" id="tt_3_<?= $id_hd?>" name="trang_thai_<?= $id_hd?>" onclick="changeStatusOrder(<?= $id_hd?>)" >
                                    </div>
                                    
                                </td>
                                <td>
                                    <a href="?act=detail_order&id_hd=<?= $id_hd?>">Chi tiết</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <a href="?act=home">Quay về</a>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
function changeStatusOrder(id_hd) { 
    let tt = document.querySelector(`input[name=trang_thai_${id_hd}]:checked`);
    console.log(tt);
    $.ajax({
        type: "post",
        url: "../func/order_client.php",
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

