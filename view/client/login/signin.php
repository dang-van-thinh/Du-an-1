<body>
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

<script>
    
  var rpw = document.getElementById('rpw');
  rpw.addEventListener('input',function(){
    let pw = document.getElementById('pw').value;
    if(rpw.value != pw){
        rpw.style.border = '2px solid red';
    }else{
        rpw.style.border = 'none'
    }
  });
    function check_sigin() {
    let check = true;
    let email = document.getElementById('email');
    let name_user = document.getElementById('name_user');
    let pw = document.getElementById('pw');
    let rpw = document.getElementById('rpw');
    let number_phone = document.getElementById('number_phone');
    // check email
    if(email.value == ''){
        email.style.border = '2px solid red';
        email.focus();
        check = false;
        email.setAttribute('placeholder','Không được để trống Email');
    }else{
        email.style.border = 'none';
        check = true;
    } 
// check name_user
    if(name_user.value == ''){
        name_user.style.border = '2px solid red';
        name_user.focus()
        name_user.setAttribute('placeholder','Không được để trống Tên người dùng');
        check = false;
    }else{
        name_user.style.border = 'none';
        check = true;
    } 
    // check password
    if(pw.value == ''){
        pw.style.border = '2px solid red';
        pw.focus()
        pw.setAttribute('placeholder','Không được để trống Password');
        check = false;
    }else{
        pw.style.border = 'none';
        check = true;
    }
    if(rpw.value == ''){
        rpw.style.border = '2px solid red';
        rpw.focus()
        rpw.setAttribute('placeholder','Không được để trống Enter password');
        check = false;
    }else{
        rpw.style.border = 'none';
        check = true;
    }
// check number_phone
    let value_number_phone = number_phone.value;
    if(value_number_phone != ''){
        if(value_number_phone.length < 10 ||value_number_phone.length >10){
            number_phone.style.border = '2px solid red';
            alert('Số điện thoại không đúng !');
            check = false;
        }else{
            number_phone.style.border = 'none';
            check = true
        }
    }else{
        number_phone.style.border = '2px solid red';
        number_phone.focus()
        number_phone.setAttribute('placeholder','Không được để trống Số điện thoại');
        check = false;
    }
return check;
    }
</script>