<?php
  include_once("../includes/connect.php");
  include_once("../functions/common_function.php");
  @session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xin Chào <?php echo $_SESSION['username']; ?></title>
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
.profile_img{
    width: 40%;
    height: 60%;
    margin: auto;
    display: block;
    /* object-fit: contain; */
    border-radius: 100%;
}
.edit_image{
  width: 150px;
  height: 50px;
  object-fit: contain;
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
<!-- second child -->
<!-- third -->

<!-- fourth -->
<div class="row">
  <div class="col-md-2 bg-dark p-0">
    <!-- sidenav -->
  <ul class="navbar-nav me-auto text-center" style="height: 100vh;"> 
      <li class="nav-item">
        <a href="#" class="nav-link text-light mt-3"><h4>Tài khoản</h4></a>
      </li>

      <?php
      $username=$_SESSION['username'];
      $user_image="select * from `user_table` where username ='$username'";
      $user_image=mysqli_query($con,$user_image);
      $row_image=mysqli_fetch_array($user_image);
      $user_image=$row_image['user_image'];
      echo "<li class='nav-item'>
          <img src='./user_images/$user_image' class='profile_img my-2'>
        </li>";
      ?>

      <li class="nav-item">
          <a href='user_profile.php' class="nav-link text-light ">Chờ xác nhận</a>
        </li>
        <li class="nav-item">
          <a href='user_profile.php?edit_account' class="nav-link text-light ">Sửa hồ sơ</a>
        </li>
        <li class="nav-item">
          <a href='user_profile.php?my_orders' class="nav-link text-light ">Đơn mua</a>
        </li>
        <li class="nav-item">
          <a href='user_profile.php?delete_account' class="nav-link text-light ">Xóa tài khoản</a>
        </li>
        <li class="nav-item">
          <a href='user_logout.php' class="nav-link text-light ">Đăng xuất</a>
        </li>
  </ul>
  </div>
  <div class="col-md-10 text-center">
    <?php
    get_user_oder_details(); 
    if(isset($_GET['edit_account'])){
      include('edit_account.php');
    }
    if(isset($_GET['my_orders'])){
      include('user_orders.php');
    }if(isset($_GET['delete_account'])){
      include('delete_account.php');
    }
    ?>
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
