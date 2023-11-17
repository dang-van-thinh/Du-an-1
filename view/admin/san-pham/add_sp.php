<div class="col-lg-10">
    <div class="container my-4">
        <div class="my-3">
            <h3>Thêm mới hàng hóa</h3>
        </div>
        <form action="?ad=add_sp" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mt-3">
                        <label for="" class="form-label">Mã sản phẩm: </label>
                        <input type="text" readonly value="" class="form-control" placeholder="Mã sản phẩm">
                    </div>
                    <div class="mt-3">
                        <label for="name_sp" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name_sp" id="name_sp" class="form-control" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="mt-3">
                        <label for="price_sp" class="form-label">Giá sản phẩm</label>
                        <input type="number" name="price_sp" id="price_sp" class="form-control" min="1000" placeholder="Nhập giá sản phẩm">
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="mt-3">
                        <label for="price_km" class="form-label">Giá khuyến mãi: </label>
                        <input type="number" name="price_km" min="1000" class="form-control" id="price_km" placeholder="Giá khuyến mãi sản phẩm">
                    </div>
                    <div class="mt-3">
                        <label for="img_sp" class="form-label">Ảnh</label>
                        <input type="file" name="img_sp" id="img_sp" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="date_sp" class="form-label">Ngày nhập</label>
                        <input type="date" name="date_sp" id="date_sp" class="form-control" placeholder="Nhập ngày nhập sản phẩm">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3">
                        <label for="loai_sp" class="form-label">Loại sản phẩm: </label>
                        <select name="loai_sp" id="loai_sp" class="form-select">
                            <option value="0">[Chọn loại sản phẩm phù hợp]</option>
                            <?php
                            foreach ($dm as $key => $item) :
                                extract($item);
                            ?>
                                <option value="<?= $id_loai ?>"><?= $ten_loai ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="mt-3">
                            <label for="quanity_sp" class="form-label">Số lượng sản phẩm</label>
                            <input type="number" name="quanity_sp" min="1" id="quanity_sp" class="form-control" placeholder="Nhập số lượng sản phẩm">
                        </div>
                        <!-- <div class="mt-3">
                        <div class="form-check">
                        <label for="color_blue" class="form-label">Màu xanh dương</label>
                        <input type="checkbox" name="method_color[]" id="color_blue" class="form-check-input" value="blue">
                        </div>
                        <div class="form-check">
                        <label for="color_white" class="form-label">Màu trắng</label>
                        <input type="checkbox" name="method_color[]" id="color_white" class="form-check-input" value="white">
                        </div>
                        <div class="form-check">
                        <label for="color_red" class="form-label">Màu đỏ</label>
                        <input type="checkbox" name="method_color[]" id="color_red" class="form-check-input" value="red">
                        </div>
                    </div> -->
                        <div class="form-check">
                            <label for="color_no" class="form-label">Sản phẩm không có màu</label>
                            <input type="checkbox" name="color_no" id="color_no" class="form-check-input" value="0">
                        </div>
                        <div class="input-group">
                            <input type="text" name="name_color[]" id="" placeholder="Tên màu">
                            <input type="color" name="value_color[]" id="">
                        </div>
                       
                        <div class="mt-3" id="show_color">

                        </div>
                        <p class="btn btn-success mt-3" id="add_color">Thêm mới</p>

                    </div>

                </div>
            </div>
            <div class="mt-3 d-flex ">
                <div>
                    <div class="mt-3">
                        <label for="method_size">Size sản phẩm<span class="text-danger badge">(*)</span></label>
                        <input type="text" name="method_size" id="method_size" class="form-control" placeholder="VD: s m l 45 41">
                    </div>
                </div>
                <div class="mx-3">
                    <div class="mt-3 badge ">
                        <p class="text-danger">(*)Lưu ý:
                            - Chọn size đúng với sản phẩm : <br>
                            + Quần áo : S , M, L,... <br>
                            + Giày và phụ kiện vui lòng nhập đúng theo số và mỗi size phải ngăn cách bằng dấu cách <br>
                            Tùy vào sản phẩm mà bạn thêm vào để có quyết định có chọn size với màu không !
                        </p>
                    </div>

                </div>

            </div>
            <div class="mt-3">
                <label for="mota_sp" class="form-label">Mô tả sản phẩm</label>
                <textarea name="mota_sp" id="mota_sp" class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
            </div>
            <!-- group input -->
            <div class="my-5">
                <div class="btn-group">
                    <a href="?ad=home" class="btn btn-warning me-3" id="">Danh sách hàng hóa</a>
                    <input type="submit" value="Thêm mới" class="btn btn-success" name="add_sp">
                </div>
            </div>
        </form>
    </div>
</div>