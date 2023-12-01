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
                            <th>ẢNH</th>
                            <th>THÔNG TIN</th>

                            <th>SỐ LƯỢNG</th>
                            <th>THÀNH TIỀN</th>
                            <th>Trạng thái</th>
                            <th style="width: 250px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sp as $key => $item) :
                            extract($item);
                        ?>
                            <tr>
                                <td>
                                    <img src="<?= $img ?>" alt="" width="">
                                </td>
                                <td>
                                    <p><?= $ten_sp ?></p>
                                    <span> Size :
                                        <span><?= $size ?></span>
                                    </span>
                                    <span> Color:
                                        <span><?= $color ?></span>
                                    </span>
                                </td>

                                <td>
                                    <span><?= $sl_mua ?></span>
                                </td>
                                <td>
                                    <?= $sl_mua * $gia ?>
                                </td>
                                <td>
                                    <?= $trang_thai== 0? 'Đã hủy':'' ?>
                                    <?= $trang_thai== 1? 'Đang chờ người bán duyệt':'' ?>
                                    <?= $trang_thai== 2? 'Đang giao':'' ?>
                                    <?= $trang_thai== 3? 'Đã giao':'' ?>
                                </td>
                                <td>
                                    <a href="#" class="btn_danger">Hủy đơn</a>
                                    <a href="#" class="btn_success">Đã nhận hàng</a>
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

