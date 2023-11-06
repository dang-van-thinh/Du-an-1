<div class="col-lg-10">
<div class="container my-4">
    <div class="my-3">
        <h3>Thêm mới hàng hóa</h3>
    </div>
    <form action="" method="post">
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
                    <input type="text" name="price_km"  class="form-control" id="price_km" placeholder="Giá khuyến mãi sản phẩm">
                </div>
                <div class="mt-3">
                    <label for="img_sp" class="form-label">Ảnh</label>
                    <input type="file" name="img_sp" id="img_sp" class="form-control" >
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
                         foreach($dm as $key=>$item):
                        extract($item);
                        ?>
                        <option value="<?= $id_loai?>"><?= $ten_loai?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="mt-3">
                        <label for="quanity_sp" class="form-label">Số lượng sản phẩm</label>
                        <input type="number" name="quanity_sp" min="1" id="quanity_sp" class="form-control" placeholder="Nhập số lượng sản phẩm">
                    </div>
                </div>
                
            </div>
        </div>
        <div class="mt-3">
            <label for="mota_sp" class="form-label">Mô tả sản phẩm</label>
            <textarea  name="mota_sp"  id="mota_sp" class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
        </div>
        <!-- group input -->
    <div class="my-5">
        <div class="btn-group">
            <a href="?ad=home" class="btn btn-warning" id="">Danh sách hàng hóa</a>
           <input type="text" value="Thêm mới" class="btn btn-success">
        </div>
    </div>
    </form>
</div>
</div>