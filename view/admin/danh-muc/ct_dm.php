<div class="col-lg-10">
    <div class="container my-4">
        <div class="my-3">
            <h3>Chỉnh sửa thông tin danh mục</h3>
        </div>
        <form action="?ad=ct_dm" method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mt-3">
                        <label for="" class="form-label">Mã danh mục: </label>
                        <input type="text" readonly name="id_loai" value="<?= $id_loai ?>" class="form-control" placeholder="Mã sản phẩm">
                    </div>
                    <div class="mt-3">
                        <label for="name_dm" class="form-label">Tên danh mục sản phẩm</label>
                        <input type="text" name="name_dm" id="name_dm" value="<?= $ten_loai ?>" class="form-control" placeholder="Nhập tên danh mục">
                    </div>
                </div>
            </div>

            <!-- group input -->
            <div class="my-5">
                <div class="btn-group">
                    <a href="?ad=list_dm" class="btn btn-warning" id="">Danh sách danh mục</a>
                    <input type="submit" value="Lưu" class="btn btn-success" name="thay_doi">
                </div>
            </div>
        </form>
    </div>
</div>
