<?php
  include_once("../includes/connect.php");
  include_once('../functions/common_function.php');
  @session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
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
.carousel-inner{
  height: 700px !important;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}.sticky + .content {
  padding-top: 60px;
}
  </style>
</head>
<body>
    <!-- navbar -->
<nav class="navbar navbar-expand-lg bg-secondary-subtle">
  <div class="container-fluid">
    <img src="../images/logo.png" alt="Lo Go" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <!-- Nav Item - Dashboard -->
<li class="nav-item active" >
    <a class="nav-link" href="../homepage.php">
    <i class="fa-solid fa-house"></i>
        <span>Trang Chủ</span></a>
</li>
        <li class="nav-item">
          <a class="nav-link" href="../all_products.php">Sản Phẩm</a>
        </li>
      <?php 
        if(isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='user_profile.php'>Tài Khoản</a>
        </li>";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='./user_reg.php'>Đăng Ký</a>
        </li>";
        }
         ?>
      <li class='nav-item'>
          <a class='nav-link' href='../cart.php'><i class='fa-solid fa-cart-shopping'></i><sup><?php cart_item() ?><sup></a>
        </li>
      </ul>
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
          <a class='nav-link' href='../homepage.php'>Xin chào {$_SESSION['username']}</a>
          </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='../homepage.php'><i class='fa-regular fa-user'></i></a>
    </li>";
  }
  if(isset($_SESSION['username'])){
    echo "
    <li class='nav-item'>
           <a class='nav-link' href='user_logout.php'>Đăng xuất</a>
    </li>";
  }else{
    echo "
    <li class='nav-item'>
           <a class='nav-link' href='user_log.php'>Đăng nhập</a>
    </li>";
  }
  ?>
  </ul>
</nav>
<!-- third -->

<!-- fourth -->
<div class="row px-1 mt-2">
  <div class="col-md-10">
    <div class="row container">
        <?php 
        if(!isset($_SESSION['username'])){
            include('./user_log.php');
        }else{
            include('payment.php');
        }
        ?>
    </div>

  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
    <?php
    include_once('../includes/footer.php'); 
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
</body>
</html> 
