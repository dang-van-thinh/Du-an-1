<!-- Banner -->
<div class="owl-carousel owl-theme banner">
    <div class="item"><img src="../view/assets/img/banner1.webp" alt="" /></div>
    <div class="item"><img src="../view/assets/img/banner1.webp" alt="" /></div>
    <div class="item"><img src="../view/assets/img/banner3.avif" alt="" /></div>
    <div class="item"><img src="../view/assets/img/banner2.avif" alt="" /></div>
</div>

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

    <!-- Top 10 trending items -->
    <div class="top10-products">
        <h1 class="top10-title">Top sản phẩm mới nhất</h1>

        <div class="product">
            <?php foreach ($sp as $key => $item) :
                extract($item);
            ?>
                <div class="item_product">


                    <a href="?act=detail_sp&id_sp=<?= $id_sp ?>">

                        <div class="header_product">
                            <img src="<?= $img ?>" alt="" class="img_product" />
                            <a href="?act=detail_sp&id_sp=<?= $id_sp ?>" class="add_product">Xem chi tiết</a>
                            <input type="text" name="" hidden class="id_product" value="">

                        </div>
                    </a>
                    <a href="?act=detail_sp&id_sp=<?= $id_sp ?>">
                        <div class="main_product">
                            <p class="name_product"><?= $ten_sp ?></p>
                            <div class="price">
                                <p class="init_price"><?= $gia_km ?></p><strong>đ</strong>
                                <p class="sale">
                                    <del><?= $gia_sp ?> <strong>đ</strong></del>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
            <!-- end product -->

        </div>
    </div>

    <!-- category -->
    <div class="category">
        <div class="sneaker-category">
            <div class="category-title">
                <h2>PHỤ KIỆN THỂ THAO</h2>
                <p>Giày đá bóng, găng tay bắt bóng, tất thể thao...</p>
                <a href="">Xem thêm...</a>
            </div>
            <img src="https://giayphui.com/wp-content/uploads/2021/04/1nike-mercurial-superfly-vii-acad.png" alt="" />
        </div>

        <div class="soccer-jersey-category">
            <div class="category-title">
                <h2>Quần áo</h2>
                <p>Áo Khoác, Áo Polo,Áo Tập, <br> Đồ Bóng Đá, Đồ Bóng Rổ,...</p>
                <a href="">Xem thêm...</a>
            </div>
            <img src="https://www.elleman.vn/wp-content/uploads/2018/06/25/ao-da-banh-ELLE-Man-3.png" alt="" />
        </div>
    </div>

    <!-- Products list -->
    <div class="products-list">
        <h1 class="products-list-title">Sản phẩm có nhiều lượt xem nhất</h1>

        <div class="product">
            <?php foreach ($sp as $key => $item) :
                extract($item);
            ?>
                <div class="item_product">
                    <a href="?act=detail_sp&id_sp=<?= $id_sp ?>">
                        <div class="header_product">
                            <img src="<?= $img ?>" alt="" class="img_product" />
                            <a href="?act=detail_sp&id_sp=<?= $id_sp ?>" class="add_product">Xem chi tiết</a>
                            <input type="text" name="" hidden class="id_product" value="">
                        </div>
                    </a>
                    <a href="?act=detail_sp&id_sp=<?= $id_sp ?>">
                        <div class="main_product">
                            <p class="name_product"><?= $ten_sp ?></p>
                            <div class="price">
                                <p class="init_price"><?= $gia_km ?></p><strong>đ</strong>
                                <p class="sale">
                                    <del><?= $gia_sp ?> <strong>đ</strong></del>
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

<!-- slide products -->


<!-- slide logo -->
<div class="slide-logo-wapper">
    <div class="owl-carousel owl-theme slide-logo">
        <div class="item"><a href=""><img src="../view/assets/img/Logo-barca.png" alt=""></a></div>
        <div class="item"><a href=""><img src="../view/assets/img/Logo-chelsea.png" alt=""></a></div>
        <div class="item"><a href=""><img src="../view/assets/img/Logo-liverpool.png" alt=""></a></div>
        <div class="item"><a href=""><img src="../view/assets/img/Logo-man-city.png" alt=""></a></div>
        <div class="item"><a href=""><img src="../view/assets/img/Logo-mu.png" alt=""></a></div>
        <div class="item"><a href=""><img src="../view/assets/img/Logo-psg.png" alt=""></a></div>
        <div class="item"><a href=""><img src="../view/assets/img/Logo-real.png" alt=""></a></div>
        <div class="item"><a href=""><img src="../view/assets/img/Logo-tottenham.png" alt=""></a></div>
    </div>
</div>