<?php
  include_once("./includes/connect.php");
  include_once('./functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TFashion</title>
    <!-- css link bstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
    
    <!-- font aware cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
     referrerpolicy="no-referrer" />

     <!-- css style link -->
     <link rel="stylesheet" href="/style.css">
     <link rel="stylesheet" href="./startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css">

     <link rel="stylesheet" href="./style.css">

  <style>
  .logo{
    width: 6%;  
    height:7%;
    border-radius: 20px;
}
.carousel-inner{
  height: 700px !important;
}
  </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary-subtle">
  <div class="container-fluid">
    <img src="images/logo.png" alt="Lo Go" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="homepage.php">
    <i class="fa-solid fa-house"></i>
        <span>Trang Chủ</span></a>
</li>
        <li class="nav-item">
          <a class="nav-link" href="all_products.php">Sản Phẩm</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='./user_area/reg_users.php'>Đăng Ký</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='#'>Liên Hệ</a>
      </li>
      <li class='nav-item'>
          <a class='nav-link' href='#'><i class='fa-solid fa-cart-shopping'></i><sup><?php cart_item() ?><sup></a>
        </li>
        <li class='nav-item'>
      <a class='nav-link' href='#'>Tổng Tiền: <?php total_price() ?>K</a>
    </li>
      </ul>
      <form class="d-flex" role="search" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="search_data">
        <button class="btn btn-outline-info" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
  </div>
</nav>
<!-- cart -->
<?php
  add_cart();
?>
<!--  -->
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
    <li class='nav-item'>
    <a class='nav-link' href='#'><i class="fa-regular fa-user"></i></a>
  </li>
<li class='nav-item'>
    <a class='nav-link' href='#'>Đăng Nhập</a>
  </li>
  </ul>
</nav>
<!-- third -->
<div class="py-2">
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/quanao.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/Kinh1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/tuixach.webp" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<!-- fourth -->
<div class="row px-1 mt-2">
  <div class="col-md-10">
    <div class="row container">
    <!-- products -->
    <?php 
    get_allproducts();
    ?>
    <!--  -->
  </div>
  </div>
  <div class="col-md-2">
  <!-- side nav -->
<ul class="navbar-nav me-auto text-center"> 
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light "><h6>Danh mục</h6></a>
      </li>

      <!-- category -->
      <?php getcategories() ?>
</ul>
<!-- Brand -->
<ul class="navbar-nav me-auto text-center"> 
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light "><h6>Nhãn hàng</h6></a>
      </li>
<!-- Divider -->
<?php  getbrands() ?>

</ul>
</div>
</div>
  </div>
      <?php 
    // calling function 
    // getproducts();
    // get_unique_categories();
    // get_unique_brands();
      ?>
      <!-- row END  -->
      </div>
  <!-- col end -->
<!-- js link bstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
    <?php
    include_once('./includes/footer.php'); 
    ?>
</body>
</html> 