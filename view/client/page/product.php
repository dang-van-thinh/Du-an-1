<!-- Main content -->
<div class="main-content">
    <!-- <div class="content"> -->
    <!-- Service -->
    <div class="services">
        <div class="service">
            <img src="../view/assets/img/service1.png" alt="" />
            <div class="service-desc">
                <h4>Miễn phí giao hàng</h4>
                <p>Toàn quốc</p>
            </div>
        </div>

        <div class="service">
            <img src="../view/assets/img/service2.png" alt="" />
            <div class="service-desc">
                <h4>Hoàn tiền</h4>
                <p>Hoàn tiền trong 30 ngày</p>
            </div>
        </div>

        <div class="service">
            <img src="../view/assets/img/service3.png" alt="" />
            <div class="service-desc">
                <h4>Hỗ trợ online 24/7</h4>
                <p>Hỗ trợ khách hàng</p>
            </div>
        </div>

        <div class="service">
            <img src="../view/assets/img/service4.png" alt="" />
            <div class="service-desc">
                <h4>Bảo mật thanh toán</h4>
                <p>Thanh toán an toàn</p>
            </div>
        </div>
    </div>
    <div class="product-list-content">
    <div class="filter-container">
        <h4>Size </h4>
        <input type="radio" id="size-s" name="method_size" value="S">
        <label for="size-s">S</label>
        <input type="radio" id="size-m" name="method_size" value="M">
        <label for="size-m">M</label>
        <input type="radio" id="size-l" name="method_size" value="L">
        <label for="size-l">L</label>
        <h4>Màu sắc</h4>
        <input type="radio" id="color-blue" name="name_color[]r" value="blue" />
        <label class="color-label" for="color-blue">Blue</label>
        <input type="radio" id="color-red" name="name_color[]r" value="red" />
        <label class="color-label" for="color-red">Đỏ</label>
        <input type="radio" id="color-black" name="name_color[]r" value="black" />
        <label class="color-label" for="color-black">Đen </label>
        <input type="radio" id="color-while" name="name_color[]r" value="while" />
        <label class="color-label" for="color-while">Trắng</label>
        <h4 class="mt">Giá</h4>
            <input type="range" id="price" name="price" min="0" max="1000000" step="10000" oninput="priceOutput.value = price.value">
            <div class="min-max-price">
                <span class="min-value">0 VNĐ</span>
                <span class="max-value">
                    <output name="priceOutput" id="priceOutput">1.000.000</output> VNĐ<br /><br />
                </span>
            </div>
            <input class="filter-btn mt" type="submit" value="LỌC" />
    </div>
    <div class="product-list-wapper">
        <h1 class="product-list-title">Danh sách sản phẩm</h1>
        <div class="pagination-container">
            <div class="products list-product-wrapper">
            <?php foreach($sp as $key => $item):
            extract($item);
            ?>
            <div class="item_product">
            <a href="?act=detail_sp&id_sp=<?= $id_sp?>">
                    <div class="header_product">
                        <img src="<?= $img?>" alt="" class="img_product" />
                        <a href="?act=detail_sp&id_sp=<?= $id_sp?>" class="add_product">Xem chi tiết</a>
                        <input type="text" name="" hidden class="id_product" value="<?=$id_sp?>">

                    </div>
                </a>
                <a href="?act=detail_sp&id_sp=<?= $id_sp?>">
                    <div class="main_product">
                        <p class="name_product"><?= $ten_sp?></p>
                        <div class="price">
                            <p class="init_price"><?= $gia_sp?></p><strong>đ</strong>
                            <p class="sale">
                                <del><?= $gia_km?> <strong>đ</strong></del>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
            <!-- end product -->
            </div>
        </div>

    </div>
</div>

  


</div>