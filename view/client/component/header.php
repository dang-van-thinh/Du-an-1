<div class="container">
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
          <li>
            <a href="product.html">Quần áo<i class="fa-solid fa-chevron-down"></i></i></a>
            <ul class="subnav">
              <li><a href="">Đồ bóng đá</a></li>
              <li><a href="">Đồ bóng đá</a></li>
              <li><a href="">Đồ bóng đá</a></li>
              <li><a href="">Đồ bóng đá</a></li>
              <li><a href="">Đồ bóng đá</a></li>
              <li><a href="">Đồ bóng đá</a></li>
            </ul>
          </li>
          <li>
            <a href="product.html">Phụ kiện <i class="fa-solid fa-chevron-down"></i></i></a>
            <ul class="subnav">
              <li><a href="">Túi & Balo</a></li>
              <li><a href="">Túi & Balo</a></li>
              <li><a href="">Túi & Balo</a></li>
              <li><a href="">Túi & Balo</a></li>
              <li><a href="">Túi & Balo</a></li>
            </ul>
          </li>
          <li><a href="">Giới thiệu</a></li>
          <li><a href="">Liên hệ</a></li>

        </ul>
      </nav>
      <!-- Search, Cart, Login -->
      <div class="nav-right">
        <form action="" method="post">
          <input class="search-input" type="text" placeholder="Nhập tên sản phẩm" />
          <button class="search-button" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
        <div class="cart">
          <a href="?act=cart">
            <i class="fa-solid fa-cart-shopping cart-icon"><span id="cart_number"></span></i>
          </a>
        </div>
        <?php if(isset($_SESSION['id_user'])): ?>
        <div class="account">
          <div class="account-title">
            <i class="fa-solid fa-user"></i>
            <span><?=load_one_tk($_SESSION['id_user'])['user_name']?></span>
          </div>
          <div class="account-option">
            <a href="">Chỉnh sửa tài khoản</a>
            <a href="?act=logout" onclick="return confirm('Bạn có chắc muốn đăng xuất không ?')">Đăng xuất</a>
          </div>
        </div>
        <?php else: ?>
        <div class="account">
          <div class="account-title">
            <i class="fa-solid fa-user"></i>
            <span>Tài khoản</span>
          </div>
          <div class="account-option">
            <a href="?act=login">Đăng nhập</a>
            <a href="signout.html">Đăng ký</a>
            <!-- <a href="">Chỉnh sửa tài khoản</a> -->
            <!-- <a href="?act=logout">Đăng xuất</a> -->
          </div>
        </div>
        <?php endif ?>
      </div>
    </header>
            <!-- toasct -->
<?php if(isset($_COOKIE['toasct_s']) || isset($_COOKIE['toasct_f'])): ?>
<div id="toasct">
    <p class="toasct_custom  <?=isset($_COOKIE['toasct_s'])? 'bg_success' : 'bg_fail' ?>">
       <?=isset($_COOKIE['toasct_s'])? $_COOKIE['toasct_s'] : $_COOKIE['toasct_f'] ?>
    </p>
</div>
<?php endif ?>