<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container-fluid">
        <!-- <img src="images/logo.png" alt="Lo Go" class="logo"> -->
        <h3 style="cursor: pointer;"><a class="text-light" style="text-decoration: none; background-color: black;"
                href="homepage.php">TFASHION</a></h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link text-light" href="homepage.php">
                        <!-- <i class="fa-solid fa-house"></i> -->
                        <span>Trang Chủ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="all_products.php">Sản Phẩm</a>
                </li>
                <?php 
        if(isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link text-light' href='./user_area/user_profile.php'>Tài Khoản</a>
        </li>";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link text-light' href='./user_area/user_reg.php'>Đăng Ký</a>
        </li>";
        }
         ?>

                <li class='nav-item'>
                    <a class='nav-link text-light' href='contact.php'>Liên Hệ</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link text-light' href='cart.php'><i
                            class='fa-solid fa-cart-shopping'></i><sup><?php cart_item() ?><sup></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link text-light' href='#'>Tổng Tiền: <?php subtotal() ?></a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="search_products.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search"
                    name="search_data">
                <button class="btn btn-outline-info" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</nav>