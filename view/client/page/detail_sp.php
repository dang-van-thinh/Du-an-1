<!-- chi tiết sản phẩm  -->
<div class="margin_top ">
  <div class="product_detail_grap">
    <div class="grid_item">
      <!-- chỗ dữ liệu ảnh từng sản phẩm khi ấn xem chi tiết sản phẩm -->
      <div class="detail_img">
        <img src="<?= $img ?>" alt="Ảnh sản phẩm" id="img_product" id="product-image" />
      </div>

      <!-- các ảnh bổ sung của sản phẩm  -->
      <!-- <div class="flex justify-between mt-3">
              <div class="">
                <img
                  class="border-solid border-[1px] border-gray-300"
                  src="./img/áo_Mu_đỏ.png"
                  alt=""
                />
              </div>
              <div class="">
                <img
                  class="border-solid border-[1px] border-gray-300"
                  src="./img/áo_Mu_đỏ.png"
                  alt=""
                />
              </div>
              <div class="">
                <img
                  class="border-solid border-[1px] border-gray-300"
                  src="./img/áo_Mu_đỏ.png"
                  alt=""
                />
              </div>
              <div class="">
                <img
                  class="border-solid border-[1px] border-gray-300"
                  src="./img/áo_Mu_đỏ.png"
                  alt=""
                />
              </div>
            </div> -->
      <!-- các ảnh bổ sung của sản phẩm  -->
    </div>

    <!-- phần tên , giá , mô tả, kichs cỡ , chọn size và add đặt hàng  -->
    <div class="grid_item">
      <div class="product_description">
        <h4 class="header_detail">
          <p class="name_product"><?= $ten_sp ?></p>
          <input type="hidden" name="id_product" id="id_product" value="<?= $id_sp ?>">
        </h4>
        <div class="detail_main">

          <span class="price_detail " id="init_price"><?= $gia_km ?> </span><span class="price_unit">VND</span>

          <del class="" id="start_price"><?= $gia_sp ?></del> <span>VND</span>

        </div>

        <div class="detail_text">
          <textarea class="" rows="10" cols="90" readonly>
            <?= $mo_ta ?>
          </textarea>
        </div>
        <div class="">
          <ul class="detail_function">
            <li class="font-semibold">
              <i class="fa-solid fa-user-shield" style="color: #eb0017"></i>
              1 Năm Bảo Hành Cho Tất Cả Các Sản Phẩm
            </li>
            <li class="font-semibold">
              <i class="fa-brands fa-instalod" style="color: #eb0017"></i>
              Hoàn Trả Trong 30 Ngày
            </li>
            <li class="font-semibold">
              <i class="fa-solid fa-sack-dollar" style="color: #eb0017"></i>
              Hoàn Lại Tiền Nếu Không Đổi Được Hàng
            </li>
          </ul>
        </div>

        <!--LUA CHON COLOR -->
        <div class="detail_method">
          <!-- <form action="" method="get"> -->
          <div>
            <span class="">Color</span>
            <?php
            $color = $method_color;
            $color = json_decode($color);
            // var_dump($color);
            foreach ($color as $name => $value) :
            ?>
              <span>
                <input id="<?= $name ?>" name="color" type="radio" value="<?= $name ?>" />
                <label for="<?= $name ?>" class="radio-label">
                  <i class="fa-solid fa-shirt" style="color:<?= $value ?>"></i>
                </label>
              </span>
            <?php endforeach ?>
            <!-- <span>
              <input id="color_2" name="color" type="radio" />
              <label for="color_2" class="radio-label">
                <i class="fa-solid fa-shirt" style="color: #ea1026"></i>
              </label>
            </span> -->

          </div>

          <!-- LUA CHON SIZE -->
          <br>
          <div>
            <span class="">Size</span>
            <?php
            $size = $method_size;
            $size = explode(' ', $size);
            if (count($size) > 0) :
              // var_dump($size);
              foreach ($size as $key => $item) :
                if ($item != '') :
            ?>
                  <span>
                    <input id="size_<?= $key + 1 ?>" name="size" type="radio" value="<?= $item ?>" />
                    <label for="size_<?= $key + 1 ?>" class="radio-label">
                      <span><?= $item ?></span>
                    </label>
                  </span>
                <?php endif ?>
              <?php endforeach ?>
            <?php endif ?>

          </div>

        </div>
      </div>

      <br />
      <hr />

      <!--THEM SO LUONG -->
      <div class="detail_quanity">
        <button class="btn_minus">
          <i class="fas fa-minus"></i>
        </button>
        <span id="quantity_value">1</span>
        <button class="btn_plus">
          <i class="fas fa-plus"></i>
        </button>

        <!-- Add to cart       -->

        <a href="" class="btn_add_cart" id="btn_add_cart">Thêm vào giỏ hàng</a>

      </div>
      <!-- </form> -->
      <hr />

      <ul class="infor_soccial">
        <li>SKU: <a href="#">BE45VGRT</a></li>
        <li>Category: <a href="#">Clothing</a></li>
        <li>
          Tags: <a href="#" rel="tag">Cloth</a>,
          <a href="#" rel="tag">printed</a>
        </li>
        <li>
          <span class="soccial">
            <i class="fa-brands fa-facebook-f" style="color: #85888e"></i>
            <i class="ml-[16px] fa-brands fa-youtube" style="color: #85888e"></i>
            <i class="ml-[16px] fa-solid fa-location-dot" style="color: #85888e"></i>
            <i class="ml-[16px] fa-brands fa-google" style="color: #85888e"></i>
          </span>
        </li>
      </ul>


    </div>
  </div>
  <!-- binh luan  -->
  <div class="comment">
    <h3 class="">Comment:</h3>
    <div class="content_commneted">
      <!-- danh sách đã comment -->
      <?php if (count($comment) != 0) : ?>
        <?php foreach ($comment as $key => $cm) : 
          extract($cm);
          ?>
          <div class="group_commented">
            <div class="info_commented">
              <div class="img_commented">
                <img src="<?= $img?>" alt="" class="">
              </div>
              <div class="user_commented">
                <p><?= $user_name?></p>
              </div>
            </div>
            <div class="">
              <p><?= $noi_dung?></p>
            </div>
          </div>

        <?php endforeach ?>
      <?php else : ?>
        <p class="text_commented alert_warning">Hãy là người đầu tiên bình luận</p>
      <?php endif ?>

      <?php
      if (isset($_SESSION['id_user'])) :
        $user = load_one_tk($_SESSION['id_user']);
        extract($user);
      ?>
        <!-- người mới comment -->
        <form action="?act=detail_sp" method="post">
          <input type="hidden" name="id_sp" value="<?= $id_sp?>">
          
          <div class="group_commented p_top">
            <!-- thong tin nguoi dung comment -->
            <div class="info_commented">
              <div class="img_commented">
                <img src="<?= $img ?>" alt="" class="">
              </div>
              <div class="user_commented">
                <p><?= $user_name ?></p>
              </div>
            </div>
            <!-- noi dung comment -->
            <div class="text_commented">
              <textarea name="noi_dung" required id="" cols="90" rows="5" placeholder="Bình luận ."></textarea>
            </div>
            <div>
              <input type="submit" name="comment" value="Đăng" class="btn_submit">
            </div>
          </div>
        </form>
      <?php else : ?>
        <div class="alert_f">
          <p>Vui lòng đăng nhập để thực hiện việc bình luận !</p>
        </div>
      <?php endif ?>
    </div>
  </div>

  <!-- San pham cung danh muc -->
  <div class="wrapper">
    <h1 class="">Sản Phẩm Liên Quan</h1>
    <div class="product">
      <?php foreach ($sp as $key => $item) :
        extract($item);
      ?>
        <div class="item_product">
          <a href="?act=detail_sp">
            <div class="header_product">
              <img src="<?= $img ?>" alt="" class="img_product" />
              <a href="#" class="add_product">Thêm giỏ hàng</a>
              <input type="text" name="" hidden class="id_product" value="<?= $id_sp ?>">

            </div>
          </a>
          <a href="?act=detail_sp">
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