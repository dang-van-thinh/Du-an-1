<div class="container-fluid">
  <!-- Header -->
  <header>
    <!-- Logo -->
    <div class="logo">
      <a href="?act=home">
        <img src="../view/assets/img/logo-4-remove.png" alt="" />
      </a>
    </div>
    <!-- Navbar -->
    <nav class="navbar">
      <ul>
        <li><a href="?act=home">Trang chủ</a></li>
        <?php foreach ($dm_parent as $key => $item) :
          extract($item);
        ?>
          <li>
            <a href="#"><?= $ten_loai ?><i class="fa-solid fa-chevron-down"></i></i></a>
            <ul class="subnav">
              <?php foreach (load_dm_type($id_loai, false) as $key => $item_c) :
                extract($item_c);
              ?>
                <li><a href="?act=product&id_dm=<?= $id_loai ?>"><?= $ten_loai ?></a></li>
              <?php endforeach ?>
            </ul>
          </li>

        <?php endforeach ?>

        <li><a href="?act=gioithieu">Giới thiệu</a></li>
        <li><a href="?act=lienhe">Liên hệ</a></li>


      </ul>
    </nav>
    <!-- Search, Cart, Login -->
    <div class="nav-right">
      <form action="?act=product" method="post">
        <input class="search-input" type="text" required placeholder="Nhập tên sản phẩm" name="search_product"/>
        <button class="search-button" name="search" type="submit">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
      <div class="cart">
        <a href="?act=cart">
          <i class="fa-solid fa-cart-shopping cart-icon"><span id="cart_number"></span></i>
        </a>
      </div>
      <?php if (isset($_SESSION['id_user'])) : ?>
        <div class="account">
          <div class="account-title">
            <i class="fa-solid fa-user"></i>
            <span><?= load_one_tk($_SESSION['id_user'])['user_name'] ?></span>
          </div>
          <div class="account-option">
          <a href="?act=infor_order&id_user=<?= $_SESSION['id_user']?>">Thông tin đơn hàng</a>
            <a href="?act=infor_user&id_user=<?= $_SESSION['id_user']?>">Chỉnh sửa tài khoản</a>
            <a href="?act=logout" onclick="return confirm('Bạn có chắc muốn đăng xuất không ?')">Đăng xuất</a>
          </div>
        </div>
      <?php else : ?>
        <div class="account">
          <div class="account-title">
            <i class="fa-solid fa-user"></i>
            <span>Tài khoản</span>
          </div>
          <div class="account-option">
            <a href="?act=login">Đăng nhập</a>
            <a href="?act=sigin">Đăng ký</a>
            <!-- <a href="">Chỉnh sửa tài khoản</a> -->
            <!-- <a href="?act=logout">Đăng xuất</a> -->
          </div>
        </div>
      <?php endif ?>
    </div>
  </header>
  <!-- toasct -->
  <?php if (isset($_COOKIE['toasct_s']) || isset($_COOKIE['toasct_f'])) : ?>
    <div class="main_toasct">
      <div id="toasct">
        <p class="toasct_custom  <?= isset($_COOKIE['toasct_s']) ? 'bg_success' : 'bg_fail' ?>">
          <?= isset($_COOKIE['toasct_s']) ? $_COOKIE['toasct_s'] : $_COOKIE['toasct_f'] ?>
        </p>
      </div>
    </div>
  <?php endif ?>