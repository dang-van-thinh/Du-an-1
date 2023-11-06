<!-- home admin -->
<div class="container-fluid mt-4 menu">
            <div class="row ">
                <div class="col-2 ">
                    <div class="border-1 border border_menu menu_height">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-3">
                                <a class="nav-link text_custom fw-bold" aria-current="page" href="?ad=home">Quản lý sản
                                    phẩm</a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="nav-link text_custom fw-bold" href="?ad=list_dm">Quản lý danh mục</a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="nav-link text_custom fw-bold" href="?ad=list_tk">Quản lý tài khoản</a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="nav-link text_custom fw-bold" href="#">Thống kê hóa đơn</a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="nav-link text_custom fw-bold" href="#">Biểu đồ thống kê</a>
                            </li>
                            <?php 
                            if($_SESSION['role']==2):
                            ?>
                            <li class="nav-item mb-3">
                                <a class="nav-link text_custom fw-bold" href="#" aria-disabled="true">Quản lý doanh
                                    thu</a>
                            </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>