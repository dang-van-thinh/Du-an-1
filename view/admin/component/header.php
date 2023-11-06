<?php
$user = load_one_tk($_SESSION['id_user']);
extract($user);
?>
<body>
    <div class="container-fluid">
        <header class="header_admin">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold fs-3 text-dark" href="#">
                        <img src="../view/assets/img/logo-3.png" alt="" style="width: 12rem;">
                        Admin
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-1" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-light" type="submit">Search</button>
                                </form>
                            </li>
                        </ul>


                        <ul class="navbar-nav  mb-2 mb-lg-0">
                            <li class="nav-item dropdown me-5">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="<?=$img?>" alt="" class="img_admin">
                                </a>
                                <ul class="dropdown-menu end-0" style="left: auto;">
                                    <li>
                                        <a class="dropdown-item d-flex text-center " href="#">
                                            <img src="<?=$img?>" alt="" width="40rem">
                                            <p class="fw-light ms-2"><?=$user_name?></p>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="?ad=logout">Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- toasct -->
<?php if(isset($_COOKIE['toasct_s']) || isset($_COOKIE['toasct_f'])): ?>
<div id="toasct">
    <p class="toasct_custom  <?=isset($_COOKIE['toasct_s'])? 'bg-success' : 'bg-danger' ?>">
       <?=isset($_COOKIE['toasct_s'])? $_COOKIE['toasct_s'] : $_COOKIE['toasct_f'] ?>
    </p>
</div>
<?php endif ?>