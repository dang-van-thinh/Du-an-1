<form action="index.php?act=order" method="post" class="submit-total-cart" onsubmit="return order_action()">
  <div class="view-cart">

    <div class="view-cart-left">
      <div class="order-progress">
        <div class="progress-dot">
          <span class="dot dot-line-active"></span>
          <span class="dot-name">Giỏ hàng</span>
        </div>
        <div class="progress-line"></div>
        <div class="progress-dot">
          <span class="dot"></span>
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

      <div class="cart-content">
        <h2 class="cart-content-title">Giỏ hàng của bạn có <span class="count-product-red " id="cart_number"></span></h2>
        <table class="cart-detail">
          <thead>
            <tr>
              <th>ẢNH</th>
              <th>THÔNG TIN</th>
              <th>GIẢM GIÁ</th>
              <th>SỐ LƯỢNG</th>
              <th>THÀNH TIỀN</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="showCart">

          </tbody>
          <!-- <tr>
            <td colspan="8">
              <a href="" class="btn_update_cart">Cập nhật</a>
            </td>
          </tr> -->

        </table>

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

          <div id="un_dat_hang">

          </div>
          <input type="submit" class="submit-btn"  name="dat_hang" value="Đặt hàng"  <?= isset($_SESSION['id_user']) ? '':'disabled'; ?>>

        </div>
      </div>
    </div>

  </div>
</form>
