<form action="" method="post">
<div class="view-cart">
  
    <div class="view-cart-left">
        <div class="order-progress">
            <div class="progress-dot">
                <span class="dot dot-line-active"></span>
                <span class="dot-name">Giỏ hàng</span>
            </div>
            <div class="progress-line dot-line-active"></div>
            <div class="progress-dot">
                <span class="dot dot-line-active"></span>
                <span class="dot-name">Đặt hàng và thanh toán</span>
            </div>
            <!-- <div class="progress-line"></div>
            <div class="progress-dot">
                <span class="dot"></span>
                <span class="dot-name">Thanh toán</span>
            </div> -->
            <div class="progress-line"></div>
            <div class="progress-dot">
                <span class="dot"></span>
                <span class="dot-name">Hoàn thành đơn</span>
            </div>
        </div>
        <div class="cart-content-order">
            <div class="cart-content1">
                <h2 class="cart-content-title">Thông tin người nhận</h2>
                <div class="infomation">
                    <label for="">Tên người nhận</label><br>
                    <input type="text" placeholder="Nhập vào tên người nhận..." value="<?= isset($user_name)? $user_name:'' ?>"><br><br>
                    <label for="">SĐT người nhận</label><br>
                    <input type="number" placeholder="Nhập vào SĐT người nhận..." value="<?= isset($number_phone)? $number_phone:'' ?>"><br><br>
                    <label for="">Địa chỉ người nhận</label><br>
                    <input type="text" placeholder="Nhập vào địa chỉ người nhận..." value="<?= isset($address)? $address:'' ?>"><br><br>
                    <label for="">Email người nhận</label><br>
                    <input type="text" placeholder="Nhập vào email người nhận..." value="<?= isset($email)? $email:'' ?>"><br><br>

                </div>
            </div>
            <div class="cart-content2">
                <h2 class="cart-content-title">Phương thức giao hàng</h2>
                <div class="express"><i class="fa-solid fa-circle-check"></i> Chuyển phát nhanh</div>
                <div class="pay">
                    <h2 class="pttt">Phương thức thanh toán</h2>
                    <div class="content">
                        <div class="hihi">
                            <span class="content-name"> Mọi giao dịch đều được bảo mật và mã hóa.Thông tin thẻ tín dụng sẽ không
                                bao giờ được lưu lại.</span>
                        </div>
                        <div class="free-ship">
                            <input type="radio" name="pay" id="cod" checked>
                            <label for="cod">Thanh toán khi nhận hàng</label>
                        </div>
                        <div class="free-ship">
                            <input type="radio" name="pay" id="card" disabled>
                            <label for="card" class="disable">Thanh toán bằng thẻ tín dụng</label>
                        </div>
                        <div class="free-ship">
                            <input type="radio" name="pay" id="cod" disabled>
                            <label for="cod" class="disable">Thanh toán bằng mã QR</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="view-cart-right">
        <div class="cart-total">

            <h2 class="cart-total-title">Tổng tiền giỏ hàng</h2>
            <div class="cart-total-info">
                <div class="info-wapper">
                    <span class="info-name">Tổng sản phẩm</span> <span class="info-number" id="total_product">0</span>
                </div>
                <div class="info-wapper">
                    <span class="info-name">Tổng tiền hàng</span> <span class="info-number" id="totall_price_product">0 VNĐ</span>
                </div>
                <div class="info-wapper">
                    <span class="info-name">Thành tiền</span> <span class="info-number" id="price_final">0 VNĐ</span>
                </div>
                <div class="info-wapper">
                    <span class="info-name">Phí vận chuyển</span> <span class="info-number">0 VNĐ</span>
                </div>
                <p class="no-ship"><i class="fa-solid fa-triangle-exclamation"></i> Miễn phí ship với đơn hàng trên 500.000 VNĐ</p>
                <p class="free-ship"><i class="fa-solid fa-circle-check"></i> Đơn hàng của bạn được miễn phí ship</p>

                <input type="hidden" name="">
                <input type="submit" class="submit-btn" name="dat_hang" value="Hoàn thành">

            </div>
        </div>
    </div>

</div>
</form>