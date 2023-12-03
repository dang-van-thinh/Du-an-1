<div class="col-10 float_right">
<h3>Hóa Đơn </h3>
    <div class="content_ordered">
        <div class="info_ordered">
            <h4>Thông tin đơn hàng</h4>
            <div>
                <p>
                    Mã đơn hàng: <span><?= $id_hd ?></span>
                </p>
                <p>
                    Ngày đặt: <span><?= $ngay_mua ?></span>
                </p>
                <p>
                    Phương thức thanh toán: <span><?= $pay ?></span>
                </p>
                <p>
                    Ghi chú: <span><?= $ghi_chu ?></span>
                </p>
            </div>
        </div>
        <div class="info_ordered">
            <h4>Thông tin đặt hàng</h4>
            <div>
                <p>
                    Người dùng: <span><?= $ten_kh ?></span>
                </p>
                <p>
                    Địa chỉ: <span><?= $dia_chi ?></span>
                </p>
                <p>
                    Email: <span><?= $email ?></span>
                </p>
                <p>
                    Số điện thoại: <span><?= $sdt ?></span>
                </p>
            </div>
        </div>
        <div class="info_ordered">
            <h4>Chi tiết đơn hàng</h4>
            <div class="cart-content">

                <table class="table table-bordered" border="1px">
                    <thead>
                        <tr align="center">
                            <th>ẢNH</th>
                            <th>THÔNG TIN</th>
                            <th>SỐ LƯỢNG</th>
                            <th>THÀNH TIỀN</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php foreach ($sp as $key => $item) :
                            extract($item);
                        ?>
                        
                            <tr>
                                <td>
                                    <img src="<?= $img ?>" alt="" width="150px">
                                </td>
                                <td>
                                    <p><?= $ten_sp ?></p>
                                    <span> Size :
                                        <span><?= $size == ''?'':$size ?></span>
                                    </span>
                                    <span> Color:
                                        <span><?= $color == ''? '':$color ?></span>
                                    </span>
                                </td>

                                <td>
                                    <span><?= $sl_mua ?></span>
                                </td>
                                <td>
                                    <?= $sl_mua * $gia ?>
                                </td>
                                <td>
                                    <?= $trang_thai ==0 ?'Đã hủy':'' ?>
                                    <?= $trang_thai ==1 ?'Đang chờ duyệt':'' ?>
                                    <?= $trang_thai ==2 ?'Đã duyệt - Đang giao':'' ?>
                                    <?= $trang_thai ==3 ?'Đã giao':'' ?>
                                </td>
                            </tr>
                           
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>