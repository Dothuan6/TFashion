<?php
  include_once("./includes/connect.php");
  include_once('./functions/common_function.php');
  @session_start();
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
    body{
    background-color: white;
}
  .dark_mode{
    background-color: black !important;
    color: white !important;
}
  .logo{
    width: 6%;  
    height:7%;
    border-radius: 20px;
}
/* .carousel-inner{
 display: block;
} */
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}.sticky + .content {
  padding-top: 60px;
}
.chat_bot{
  text-align: center;
  border-radius: 100%;
  
}
body{
  box-sizing: border-box;}

/* Nút Để Mở Chatbox */
.nut-mo-chatbox {
  background-color: green;
  color: white;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 30px;
  right: 30px;
  width: 6%;
  height: 6%;
}
/* Ẩn chatbox mặc định */
.Chatbox {
  display: none;
  position: fixed;  
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Thêm style cho form */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* thiết lập style textarea */
.form-container textarea {
  width: 100%;
  padding: 5px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 100px;
}

/*thiết lập style cho textarea khi được focus */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Sthiết lập style cho nút trong form*/
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Thiết lập màu nền cho nút đóng chatbox */
.form-container .nut-dong-chatbox {
  background-color: red;
  
}

/* Thêm hiệu ứng hover cho nút*/
.form-container .btn:hover, .nut-mo-chatbox:hover {
  opacity: 1;
}
.nut-mo-chatbox{
  border-radius: 100% !important;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
  height: 40px;
  width: 40px;
  outline: black;
  border-radius: 100%;
  background-image: none;
}

.carousel-control-next-icon:after
{
  font-size: 20px;
  color: black;
  align-items: center !important;
}

.carousel-control-prev-icon:after {
  font-size: 20px;
  color: black;
  align-items: center !important;
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
<li class="nav-item active" >
    <a class="nav-link" href="homepage.php">
    <i class="fa-solid fa-house"></i>
        <span>Trang Chủ</span></a>
</li>
        <li class="nav-item">
          <a class="nav-link" href="all_products.php">Sản Phẩm</a>
        </li>
        <?php 
        if(isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='./user_area/user_profile.php'>Tài Khoản</a>
        </li>";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='./user_area/user_reg.php'>Đăng Ký</a>
        </li>";
        }
         ?>
      <li class='nav-item'>
        <a class='nav-link' href='contact.php'>Liên Hệ</a>
      </li>
      <li class='nav-item'>
          <a class='nav-link' href='cart.php'><i class='fa-solid fa-cart-shopping'></i><sup><?php cart_item() ?><sup></a>
        </li>
        <li class='nav-item'>
      <a class='nav-link' href='#'>Tổng Tiền: <?php total_price() ?> VND</a>
    </li>


    
      </ul>
      <form class="d-flex" role="search" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="search_data">
        <button class="btn btn-outline-info" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
  </div>
</nav>
<!-- calling cart -->
  <?php
      add_cart(); 
  ?>
<!--  -->
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">

  <?php 
  if(isset($_SESSION['username'])){
    echo "<li class='nav-item'>
          <a class='nav-link' href='homepage.php'>Xin chào {$_SESSION['username']}</a>
          </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='homepage.php'><i class='fa-regular fa-user'></i></a>
    </li>";
  }
  if(isset($_SESSION['username'])){
    echo "
    <li class='nav-item'>
           <a class='nav-link' href='./user_area/user_logout.php'>Đăng xuất</a>
    </li>";
  }else{
    echo "
    <li class='nav-item'>
           <a class='nav-link' href='./user_area/user_log.php'>Đăng nhập</a>
    </li>";
  }
  ?>
  </ul>
</nav>
<!-- third -->
<div class="row">
<div class="py-2 m-0 w-50 col-lg-6 col-md-12">
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <img src="./images/fashion1.jpg" class="d-block w-75 m-auto" style="height: 400px;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>TFashion Shop - Phong Cách Thời Thượng</h5>
        <button class="btn btn-outline btn-success"><a class="text-decoration-none text-light" href="./all_products.php">Xem sản phẩm</a></button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/fashion2.jpg" class="d-block w-75 m-auto" style="height: 400px;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-dark">TFashion Shop - Phong Cách Thời Thượng</h5>
        <button class="btn btn-outline btn-success"><a class="text-decoration-none text-light" href="./all_products.php">Xem sản phẩm</a></button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/fashion3.jpg" class="d-block w-75 m-auto" style="height: 400px;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>TFashion Shop - Phong Cách Thời Thượng</h5>
        <button class="btn btn-outline btn-success"><a class="text-decoration-none text-light" href="./all_products.php">Xem sản phẩm</a></button>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon text-black" aria-hidden="true"><i class="fa-solid fa-angles-left"></i></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon text-black" aria-hidden="true"><i class="fa-solid fa-angles-right"></i></span>
    <span class="visually-hidden">Next</span> 
  </button>
</div>
</div>

<div class="col-lg-6 col-md-6">
  <div class="row" style="height: 49px;"> 
          <header><img src="./images/sale_header1.jpg" class="h-25 w-100" alt=""></header>
  </div>
  <div class="row mt-2" style="height: 30 0px;">
          <?php getproducts_thirth(); 
          ?>
  </div>
</div>

</div>  
<!-- fourth -->
<div class="row px-1 mt-2">
  <div class="col-md-10">
    <div class="row container">
    <!-- products -->
    <!-- product mu -->
    <?php if(isset($_GET['category']) or isset($_GET['brand'])){
       get_unique_categories();
       get_unique_brands();
    }else{
        echo "<div><h3 class='text-center bg-dark text-light py-1'>Nón</h3></div>";
        getproducts_non();
        echo " <div><h3 class='text-center bg-dark text-light py-1'>Túi Xách</h3></div>";
        getproducts_tuixach(); 
        echo "<div><h3 class='text-center bg-dark text-light py-1'>Quần Áo</h3></div>";
        getproducts_quan_ao();
        echo "<div><h3 class='text-center bg-dark text-light py-1'>Mắt Kính</h3></div>";
        getproducts_kinh(); 
        get_unique_categories();
        get_unique_brands();
    }
     ?>

  </div>
  </div>
  <div class="col-md-2">
  <!-- side nav -->
<ul class="navbar-nav me-auto text-center"> 
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light "><h6>Danh mục</h6></a>
      </li>

      <!-- category -->
      <?php getcategories();
            
       ?>
</ul>
<!-- Brand -->
<ul class="navbar-nav me-auto text-center"> 
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light "><h6>Nhãn hàng</h6></a>
      </li>
<!-- Divider -->
<?php 
 getbrands();
 ?>

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
   <!-- Chat bot -->


   <button class="nut-mo-chatbox btn btn-outline btn-success" onclick="moForm()"><i class="fa-solid fa-comments"></i></button>
  <div class="Chatbox" id="myForm">
  <form action="" class="form-container">
    <h3><i class="fa-solid fa-headphones"></i> Tfashion</h3><hr>

    <label for="msg"><b>Lời Nhắn</b></label>
    <textarea placeholder="Bạn hãy nhập lời nhắn.." name="msg" required></textarea>

    <button type="submit" class="btn"><i class="fa-solid fa-paper-plane"></i></button>
    <button type="button" class="btn nut-dong-chatbox" onclick="dongForm()"><i class="fa-solid fa-circle-chevron-left"></i></button>
  </form>
</div>

      
  <!-- col end -->
<!-- js link bstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
    <?php
    include_once('./includes/footer.php'); 
    ?>

<!-- script -->
<script>
    function dark_mode(){
      var element = document.body;
      element.classList.toggle("dark_mode");
    }
</script>
    <script src="startbootstrap-sb-admin-2-gh-pages/startbootstrap-sb-admin-2-gh-pages/js/custom.js">
    </script>
        <script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

<!-- js chat bot -->
<script>
  /*Hàm Mở Form*/
function moForm() {
  document.getElementById("myForm").style.display = "block";
}
/*Hàm Đóng Form*/
function dongForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html> 
