<body>
    <div class="wrapper">
        <form action="?lg=sigin" method="post" onsubmit="return check_sigin()">
            <div class="card item_center" style="width: 30rem;">
                <div class="card-header text-center">
                    <h4 class="fw-bold">Đăng ký</h4>
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
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Nhập email của bạn " >
                    </div>
                    <div class="mt-3">
                        <label for="name_user" class="form-label">Tên </label>
                        <input type="text" name="name_user" id="name_user" class="form-control"
                            placeholder="Nhập tên của bạn " >
                    </div>
                    <div class="mt-3">
                        <label for="pw" class="form-label">Password</label>
                        <input type="password" name="pw" id="pw" class="form-control"
                            placeholder="Nhập mật khẩu" >
                    </div>
                    <div class="mt-3">
                        <label for="rpw" class="form-label">Enter a password</label>
                        <input type="password" name="rpw" id="rpw" class="form-control"
                            placeholder="Nhập lại mật khẩu" >
                    </div>

                    <div class="mt-3">
                        <label for="number_phone" class="form-label">Số điện thoại</label>
                        <input type="text" name="number_phone" id="number_phone" class="form-control"
                            placeholder="Nhập số điện thoại" >
                    </div>
                    <div class="mt-3 d-flex justify-content-between">
                        <!-- <div class="">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label for="remember" class="form-label" >Ghi nhớ</label>
                        </div>
                        <a href="#">Bạn quên mật khẩu ?</a> -->
                    </div>
                    <div class="my-3 text-center">
                        <input type="submit" value="Đăng ký"  name="signin" class="btn btn-outline-success px-xxl-5">
                        <div class="my-3">
                            <p>Bạn đã có tài khoản ? <a href="?lg=login">Đăng nhập ngay</a></p>
                        </div>
                        <div class="my-3">
                            <a href="?lg=index">Trở về trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

</body>