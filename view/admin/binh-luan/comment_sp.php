<div class="col-10 float_right">
                    <h3 class="my-4">Danh sách bình luận sản phẩm</h3>
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 40px;"><input type="checkbox" class="item_checkbox" id="checkAll">
                                </th>
                                <th style="width: 40px;">STT</th>
                                
                                <th>Nội dung bình luận</th>
                                <th>Ngày bình luận</th>
                                <th>Người bình luận</th>
                                <th>
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($comment as $key => $cm): 
                                extract($cm);
                                ?>
                            <tr>
                                <td><input type="checkbox" name="check_sp" class="item_checkbox"></td>
                                <td><?= $key+1?></td>
                                
                                <td>
                                   <p><?= $noi_dung?></p>
                                </td>
                                <td><?= $ngay_cm?></td>
                                <td><?= $user_name?></td>
                                <td>
                                <a href="?ad=del_cm&id_cm=<?= $id_cm?>" class="btn btn-danger hover_item">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                    <!-- panigation -->
                    <div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- group input -->
                    <div class="my-5">
                        <div class="btn-group">
                            <a href="#" class="btn btn-warning" id="selectAll">Chọn tất cả</a>
                            <a href="#" class="btn btn-success" id="unSelectAll">Bỏ chọn tất cả</a>
                            <a href="#" class="btn btn-danger" id="delSelect">Xóa theo các lựa chọn</a>
                        </div>
                    </div>
