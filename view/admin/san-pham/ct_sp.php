<div class="col-lg-10">
    <div class="container my-4">
        <div class="my-3">
            <h3>Thông tin hàng hóa</h3>
        </div>
        <form action="?ad=edit_sp" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mt-3">
                        <label for="" class="form-label">Mã sản phẩm: </label>
                        <input type="text" readonly name="id_sp" value="<?= $id_sp ?>" class="form-control" placeholder="Mã sản phẩm">
                    </div>
                    <div class="mt-3">
                        <label for="name_sp" class="form-label">Tên sản phẩm</label>
                        <input type="text" value="<?= $ten_sp ?>" name="name_sp" id="name_sp" class="form-control" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="mt-3">
                        <label for="price_sp" class="form-label">Giá sản phẩm</label>
                        <input type="number" value="<?= $gia_sp ?>" name="price_sp" id="price_sp" class="form-control" min="1000" placeholder="Nhập giá sản phẩm">
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="mt-3">
                        <label for="price_km" class="form-label">Giá khuyến mãi: </label>
                        <input type="number" value="<?= $gia_km ?>" name="price_km" min="1000" class="form-control" id="price_km" placeholder="Giá khuyến mãi sản phẩm">
                    </div>
                    <div class="mt-3">
                        <img src="<?= $img ?>" alt="" class="img_sp">
                        <input type="hidden" name="img_sp2" value="<?= $img ?>">
                        <label for="img_sp" class="form-label">Ảnh</label>
                        <input type="file" name="img_sp" id="img_sp" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="date_sp" class="form-label">Ngày nhập</label>
                        <input type="date" value="<?= $ngay_nhap ?>" name="date_sp" id="date_sp" class="form-control" placeholder="Nhập ngày nhập sản phẩm">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3">
                        <label for="loai_sp" class="form-label">Loại sản phẩm: </label>
                        <select name="loai_sp" id="loai_sp" class="form-select">
                            <option value="0">[Chọn loại sản phẩm phù hợp]</option>
                            <?php
                            foreach ($dm as $key => $item) : ?>
                                <option <?= $id_loai == $item['id_loai'] ? 'selected' : '' ?> value="<?= $item['id_loai'] ?>"><?= $item['ten_loai'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="mt-3">
                            <label for="quanity_sp" class="form-label">Số lượng sản phẩm</label>
                            <input type="number" value="<?= $so_luong ?>" name="quanity_sp" min="1" id="quanity_sp" class="form-control" placeholder="Nhập số lượng sản phẩm">
                        </div>
                        <div class="mt-3">
                            
                            <div class="mt-3">
                                <div class="mt-3" id="show_color">
                                <?php if ($method_color != null) :
                                foreach ($method_color as $key => $color) : ?>
                            
                                        <div class="input-group group_color">
                                            <input type="text" name="name_color[]" placeholder="Tên màu" value="<?=$key?>">
                                            <input type="color" name="value_color[]" value="<?=$color?>">
                                            <a href="" class="del_color">Xóa</a>
                                        </div>
                                    
                                <?php endforeach ?>
                            <?php endif ?>
                                </div>
                                <a href="#" class="btn btn-success mt-3 add_color" id="add_color">Thêm màu</a>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="mt-3 d-flex ">
                <div>

                    <div class="mt-3">
                        <label for="method_size">Size sản phẩm<span class="text-danger badge">(*)</span></label>
                        <input type="text" value="<?= $method_size ?>" name="method_size" id="method_size" class="form-control" placeholder="VD: s m l 45 41">

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
                <textarea name="mota_sp" id="mota_sp" class="form-control" placeholder="Nhập mô tả sản phẩm"><?= $mo_ta ?></textarea>
            </div>
            <!-- group input -->
            <div class="my-5">
                <div class="btn-group">
                    <a href="?ad=list_sp" class="btn btn-warning me-3" id="">Danh sách hàng hóa</a>
                    <input type="submit" value="Lưu" class="btn btn-success me-3" name="edit_sp">
                </div>
            </div>
        </form>
    </div>
</div>