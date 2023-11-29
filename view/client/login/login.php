<body>
    <div class="wrapper">
        <form action="?lg=login" method="post" onsubmit="return check_login()">
            <div class="card item_center" style="width: 30rem;">
                <div class="card-header text-center">
                    <h4 class="fw-bold">Đăng nhập</h4>
                </div>
                <div class="card-body">
                    <?php if(isset($_COOKIE['alert_f']) || isset($_COOKIE['alert_s'])): ?>
                        <div class="mt-3">
                            <p class="alert <?= isset($_COOKIE['alert_f']) ? 'alert-danger' : 'alert-success' ;?>">
                                <?= isset($_COOKIE['alert_f']) ? $_COOKIE['alert_f'] :$_COOKIE['alert_f'] ;?>
                            </p>
                        </div>
                    <?php endif ?>
                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email của bạn ">
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="mt-3 d-flex justify-content-between">
                        <div class="">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label for="remember" class="form-label">Ghi nhớ</label>
                        </div>
                        <a href="?lg=forgot">Bạn quên mật khẩu ?</a>
                    </div>
                    <div class="my-3 text-center">
                        <input type="submit" value="Đăng nhập" name="login" class="btn btn-outline-success px-xxl-5">
                        <div class="my-3">
                            <p>Bạn chưa có tài khoản ? <a href="?lg=sigin">Đăng ký ngay</a></p>
                        </div>
                        <div class="my-3">
                            <a href="?lg=index">Trở về trang chủ</a>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- toasct -->
    <?php if (isset($_COOKIE['toasct_s']) || isset($_COOKIE['toasct_f'])) : ?>
            <div id="toasct">
                <p class="toasct_custom  <?= isset($_COOKIE['toasct_s']) ? 'bg-success' : 'bg-danger' ?>">
                    <?= isset($_COOKIE['toasct_s']) ? $_COOKIE['toasct_s'] : $_COOKIE['toasct_f'] ?>
                </p>
            </div>
        <?php endif ?>

</body>