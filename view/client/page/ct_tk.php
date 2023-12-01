<div class="main-content">
<div class="container my-4">
        <div class="my-3">
            <h3>Thay đổi thông tin tài khoản</h3>
        </div>
        <form action="?ad=ct_tk" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mt-3">
                        <label for="id_user" class="form-label">Mã người dùng</label>
                        <input type="text" readonly name="id_user" id="id_user" class="form-control"  value="<?=$id_user?>">
                    </div>
                    <div class="mt-3">
                        <label for="name_user" class="form-label">Tên người dùng</label>
                        <input type="text" name="name_user" id="name_user" class="form-control" placeholder="Nhập tên người dùng" value="<?=$user_name?>">
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label">Email người dùng</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email người dùng" value="<?=$email?>">
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khâur người dùng" value="<?=$password?>">
                    </div>
                    <!-- <div class="mt-3">
                        Trạng tháii
                        <div class="form-check form-switch fs-3">
                            <input class="form-check-input " type="checkbox" id="flexSwitchCheckDefault" name="trang_thai">
                        </div>
                    </div> -->
                </div>

                <div class="col-lg-6">
                    <div class="mt-3">
                        
                        <div class="mt-3">
                            <img src="<?=$img?>" alt="" class="img_infor">
                            <input type="text" name="anh_user" hidden value="<?=$img?>">
                            <label for="anh_user_2" class="form-label">Ảnh</label>
                            <input type="file" name="anh_user_2" id="anh_user_2" class="form-control">
                            
                        </div>
                        <div class="mt-3">
                            <label for="address_user" class="form-label">Địa chỉ người dùng</label>
                            <input type="text" name="address_user" id="address_user" class="form-control" placeholder="Nhập địa chỉ người dùng"  value="<?=$address?>">
                        </div>
                        <div class="mt-3">
                            <label for="number_phone" class="form-label">Số điện thoại người dùng</label>
                            <input type="text" name="number_phone" id="number_phone" class="form-control" placeholder="Nhập số điện thoại người dùng" value="<?=$number_phone?>">
                        </div>
                    </div>

                </div>
            </div>

            <!-- group input -->
            <div class="my-5">
                <div class="btn-group">
                    
                    <input type="submit" value="Lưu" class="btn btn-success" name="edit_tk">
                </div>
            </div>
        </form>
    </div>
</div>