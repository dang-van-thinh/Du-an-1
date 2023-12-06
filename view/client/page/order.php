<form action="index.php?act=order_action" method="post" onsubmit="return check_order()">
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


                    <?php if (isset($_COOKIE['alert_f']) || isset($_COOKIE['alert_s'])) : ?>
                        <div class="mt-3">
                            <p class="alert <?= isset($_COOKIE['alert_f']) ? 'alert-danger' : 'alert-success'; ?>">
                                <?= isset($_COOKIE['alert_f']) ? $_COOKIE['alert_f'] : $_COOKIE['alert_f']; ?>
                            </p>
                        </div>
                    <?php endif ?>


                    <div class="infomation">
                        <label for="">Tên người nhận</label><br>
                        <input type="text" name="user_name_order" id="user_name_order" placeholder="Nhập vào tên người nhận..." value="<?= isset($user_name) ? $user_name : '' ?>"><br><br>
                        <label for="">SĐT người nhận</label><br>
                        <input type="number" name="number_phone_order" id="number_phone_order" placeholder="Nhập vào SĐT người nhận..." value="<?= isset($number_phone) ? $number_phone : '' ?>"><br><br>
                        <label for="">Địa chỉ người nhận</label><br>
                        <input type="text" name="address_order" id="address_order" placeholder="Nhập vào địa chỉ người nhận..." value="<?= isset($address) ? $address : '' ?>"><br><br>
                        <label for="">Email người nhận</label><br>
                        <input type="email" name="email_order" id="email_order" placeholder="Nhập vào email người nhận..." value="<?= isset($email) ? $email : '' ?>"><br><br>
                        <label for="ghi_chu">Ghi chú: </label>
                        <textarea name="ghi_chu" id="ghi_chu" cols="40" rows="5" placeholder="Ghi chú cho chủ shop"></textarea>
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
                                <input type="radio" name="pay" id="cod" checked value="1">
                                <label for="cod">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="free-ship">
                                <input type="radio" name="pay" id="card"  value="2">
                                <label for="card" class="disable">Thanh toán bằng MOMO</label>
                            </div>
                            <div class="free-ship">
                                <input type="radio" name="pay" id="cod" disabled value="3">
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
                        <span class="info-name">Thành tiền</span> <input class="info-number" name="price_final" id="price_final" value="">
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
        <div id="cart_order" hidden>

        </div>
    </div>

</form>

<script>
    function htmlBillCart () { 
    var storage = JSON.parse(localStorage.getItem('toCart'));
    console.log(storage);
    if (storage == null) {
        var arrCart = [];
       
    } else {
        var arrCart = [];
        arrCart = storage;
    }
    let htmlProduct = document.getElementById('total_product');
    let totall_price_product = document.getElementById('totall_price_product');
    let price_final =document.getElementById('price_final');

    let totalProduct = 0;
    let priceTotall= 0;
    arrCart.forEach((item,index) => {
        totalProduct += Number(item.quannity);
        priceTotall += Number(item.quannity) * Number(item.price);
    });
    htmlProduct.textContent = totalProduct;
    totall_price_product.textContent = priceTotall;
    price_final.value = priceTotall;
    console.log(totalProduct);
 }
 htmlBillCart();
    function renderOrder() {
        var storage = JSON.parse(localStorage.getItem('toCart'));
        // console.log(storage);
        if (storage == null) {
            var arrCart = [];

        } else {
            var arrCart = [];
            arrCart = storage;
        }
        let html = '';
        let showCart = document.getElementById('cart_order');
        arrCart.forEach(e => {
            let price_item = Number(e.quannity) * Number(e.price);
            // console.log(price_item);
            let discountPrice = Number(e.s_price) - Number(e.price);
            html += `
            <input type="text" name="id_sp[]" id="" value="${e.id_pr}">
            <input type="text" name="gia[]" id="" value="${e.price}">
            <input type="text" name="quanity[]" id="" value="${e.quannity}">
            <input type="text" name="color[]" id="" value="${e.color}">
            <input type="text" name="size[]" id="" value="${e.size}">
        `;
            showCart.innerHTML = html;
        });
    }
    renderOrder()

    function check_order() {
        let email_order = document.getElementById('email_order');
        let address_order = document.getElementById('address_order');
        let number_phone_order = document.getElementById('number_phone_order');
        let user_name_order = document.getElementById('user_name_order');
        let check = true;
        if (user_name_order.value == "") {
            user_name_order.style.border = '2px solid red';
            check = false;
        } else {
            user_name_order.style.border = 'none';
            check = true;
        }
        // check validate address

        if (address_order.value == "") {
            address_order.style.border = '2px solid red';
            check = false;
        } else {
            address_order.style.border = 'none';
            check = true;
        }

        if (email_order.value == "") {
            email_order.style.border = '2px solid red';
            check = false;
        } else {
            email_order.style.border = 'none';
            check = true;
        }

        if (number_phone_order.value == "") {
            number_phone_order.style.border = '2px solid red';
            check = false;
        } else {
            number_phone_order.style.border = 'none';
            check = true;
        }
        return check;
    }
</script>