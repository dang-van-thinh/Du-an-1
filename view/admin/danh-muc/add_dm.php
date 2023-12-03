<div class="col-lg-10">
    <div class="container my-4">
        <div class="my-3">
            <h3>Thêm mới danh mục</h3>
        </div>
        <form action="?ad=add_dm" method="post" onsubmit="return validate_dm()">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mt-3">
                        <label for="" class="form-label">Mã danh mục: </label>
                        <input type="text" readonly value="" class="form-control" placeholder="Mã sản phẩm">
                    </div>
                    <div class="mt-3">
                        <label for="name_dm" class="form-label">Tên danh mục sản phẩm</label>
                        <input type="text" name="name_dm" id="name_dm" class="form-control" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="mt-3">
                        <label for="parent_dm" class="form-label">Danh mục cha (nếu có)</label>
                        <select name="parent_dm" id="parent_dm" class="form-select">
                        <option value="0">[Không]</option>
                            <?php foreach($dm_type as $key=>$item): 
                                extract($item);
                                ?>
                                <option value="<?= $id_loai?>"><?= $ten_loai?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- group input -->
            <div class="my-5">
                <div class="btn-group">
                    <a href="?ad=list_dm" class="btn btn-warning" id="">Danh sách danh mục</a>
                    <input type="submit" value="Thêm mới" class="btn btn-success" name="add_dm">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function validate_dm() { 
        let name_dm = document.getElementById('name_dm');
        if(name_dm.value == ''){
            name_dm.style.border = '2px solid red';
return false
        }

     }
</script>