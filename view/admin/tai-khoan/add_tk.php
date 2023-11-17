<div class="col-lg-10">
    <div class="container my-4">
        <div class="my-3">
            <h3>Thêm mới tài khoản</h3>
        </div>
        <form action="?ad=add_tk" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mt-3">
                        <label for="name_user" class="form-label">Tên người dùng</label>
                        <input type="text" name="name_user" id="name_user" class="form-control" placeholder="Nhập tên người dùng">
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label">Email người dùng</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email người dùng">
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Nhập số điện thoại người dùng">
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
                            <label for="role">Chức vụ</label>
                            <select name="role" id="role" class="form-select">
                                <option value="">[Chọn chức vụ]</option>
                                <option value="0">Khách hàng</option>
                                <option value="1">Quản trị viên</option>
                                <option value="2">Quản lý</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="anh_user" class="form-label">Ảnh</label>
                            <input type="file" name="anh_user" id="anh_user" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="address_user" class="form-label">Địa chỉ người dùng</label>
                            <input type="text" name="address_user" id="address_user" class="form-control" placeholder="Nhập số điện thoại người dùng">
                        </div>
                        <div class="mt-3">
                            <label for="number_phone" class="form-label">Số điện thoại người dùng</label>
                            <input type="text" name="number_phone" id="number_phone" class="form-control" placeholder="Nhập số điện thoại người dùng">
                        </div>
                    </div>

                </div>
            </div>

            <!-- group input -->
            <div class="my-5">
                <div class="btn-group">
                    <a href="?ad=list_tk" class="btn btn-warning me-4" id="">Danh sách tài khoản người dùng</a>
                    <input type="submit" value="Thêm mới" class="btn btn-success" name="add_tk">
                </div>
            </div>
        </form>
    </div>
</div>