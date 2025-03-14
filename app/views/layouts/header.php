<?php
    global $sharedData;
    $totalitem = $sharedData['totalitem'];
   
?>
<!-- Spinner Start -->
<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- inform start -->
<div class="modal show-inform" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button id="close_notification" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <!-- inform end -->
<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm bởi từ khóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="w-75 mx-auto">
                    <form class="input-group d-flex" method="POST" action="/Toy_children/Product/Categoryproduct">
                        <input type="search" name="search" class="form-control p-3" placeholder="từ khóa" aria-describedby="search-icon-1">
                        <button type="submit" id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="/Toy_children/Home" class="navbar-brand"><h1 class="text-primary display-6">ToyToy Shop</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/Toy_children/Home" class="nav-item nav-link">Trang chủ</a>
                    
                    
                    <a href="/Toy_children/Product/Categoryproduct" class="nav-item nav-link">Danh mục sản phẩm</a>
                    
                    <a href="#" class="nav-item nav-link">Liên hệ</a>
                </div>
                <div class="d-flex m-3 me-0 position-relative">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                    <a href="/Toy_children/Checkout/cardshopping" class="position-relative me-4 my-auto shopping-card">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?=$totalitem?></span>
                    </a>
                    <?php if (!isset($_SESSION["MaTaiKhoan"])) { ?>
                     <a class="my-auto" href="/Toy_children/User/Index">
                        <i class="fas fa-user fa-2x"></i>
                    </a> 
                    <?php } else {?>
                    <div class="dropdown my-auto position-relative">
                        <a href="#"  data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownMenuButton">
                            <?php if( $_SESSION["LoaiTaiKhoan"] == 2){ 
                                echo "<li><a class='dropdown-item' href='/Toy_children/admin/Dashboard'>Xem trang Admin</a></li>
                                        <li><hr class='dropdown-divider'></li>";}
                            ?>
                            <li><a href="/Toy_children/User/handlelogout" class="dropdown-item" id="logout">Thoát</a></li>
                        </ul>
                    </div>
                    <?php  } ?>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- Navbar End -->